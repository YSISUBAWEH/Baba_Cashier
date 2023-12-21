<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransaksi extends Model
{
    use HasFactory;
        public $table = "item_transaksi";
    protected $fillable = [
        'item_id',
        'transaksi_id',
        'harga',
        'quantity',
    ];
}
