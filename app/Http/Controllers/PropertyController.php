<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertyController extends Controller
{
    public function index() {
        return view('property.index')->with('props', Property::all());
    }

    public function submit(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'value' => 'required'
        ]);

        // Adiciona no db
        $prop = new Property;
        $prop->name = $request->input('name');
        $prop->value = $request->input('value');
        $prop->save();

        return redirect('/property')->with('success', 'Número Salvo!');
    }

    public function add() {
        return view('property.add');
    }
}
