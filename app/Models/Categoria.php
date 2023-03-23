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

    public function users(){ // relacao de muitos para muitos
        return $this->belongsToMany(User::class)->withPivot("tipo")->withTimestamps();
    }
    public function transacoes(){ // um para muitos
        return $this->hasMany(Transacao::class);
    }
}
