<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'target_amount' => 'nullable|numeric|min:0',
            'category' => 'required|string',
            'image' => 'nullable|image|max:10240',
            'end_date' => 'nullable|date',
            'bank_name' => 'nullable|string|max:100',
            'bank_account' => 'nullable|string|max:100',
            'bank_account_name' => 'nullable|string|max:255',
            'qris_image' => 'nullable|image|max:5120'
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['target_amount'] = (float) ($validated['target_amount'] ?? 0);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('programs', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        if ($request->hasFile('qris_image')) {
            $path = $request->file('qris_image')->store('programs/qris', 'public');
            $validated['qris_image_url'] = '/storage/' . $path;
        }

        Program::create($validated);
        return redirect()->route('admin.programs.index')->with('success', 'Program donasi berhasil ditambahkan.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.form', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'target_amount' => 'nullable|numeric|min:0',
            'category' => 'required|string',
            'image' => 'nullable|image|max:10240',
            'end_date' => 'nullable|date',
            'bank_name' => 'nullable|string|max:100',
            'bank_account' => 'nullable|string|max:100',
            'bank_account_name' => 'nullable|string|max:255',
            'qris_image' => 'nullable|image|max:5120'
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['target_amount'] = (float) ($validated['target_amount'] ?? 0);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('programs', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        if ($request->hasFile('qris_image')) {
            $path = $request->file('qris_image')->store('programs/qris', 'public');
            $validated['qris_image_url'] = '/storage/' . $path;
        }

        $program->update($validated);
        return redirect()->route('admin.programs.index')->with('success', 'Program donasi berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('admin.programs.index')->with('success', 'Program donasi berhasil dihapus.');
    }
}
