<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ClubeController extends Controller
{
    /**
     * lista todos os clubes
     * possibilidade de filtrar por usuario
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
     * deleta a relação com usuarios
     */
    public function delete(int $id)
    {
    }
}
