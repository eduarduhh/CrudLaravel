<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    protected $primaryKey = 'codigo';	
    
    protected $fillable = [
        'codigo',
    	'descricao',
        'codigo_categoria', 
    	'codigo_subcategoria', 
    	'quantidade',
        'd_e_l_e_t_e'
    ];
    public $timestamps = true;
}
