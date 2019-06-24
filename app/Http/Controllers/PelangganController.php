<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Penjualan;
use App\Barang;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}

	public function dashboard(){
		$pelanggan = Auth::guard('web')->user();		
		return view('pelanggan.dashboard', compact('pelanggan'));
	}

	public function createNewPemesanan(){	
		$penjualan = new Penjualan;
		$penjualan->kode_penjualan = str_random(8);
		$penjualan->kode_pelanggan = Auth::guard('web')->user()->kode_pelanggan;
		$penjualan->status = false;
		$penjualan->save();
		return redirect()->route('pemesanan.barang.form.pemesanan', $penjualan);
	}	

	public function showPemesananForm(Penjualan $penjualan){
		$pelanggan = Auth::guard('web')->user();		
		$listBarang = $penjualan->barang;
		return view('pemesanan_barang.form_pemesanan', compact('pelanggan', 'listBarang', 'penjualan'));
	}

	public function createPemesananBarang(Penjualan $penjualan){
		$listBarang = Barang::all();
		return view('pemesanan_barang.create_pemesanan_barang', compact('penjualan', 'listBarang'));
	}

	public function storePemesananBarang(Request $request, Penjualan $penjualan){
		// dd($request);
		$barang = Barang::where('kode_barang', $request->kode_barang)->first();		

		DB::table('penjualan_barang')->insertGetId([
			'kode_barang' => $barang->kode_barang, 
    		'kode_penjualan' => $penjualan->kode_penjualan, 
    		'jumlah_barang' => $request->jumlah_barang,
    		'harga_barang' => $barang->harga,
    	]);

    	return redirect()->route('pemesanan.barang.form.pemesanan', $penjualan);


	}

	public function showListPemesanan(){
		$pelanggan = Auth::guard('web')->user();		
		$listPemesanan = Penjualan::where('kode_pelanggan', $pelanggan->kode_pelanggan)->get();
		return view('pemesanan_barang.list_pemesanan', compact('listPemesanan'));
	}
}

