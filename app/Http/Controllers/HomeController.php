<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
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
            "usuarios" => count($usuarios),
            "clubes" => count($clubes),
            "uri" => Route::getCurrentRoute()->uri
        ]);
    }
}
