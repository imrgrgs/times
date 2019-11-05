<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    /**
     * define quais os campos que podem ser inseridos pelo usuário do sistema no Banco
     * @var array
     */

    protected $fillable = [
        'estado',
        'sigla',
    ];

    /**
     * protege os campos de inserções
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'update_at'];

    /**
     * Define a table
     *
     * @var string
     */
    protected $table = 'estados';

    public function cidades()
    {
        return $this->hasMany('App\Models\Cidade');
    }
}
