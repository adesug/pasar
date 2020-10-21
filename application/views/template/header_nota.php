<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <title><?= $this->uri->segment(2); ?></title>
</head>

<body>

  <?php
  $trx = $this->db->query("SELECT trxStatus,count(*) as hasil FROM pasar.allOrder group by trxStatus")->result();

  $countTrx["Waiting Order Confirmation"] = 0;
  $countTrx["READY TO SHIP"] = 0;
  foreach ($trx as $val) {
    $countTrx[$val->trxStatus] = $val->hasil;
  }
  ?>


  <div class="container">

    <br>
    <div class="row">

      <div class="col-sm-12">