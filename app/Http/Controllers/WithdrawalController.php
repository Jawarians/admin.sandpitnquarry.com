<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Models\WithdrawalDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function index(Request $request)
    {
        $query = Withdrawal::with(['user', 'latest', 'bank', 'withdrawal_details']);
        
        // Handle search (case-insensitive)
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = strtolower($request->search);
            $pattern = "%{$searchTerm}%";
            $query->where(function($q) use ($pattern) {
                $q->whereRaw('CAST(id AS CHAR) LIKE ?', [$pattern])
                  ->orWhereHas('user', function($userQuery) use ($pattern) {
                      $userQuery->whereRaw('LOWER(name) LIKE ?', [$pattern])
                                ->orWhereRaw('LOWER(email) LIKE ?', [$pattern]);
                  });
            });
        }
        
        // Handle withdrawal status filter
        if ($request->has('withdrawal_status') && $request->withdrawal_status !== 'Status') {
            $query->whereHas('latest', function($q) use ($request) {
                $q->where('status', $request->withdrawal_status);
            });
        }
        
        // Handle bank status filter
        if ($request->has('bank_status') && $request->bank_status !== 'Status') {
            $query->whereHas('bank', function($q) use ($request) {
                $q->where('status', $request->bank_status);
            });
        }
        
        // Paginate results
        $perPage = $request->get('per_page', 10);
        $withdrawals = $query->orderBy('id', 'desc')->paginate($perPage);
        
        // Status options for filters
        $withdrawalStatusOptions = [
            'Approved' => 'Approved',
            'Pending' => 'Pending',
            'Cancelled' => 'Cancelled',
            'Verified' => 'Verified',
            'Rejected' => 'Rejected',
        ];
        
        $bankStatusOptions = [
            'Approved' => 'Approved',
            'Pending' => 'Pending',
            'Rejected' => 'Rejected',
        ];
        
        return view('withdrawals.index', compact('withdrawals', 'withdrawalStatusOptions', 'bankStatusOptions'));
    }
    
    public function edit($id)
    {
        $withdrawal = Withdrawal::with(['user', 'latest', 'bank', 'withdrawal_details.creator'])
            ->findOrFail($id);
        return view('withdrawals.edit', compact('withdrawal'));
    }
    
    public function update(Request $request, $id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $action = $request->input('action');
        
        switch ($action) {
            case 'approve':
                $status = 'Approved';
                break;
            case 'verify':
                $status = 'Verified';
                break;
            case 'reject':
                $status = 'Rejected';
                break;
            default:
                return redirect()->back()->with('error', 'Invalid action');
        }
        
        // Create new withdrawal detail with the updated status
        $withdrawal->withdrawal_details()->create([
            'status' => $status,
            'creator_id' => Auth::id(),
        ]);
        
        return redirect()->route('withdrawals.index')
            ->with('success', "Withdrawal has been {$status} successfully");
    }
    
    public function viewBankStatement($id)
    {
        $withdrawal = Withdrawal::with('bank.document')->findOrFail($id);
        
        if (!$withdrawal->bank || !$withdrawal->bank->document) {
            return redirect()->back()->with('error', 'No bank statement available');
        }
        
        return redirect($withdrawal->bank->document->path);
    }
}