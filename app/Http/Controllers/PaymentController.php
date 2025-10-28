<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the payments.
     */
    public function index(Request $request)
{
    $query = Payment::with(['latest', 'creator']);

    // Filter by search term
    if ($request->filled('search')) {
        $searchTerm = addcslashes($request->search, '%_');
        $query->where(function ($q) use ($searchTerm) {
            $q->where('reference_number', 'like', '%' . $searchTerm . '%')
              ->orWhere('remark', 'like', '%' . $searchTerm . '%');
        });
    }

    // Filter by status (from latest PaymentDetail)
    if ($request->filled('status') && $request->status != 'Status') {
        $statusValue = $request->status;
        $query->whereHas('latest', function ($subQuery) use ($statusValue) {
            $subQuery->where('status', $statusValue);
        });
    }

    // Pagination size
    $perPage = (int) ($request->per_page ?? 10);
    $perPage = min(max($perPage, 5), 100);

    $payments = $query->orderBy('id', 'desc')->paginate($perPage);

    return view('payments.index', compact('payments'));
}

    /**
     * Show the form for creating a new payment.
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created payment in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'remark' => 'required|string',
            'reference_number' => 'required|string',
            'paid_at' => 'required|date',
        ]);

        $payment = Payment::create([
            'remark' => $validated['remark'],
            'reference_number' => $validated['reference_number'],
            'paid_at' => $validated['paid_at'],
            'creator_id' => Auth::id(),
        ]);

        // Create initial payment detail with Pending status
        $paymentDetail = new PaymentDetail([
            'status' => 'Pending',
            'creator_id' => Auth::id(),
        ]);
        
        $payment->payment_details()->save($paymentDetail);

        return redirect()->route('payments.index')
            ->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified payment.
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified payment.
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified payment in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'remark' => 'required|string',
            'reference_number' => 'required|string',
            'paid_at' => 'required|date',
        ]);

        $payment->update($validated);

        return redirect()->route('payments.index')
            ->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified payment from storage.
     */
    public function destroy(Payment $payment)
    {

    // Delete related payment_details first to avoid foreign key violation
    $payment->payment_details()->delete();
    $payment->delete();

        return redirect()->route('payments.index')
            ->with('success', 'Payment deleted successfully.');
    }

    /**
     * Approve the specified payment.
     */
    public function approve(Payment $payment)
    {
        $paymentDetail = new PaymentDetail([
            'payment_id' => $payment->id,
            'status' => 'Approve',
            'creator_id' => Auth::id(),
        ]);
        
        $payment->payment_details()->save($paymentDetail);

        return redirect()->route('payments.index')
            ->with('success', 'Payment approved successfully.');
    }

    /**
     * Reject the specified payment.
     */
    public function reject(Payment $payment)
    {
        $paymentDetail = new PaymentDetail([
            'payment_id' => $payment->id,
            'status' => 'Reject',
            'creator_id' => Auth::id(),
        ]);
        
        $payment->payment_details()->save($paymentDetail);

        return redirect()->route('payments.index')
            ->with('success', 'Payment rejected successfully.');
    }
}