<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clube extends Model
{
    /**
     * define quais os campos que podem ser inseridos pelo usuário do sistema no Banco
     * @var array
     */

    protected $fillable = [
        'full_name',
        'nick_name',
        'federal_division',
        'state_division',
        'birthday',
        'city',
        'state',
        'status',
        'user_id'];

    /**
     * protege os campos de inserções
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'update_at'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //data formatada m-d-Y
    protected $appends = ['birthdayFormatted'];
    public function getBirthdayFormattedAttribute()
    {
        if (!$this->attributes['birthday']) {
            return null;
        }

        return date('d/m/Y', strtotime($this->attributes['birthday']));
    }
    /**
     * Define a table
     *
     * @var string
     */
    protected $table = 'clubes';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function jogadores()
    {
        return $this->hasMany('App\Models\Jogador');
    }

    public function estado()
    {
        return $this->hasOne('App\Models\Estado','id','state');
    }

    public function cidade()
    {
        return $this->hasOne('App\Models\Cidade','id','city');
    }


}
