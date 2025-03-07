@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Invoice</h2>
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Invoice Number</label>
            <input type="text" class="form-control" name="invoice_number" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Client</label>
            <select name="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Invoice Date</label>
            <input type="date" class="form-control" name="invoice_date" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Total Amount</label>
            <input type="number" step="0.01" class="form-control" name="total_amount" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="unpaid">Unpaid</option>
                <option value="paid">Paid</option>
                <option value="overdue">Overdue</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save Invoice</button>
    </form>
</div>
@endsection
