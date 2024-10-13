<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrangtuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orangtuas = User::where('role', User::ROLE_ORANGTUA)->get();
        return view('orangtua.index', compact('orangtuas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = Siswa::all();
        return view('orangtua.create', compact('siswas'));
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
            'siswa_id' => 'required|exists:siswas,id',
        ]);

        User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => User::ROLE_ORANGTUA,
            'siswa_id' => $request->siswa_id,
        ]);

        return redirect()->route('orangtua.index')->with('success', 'Orangtua berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $orangtua = User::where('role', User::ROLE_ORANGTUA)->findOrFail($id);

        return view('orangtua.show', compact('orangtua'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
