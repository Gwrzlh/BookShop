<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use App\Models\kategori;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $bukus = buku::with('kategori')->latest()->paginate(7);
       $kategori = kategori::all();
       return view('admin.buku', compact('bukus','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bukus = buku::all();
        $kategori = kategori::all();
        return view('buku.create',compact('bukus','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $bukus = $request -> validate([
            'judul'=>'required',
            'pengarang'=>'required',
            'penerbit'=>'required',
            'tahun'=>'required',
           'cover'=>'image|mimes:jpeg,jpg,png|max:2048',
           'harga'=>'required',
           'stock'=>'required',
           'kategori'=>'required'
        ]);

        $cover = $request->file('cover');
        $cover->storeAs('cover', $cover->hashName());

        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->penerbit = $request->penerbit;
        $buku->tahun = $request->tahun;
        $buku->cover = $cover->hashName();
        $buku->harga = $request->harga;
        $buku->stock = $request->stock;
        $buku->kategori_id = $request->kategori;
        $buku->save();
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
    public function edit($id_buku)
    {
        $buku = buku::with('kategori')->findOrFail($id_buku);
        return view('buku.edit', compact('buku','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id_buku)
    {
       $bukus = $request -> validate([
            'judul'=>'required',
            'pengarang'=>'required',
            'penerbit'=>'required',
            'tahun'=>'required',
            'harga'=>'required',
            'stock'=>'required',
            'kategori_id'=>'required',
        ]);

        $bukus = buku::findOrFail($id_buku);

      if($request->hasFile('cover')){
        storage::delete('cover/'. $bukus->cover);
        $cover = $request->file('cover');
        $cover->storeAs('cover', $cover->hashName());

        $bukus->update([
            'cover' => $cover->hashName(),
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'kategori_id' => $request->kategori_id
        ]);

      }else{
        $bukus->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'kategori_id' => $request->kategori_id
        ]);
      }
      return redirect()->route('admin')->with('success', 'buku berhasil diupdate.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_buku)
    {
        $bukus = buku::findOrFail($id_buku);
        $bukus->delete();
        
        return redirect()->route('admin')->with('success', 'buku berhasil dihapus.');
    }
}
