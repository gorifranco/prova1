
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="favicon2.JFIF">
        <title>Laravel</title>

    </head>
    <body class="antialiased">
      Actores:   
      <br>
        @foreach ($actores as $actor)
        <a href="/peliculasactor/{{$actor->actor_id}}"> 
            {{$actor->first_name}} {{$actor->last_name}}</a>
            <br>
        @endforeach

  
    </body>
</html>
