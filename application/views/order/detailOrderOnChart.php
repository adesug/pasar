<center>
    <h1>ORDER DETAIL</h1>
</center>

<a class="btn btn-primary btn-s float-right mb-3 ml-2" target="_blank" href="<?= base_url(); ?>order/orderCetak2onchart/<?= $arrTrx->id ?>">
    <i class="fa fa-sticky-note" aria-hidden="true"></i> VIEW NOTA
</a>
<a class="btn btn-primary btn-s float-right mb-3" target="_blank" href="<?= base_url(); ?>order/orderCetakonchart/<?= $arrTrx->id ?>">
    <i class="fa fa-print" aria-hidden="true"></i> PRINT
</a>

<table class="table table-striped table-bordered">
    <tr>
        <td colspan="3" class="text-center bg-dark" style="color: white;"><b>Detail Trx</b></td>
    </tr>
    <tr>
        <td>Kolom</td>
        <td>Value</td>
    </tr>

    <?php
    if ($CountingArrTrx > 0) {
        foreach ($arrTrx as $key => $values) { ?>
            <tr>
                <td><?= $key; ?></td>
                <td><?= $values; ?></td>
            </tr>
        <?php }
    } else { ?>
        <tr>
            <td colspan="2">Not available</td>
        </tr>
    <?php } ?>
</table>




<table id="example" class="table table-striped table-bordered" style="width:100%">
    <tr>
        <th colspan="8" class="text-center bg-dark" style="color: white;"><b>Detail Item</b></th>
    </tr>
    <tr>
        <th class="text-center">id Chart</th>
        <th class="text-center">item</th>
        <th class="text-center">Category</th>
        <th class="text-center">Price</th>
        <th class="text-center">Unit</th>
        <th class="text-center">Qty</th>
        <th class="text-center">Price Total</th>
        <th class="text-center">Add On</th>
    </tr>
    <?php
    $barang = "";
    $totalAllPrice = 0;
    foreach ($arrChart as $chart) {
        $barang = $barang . "," . $chart->name;
        $isRev = false;
        if ($chart->revPrice != '' & $chart->revPrice != null && isset($chart->revPrice)) {
            $totalAllPrice = $totalAllPrice - ($chart->price * $chart->qty);
            $totalAllPrice = $totalAllPrice + ($chart->revPriceTotal);
            $isRev = true;
        } else {
            $totalAllPrice = $totalAllPrice + ($chart->price * $chart->qty);
        }

    ?>
        <?php if ($isRev) { ?>
            <tr style="text-decoration: line-through;">
                <td><a href="<?= base_url(); ?>order/order_chart/<?= $chart->id; ?>" target="_blank"><?= $chart->id; ?></a></td>
                <td><a href="<?= base_url(); ?>item/detail/<?= $chart->item; ?>"><?= $chart->name; ?></a></td>

                <td><?= $chart->category; ?></td>
                <td>Rp.<?=number_format($chart->price,0,',','.') ?>,- </td>
                <td><?= $chart->total; ?> <?= $chart->unit; ?></td>
                <td><?= $chart->qty; ?></td>
                <td>Rp.<?=number_format($chart->priceTotal,0,',','.')?>,-</td>
                <td><?= $chart->createOn; ?></td>
            </tr>
            <tr>
                <td><a href="<?= base_url(); ?>order/order_chart/<?= $chart->id; ?>" target="_blank"><?= $chart->id; ?>(revisi)</a></td>
                <td><a href="<?= base_url(); ?>item/detail/<?= $chart->item; ?>"><?= $chart->name; ?></a></td>

                <td><?= $chart->category; ?></td>
                <td>Rp.<?=number_format($chart->revPrice,0,',','.')?>,-</td>
                <td><?= $chart->revTotal; ?> <?= $chart->revUnit; ?></td>
                <td><?= $chart->revQty; ?></td>
                <td>Rp.<?=number_format($chart->revPriceTotal,0,',','.')?>,-</td>
                <td><?= $chart->createOn; ?></td>
            </tr>
        <?php } else { ?>
            <tr>
                <td><a href="<?= base_url(); ?>order/order_chart/<?= $chart->id; ?>"><?= $chart->id; ?></a></td>
                <td><a href="<?= base_url(); ?>item/detail/<?= $chart->item; ?>"><?= $chart->name; ?></a></td>

                <td><?= $chart->category; ?></td>
                <td> Rp.<?=number_format($chart->price,0,',','.') ?>,-</td>
                <td><?= $chart->total; ?> <?= $chart->unit; ?></td>
                <td><?= $chart->qty; ?></td>
                <td> Rp.<?=number_format($chart->priceTotal,0,',','.') ?>,-</td>
                <td><?= $chart->createOn; ?></td>
            </tr>
        <?php } ?>
    <?php } ?>
    <tr><th colspan="7">Total</th><td><b class="bg-warning">Rp <?=number_format($totalAllPrice, 0, ',', '.') ?> ,-</b></td></tr>
</table>

<table class="table">
    <tr>
        <td colspan="3">
            <h3 class="text-center">Update Status</h3>
        </td>
    </tr>
    <tr>
        <td>
            <center>
                <?php $mobPhone = preg_replace('/^0?/', '62', $arrUser->mobile); ?>
                <a class="btn btn-primary btn-sm mt-3" style="width: 85px;" target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?= $arrUser->lat; ?>,<?= $arrUser->long; ?>"><i class="fas fa-map-marker-alt"></i> Lihat Peta</a>
                <a class="btn btn-primary btn-sm mt-3" style="width: 170px;" target="_blank" href="https://api.whatsapp.com/send?phone=<?= $mobPhone; ?>&text=Halo%20%20*kak%20<?= urlencode($arrUser->name) ?>%2C*%0A%0A*Yuk%20kak%20kita%20selesaikan%20pembelian%2C*%0AKakak%20meninggalkan%20<?= urlencode($barang) ?>%20di%20keranjang.%0A%0A*Apakah%20ada%20permasalahan*%20dalam%20pembelian%3F%20Kami%20akan%20*sangat%20senang*%20bisa%20membantu%20kakak%20*menyelesaikan%20pembelian*%20%3A)%0A%0A_Santi%2C_"><i class="fab fa-whatsapp"></i> WA-TANYA-CHART</a>
                <a href="<?= base_url(); ?>core/markAsProcessed/<?= $arrTrx->id ?>" class="btn btn-primary btn-sm mt-3" style="width: 170px;"><i class="fas fa-box"></i> MARK AS PROCESSED</a>
                <a href="<?= base_url(); ?>core/markAsReadyToShip/<?= $arrTrx->id ?>" class="btn btn-primary btn-sm mt-3" style="width: 185px;"><i class="fas fa-truck"></i> MARK AS READY TO SHIP</a>
                
            </center>
        </td>
    </tr>
    <tr>
        <td>
            <center>
                <a href="<?= base_url(); ?>core/markAsShipped/<?= $arrTrx->id ?>" class="btn btn-primary btn-sm mt-3"><i class="fas fa-hands-helping"></i>MARK AS SHIPPED</a>
                <a href="<?= base_url(); ?>core/markAsComplete/<?= $arrTrx->id ?>" class="btn btn-success btn-sm mt-3"><i class="fas fa-check-square"></i> MARK AS COMPLETE</a>
                <a href="<?= base_url(); ?>core/markAsCancel/<?= $arrTrx->id ?>" class="btn btn-danger btn-sm mt-3"><i class="fas fa-window-close"></i> MARK AS CANCEL</a>
            </center>
        </td>
    </tr>
</table>

<table class="table table-striped table-bordered">
    <tr>
        <td colspan="3" class="text-center bg-dark" style="color: white;"><b>Detail Payment</b></td>
    </tr>
    <tr>
        <th class="text-center">Kolom</th>
        <th class="text-center">Value</th>
    </tr>

    <?php
    if ($CountingarrPayment > 0) {
        foreach ($arrPayment as $key => $values) { ?>
            <tr>
                <th><?= $key; ?></th>
                <td><?= $values; ?></td>
            </tr>
        <?php }
    } else { ?>
        <tr>
            <td colspan="2">Not available</td>
        </tr>
    <?php } ?>
</table>

<hr>

<h2> Pengiriman </h2>
<h4>
    Kode kirim : <?= $arrShip["kodeKirim"]; ?><br>
    Biaya kirim : Rp.<?=number_format($arrShip["biayaKirim"],0,',','.') ?>-,
</h4>

<hr>
<table class="table table-striped table-bordered">
    <tr>
        <td colspan="3" class="text-center bg-dark" style="color: white;"><b>Detail User</b></td>
    </tr>
    <tr>
        <th class="text-center">Kolom</th>
        <th class="text-center">Value</th>
    </tr>
    <?php

    if ($CountingarrUser > 0) {
        foreach ($arrUser as $key => $values) { ?>
            <tr>
                <th><?= $key; ?></th>
                <td><?= $values; ?></td>
            </tr>
        <?php }
    } else { ?>
        <tr>
            <td colspan="2">Not available</td>
        </tr>
    <?php } ?>

</table>
<hr>
<a class="btn btn-secondary btn-sm float-right mb-3 ml-2" href="<?= base_url(); ?>dashboard"><i class="fa fa-arrow-right" aria-hidden="true"></i> Dashboard </a>
<button class="btn btn-secondary btn-sm float-right mb-3" onclick="window.history.back();"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button>