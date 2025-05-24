<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $table = 'departament';

    protected $fillable = ['name','employee'];

    public function departament(){
        return $this->hasMany(
        Departament::class, //Qual o modelo referenciado
        'departament_id' , // Como está a chave estrangeira no modelo
        'id' // Qual a Chave Primária
        );
       }
}
