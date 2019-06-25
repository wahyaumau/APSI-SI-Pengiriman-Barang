<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengambilan;
use App\Barang;
use App\Supplier;
use Auth;

class PengambilanBarangController extends Controller
{
    public function listPengambilanBarang(){;
    	$listPengambilan = Pengambilan::all();
    	return view('pengambilan_barang.list_pengambilan_barang', compact('listPengambilan'));
    }

    public function create(){
    	$listBarang = Barang::all();    	
    	return view('pengambilan_barang.create', compact('listBarang'));
    }

    public function store(Request $request){
    	$pengambilan = new Pengambilan;
    	$pengambilan->kode_barang = $request->kode_barang;
    	$pengambilan->jumlah = $request->jumlah_barang;
    	$pengambilan->status = "Menunggu konfirmasi";
    	$pengambilan->save();
    	return redirect()->route('pengambilan.barang.list')->with('success', 'Barang berhasil dipesan');
    }

    public function listKonfirmasiSupplier(){
        $supplier = Auth::guard('supplier')->user();        
    	$listPengambilan = Pengambilan::all();        
        
        foreach ($listPengambilan as $key => $pengambilan) {
            if ($pengambilan->barang->kode_supplier != $supplier->kode_supplier) {
                $listPengambilan->forget($key);
            }
        }        
        
    	return view('pengambilan_barang.list_pengambilan_barang_konfirmasi', compact('listPengambilan'));
    }

    public function konfirmasiPengambilan(Pengambilan $pengambilan){
    	$pengambilan->status = "Diterima";
    	// $updatedBarang = $pengambilan->barang;
    	// $updatedBarang->stok += $pengambilan->jumlah;
        // $pengambilan->tanggal_pembelian = $start->addDays(5);
    	$pengambilan->save();
    	// $updatedBarang->save();
    	return redirect()->route('pengambilan.barang.list.konfirmasi')->with('success', 'Barang berhasil dipesan');
    }
}
