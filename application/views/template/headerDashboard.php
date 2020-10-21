<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <!-- Switchery -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
  <title><?= $title; ?></title>
  <style>
    .konten {
      /* margin-top: 80px;
      margin-left: 20px;
      margin-right: 0; */
      margin: 80px 20px 0px 30px;
    }
.shortcut{
  margin-top: 80px;
}
    a {
      text-decoration: none;
    }
  </style>
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

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-fixed-top">
    <div class="container">
      <img src="<?php echo base_url(); ?>/assets/logopasar.png">
      <a class="navbar-brand" href="<?= base_url('/'); ?>"> Pasar-in</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav float-right">
          <ul class="navbar-nav">
            <li class="nav-item<?php if ($this->uri->segment(1) == "order" || $this->uri->segment(1) == "core") {
                                  echo 'active';
                                }; ?>">
              <a class="nav-link" href="<?= base_url(); ?>order/orderwaiting">ORDER <span class="label label-danger"><?= $countTrx["Waiting Order Confirmation"] + $countTrx["READY TO SHIP"]; ?></span></a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment(1) == "item") {
                                  echo 'active';
                                }; ?>">
              <a class="nav-link" href="<?= base_url(); ?>item/item">ITEM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($this->uri->segment(1) == "user") {
                                    echo 'active';
                                  }; ?>" href="<?= base_url(); ?>user/user">USER</a></li>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($this->uri->segment(1) == "core" || $this->uri->segment(1) == "asset") {
                                    echo 'active';
                                  }; ?>" href="<?= base_url(); ?>core/send_notification_all">SETTING</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://seller.tokopedia.com/seller_myshop_order" target="_blank">Tokopedia
                Seller</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://seller.bukalapak.com/" target="_blank">Bukalapak Seller</a></li>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>