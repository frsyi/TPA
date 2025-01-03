<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajars = User::where('role', User::ROLE_PENGAJAR)->paginate(10);
        return view('pengajar.index', compact('pengajars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengajar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:13',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => User::ROLE_PENGAJAR,
        ]);

        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengajar = User::where('role', User::ROLE_PENGAJAR)->findOrFail($id);

        return view('pengajar.show', compact('pengajar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengajar = User::where('role', User::ROLE_PENGAJAR)->findOrFail($id);
        return view('pengajar.edit', compact('pengajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pengajar = User::where('role', User::ROLE_PENGAJAR)->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:13',
            'email' => 'required|string|email|max:255|unique:users,email,' . $pengajar->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $pengajar->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $pengajar->password,
            'role' => User::ROLE_PENGAJAR,
        ]);

        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->role === 'pengajar') {
            $user->delete();

            return redirect()->route('pengajar.index')
                ->with('success', 'Data Pengajar berhasil dihapus!');
        }
    }
}
