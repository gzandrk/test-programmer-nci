<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'kode_customer', 'nama_customer', 'alamat'
    ];

    public static function generateUniqueId()
    {
        $lastId = customer::max('kode_customer');
        $prefix = 'CS';
        
        if (!$lastId) {
            return $prefix . '001';
        }

        $lastNumber = (int) substr($lastId, strlen($prefix));
        $newNumber = $lastNumber + 1;
        $newId = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        return $newId;
    }
}
