<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Chave primária do objeto
    protected $primaryKey = 'id';

    //Campos que estão disponíveis para consulta
    protected $fillable = [
        'title', 'description', 'finish', 'finish_at'
    ];
}
