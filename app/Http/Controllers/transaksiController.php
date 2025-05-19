<?php

    namespace App\Http\Controllers;

    use App\Models\transaksi;
    use Illuminate\Http\Request;
    use App\Models\buku;
    

    class transaksiController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $transaksi = transaksi::with('detailTransaksi.buku', 'pengguna')->latest()->paginate(7);
            $total_pendapatan = transaksi::sum('total_harga');
            return view('admin.transkasi', compact('transaksi','total_pendapatan'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create($id_transaksi)
        {
            // $transaksi = transaksi::all();
            // return view('kasir.create', compact('transaksi'));
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            
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
