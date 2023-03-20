<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

use App\Models\Usuario;
use App\Models\Clube;

class HomeController extends Controller
{
    public function home(): View
    {
        $usuarios = Usuario::all()->toArray();
        $clubes = Clube::all()->toArray();

        return view('home', [
            "usuarios" => $usuarios,
            "clubes" => $clubes
        ]);
    }
}
