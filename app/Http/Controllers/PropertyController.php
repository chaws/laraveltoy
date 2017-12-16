<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertyController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('property.index')->with('props', Property::all());
    }

    public function submit(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'value' => 'required'
        ]);

        // Adiciona ou atualiza no banco
        if($request->input('id')) {
            $prop = Property::find($request->input('id'));
        }
        else {
            $prop = new Property;
        }

        $prop->name = $request->input('name');
        $prop->value = $request->input('value');
        $prop->save();

        return redirect('/property')->with('success', 'Número Salvo!');
    }

    public function add() {
        return view('property.add');
    }

    public function edit($id) {
        $prop = Property::find($id);
        if(!isset($prop)) {
            return redirect('/property')->with('errors', ['Número não encontrado!']);
        }

        return view('property.edit')->with('prop', $prop);
    }

    public function del($id) {
        $prop = Property::find($id);
        if(!isset($prop)) {
            return redirect('/property')->with('errors', ['Número não encontrado!']);
        }

        $prop->delete();

        return redirect('/property')->with('success', 'Número '. $id . ' foi deletado!');
    }
}
