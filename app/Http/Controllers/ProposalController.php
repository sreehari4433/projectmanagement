<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Client;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::all();
        return view('proposals.index', compact('proposals'));
    }

    public function create()
{
    $clients = Client::all(); // Fetch all clients
    return view('proposals.create', compact('clients'));
}

public function store(Request $request)
{
    // dd($request->all());
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'amount' => 'required|numeric',
        'status' => 'required|in:draft,sent,approved,rejected',
    ]);

    Proposal::create([
        'title' => $request->title,
        'description' => $request->description,
        'amount' => $request->amount,
        'status' => $request->status,
    ]);

    return redirect()->route('proposals.index')->with('success', 'Proposal created successfully.');
}


public function edit(Proposal $proposal)
{
    $clients = Client::all();
    return view('proposals.edit', compact('proposal', 'clients'));
}

public function update(Request $request, Proposal $proposal)
{
    // Validate the incoming request
    $request->validate([
        'title' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'status' => 'required|in:draft,sent,approved,rejected',
    ]);

    // Update the proposal
    $proposal->update([
        'title' => $request->title,
        'amount' => $request->amount,
        'status' => $request->status,
    ]);

    return redirect()->route('proposals.index')->with('success', 'Proposal updated successfully.');
}

    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
        return redirect()->route('proposals.index')->with('success', 'Proposal deleted successfully.');
    }
}
