<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OwnerSeeder::class);
        $this->call(PelangganSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(BarangSeeder::class);
    }
}
