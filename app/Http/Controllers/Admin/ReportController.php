<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function users(Request $request)
    {
        $query = User::where('role', 'user')->latest();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [
                Carbon::parse($request->start_date)->startOfDay(),
                Carbon::parse($request->end_date)->endOfDay(),
            ]);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->paginate(20)->withQueryString();

        return view('admin.reports.users', compact('users'));
    }

    public function resetPassword(Request $request, User $user)
    {
        if (auth()->user()->role !== 'super_admin') {
            return back()->with('error', 'Hanya Super Admin yang dapat mereset password.');
        }

        $request->validate([
            'new_password' => 'required|string|min:8',
        ]);

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password untuk user ' . $user->name . ' berhasil direset.');
    }
}
