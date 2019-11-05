<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Jogador extends Model
{
    /**
     * define quais os campos que podem ser inseridos pelo usuário do sistema no Banco
     * @var array
     */

    protected $fillable = [
        'full_name',
        'nick_name',
        'birthday',

        'height',
        'weight',
        'position',
        'foreign',
        'country',

        'city',
        'state',
        'status',
        'clube_id'];

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
    protected $table = 'jogadors';

    public function clube()
    {
        return $this->belongsTo('App\Models\Clube');
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
