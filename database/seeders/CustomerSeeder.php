<?php

namespace Database\Seeders;

use App\Models\customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        customer::create([
            'kode_customer' => 'CS001',
            'nama_customer' => 'Miryani',
            'alamat' => 'Kota Gedhe - Yogyakarta'
        ]);
        customer::create([
            'kode_customer' => 'CS002',
            'nama_customer' => 'Hamidah',
            'alamat' => 'Jl. Embong - Surabaya'
        ]);
        customer::create([
            'kode_customer' => 'CS003',
            'nama_customer' => 'Nanang',
            'alamat' => 'Jl. Pahlawan - Madiun'
        ]);
    }
}
