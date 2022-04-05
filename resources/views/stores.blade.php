
<head>
    <link rel="icon" href="favicon1.JFIF">
    </head>
    <body class="antialiased">
      Tiendas:   
      <br>
        @foreach ($stores as $store)
         {{$store->store_id}}  <a href="/storedetails/{{$store->store_id}}"> {{$store->address_id}}</a>
            <br>
        @endforeach

        <br>
    <a href="/comparatiendas"> Comparar entre tiendas: </a>
  
    </body>
</html>
