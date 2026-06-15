<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Popup;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    public function index()
    {
        $popup = Popup::first();
        return view('admin.popups.index', compact('popup'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'delay' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|max:10240'
        ]);

        $validated['is_active'] = $request->has('is_active');
        $popup = Popup::first();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('popups', 'public');
            $validated['image_url'] = '/storage/' . $path;
        } elseif (!$popup && !$request->hasFile('image')) {
            return back()->with('error', 'Gambar wajib diunggah untuk popup pertama kali.')->withInput();
        }

        if ($popup) {
            $popup->update($validated);
        } else {
            Popup::create($validated);
        }

        return redirect()->route('admin.popups.index')->with('success', 'Pengaturan Popup berhasil disimpan.');
    }
}
