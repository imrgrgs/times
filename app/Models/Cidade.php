<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    /**
     * define quais os campos que podem ser inseridos pelo usuário do sistema no Banco
     * @var array
     */

    protected $fillable = [
        'cidade',
        'estado_id',
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
    protected $table = 'cidades';

    public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }
}
