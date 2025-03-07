@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Invoices List</h2>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary">Add Invoice</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Invoice Number</th>
                <th>Client</th>
                <th>Invoice Date</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->client->name }}</td>
                    <td>{{ $invoice->invoice_date }}</td>
                    <td>${{ number_format($invoice->total_amount, 2) }}</td>
                    <td>{{ ucfirst($invoice->status) }}</td>
                    <td>
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
