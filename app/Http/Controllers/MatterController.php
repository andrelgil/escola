<?php

namespace App\Http\Controllers;

use App\Models\Matter;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MatterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matters = Matter::orderBy('name')->get();
        return view('matters.index', ['matters' => $matters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        return view('matters.form', ['rooms' => $rooms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|min:5|max:40|unique:matters'
        ], $this->getMessages());

        if ($validator->fails()) {
            toast()->error("Verifique os Erros!");

            return back()->withErrors($validator)
                        ->withInput();
        }

        $matter = Matter::create($data);

        if (isset($data['rooms']) && count($data['rooms'])) {
            $matter->rooms()->sync($data['rooms']);
        }


        toast()->success("Disciplina Criada com Sucesso.");
        return redirect()->route('matters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matter  $materials
     * @return \Illuminate\Http\Response
     */
    public function show(Matter $matter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matter  $matters
     * @return \Illuminate\Http\Response
     */
    public function edit(Matter $matter)
    {
        $rooms = Room::all();

        return view('matters.form', ['matter' => $matter, 'rooms' => $rooms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matter  $matters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matter $matter)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => ['required', 'min:5', 'max:40', Rule::unique('matters')->ignore($matter)]
        ], $this->getMessages());

        if ($validator->fails()) {
            toast()->error("Verifique os Erros!");

            return back()->withErrors($validator)
                         ->withInput();
        }

        $matter->update($data);

        if (!isset($data['rooms']) || !count($data['rooms'])) {
            $matter->rooms()->detach();
        } else {
            $matter->rooms()->sync($data['rooms']);
        }

        toast()->success("Disciplina Alterada com Sucesso.");
        return redirect()->route('matters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matter  $maters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matter $matter)
    {
        $matter->delete();
        toast()->success("Disciplina Excluída com Sucesso.");
        return redirect()->route('matters.index');
    }

    private function getMessages() {
        return [
            'required' => 'Este campo é obrigatório!',
            'min' => 'Mínimo de :min caracteres!',
            'max' => 'Máximo de :max caracteres!',
            'unique' => 'Já existe esta disciplina cadastrada!'
        ];
    }
}
