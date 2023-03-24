<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Clube;
use App\Models\Usuario_Clube__relation;

class ClubeController extends Controller
{
    public function list(Request $request)
    {
        if($request->get('usuario')) {
            $relations = Usuario_Clube__relation::where('usuario_id', '=', $request->get('usuario'))->get('clube_id');
            $clubes = Clube::whereIn('id', array_column($relations, 'clube_id'))->orderBy('id', 'asc')->get();
        }else{
            $clubes = Clube::all();
        }
        for($c = 0; $c < count($clubes); $c++){
            $qtdUsuarios = Usuario_Clube__relation::where('clube_id', '=', $clubes[$c]['id'])->count();
            $clubes[$c]['count'] = $qtdUsuarios;
        }
        return view('clubes.list', [
            "clubes" => json_encode($clubes),
            "uri" => Route::getCurrentRoute()->uri
        ]);
    }

    public function listExceptions(int $usuario_id)
    {
        $relations = Usuario_Clube__relation::where('usuario_id', '=', $usuario_id)->get('clube_id')->toArray();
        return Clube::whereNotIn('id', array_column($relations, 'clube_id'))->orderBy('id', 'asc')->get()->toJson();
    }

    public function createForm(): View
    {
        return view('clubes.create', [
            "uri" => Route::getCurrentRoute()->uri
        ]);
    }

    public function create(Request $request)
    {
        return Clube::create($request->post());
    }

    public function show(int $id)
    {
        $clube = Clube::find($id)->toJson();

        return response()->json($clube);
    }

    public function editForm(int $id): View
    {
        $clube = Clube::find($id)->toJson();

        return view('clubes.edit', [
            "clube" => $clube,
            "uri" => Route::getCurrentRoute()->uri
        ]);
    }

    public function edit(Request $request, int $id)
    {
        $clube = Clube::find($id);
        try{
            $clube->fill($request->post());
            return $clube->save();
        }catch(\Exception $e){
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try{
            // soft delete clube
            Clube::find($id)->delete();

            // soft delete all relationships
            return Usuario_Clube__relation::where('clube_id','=', $id)->update(['valid'=>false]);
        } catch(\Exception $e){
            return false;
        }
    }
}
