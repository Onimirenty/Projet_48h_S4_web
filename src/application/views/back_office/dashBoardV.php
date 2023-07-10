<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord</title>
  <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/DashBoard.css') ?> ">
  <script src="<?php echo site_url('assets/js/chart.js') ?>"></script>
  <script src="<?php echo site_url('assets/js/DashBoard.js') ?>"></script>
</head>

<body>
  <header>
    <h1>Tableau de bord des ventes de gâteaux</h1>
  </header>
  
  <nav>
    <ul>
      <li><a href="#ventes">Ventes</a></li>
      <li><a href="#gateaux">Types de gâteaux</a></li>
    </ul>
  </nav>
  
  <main>
    <section id="ventes">
      <h2>Suivi des ventes</h2>
      <canvas id="ventes-chart"></canvas>
    </section>
    
    <section id="gateaux">
      <h2>Types de gâteaux les plus vendus</h2>
      <canvas id="gateaux-chart"></canvas>
    </section>
  </main>
  
  <script src="script.js"></script>
  <script>
    // Code pour le diagramme en bâtons
    var ventesChart = new Chart(document.getElementById('ventes-chart'), {
      type: 'bar',
      data: {
        labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai'],
        datasets: [{
          label: 'Ventes mensuelles',
          data: [120, 150, 200, 180, 220],
          backgroundColor: 'rgba(75, 192, 192, 0.6)'
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    
    // Code pour le graphique x-y
    var gateauxChart = new Chart(document.getElementById('gateaux-chart'), {
      type: 'line',
      data: {
        labels: ['2015', '2016', '2017', '2018', '2019', '2020', '2021'],
        datasets: [{
          label: 'Ventes de gâteaux',
          data: [500, 800, 600, 900, 750, 1000, 850],
          borderColor: 'rgba(255, 99, 132, 1)',
          fill: false
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>

</html>
