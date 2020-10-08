<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::orderBy('name')->get();
        return view('rooms.index', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.form');
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
            'name' => 'required|min:5|max:40|unique:rooms'
        ], $this->getMessages());

        if ($validator->fails()) {
            toast()->error("Verifique os Erros!");

            return back()->withErrors($validator)
                        ->withInput();
        }

        Room::create($data);
        toast()->success("Ano Criado com Sucesso.");
        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $Room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $Room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('rooms.form', ['room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $classRoom
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Room $series)

    public function update(Request $request, Room $room)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => ['required', 'min:5', 'max:40', Rule::unique('rooms')->ignore($room)]
        ], $this->getMessages());

        if ($validator->fails()) {
            toast()->error("Verifique os Erros!");

            return back()->withErrors($validator)
                         ->withInput();
        }

        $room->update($data);
        toast()->success("Ano Alterado com Sucesso.");
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $Room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        toast()->success("Ano Excluído com Sucesso.");
        return redirect()->route('rooms.index');
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
