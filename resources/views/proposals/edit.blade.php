    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h2>Edit Proposal</h2>
        <form action="{{ route('proposals.update', $proposal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $proposal->title) }}" required>
            </div>

            <!-- <div class="mb-3">
                <label for="client_id" class="form-label">Client</label>
                <select name="client_id" class="form-control" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ $client->id == $proposal->client_id ? 'selected' : '' }}>
                            {{ $client->name }}
                        </option>
                    @endforeach
                </select>
            </div> -->

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" name="amount" value="{{ old('amount', $proposal->amount) }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="draft" {{ $proposal->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="sent" {{ $proposal->status == 'sent' ? 'selected' : '' }}>Sent</option>
                    <option value="approved" {{ $proposal->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $proposal->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update Proposal</button>
        </form>
    </div>
    @endsection
