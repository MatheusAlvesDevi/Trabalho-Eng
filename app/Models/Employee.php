<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = ['name','data_nascimento','matricula','departament','departament_id'];

    public function employee (){
        return $this->belongsTo(
        Employee::class, //Qual modelo referencia
        'employee_id' , //Qual a Chave Estrangeira desse modelo no Modelo Product
        'id' // Qual o nome da Chave Primaria de Categoria
        );
       }

}
