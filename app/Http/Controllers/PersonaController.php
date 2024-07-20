<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\Validator;

class PersonaController extends Controller
{
    public function index() { 
        
        $personas = Persona::all();

        if ($personas->isEmpty()) {
            $data = [
                'message' => 'No se han encontrado personas',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($personas, 200);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nombre' => 'required|max:30',
            'apellido' => 'required|max:30',
            'telefono' => 'required|digits:9'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de datos',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $persona = Persona::create([
            'id' => $request->id,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono
        ]);

        if (!$persona) {
            $data = [
                'message' => 'Error al crear un Persona',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => 'Persona creada exitosamente',
            'persona' => $persona,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function show($id) {
        $persona = Persona::find($id);

        if (!$persona) {
            $data = [
                'message' => 'Persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'persona' => $persona,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id) {
        
        $persona = Persona::find($id);

        if (!$persona) {
            $data = [
                'message' => 'Persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $persona->delete();

        $data = [
            'message' => 'Persona Eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);

    }
}