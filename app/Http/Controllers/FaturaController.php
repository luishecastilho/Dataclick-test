<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaturaController extends Controller
{
    /**
     * filtro por usuario padrão
     * pode ter faturas de varios clubes pro mesmo usuario
     */
    public function list()
    {
    }

    /**
     * cria 12 faturas para os proximos 12 meses
     */
    public function createNewSingaturePlan()
    {
    }

    /**
     * atualiza status de pagamento
     */
    public function newPayment(int $id)
    {
    }
}
