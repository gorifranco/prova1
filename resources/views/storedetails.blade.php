<head>
    <link rel="icon" href="favicon3.JFIF">
    </head>
    <body class="antialiased">
      Detalles de la tienda:   
      <br><br>
        Ubicacion de la tienda:<br>
        Pais: {{$ubicacion[0]->country}}<br>
        Ciudad: {{$ubicacion[0]->city}}<br>
        Distrito: {{$ubicacion[0]->district}}<br>
        Dirección: {{$ubicacion[0]->address}}<br><br>

        Manager: {{$ubicacion[0]->first_name}} {{$ubicacion[0]->last_name}}<br><br>

    </body>
</html>
