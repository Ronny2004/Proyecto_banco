<?php
// app/Models/Ahorro.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ahorros extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'amount',
        'date',
    ];

    /**
     * Get the client that owns the savings.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
