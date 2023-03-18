<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        "categoria","tipo","user_id",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function transacoes(){
        return $this->hasMany(Transacao::class);
    }
}
