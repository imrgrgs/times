<?php

namespace App\Http\Controllers\User;

use App\Exports\ClubesExport;
use App\Http\Controllers\Controller;
use App\Models\Clube;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ClubesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubes = Clube::where('user_id', '=', Auth::user()->id)->orderBy('full_name')->paginate(10);

        return view('clubes.index', compact('clubes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $divisoes = $this->divisoes;
        $estados = Estado::get();

        return view('clubes.create', compact('estados', 'divisoes'));
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
            'full_name' => 'bail|required|min:5|max:120',
            'nick_name' => 'nullable|min:2|max:15',
            'federal_division' => 'nullable|min:1|max:1|in:A,B,C,D',
            'state_division' => 'nullable|min:1|max:1|in:A,B,C,D',
            'birthday' => 'nullable|date_format:d/m/Y|before:today',
            'city' => 'required',
            'state' => 'required',
        ]);
        $clube = new Clube();
        $clube->full_name = $request['full_name'];
        $clube->nick_name = $request['nick_name'];
        $clube->federal_division = $request['federal_division'];
        $clube->state_division = $request['state_division'];

        $clube->birthday = $this->inverteData($request['birthday']);
        $clube->city = $request['city'];
        $clube->state = $request['state'];
        $clube->user_id = Auth::user()->id;
        $clube->save();
        return redirect('/clubes')->with('success', 'clube added!');

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

        $clube = Clube::find($id);
        if (!$clube) {

        }
        if ($clube->user_id !== Auth::user()->id) {

        }

        $divisoes = $this->divisoes;
        $estados = Estado::get();
        $estadosHTML = [];
        $estadosH[] = '<option value="" selected>Sem Estado</option>';
        foreach ($estados as $estado) {
            if ($estado->id == $clube->state) {
                $estadosH[] = '<option value="' . $estado->id . '" selected>' . $estado->sigla . '-' . $estado->estado . '</option>';
            } else {
                $estadosH[] = '<option value="' . $estado->id . '">' . $estado->sigla . '-' . $estado->estado . '</option>';

            }

        }
        $estadosHTML = $estadosH;
//dd(compact('estadosHTML', 'estados', 'divisoes'));
        return view('clubes.edit', compact('clube', 'id', 'divisoes', 'estados', 'estadosHTML'));

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
        $clube = Clube::find($id);
        if (!$clube) {
            return redirect('/clubes')->with('success', 'Não achei o clube!');
        }
        if ($clube->user_id !== Auth::user()->id) {
            return redirect('/clubes')->with('success', 'Não pertence ao usuário!');
        }

        $this->validate($request, [
            'full_name' => 'bail|required|min:5|max:120',
            'nick_name' => 'nullable|min:2|max:15',
            'federal_division' => 'nullable|min:1|max:1|in:A,B,C,D',
            'state_division' => 'nullable|min:1|max:1|in:A,B,C,D',
            'birthday' => 'nullable|date_format:d/m/Y|before:today',
            'city' => 'required',
            'state' => 'required',
        ]);

        $clube->full_name = $request['full_name'];
        $clube->nick_name = $request['nick_name'];
        $clube->federal_division = $request['federal_division'];
        $clube->state_division = $request['state_division'];

        $clube->birthday = $this->inverteData($request['birthday']);
        $clube->city = $request['city'];
        $clube->state = $request['state'];
        $clube->user_id = Auth::user()->id;
        $clube->save();
        return redirect('/clubes')->with('success', 'clube updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clube = Clube::find($id);
        if (!$clube) {

        }
        if ($clube->user_id !== Auth::user()->id) {

        }
        $clube->delete();
        return redirect('/clubes')->with('success', 'Clube deleted!');

    }

    public function exportExcel()
    {
        return Excel::download(new ClubesExport, 'clubes.xlsx');
    }

    public function exportCsv()
    {
        return Excel::download(new ClubesExport, 'clubes.csv');
    }

    public function downloadPDF($id)
    {
        $clube = Clube::find($id);
        $pdf = PDF::loadView('clubes.pdf', compact('clube'));

        return $pdf->download('clube' . $clube->id . '.pdf');
    }
}
