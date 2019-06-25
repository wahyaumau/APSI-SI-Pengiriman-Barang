<?php

use Illuminate\Database\Seeder;
use App\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
        		'kode_supplier' => "SUP 01",
	            'nama' => "dodi",
	            'email' => "dodi@gmail.com",
	            'password' => bcrypt('12345678'),
	            'alamat' => "bandung",
	            'telepon' => "087744412442",
	        ]);

        Supplier::create([
                'kode_supplier' => "SUP 02",
                'nama' => "danang",
                'email' => "danang@gmail.com",
                'password' => bcrypt('12345678'),
                'alamat' => "jakarta",
                'telepon' => "087724412442",
            ]);
    }
}
