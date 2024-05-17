<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\barang;
use App\Models\customer;
use App\Models\transaksi;
use Illuminate\Http\Request;
use App\Models\detail_transaksi;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoretransaksiRequest;
use App\Http\Requests\UpdatetransaksiRequest;
use Illuminate\Support\Facades\Log as Log;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tanggalSaatIni = Carbon::now();
        $cust = customer::get();
        $transaksi = transaksi::generateUniqueId();
        $barang = barang::get();
        return view('home', compact(['tanggalSaatIni','cust','transaksi','barang']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        transaksi::create([
            'no_transaksi' => $request->transaksi,
            'tgl_transaksi' => $request->tgl_transaksi,
            'kode_customer' => $request->nama_cust,
            'total' => $request->total,
        ]);

        foreach($request->namabrg as $key => $namaBrg){
            detail_transaksi::create([
                'no_transaksi' => $request->transaksi,
                'tgl_transaksi' => $request->tgl_barang[$key],
                'kode_barang' => $request->kodebrg[$key],
                'urut' => $request->urut[$key],
                'qty' => $request->qty[$key],
                'harga' => $request->harga[$key],
            ]);
        }

        return redirect('/')->with('success', 'Transaksi Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaksi $transaksi)
    {
        //
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_Transaksi)
    {
        //
        $idDT = detail_transaksi::where('id_transaksi',$id_Transaksi)->first();
        dd($idDT);
        $barang = barang::where('id_transaksi', $idDT->kode_barang)->first();

        $qtyRetur = $request->qtyRetur;
        $idDT->qty -= $qtyRetur;
        $idDT->save();

        $barang->stok += $qtyRetur;
        $barang->save();

        return redirect('/')->with('success', 'Data berhasil diretur');

    }

    public function history($nama_cust){
        $history = DB::table('detail_transaksi')
                    ->join('barang', 'detail_transaksi.kode_barang', '=', 'barang.kode_barang')
                    ->join('transaksi','detail_transaksi.no_transaksi', '=', 'transaksi.no_transaksi')
                    ->join('customer','transaksi.kode_customer','=','customer.kode_customer')
                    ->where('customer.kode_customer',$nama_cust)
                    ->select('detail_transaksi.id_transaksi','detail_transaksi.no_transaksi','detail_transaksi.tgl_transaksi','customer.nama_customer','barang.nama_barang', 'detail_transaksi.qty','detail_transaksi.harga', DB::raw('detail_transaksi.qty * detail_transaksi.harga AS total'))
                    ->get();
        
        Log::info('Informasi terkait transaksi', $history->toArray());
        
        // Log::info('Response data:', $history);
        
        return response()->json($history);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
