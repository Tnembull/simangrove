<?php

namespace App\Http\Controllers;

use App\Models\MeasurementSession;
use Illuminate\Http\Request;

class MeasurementSessionController extends Controller
{
    public function index()
    {
        $sessions = MeasurementSession::latest()->get();
        return view('measurement-sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('measurement-sessions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'measurement_number' => 'required|integer',
            'observer_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'measurement_year' => 'required|date',
        ]);

        MeasurementSession::create($validated);
        return redirect()->route('measurement-sessions.index')->with('success', 'Measurement session created.');
    }

    public function show(MeasurementSession $measurementSession)
    {
        return view('measurement-sessions.show', compact('measurementSession'));
    }

    public function edit(MeasurementSession $measurementSession)
    {
        return view('measurement-sessions.edit', compact('measurementSession'));
    }

    public function update(Request $request, MeasurementSession $measurementSession)
    {
        $validated = $request->validate([
            'measurement_number' => 'required|integer',
            'observer_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'measurement_year' => 'required|date',
        ]);

        $measurementSession->update($validated);
        return redirect()->route('measurement-sessions.index')->with('success', 'Measurement session updated.');
    }

    public function destroy(MeasurementSession $measurementSession)
    {
        $measurementSession->delete();
        return redirect()->route('measurement-sessions.index')->with('success', 'Measurement session deleted.');
    }
}
