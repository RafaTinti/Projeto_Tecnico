<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'fis_ou_jur', 'cpf', 'cnpj', 'cidade', 'estado', 'contato', 'email', 'ativo', 'user_id', "excluido",
    ];

    public function users(){
        return $this->belongsToMany(User::class)->withPivot("tipo")->withTimestamps();
    }

    public function transacoes(){
        return $this->hasMany(Transacao::class);
    }
}
