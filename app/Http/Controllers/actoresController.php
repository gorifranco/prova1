<?php

namespace App\Http\Controllers;


use App\Models\Actor;
use Illuminate\Http\Request;

class actoresController extends Controller
{
    public function index()
    {
        $actores=Actor::all();
        return view('actoresVistas.index') ->with('actores',$actores);

    }

    
}