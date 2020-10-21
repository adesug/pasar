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
  <title><?= $this->uri->segment(2); ?></title>
  <style>
    .konten {
      /* margin-top: 80px;
      margin-left: 20px;
      margin-right: 0; */
      margin: 80px 20px 0px 30px;
    }

    a{
      text-decoration: none !important;
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
            <li></li>
            <li class="nav-item <?php if ($this->uri->segment(1) == "order" || $this->uri->segment(1) == "core") {
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


  <div class="konten">
    <div class="row">
      <div class="col-sm-3">
        <?php if ($this->uri->segment(1) == "item") {
          $menu = $this->db->query("SELECT * FROM menu where parent IS NULL")->result();
          $item = $this->db->query("SELECT category,count(*) as hasil FROM pasar.item group by category")->result();
          foreach ($item as $val) {
            $countItem[$val->category] = $val->hasil;
          } ?>
          <!-- <div class="row mt-5 no-gutters"> -->
            <!-- List Item -->
          <div class=" bg-light">
            <ul class="list-group ">
              <a href="<?= base_url(); ?>item/item">
                <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(1) == "item" && $this->uri->segment(2) == "item" && $this->uri->segment(3) == "") {
                                                                              echo "active";
                                                                            } ?>"><i class="fas fa-list"></i> All Item</li>
              </a>
              <a href="<?= base_url(); ?>item/itemwaitgambar">
                <li class="list-group-item text-body <?php if ($this->uri->segment(1) == "item" && $this->uri->segment(2) == "itemwaitgambar" && $this->uri->segment(3) == "") {
                                                        echo "active";
                                                      } ?>"><i class="fas fa-angle-right"></i> All Item (Belum Ada Gambar)</li>
              </a>
              <a href="<?= base_url(); ?>item/add">
                <li class="list-group-item text-body <?php if ($this->uri->segment(1) == "item" && $this->uri->segment(2) == "add") {
                                                        echo "active";
                                                      } ?>"><i class="fas fa-angle-right"></i> Add Item </li>
              </a>
              <?php foreach ($menu as $valmenu) { ?>
                <a href="<?= base_url(); ?>item/item/<?= $valmenu->code ?>">
                  <li style="color: white;" class="list-group-item list-group-item-success bg-primary  <?php if ($this->uri->segment(2) == "item" && $this->uri->segment(3) == $valmenu->code) {
                                                                                                          echo "active";
                                                                                                        } ?>"><i class="fas fa-list"></i> Item(<?= $valmenu->name ?>)
                    (<?= $valmenu->code ?>) <span class="label label-danger pull-right"><?= isset($countItem[$valmenu->code]) ? $countItem[$valmenu->code] : "0"; ?>
                  </li>
                </a>
                <?php
                $submenus = $this->db->query("SELECT * FROM menu where parent='$valmenu->code'")->result();
                foreach ($submenus as $submenu) {
                ?>
                  <a href="<?= base_url(); ?>item/item/<?= $submenu->code ?>">
                    <li class="list-group-item text-body <?php if ($this->uri->segment(2) == "item" && $this->uri->segment(3) == $submenu->code) {
                                                            echo "active";
                                                          } ?>">
                      <i class="glyphicon glyphicon-chevron-right "></i> Item
                      (<?= $submenu->name ?>) (<?= $submenu->code ?>)<span class="label label-danger pull-right"><?= isset($countItem[$submenu->code]) ? $countItem[$submenu->code] : "0"; ?>
                    </li>
                  </a>
                <?php } ?>

                <?php } ?>
          <a href="<?=base_url();?>item/exim"><li class="list-group-item bg-primary <?php if($this->uri->segment(1)=="item"&&$this->uri->segment(2)=="exim"){echo "active";}?>"><i class="fas fa-list"></i> Download Upload Harga</li></a>

          </ul>
          </div>
        <?php } ?>
        <?php if ($this->uri->segment(1) == "order") { ?>
          <!-- List Order -->
          <ul class="list-group ">
            <a href="<?= base_url(); ?>order/chart">
              <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(2) == "chart") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> Chart</li>
            </a>
            <a href="<?= base_url(); ?>order/orderwaiting">
              <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(2) == "orderwaiting") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> Order [WAITING CONFIRM] <span class="label label-danger pull-right"><?= $countTrx["Waiting Order Confirmation"]; ?></span></li>
            </a>
            <a href="<?= base_url(); ?>order/orderprocessed">
              <li style="color: white;" class="list-group-item  bg-primary <?php if ($this->uri->segment(2) == "orderprocessed") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> Order [PROCESSED]</li>
            </a>
            <a href="<?= base_url(); ?>order/orderreadytoship">
              <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(2) == "orderreadytoship") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> Order [READY TO SHIP] <span class="label label-danger pull-right"><?= $countTrx["READY TO SHIP"]; ?></span></li>
            </a>
            <a href="<?= base_url(); ?>order/ordershipped">
              <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(2) == "ordershipped") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> Order [SHIPPED]</li>
            </a>
            <a href="<?= base_url(); ?>order/ordercompleted">
              <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(2) == "ordercompleted") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> Order [COMPLETE]</li>
            </a>
            <a href="<?= base_url(); ?>order/ordercanceled">
              <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(2) == "ordercanceled") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> Order [CANCELED]</li>
            </a>
            <a href="<?= base_url(); ?>order/order">
              <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(2) == "order") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> Order [ALL]</li>
            </a>
            <a href="<?= base_url(); ?>order/download">
              <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(1) == "order" && $this->uri->segment(2) == "download") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> Download Data</li>
            </a>
            <a href="<?= base_url(); ?>core/send_notification_all">
              <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(2) == "send_notification_all") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> Kirim Notifikasi</li>
            </a>
          </ul>
        <?php } ?>
        <?php if ($this->uri->segment(1) == "asset" || $this->uri->segment(1) == "core") { ?>
          <!-- List Setting -->
          <ul class="list-group">
            <a href="<?= base_url(); ?>core/send_notification_all">
              <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(2) == "send_notification_all") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> Kirim Notifikasi</li>
            </a>
            <a href="<?= base_url(); ?>asset">
              <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(1) == "asset") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> Asset</li>
            </a>
          </ul>
        <?php } ?>
        <?php if ($this->uri->segment(1) == "user") { ?>
          <!-- List User -->
          <ul class="list-group">
            <a href="<?= base_url(); ?>user/user">
              <li style="color: white;" class="list-group-item bg-primary <?php if ($this->uri->segment(2) == "user") {
                                                                          echo "active";
                                                                        } ?>"><i class="fas fa-list"></i> User</li>
            </a>
          </ul>
        <?php } ?>
      </div>
      <div class="col-sm-9">