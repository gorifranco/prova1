

<head>
  <link rel="icon" href="favicon1.JFIF">
  </head>
<body>
    <center><div style="width: 800">
    <canvas id="salesShopCompare" width="100%" height="100%"></canvas>
    </div></center>
    <br>
    <center><div style="width: 800">
        <canvas id="categoriescompare" width="100%" height="100%"></canvas>
        </div></center>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('salesShopCompare').getContext('2d');
const salesShopCompare = new Chart(ctx, {
    type: 'bar',
    data: data = {
  labels: [
    'tienda 1',
    'tienda 2',
  ],
  datasets: [{
    label: 'comparativa entre ventas por tienda',
    data: <?php echo json_encode($data);?>,
    backgroundColor: [
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
}
});
</script>

<script>
    const ctx2 = document.getElementById('categoriescompare').getContext('2d');
    const categoriescompare = new Chart(ctx2, {
        type: 'bar',
        data: data = {
      labels: <?php echo json_encode($labelsg2);?>,
      datasets: [{
        label: 'ventas por categoria de pelicula',
        data: <?php echo json_encode($data2);?>,
        backgroundColor: [
          'rgb(240,128,128)'
        ],
        hoverOffset: 4
      }]
    }
    });
     </script>
    
</body>
