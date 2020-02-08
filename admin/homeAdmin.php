<?php include('header.php');
include('dbcon.php');
include('session.php');
?>

<body>
  <?php include('navbarAdmin.php'); ?>
  <div id="masthead">
    <div class="container">
      <center>
        <h2> Welcome, <?php echo $username ?> !</h2>
      </center>
      <center>
        <h3> Choose preferred option for updating content! </h3>
      </center>
      <img src="images/adminImage.png" style="width:250px;height:250px"></a>
    </div><!-- /cont -->
    <?php
    
    $url = 'http://localhost/projekat/film.json';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_HTTPGET, true);

    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat = json_decode($curl_odgovor);
    ?>
    <div class="datagrid">
      <table id="listaFilmova">
        <thead>
          <tr>
            <th>Izmena</th>
            <th>Naziv filma</th>
            <th>Trajanje</th>
            <th>Cena(RSD)</th>
            <th>Režiser</th>
            <th>Brisanje</th>
          </tr>
        </thead>
        <tbody id="ajaxPodaci">
          <?php
          foreach ($json_objekat->film as $film) {
            echo "<tr>
              <td><a href='updateFilm.php?filmID=" . $film->FilmID . "'><button class='btn btn-info'>Izmeni</button></a></td>
              <td>$film->NazivFilma</td>
              <td>$film->Trajanje</td>
              <td>$film->Cena</td>
              <td>$film->Ime $film->Prezime</td>

              <td><a href='delete.php?filmID=" . $film->FilmID . "'><button class='btn btn-danger'>Obriši</button></a></td>
          </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

  </div>
  <style>
    .datagrid {
      background: #fff;
      overflow: visible;
      max-height: 350px;
      overflow-y: scroll;
    }

    .datagrid table {
      width: 100%;
      border-collapse: separate;
      text-align: center;
    }

    .datagrid table td,
    .datagrid table th {
      padding: 10px;
    }

    .datagrid table thead th {
      background: #595959;
      color: #ffffff;
      ;
      font-size: 15px;
      font-weight: bold;
      text-align: center;
      border-right: 1px solid #bfbfbf;
      border-bottom: 1px solid #bfbfbf;
    }

    .datagrid table tbody td {
      color: #404040;
      border-right: 1px solid #bfbfbf;
      border-bottom: 1px solid #bfbfbf;
      font-size: 12px;
    }
  </style>
</body>