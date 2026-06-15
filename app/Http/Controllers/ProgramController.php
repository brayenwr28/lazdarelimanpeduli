<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)->latest()->get();
        return view('program', compact('programs'));
    }

    public function show($id)
    {
        $program = Program::findOrFail($id);
        return view('program-detail', compact('program'));
    }
}
