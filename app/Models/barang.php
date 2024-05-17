<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'kode_barang', 'nama_barang', 'stok', 'harga'
    ];

    public static function generateUniqueId()
    {
        $lastId = barang::max('kode_barang');
        $prefix = 'HD';
        
        if (!$lastId) {
            return $prefix . '001';
        }
        
        $lastNumber = (int) substr($lastId, strlen($prefix));
        $newNumber = $lastNumber + 1;
        $newId = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        return $newId;
    }

}

