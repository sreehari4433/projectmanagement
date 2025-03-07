@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Estimate</h2>
    <form action="{{ route('estimates.update', $estimate->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Client Name</label>
            <select name="client_name" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->name }}" {{ $client->name == $estimate->client_name ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Total Amount</label>
            <input type="number" class="form-control" name="total_amount" value="{{ $estimate->total_amount }}" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $estimate->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $estimate->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $estimate->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
