<?php

namespace App\Http\Controllers;


use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class graficoController extends Controller
{
    public function getdata()
    {
        $sql = "select count(*) as num, month(rental.rental_date) as mes from rental
        where month(rental.rental_date) between month('2005/01/01') and month('2005/8/30')
        group by month(rental.rental_date) order by mes ASC;";
        $consultas = DB::select($sql);
        $meses = [count($consultas)];
        $i=0;
            foreach ($consultas as $consulta) {
                while ($i < (($consulta->mes)-1)) {
                    array_push($meses, 0);
                    $i++;
                }
                array_push($meses, $consulta->num);
                $i++;
            }
            return view('actoresVistas.grafico')->with('meses', $meses);
}
}