<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index() { 
        
        $personas = Person::all();

        if ($personas->isEmpty()) {
            $data = [
                'message' => 'No se han encontrado personas',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($personas, 200);
    }

}