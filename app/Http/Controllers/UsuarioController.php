<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Usuario;
use App\Models\Clube;
use App\Models\Usuario_Clube__relation;

class UsuarioController extends Controller
{
    public function list(Request $request)
    {
        if($request->get('clube')) {
            $relations = Usuario_Clube__relation::where('clube_id', '=', $request->get('clube'))->get('usuario_id');
            $usuarios = Usuario::whereIn('id', array_column($relations, 'usuario_id'))->get();
        }else{
            $usuarios = Usuario::all();
        }
        for($u = 0; $u < count($usuarios); $u++){
            $qtdClubes = Usuario_Clube__relation::where('usuario_id', '=', $usuarios[$u]['id'])->count();
            $usuarios[$u]['count'] = $qtdClubes;
        }

        if($request->ajax())
        {
            return response()->json(json_encode($usuarios));
        }

        return view('usuarios.list', [
            "usuarios" => $usuarios,
            "uri" => Route::getCurrentRoute()->uri
        ]);
    }

    public function createForm(): View
    {
        return view('usuarios.create', [
            "uri" => Route::getCurrentRoute()->uri
        ]);
    }

    public function create(Request $request)
    {
        $form = $request->post();

        return Usuario::create(
            [
                "name" => $form['name'],
                "email" => $form['email'],
                "phone" => $form['phone']
            ]
        );
    }

    public function show($id)
    {
        $usuario = Usuario::find($id)->toJson();

        return response()->json($usuario);
    }

    public function editForm(int $id): View
    {
        $usuario = Usuario::find($id)->toJson();

        return view('usuarios.edit', [
            "usuario" => $usuario,
            "uri" => Route::getCurrentRoute()->uri
        ]);
    }

    public function edit(Request $request, int $id)
    {
        $usuario = Usuario::find($id);
        try{
            $usuario->fill($request->post());
            return $usuario->save();
        }catch(\Exception $e){
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try{
            // soft delete usuario
            Usuario::find($id)->delete();

            // soft delete all relationships
            return Usuario_Clube__relation::where('usuario_id','=', $id)->update(['valid'=>false]);
        } catch(\Exception $e){
            return false;
        }
    }

    public function joinClube(int $usuario_id, int $clube_id): bool
    {
        $relation_id = Usuario_Clube__relation::create([
            'usuario_id' => $usuario_id,
            'clube_id' => $clube_id
        ])->id;

        return FaturaController::createNewSingaturePlan($relation_id);
    }

    public function details(int $id, Request $request): View
    {
        $usuario = Usuario::find($id);

        $relations = Usuario_Clube__relation::where('usuario_id', '=', $id)
                                            ->get('clube_id')
                                            ->toArray();
        $clubes = Clube::whereIn('id', array_column($relations, 'clube_id'))->get()->toArray();

        $faturas = FaturaController::list($id);

        // ->toJson()
        return view('usuarios.details', [
            "usuario" => $usuario,
            "clubes" => $clubes,
            "faturas" => $faturas
        ]);
    }
}
