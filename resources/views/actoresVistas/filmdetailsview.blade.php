
<head>
    <link rel="icon" href="favicon1.JFIF">
    </head>
    <body class="antialiased">
      Pelicula:     {{$film->title}}
      <br>Descripción:  {{$film->description}}
      <br>Duracion:  {{$film->length}}
      <br>Nota: {{$film->rating}}
      <br>Idioma original: {{$language[0]->name}}
      <br>Categoria: {{$category[0]->name}}
      <br> Actores:  
      @for ($x = 0; $x < count($actors); $x++)
      <br>
    {{$actors[$x]->first_name}}
    {{$actors[$x]->last_name}}  
@endfor

<br><br>Disponible en tienda: 
@for ($x = 0; $x<count($shops);$x++)
<br>Shop: {{$shops[$x]}}: Unidades disponibles en esta tienda: {{$inventory[$shops[$x]]}} 
@endfor
    </body>
</html>
