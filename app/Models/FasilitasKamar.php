<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasKamar extends Model
{
    use HasFactory;

    // protected $fillable = ['nama_tipe']; // ini kaya field yang boleh di input user
    protected $guarded = ['id']; // ini sebaliknya field yang engga boleh di input user

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }
}
