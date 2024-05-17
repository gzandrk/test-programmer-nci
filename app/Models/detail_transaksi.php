<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    protected $fillable = [
        'no_transaksi', 'tgl_transaksi', 'kode_barang', 'urut', 'qty', 'harga', 'id_transaksi'
    ];

    public static function generateUniqueId()
    {
        $lastId = detail_transaksi::max('id_transaksi');
        $prefix = 'DT';
        
        if (!$lastId) {
            return $prefix . '001';
        }
        
        $lastNumber = (int) substr($lastId, strlen($prefix));
        $newNumber = $lastNumber + 1;
        $newId = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        return $newId;
    }
}
