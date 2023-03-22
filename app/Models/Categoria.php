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

    public function users(){
        return $this->belongsToMany(User::class)->withPivot("tipo")->withTimestamps();
    }
    public function transacoes(){
        return $this->hasMany(Transacao::class);
    }
}
