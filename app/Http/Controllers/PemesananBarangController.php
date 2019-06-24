<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Penjualan;
use App\Barang;
use Illuminate\Support\Facades\DB;

class PemesananBarangController extends Controller
{
    public function showKonfirmasiPemesananForm(){
    	$listPemesanan = Penjualan::all();
		return view('pemesanan_barang.konfirmasi_pemesanan_owner', compact('listPemesanan'));
    }

    public function konfirmasiPemesanan(Penjualan $penjualan){
    	$listBarang = $penjualan->barang()->get();
    	foreach ($listBarang as $barang) {
    		$barangUpdate = Barang::where('kode_barang', $barang->kode_barang)->first();
    		$barangUpdate->stok -= $barang->pivot->jumlah_barang;    		
    		$barangUpdate->save();    		
    	}
    	$penjualan->status=true;
    	$penjualan->save();
    }
}
