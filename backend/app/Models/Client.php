<?php
// app/Models/Client.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'id_number',
        'bank_balance',
        'phone',
        'email',
        'is_active',
    ];
}
