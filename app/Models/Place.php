<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'deskripsi'];

    public function pakets()
    {
        return $this->belongsTo(Paket::class);
    }
}
