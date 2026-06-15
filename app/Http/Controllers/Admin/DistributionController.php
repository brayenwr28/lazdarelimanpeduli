<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Models\Program;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    public function index()
    {
        $distributions = Distribution::with('program')->latest()->get();
        return view('admin.distributions.index', compact('distributions'));
    }

    public function create()
    {
        $programs = Program::where('is_active', true)->get();
        return view('admin.distributions.form', compact('programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'recipient_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'photo' => 'nullable|image|max:10240' // 10MB
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('distributions', 'public');
            $validated['photo_url'] = '/storage/' . $path;
        }

        Distribution::create($validated);
        return redirect()->route('admin.distributions.index')->with('success', 'Penyaluran berhasil dicatat.');
    }
}
