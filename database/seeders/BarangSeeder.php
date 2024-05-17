<?php

namespace Database\Seeders;

use App\Models\barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        barang::create([
            'kode_barang' => 'HD001',
            'nama_barang' => 'Laptop Asus ROG',
            'stok' => '10',
            'harga' => '14000000'
        ]);
        barang::create([
            'kode_barang' => 'HD002',
            'nama_barang' => 'Laptop Lenovo Legion',
            'stok' => '5',
            'harga' => '14000000'
        ]);
        barang::create([
            'kode_barang' => 'HD003',
            'nama_barang' => 'Laptop Lenovo Thinkpad',
            'stok' => '3',
            'harga' => '10000000'
        ]);
        barang::create([
            'kode_barang' => 'AC001',
            'nama_barang' => 'Mouse Wireless',
            'stok' => '100',
            'harga' => '30000'
        ]);
        barang::create([
            'kode_barang' => 'AC002',
            'nama_barang' => 'Mousepad Kucing',
            'stok' => '1000',
            'harga' => '10000'
        ]);
    }
}
