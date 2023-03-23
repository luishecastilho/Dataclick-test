<?php

namespace App\Http\Controllers;

use App\Models\Fatura;
use App\Models\Usuario_Clube__relation;

class FaturaController extends Controller
{
    public function newPayment(int $id)
    {
        $fatura = Fatura::find($id);
        try{
            $fatura->paid = true;
            return $fatura->save();
        }catch(\Exception $e){
            return false;
        }
    }

    public static function list(int $usuario_id, int $clube_id = 0)
    {
        if($clube_id) {
            $relations = Usuario_Clube__relation::where('usuario_id', '=', $usuario_id)
                        ->where('clube_id', '=', $clube_id)
                        ->get('id')
                        ->toArray();
        }else{
            $relations = Usuario_Clube__relation::where('usuario_id', '=', $usuario_id)
                        ->get('id')
                        ->toArray();
        }
        $faturas = Fatura::whereIn('relation_id', array_column($relations, 'id'))->get()->toJson();

        return $faturas;
    }

    public static function createNewSingaturePlan(int $relation_id): bool
    {
        try{
            for($m = 1; $m <= 12; $m++)
            {
                Fatura::create([
                    'relation_id' => $relation_id,
                    'expiry_date' => date('Y-m-d', strtotime(' + '.$m.' months')),
                    'amount' => 129.99
                ]);
            }

            return true;
        }catch(\Exception $e) {
            return false;
        }
    }

    public function statusPayment($usuario_id, $clube_id): bool
    {
        $faturas = json_decode($this::list($usuario_id, $clube_id), true);

        foreach($faturas as $fatura)
        {
            if(!$fatura["paid"] && strtotime("now") > strtotime($fatura['expiry_date']))
            {
                return false;
            }
        }
        return true;
    }
}
