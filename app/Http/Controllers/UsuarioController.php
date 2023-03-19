<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UsuarioController extends Controller
{
    /**
     * lista todos os usuarios
     * possibilidade de filtrar por clube
     */
    public function list(): View
    {
        return view();
    }

    public function createForm(): View
    {
        return view();
    }

    public function create()
    {
    }

    public function editForm(int $id): View
    {
        return view();

    }

    public function edit(int $id)
    {
    }

    /**
     * soft delete
     * deleta a relação com clubes
     */
    public function delete(int $id)
    {
    }

    /**
     * vincula usuario com clube
     * cria uma fatura fictícia por mês para os proximos 12 meses, representando a assinatura
     * as faturas devem possuir um campo pra representar o status de pagamento
     * ter data de vencimento, e sera considerada vencida se nao for paga ate a data
     */
    public function joinClube(int $user_id, int $clube_id)
    {
    }

    /**
     * informações básicas do usuario
     * faturas já geradas em cada clube q ta associado e seus status de pagamento
     * deve ter um Fazer pagamento pra cada fatura, apenas alterando o status da fatura no sistema
     */
    public function details(int $id)
    {
    }
}
