<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return view('series.index', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('series.form');
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
            'name' => 'required|min:5|unique:classrooms'
        ], $this->getMessages());

        if ($validator->fails()) {
            toast()->error("Verifique os Erros!");

            return back()->withErrors($validator)
                        ->withInput();
        }

        ClassRoom::create($request->all());
        return redirect()->route('series.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $series)
    {
        return view('series.form', [ 'room' => $series]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassRoom $series)
    {
        $series->update($request->all());
        //alert()->success("Sucesso","Série Salva com Sucesso.")->autoClose(0);
        toast()->success("Série Salva com Sucesso.");
        return redirect()->route('series.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $series)
    {
        $series->delete();
        return redirect()->route('series.index');
    }

    private function getMessages() {
        return [
            'required' => 'Campo obrigatório!',
            'min' => 'Mínimo de :min caracteres!'
        ];
    }
}
