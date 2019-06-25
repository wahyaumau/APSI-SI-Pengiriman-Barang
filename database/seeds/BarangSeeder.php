<?php

use Illuminate\Database\Seeder;
use App\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
        		'nama_barang' => "beras",
	            'satuan' => "kg",
	            'harga' => "12500",
                'stok' => '200',
                'kode_supplier' => 'SUP 01',
	        ]);
        Barang::create([
        		'nama_barang' => "gula",
	            'satuan' => "kg",
	            'harga' => "7000",	            
                'stok' => '200',
                'kode_supplier' => 'SUP 02',
	        ]);
        Barang::create([
        		'nama_barang' => "minyak",
	            'satuan' => "liter",
	            'harga' => "9000",	            
                'stok' => '200',
                'kode_supplier' => 'SUP 02',
	        ]);
        Barang::create([
        		'nama_barang' => "pocari sweat",
	            'satuan' => "dus",
	            'harga' => "40000",	            
                'stok' => '200',
                'kode_supplier' => 'SUP 01',
	        ]);
        Barang::create([
        		'nama_barang' => "pulpen",
	            'satuan' => "lusin",
	            'harga' => "50000",	            
                'stok' => '200',
                'kode_supplier' => 'SUP 02',
	        ]);
    }
}
