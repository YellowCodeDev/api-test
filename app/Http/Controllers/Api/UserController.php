<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        
        if($users->isEmpty()){
            $data = [
                'menssage' => 'No se encuentran estudiantes',
                'status' => 200
            ];
            return response()->json($data, 404);
        }

        return response()->json($users, 200);
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'permission' => 'required',
            'status' => 'required',
            'sede' => 'required',
            'email' => 'required',
            'idcard' => 'required',
        ]);
        
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $users = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'password' => $request->password,
            'permission' => $request->permission,
            'status' => $request->status,
            'sede' => $request->sede,
            'email' => $request->email,
            'idcard' => $request->idcard

        ]);

        if (!$users) {
            $data = [
                'message' => 'Error al crear estudiante',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'users' => $users,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function update(){
        return 'actualizando estudiante';
    }
    public function delete(){
        return 'eliminando estudiante';
    }
}
