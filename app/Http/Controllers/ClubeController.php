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
        return view('usuarios.list', ["clubes" => [
            "0" => ["name" => "Clube 1"],
            "1" => ["name" => "Clube 2"],
            "2" => ["name" => "Clube 3"],
            ]
        ]);
    }

    public function createForm(): View
    {
        return view('usuarios.create');
    }

    public function create()
    {
    }

    public function editForm(int $id): View
    {
        return view('usuarios.edit', ["clube" => ["name" => "Clube #".$id]]);
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
