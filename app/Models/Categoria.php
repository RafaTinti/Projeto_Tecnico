<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        "categoria","tipo","user_id", "excluido",
    ];

    public function pessoas(){
        return $this->belongsTo(Pessoa::class);
    }
    public function transacoes(){
        return $this->hasMany(Transacao::class);
    }
}
