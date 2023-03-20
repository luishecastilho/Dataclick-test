<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario_Clube__relation extends Model
{
    use HasFactory;

    protected $table = 'usuario_clube__relations';
    protected $fillable = ['valid', 'usuario_id', 'clube_id'];

}
