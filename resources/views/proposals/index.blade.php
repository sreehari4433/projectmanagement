@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Proposals List</h2>
    <a href="{{ route('proposals.create') }}" class="btn btn-primary">Add Proposal</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <!-- <th>Client</th> -->
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proposals as $proposal)
                <tr>
                    <td>{{ $proposal->title }}</td>
                    <!-- <td>{{ optional($proposal->client)->name }}</td> -->
                    <td>{{ number_format($proposal->amount, 2) }}</td>
                    <td>{{ ucfirst($proposal->status) }}</td>
                    <td>
                        <a href="{{ route('proposals.edit', $proposal->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('proposals.destroy', $proposal->id) }}" method="POST" style="display:inline;">
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
