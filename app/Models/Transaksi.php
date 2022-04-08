<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tipe_kamar()
    {
        return $this->belongsTo(Kamar::class, 'tipe_kamar_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
