<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Clube;
use App\Models\Usuario_Clube__relation;

class ClubeController extends Controller
{
    public function list(Request $request): View
    {
        if($request->get('usuario')) {
            $relations = Usuario_Clube__relation::where('usuario_id', '=', $request->get('usuario'))
                                                ->get('clube_id')
                                                ->toArray();
            $clubes = Clube::whereIn('id', array_column($relations, 'clube_id'))->get()->toArray();
        }else{
            $clubes = Clube::all()->toArray();
        }

        // ->toJson()
        return view('clubes.list', [
            "clubes" => $clubes
        ]);
    }

    public function createForm(): View
    {
        return view('clubes.create');
    }

    public function create(Request $request)
    {
        return Clube::create($request->post());
    }

    public function editForm(int $id): View
    {
        $clube = Clube::find($id)->toArray();

        // ->toJson()
        return view('clubes.edit', [
            "clube" => $clube
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
            Usuario_Clube__relation::where('clube_id','=', $id)->delete();
        } catch(\Exception $e){
            return false;
        }
    }
}
