<html>
<head>
    <link rel="icon" href="favicon3.JFIF">
    </head>
    <body class="antialiased">
      Peliculas de {{$actor->first_name}} {{$actor->last_name}}:  
      <br><br>


@for ($x = 0; $x < count($peliculas); $x++)
    {{$peliculas[$x]->title}}
    <br>

@endfor
           
  
    </body>
</html>