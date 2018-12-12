<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{	
    protected $table = 'categoria';
    protected $primaryKey = 'codigo';	
    
    protected $fillable = [
    	'codigo',
    	'descricao',
        'ativo'
    ];
    public $timestamps = true;
}
