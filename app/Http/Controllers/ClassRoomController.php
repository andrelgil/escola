<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = ClassRoom::orderBy('name')->get();
        return view('classrooms.index', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classrooms.form');
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
            'name' => 'required|min:5|max:40|unique:classrooms'
        ], $this->getMessages());

        if ($validator->fails()) {
            toast()->error("Verifique os Erros!");

            return back()->withErrors($validator)
                        ->withInput();
        }

        ClassRoom::create($data);
        toast()->success("Ano Criado com Sucesso.");
        return redirect()->route('classrooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $classroom)
    {
        return view('classrooms.form', ['room' => $classroom]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, ClassRoom $series)

    public function update(Request $request, ClassRoom $classroom)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => ['required', 'min:5', 'max:40', Rule::unique('classrooms')->ignore($classroom)]
        ], $this->getMessages());

        if ($validator->fails()) {
            toast()->error("Verifique os Erros!");

            return back()->withErrors($validator)
                         ->withInput();
        }

        $classroom->update($data);
        toast()->success("Ano Alterado com Sucesso.");
        return redirect()->route('classrooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $classroom)
    {
        $classroom->delete();
        toast()->success("Ano Excluído com Sucesso.");
        return redirect()->route('classrooms.index');
    }

    private function getMessages() {
        return [
            'required' => 'Este campo é obrigatório!',
            'min' => 'Mínimo de :min caracteres!',
            'max' => 'Máximo de :max caracteres!',
            'unique' => 'Já existe este ano cadastrado!'
        ];
    }
}
