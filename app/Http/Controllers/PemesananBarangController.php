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
        $oldBarang=Barang::all();
    	$listBarang = $penjualan->barang()->get();
    	foreach ($listBarang as $barang) {
    		$barangUpdate = Barang::where('kode_barang', $barang->kode_barang)->first();
            if ($barangUpdate->stok>0 || $barangUpdate->stok < $barang->pivot->jumlah_barang) {
                $barangUpdate->stok -= $barang->pivot->jumlah_barang;           
                $barangUpdate->save();              
            }    		
    	}
        $cek=true;

        $newBarang = Barang::all();
        foreach ($newBarang as $barang) {
            if ($barang->stok<0) {
                $cek = false;
                foreach ($oldBarang as $resetBarang) {
                    $resetBarang->save();
                }
            }
        }
        if ($cek) {
            $penjualan->status=true;
        }else{
            $penjualan->status=false;
        }
    	
    	$penjualan->save();

        return back();
    }
}
