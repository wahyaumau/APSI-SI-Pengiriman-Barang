<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengambilan;
use App\Barang;

class PendataanBarangController extends Controller
{
    public function index(){
    	$listPengambilan = Pengambilan::where('status', 'Diterima')->get();
    	return view('pendataan_barang.index', compact('listPengambilan'));
    }

    public function submitPendataan(Pengambilan $pengambilan){
    	$barang = Barang::where('kode_barang', $pengambilan->kode_barang)->first();
    	$barang->stok += $pengambilan->jumlah;
    	$pengambilan->status = "Transaksi selesai";
    	$barang->save();
    	$pengambilan->save();
    	return back();

    }
}
