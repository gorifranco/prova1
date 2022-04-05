<head>
    <link rel="icon" href="favicon3.JFIF">
    </head>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
      Peliculas:   
      <br>
        @foreach ($peliculas as $pelicula)
           <a href="/filmdetailsview/{{$pelicula->film_id}}"> {{$pelicula->title}}</a>
            <br>
        @endforeach
  
    </body>
</html>
