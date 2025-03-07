<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Estimate;
use App\Models\Client;

class EstimateController extends Controller
{
    /**
     * Display a listing of the estimates.
     */
    public function index()
    {
        $estimates = Estimate::all();
        return view('estimates.index', compact('estimates'));
    }

    /**
     * Show the form for creating a new estimate.
     */
    public function create()
    {
        $clients = Client::all();
        return view('estimates.create', compact('clients'));
    }

    /**
     * Store a newly created estimate in the database.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'client_name'   => 'required|string|max:255',
            'total_amount'  => 'required|numeric|min:0',
            'status'        => 'required|in:pending,approved,rejected',
            'client_email'  => 'nullable|email|max:255',
            'description'   => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // Create the estimate
            $estimate = Estimate::create([
                'client_name'  => $request->client_name,
                'client_email' => $request->client_email,
                'description'  => $request->description,
                'total_amount' => $request->total_amount,
                'status'       => $request->status,
            ]);

            DB::commit();
            return redirect()->route('estimates.index')->with('success', 'Estimate created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('estimates.index')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified estimate.
     */
    public function edit(Estimate $estimate)
    {
        $clients = Client::all();
        return view('estimates.edit', compact('estimate', 'clients'));
    }

    /**
     * Update the specified estimate in the database.
     */
    public function update(Request $request, Estimate $estimate)
    {
        // Validate the request data
        $request->validate([
            'client_name'   => 'required|string|max:255',
            'total_amount'  => 'required|numeric|min:0',
            'status'        => 'required|in:pending,approved,rejected',
            'client_email'  => 'nullable|email|max:255',
            'description'   => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // Update the estimate
            $estimate->update([
                'client_name'  => $request->client_name,
                'client_email' => $request->client_email,
                'description'  => $request->description,
                'total_amount' => $request->total_amount,
                'status'       => $request->status,
            ]);

            DB::commit();
            return redirect()->route('estimates.index')->with('success', 'Estimate updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('estimates.index')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified estimate from the database.
     */
    public function destroy(Estimate $estimate)
    {
        try {
            $estimate->delete();
            return redirect()->route('estimates.index')->with('success', 'Estimate deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('estimates.index')->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
