<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Barang;
use Illuminate\Support\Facades\DB;
use App\Charts\BarChart;

class LaporanPenjualanController extends Controller
{
    public function laporanPenjualanBarang(){
    	$penjualan_barang = DB::table('penjualan_barang')
                 ->select('penjualan_barang.kode_barang','nama_barang', DB::raw('count(*) as total'), DB::raw('sum(jumlah_barang) as "total_penjualan"'), 'penjualan_barang.harga_barang')
                 ->join('barang', 'barang.kode_barang', '=', 'penjualan_barang.kode_barang')
                 ->groupBy('penjualan_barang.kode_barang', 'barang.nama_barang', 'penjualan_barang.harga_barang')
                 ->get();

        $labels = [];
        $values = [];
        foreach ($penjualan_barang as $penjualan) {
        	array_push($labels, $penjualan->nama_barang);
        	array_push($values, $penjualan->total_penjualan);
        }       

        // echo $labels;

        $chart = new BarChart;
        $chart->labels($labels);
        $chart->dataset('Laporan penjualan barang', 'bar', $values);                
        return view('laporan.penjualan_barang', compact('penjualan_barang', 'chart'));
    }

    public function laporanPemasukkan(){
		$penjualan_barang = DB::table('penjualan_barang', 'penjualan')
                 ->join('penjualan', 'penjualan.kode_penjualan', '=', 'penjualan_barang.kode_penjualan')                 
                 ->select(DB::raw('DATE(tanggal_pembelian) as "tanggal"'), DB::raw('sum(jumlah_barang) as "total_penjualan"'))
                 ->groupBy('penjualan.tanggal_pembelian')
                 ->get();    	

        echo $penjualan_barang;
    }
}
