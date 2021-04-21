<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;
    protected $table ='imoveis';

    protected $fillable=["descricao", "logradouroEndereco", "bairroEndereco", "numeroEndereco", "cepEndereco",
    "cidadeEndereco", "preco", "qtdQuartos", "tipo", "finalidade"];

}
