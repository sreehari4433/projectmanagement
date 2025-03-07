@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Estimate</h2>
    <form action="{{ route('estimates.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Client Name</label>
            <select name="client_name" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->name }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Total Amount</label>
            <input type="number" class="form-control" name="total_amount" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
