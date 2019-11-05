<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    var $divisoes = [
        ['id' => 'A', 'sigla' => 'Série A'],
        ['id' => 'B', 'sigla' => 'Série B'],
        ['id' => 'C', 'sigla' => 'Série C'],
        ['id' => 'D', 'sigla' => 'Série D'],

    ];

    var $positions = [
        ['id' => 'Gol', 'description' => 'Goleiro'],
        ['id' => 'Defesa', 'description' => 'Defesa'],
        ['id' => 'MeioCampo', 'description' => 'Meio Campo'],
        ['id' => 'Ataque', 'description' => 'Atacante'],

    ];
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function inverteData($data)
    {
        if (!$data) {
            return null;
        }
        if (count(explode("/", $data)) > 1) {
            return implode("-", array_reverse(explode("/", $data)));
        } elseif (count(explode("-", $data)) > 1) {
            return implode("/", array_reverse(explode("-", $data)));
        }
    }
}
