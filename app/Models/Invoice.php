<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['inv_name', 'total', 'user_id', 'paket_id'];

    public function pakets()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
}
