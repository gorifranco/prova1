<?php

namespace App\Http\Controllers;


use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shopsController extends Controller
{
    public function index()
    {
$stores = Store::all(); 
 
return view('stores')->with('stores', $stores);
}

public function shopinfo($store_id)
{
$ubicacionsql = "select address.address, city.city, country.country, address.district, staff.first_name, staff.last_name
FROM store
INNER JOIN address ON store.address_id=address.address_id
INNER JOIN city ON city.city_id=address.city_id
INNER JOIN country ON country.country_id=city.country_id
INNER JOIN staff ON staff.staff_id=store.manager_staff_id 
WHERE store.store_id= '".$store_id."';";

$ubicacion = DB::select($ubicacionsql);
//dd($ubicacion);

$pelissql = "select film.title
        FROM store
        INNER JOIN inventory ON store.store_id=inventory.store_id 
        INNER JOIN film ON film.film_id=inventory.film_id 
        WHERE store.store_id= '".$store_id."';";

        $pelis=DB::select($pelissql);
        $newarray=null;
        for ($x = 0; $x < count($pelis);$x++){
            $newarray[$x]=$pelis[$x]->title;
                }

$pelis = array_unique($newarray);        


return view('/storedetails')->with('ubicacion', $ubicacion);
}



public function compare(){

    //tienda 1
    $ventast1sql = "select amount FROM goridb.payment
    WHERE staff_id=1;";
    $ventast1 = DB::select($ventast1sql);
    $newarray;
    for ($x = 0; $x < count($ventast1);$x++){
        $newarray[$x]=$ventast1[$x]->amount;
            }
    $ventast1 = intval(array_sum($newarray));

    //tienda 2
    $ventast2sql = "select amount FROM goridb.payment
    WHERE staff_id=2;";
    $ventast2 = DB::select($ventast2sql);
    $newarray2;
    for ($x = 0; $x < count($ventast2);$x++){
        $newarray2[$x]=$ventast2[$x]->amount;
            }
    $ventast2 = intval(array_sum($newarray2));
$data[0]= $ventast1;
$data[1]=$ventast2;

// Grafic 2--------------------------------------

    $categorysql = "select category.name FROM category
    INNER JOIN film_category ON category.category_id=film_category.category_id
    INNER JOIN film ON film_category.film_id=film.film_id
    INNER JOIN inventory ON film.film_id=inventory.film_id
    INNER JOIN rental ON inventory.inventory_id=rental.inventory_id order by name ASC";

    $category = DB::select($categorysql);
     $newarray=null;
    for ($x = 0; $x < count($category);$x++){
        $newarray[$x]=$category[$x]->name;
            }
   $count=1;
   $arrayval=0;
   $data2 = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$catact=$newarray[0];  

    for ($x = 0; $x < count($category)-1;$x++){
if($newarray[$x]==$newarray[$x+1]){
$data2[$arrayval]++;
}else{
    $arrayval++;
    $data2[$arrayval]++;
}
    }
  $labelsg2;
  $categorylabelsql ="select name from category;";
  $categorylabel = DB::select($categorylabelsql);
  for ($x = 0; $x < count($categorylabel);$x++){
    $labelsg2[$x]=$categorylabel[$x]->name;
        }


    return view('comparatiendas')
    ->with('data', $data)
    ->with('data2', $data2)
    ->with('labelsg2', $labelsg2);
}



}