@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Estimates List</h2>
    <a href="{{ route('estimates.create') }}" class="btn btn-primary">Add Estimate</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Client Name</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estimates as $estimate)
                <tr>
                    <td>{{ $estimate->client_name }}</td> <!-- Updated to use client_name -->
                    <td>${{ number_format($estimate->total_amount, 2) }}</td> <!-- Formatted amount -->
                    <td>
                        <span class="badge 
                            {{ $estimate->status == 'pending' ? 'bg-warning' : 
                               ($estimate->status == 'approved' ? 'bg-success' : 'bg-danger') }}">
                            {{ ucfirst($estimate->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('estimates.edit', $estimate->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('estimates.destroy', $estimate->id) }}" method="POST" style="display:inline;">
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
