<?php

use Illuminate\Database\Seeder;
use App\Owner;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Owner::create([
        		'kode_owner' => "owner",
	            'nama' => "owner tirta jaya",
	            'email' => "owner@gmail.com",
	            'password' => bcrypt('ownerpassword'),
	            'alamat' => "ciwaruga",
	            'telepon' => "081234567899",
	        ]);
    }
}
