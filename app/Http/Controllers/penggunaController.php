<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class penggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penggunas = pengguna::all(); 
        return view('admin.pengguna', compact('penggunas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penggunas = $request -> validate([
             'username'=>'required',
             'namaLengkap'=>'required',
             'password'=>'required|min:7|confirmed',
             'password_confirmation' => 'required',
             'role'=>'required'
        ]);

        pengguna::create([
            'username' => $request->username,
            'nama_lengkap' => $request->namaLengkap,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_pengguna)
    {
        $penggunas = Pengguna::findOrFail($id_pengguna);

        return view('pengguna.edit', compact('penggunas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pengguna)
    {
        $penggunas = $request -> validate([
            'username' => 'required|string|max:255',
            'namaLengkap' => 'required|string|max:255',
            'role' => 'required|in:Admin,Owner,Kasir',
            'password' => 'nullable|min:7|confirmed',
            'password_confirmation' => 'required_with:password',
       ]);

       Pengguna::where('id_pengguna', $id_pengguna)->update([
        'username' => $request->username,
        'nama_lengkap' => $request->namaLengkap,
        'role' => $request->role,
        'password' => !empty($request->password) ? Hash::make($request->password) : Pengguna::findOrFail($id_pengguna)->password,
    ]);
    
       return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_pengguna)
{
    $pengguna = Pengguna::findOrFail($id_pengguna); // Gunakan id_pengguna
    $pengguna->delete();
    
    return redirect()->route('admin')->with('success', 'Pengguna berhasil dihapus.');
}

    
}
