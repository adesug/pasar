<center><img class="img-responsive" onclick="window.print();" class="img-fluid" alt="Responsive image" src="<?= base_url(); ?>/assets/logo1.svg" style="
    height: auto;
    width: 200px;
"></center>
<?php $mobPhone = preg_replace('/^0?/', '62', $arrUser->mobile); ?>

<hr>
<table class="table table-striped table-bordered" style="width: 100%;">
    <tr>
        <th class="text-center bg-dark" style="color: white;">Bukti Transaksi</th>
        <th class="text-center bg-dark" style="color: white;">Aksi</th>
    </tr>
    <tr>
        <td>
             #<?= $arrTrx->id; ?> / <?= $arrTrx->updateOn; ?> / <?= $arrTrx->trxStatus; ?> 
        </td>
        <td >
            <center>
                <a class="btn btn-primary btn-xs " target="_blank" href="<?= base_url(); ?>order/orderCetakonchart/<?= $arrTrx->id ?>">
                    <i class="fa fa-print" aria-hidden="true"></i> Print
                </a>
                <a class="btn btn-primary btn-xs " target="_blank" href="<?= base_url(); ?>order/orderCetak2onchart/<?= $arrTrx->id ?>">
                    <i class="fa fa-sticky-note" aria-hidden="true"></i> View Nota
                </a>
            </center>
        </td>
    </tr>
<!-- </table> -->

<!-- <table class="table table-striped table-bordered"> -->
    <tr>
        <th class="text-center bg-dark" style="color: white;">Pengiriman & Pembayaran</th>
        <th class="bg-dark" style="color: white;"></th>
        
        
    </tr>

    <tr>
        <td>
            <b><?= $arrUser->name; ?>
            <br> <?= $arrUser->mobile; ?></b>
            <br><?= $arrUser->address; ?>
            <br><?= $arrUser->address1; ?><br>
        </td>
        <td>
            <center>
                <a class="btn btn-primary btn-xs mt-5" target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?= $arrUser->lat; ?>,<?= $arrUser->long; ?>"><i class="fas fa-map-marker-alt"></i> Lihat Peta</a>
                <a class="btn btn-primary btn-xs mt-5" target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?= $arrUser->lat; ?>,<?= $arrUser->long; ?>"><i class="fas fa-map-marker-alt"></i> Kirim Peta Wahyu</a>
                <a class="btn btn-primary btn-xs mt-5" target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?= $arrUser->lat; ?>,<?= $arrUser->long; ?>"><i class="fas fa-map-marker-alt"></i> Kirim Peta Nur</a>
            </center>
        </td>
    </tr>

    <tr>
        <th colspan="2"> <i class="bg-warning"> <strong>Catatan :</strong> </i> <br><?= $arrTrx->note; ?></th>
    </tr>

</table>

<table id="example" class="table table-bordered table-hover table-striped" style="width:100%">
    <!-- <tr class="bg-dark">
        <th colspan="3" style="color: white;" class="text-center"><b>Detail Item<b></th>
    </tr> -->
    <tr>
        <th class="text-center bg-dark" style="color: white;">Deskripsi</th>
        <th class="text-center bg-dark" style="color: white;">Harga</th>
        <th class="text-center bg-dark" style="color: white;">Total</th>
    </tr>

    <?php
    $totalAllPrice = 0;
    $barang = "";
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
                <td colspan="3"><?= $chart->name; ?> (<?= $chart->total; ?> <?= $chart->unit; ?>)
                </td>
            </tr>
            <tr style="text-decoration: line-through;">
                <td>(<?= $chart->id; ?>)</td>
                <td><?= $chart->qty; ?>x Rp.<?=number_format($chart->price,0,',','.') ?>,-</td>
                <td>Rp.<?=number_format($chart->priceTotal,0,',','.') ?>,-</td>
            </tr>
            <tr>
                <td colspan="3"><?= $chart->name; ?> (<?= $chart->revTotal; ?> <?= $chart->revUnit; ?>) (Revisi)
                    <a class="btn btn-success btn-xs" target="_blank" href="https://api.whatsapp.com/send?phone=<?= $mobPhone; ?>&text=Halo%20*kak%20<?= urlencode($arrUser->name) ?>%2C*%0A%0AMengkonfirmasikan%20terkait%20Order%20Nomor%20%3A%20*<?= $arrTrx->id ?>*%20*sudah%20siap%20diantar.*%20System%20sedang%20*menghubungkan%20dengan%20kurir%20terdekat.*%0A%0ATerimakasih%0A_Santi%2C_">WA-REVISI-OK </a>

                </td>
            </tr>
            <tr>
                <td>(<a href="<?= base_url(); ?>order/order_chart/<?= $chart->id; ?>" target="_blank">View Chart</a></td>
                <td><?= $chart->revQty; ?>x Rp.<?=number_format($chart->revPrice) ?>,-</td>
                <td>Rp.<?=number_format($chart->revPriceTotal,0,',','.') ?>,-</td>
            </tr>
        <?php } else { ?>
            <tr>
                <td colspan="3"><?= $chart->name; ?> (<?= $chart->total; ?> <?= $chart->unit; ?>)
                    <div class="float-right">
                        <a class="btn btn-success btn-xs" target="_blank" href="https://api.whatsapp.com/send?phone=<?= $mobPhone; ?>&text=*Mohon%20maaf*%20kak%20untuk%20order%20*<?= $arrTrx->id ?>*%20dengan%20item%20*<?= urlencode($chart->name) ?>*%20(<?= $chart->total; ?>%20<?= $chart->unit; ?>)%20akan kami ganti dengan%20 %0A%0A%0A.%20Kami%20akan%20menunggu%20*konfirmasi*%20selama%20*5%20menit*%20sebelum%20kami%20kemas.%0A😊😊😊"><i class="fab fa-whatsapp"></i> WA-REVISI </a>
                        <a class="btn btn-success btn-xs" target="_blank" href="https://api.whatsapp.com/send?phone=<?= $mobPhone; ?>&text=*Mohon%20maaf*%20kak%20untuk%20order%20*<?= $arrTrx->id ?>*%20dengan%20item%20*<?= urlencode($chart->name) ?>*%20(<?= $chart->total; ?>%20<?= $chart->unit; ?>)%20*Kosong*.%20Apakah%20ada%20item%20*pengganti*%3F%20Kami%20akan%20menunggu%20*konfirmasi*%20selama%20*5%20menit*%20sebelum%20kami%20kemas.%0A😊😊😊"><i class="fab fa-whatsapp"></i> WA-KOSONG </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td><a class="btn btn-success btn-xs" href="<?= base_url(); ?>order/order_chart/<?= $chart->id; ?>" target="_blank">View Chart</a></td>
                <td><?= $chart->qty; ?>x Rp.<?=number_format($chart->price,0,',','.') ?>,-</td>
                <td>Rp.<?= number_format($chart->priceTotal,0,',','.') ?>,-</td>
            </tr>
    <?php }
    } ?>
</table>
<hr>
<table class="float-right">
    <tr>

        <td> <strong> Total Pengiriman : </strong></td>
        <td> <i class="bg-warning"> <strong>Rp. <?php echo number_format($totalAllPrice, 0, ',', '.') ?>,-</strong></i></td>

    </tr>
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
                <a class="btn btn-primary btn-sm mt-3" style="width: 182px;" target="_blank" href="https://api.whatsapp.com/send?phone=<?= $mobPhone; ?>&text=Halo%20%20*kak%20<?= urlencode($arrUser->name) ?>%2C*%0A%0A*Yuk%20kak%20kita%20selesaikan%20pembelian%2C*%0AKakak%20meninggalkan%20<?= urlencode($barang) ?>%20di%20keranjang.%0A%0A*Apakah%20ada%20permasalahan*%20dalam%20pembelian%3F%20Kami%20akan%20*sangat%20senang*%20bisa%20membantu%20kakak%20*menyelesaikan%20pembelian*%20%3A)%0A%0A_Santi%2C_"><i class="fab fa-whatsapp"></i> WA-TANYA-CHART </a>
                <a href="<?= base_url(); ?>core/markAsProcessed/<?= $arrTrx->id ?>" class="btn btn-primary btn-sm mt-3" style="width: 182px;"><i class="fas fa-box"></i> MARK AS PROCESSED</a>
                <a href="<?= base_url(); ?>core/markAsReadyToShip/<?= $arrTrx->id ?>" class="btn btn-primary btn-sm mt-3" style="width: 182px;"><i class="fas fa-truck"></i> MARK AS READY TO SHIP</a>
            </center>
        </td>
        <td>
            <center>
                <a href="<?= base_url(); ?>core/markAsShipped/<?= $arrTrx->id ?>" class="btn btn-primary btn-sm mt-3"><i class="fas fa-hands-helping" style="width: 30px;"></i> MARK AS SHIPPED</a>
                <a href="<?= base_url(); ?>core/markAsComplete/<?= $arrTrx->id ?>" class="btn btn-success btn-sm mt-3"><i class="fas fa-check-square" style="width: 20px;"></i> MARK AS COMPLETE</a>
                <a href="<?= base_url(); ?>core/markAsCancel/<?= $arrTrx->id ?>" class="btn btn-danger btn-sm mt-3"><i class="fas fa-window-close" style="width: 40px;"></i> MARK AS CANCEL</a>

            </center>
        </td>
    </tr>
</table>
<tr>

    <a class="btn btn-secondary btn-sm float-right mr-2" href=" <?= base_url(); ?>order/orderDetailOnChart/<?= $arrTrx->id ?>"> <i class="fa fa-file-invoice"></i> Detail Chart</a>
    <a class="btn btn-secondary btn-sm float-right mr-2 text-white" onclick="window.history.back();"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>

</tr>
<br>
<br>
<br>