<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Imovel extends Model
{
    use HasFactory;
    protected $table ='imoveis';

    protected $fillable=["descricao", "logradouroEndereco", "bairroEndereco", "numeroEndereco", "cepEndereco",
    "cidadeEndereco", "preco", "qtdQuartos", "tipo", "finalidade", "user_id"];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
