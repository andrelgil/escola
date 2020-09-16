<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function update(Request $request)
    {
        $data = $request->all();
        
        if (!isset($data['admin'])) {
            $data['admin'] = 0;
        }

        auth()->user()->update($data);

        return redirect()->route('profile.index');
    }
}
