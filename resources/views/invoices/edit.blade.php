@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Invoice</h2>
    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Invoice Number</label>
            <input type="text" class="form-control" name="invoice_number" value="{{ old('invoice_number', $invoice->invoice_number) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Client</label>
            <select name="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $invoice->client_id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Invoice Date</label>
            <input type="date" class="form-control" name="invoice_date" value="{{ old('invoice_date', $invoice->invoice_date) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Total Amount</label>
            <input type="number" step="0.01" class="form-control" name="total_amount" value="{{ old('total_amount', $invoice->total_amount) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="unpaid" {{ $invoice->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="overdue" {{ $invoice->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Invoice</button>
    </form>
</div>
@endsection
