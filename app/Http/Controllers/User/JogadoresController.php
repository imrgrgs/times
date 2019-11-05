<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Clube;
use App\Models\Estado;
use App\Models\Jogador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JogadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogadores = Jogador::orderBy('full_name')->paginate(10);

        return view('jogadores.index', compact('jogadores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = json_decode(json_encode($this->positions), false);
        $estados = Estado::get();
        $clubes = Clube::get();

        return view('jogadores.create', compact('clubes', 'estados', 'positions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'clube_id' => 'bail|required',
            'full_name' => 'bail|required|min:5|max:120',
            'nick_name' => 'nullable|min:2|max:15',
            'height' => 'nullable',
            'weight' => 'nullable',
            'birthday' => 'nullable|date_format:d/m/Y|before:today',
            'position' => 'required',

            'city' => 'required',
            'state' => 'required',
        ]);
        $jogador = new Jogador();
        $jogador->full_name = $request['full_name'];
        $jogador->nick_name = $request['nick_name'];
        $jogador->height = $request['height'];
        $jogador->weight = $request['weight'];

        $jogador->birthday = $this->inverteData($request['birthday']);
        $jogador->position = $request['position'];
        $jogador->city = $request['city'];
        $jogador->state = $request['state'];
        $jogador->clube_id = $request['clube_id'];
        $jogador->save();
        return redirect('/jogadores')->with('success', 'jogador added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogador = Jogador::find($id);
        if (!$jogador) {

        }

        $positions = json_decode(json_encode($this->positions), false);
        $estados = Estado::get();
        $clubes = Clube::get();



        $estadosHTML = [];
        $estadosH[] = '<option value="" selected>Sem Estado</option>';
        foreach ($estados as $estado) {
            if ($estado->id == $jogador->state) {
                $estadosH[] = '<option value="' . $estado->id . '" selected>' . $estado->sigla . '-' . $estado->estado . '</option>';
            } else {
                $estadosH[] = '<option value="' . $estado->id . '">' . $estado->sigla . '-' . $estado->estado . '</option>';

            }

        }
        $estadosHTML = $estadosH;
//dd(compact('estadosHTML', 'estados',  'clubes'));
        return view('jogadores.edit', compact('jogador', 'id', 'clubes', 'estados', 'estadosHTML', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jogador = Jogador::find($id);
        if (!$jogador) {
            return redirect('/jogadores')->with('success', 'Não achei o jogador!');
        }

        $this->validate($request, [
            'clube_id' => 'bail|required',
            'full_name' => 'bail|required|min:5|max:120',
            'nick_name' => 'nullable|min:2|max:15',
            'height' => 'nullable',
            'weight' => 'nullable',
            'birthday' => 'nullable|date_format:d/m/Y|before:today',
            'position' => 'required',

            'city' => 'required',
            'state' => 'required',
        ]);
        
        $jogador->full_name = $request['full_name'];
        $jogador->nick_name = $request['nick_name'];
        $jogador->height = $request['height'];
        $jogador->weight = $request['weight'];

        $jogador->birthday = $this->inverteData($request['birthday']);
        $jogador->position = $request['position'];
        $jogador->city = $request['city'];
        $jogador->state = $request['state'];
        $jogador->clube_id = $request['clube_id'];
        $jogador->save();
        return redirect('/jogadores')->with('success', 'jogador updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jogador = Jogador::find($id);
        if (!$jogador) {

        }
        if ($jogador->user_id !== Auth::user()->id) {

        }
        $jogador->delete();
        return redirect('/jogadores')->with('success', 'Jogador deleted!');

    }
}
