<?php

use Illuminate\Database\Seeder;
use App\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelanggan::create([
        		'kode_pelanggan' => "wahyu",
	            'nama' => "wahyu",
	            'email' => "wahyaumau@gmail.com",
	            'password' => bcrypt('12345678'),
	            'alamat' => "ciwaruga",
	            'telepon' => "087744412441",
	        ]);
    }
}
