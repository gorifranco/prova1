<?php

namespace App\Http\Controllers;


use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\FilmActor;
use App\Models\Actor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class peliculasController extends Controller
{
    public function index()
    {
        $peliculas=Film::all();
        return view('actoresVistas.peliculas') ->with('peliculas', $peliculas);
    }

    public function peliculasactor($actor_id)
    {
        $sql = "select film.title
        FROM film
        INNER JOIN film_actor ON film.film_id=film_actor.film_id 
        INNER JOIN actor ON film_actor.actor_id=actor.actor_id
        WHERE actor.actor_id= '".$actor_id."';";

        $peliculas = DB::select($sql);
        $actor = Actor::find($actor_id);


        return view('actoresVistas.peliculasactor')
        ->with('actor', $actor)
        ->with('peliculas', $peliculas);
    }
    public function getpeliculas(Request $request, $actor_id){
        $newactor = $request;
        peliculasactor($newactor);

    }

    public function filmdetails($film_id){
        $sql = "select actor.first_name, actor.last_name
        FROM film
        INNER JOIN film_actor ON film.film_id=film_actor.film_id 
        INNER JOIN actor ON film_actor.actor_id=actor.actor_id
        WHERE film.film_id= '".$film_id."';";

        $languagesql = "select lang.name FROM film
        INNER JOIN lang ON lang.language_id=film.language_id
        WHERE film.film_id= '".$film_id."';";

        $categorysql = "select category.name
        FROM film_category
        INNER JOIN category ON category.category_id=film_category.category_id
        WHERE film_category.film_id= '".$film_id."';";

        $instoresql = "select address.address
        FROM film
        INNER JOIN inventory ON film.film_id=inventory.film_id 
        INNER JOIN store ON inventory.store_id=store.store_id
        INNER JOIN address ON store.address_id=address.address_id
        WHERE film.film_id= '".$film_id."';";

        $newarray;
$instore = DB::select($instoresql);
for ($x = 0; $x < count($instore);$x++){
$newarray[$x]=$instore[$x]->address;
    }
    $inventory = array_count_values($newarray);

    $lbls=DB::select("select address FROM goridb.address
    where address_id = 1 or address_id = 2;");

    $lblsdef=array();
    for($i=0;$i<count($lbls);$i++){
        if($lbls[$i]!=null){
            array_push($lblsdef, $lbls[$i]->address);
        }
    }


     
         $film = Film::find($film_id);

        $actors = DB::select($sql); 

        $language = DB::select($languagesql);

        $category = DB::select($categorysql);

        if($language == null){
            $language = "Idioma original desconocido";
    }

        return view('actoresVistas.filmdetailsview')
        ->with('film' ,$film)
        ->with('actors', $actors)
        ->with('language', $language)
        ->with('category', $category)
        ->with('inventory', $inventory)
        ->with('shops', $lblsdef);
    }

}