<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $fillable = [
        'no_transaksi', 'tgl_transaksi', 'kode_customer', 'total', 'keterangan'
    ];

    public static function generateUniqueId()
    {
        $lastId = transaksi::max('no_transaksi');
        $prefix = 'TR';
        
        if (!$lastId) {
            return $prefix . '001';
        }
        
        $lastNumber = (int) substr($lastId, strlen($prefix));
        $newNumber = $lastNumber + 1;
        $newId = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        return $newId;
    }
}
