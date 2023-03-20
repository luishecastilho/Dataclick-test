<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    use HasFactory;

    protected $table = 'faturas';
    protected $fillable = ['relation_id', 'expiry_date', 'paid', 'amount'];

}
