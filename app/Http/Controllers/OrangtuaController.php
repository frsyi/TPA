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
        $orangtuas = User::where('role', User::ROLE_ORANGTUA)->paginate(10);
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
            'phone_number' => 'nullable|string|max:13',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'siswa_id' => 'required|exists:siswas,id',
        ]);

        User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'username' => $request->username,
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
        $orangtua = User::where('role', User::ROLE_ORANGTUA)->with('siswa')->findOrFail($id);

        return view('orangtua.show', compact('orangtua'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $orangtua = User::where('role', User::ROLE_ORANGTUA)->findOrFail($id);
        $siswas = Siswa::all();

        return view('orangtua.edit', compact('orangtua', 'siswas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $orangtua = User::where('role', User::ROLE_ORANGTUA)->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:13',
            'username' => 'required|string|max:255|unique:users,' . $orangtua->id,
            'password' => 'nullable|string|min:8|confirmed',
            'siswa_id' => 'required|exists:siswas,id',
        ]);

        $orangtua->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'username' => $request->username,
            'siswa_id' => $request->siswa_id,
            'password' => $request->password ? Hash::make($request->password) : $orangtua->password,
        ]);

        return redirect()->route('orangtua.index')->with('success', 'Data Orangtua berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::where('role', 'orangtua')->findOrFail($id);
        $user->delete();
        return redirect()->route('orangtua.index')->with('success', 'Data Orangtua berhasil dihapus!');
    }
}
