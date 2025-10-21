<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use Illuminate\Http\Request;

class TransporterWithdrawalController extends Controller
{
    public function index(Request $request)
    {
        $claims = Claim::with([
            'customer_account.customer.transporter',
            'customer_account',
            'latest'
        ])->orderBy('id', 'desc')->paginate($request->get('per_page', 10));

        return view('transporter_withdrawals.index', compact('claims'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Approved,Pending,Reject',
        ]);

        $claim = Claim::findOrFail($id);
        $latest = $claim->latest;
        if ($latest) {
            $latest->status = $request->input('status');
            $latest->save();
        }
        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
