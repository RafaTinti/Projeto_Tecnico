<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id", "pessoa_id", "categoria_id", "descricao", "valor", "status", "vencimento", "liquidada",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}