<hr>
<table class="table table-light">
    <tr>
        <td><b>
                <center>
                    <p>----------- Pasar.in ----------</p>
                    <p> Sayur Buah. Bumbu. Lauk Pauk.</p>
                    <p>Sembako. Daging & Ikan</p>
                    <p>Mudah, Murah, Lengkap & Cepat </p>
                    <p>http://www.pasar.in/download</p>
                    <p>Follow kami di @pasar.in<br> </p>
                    <p>CS WA - 085155055134 </p>
                    <p>----------------------- </p>
                    <p>Bukti Transaksi<br>
                        <======================>
                    </p>
            </b></td>
        </center>
    </tr>
    <tr>
        <td>
            <center>
                <p> #<?= $arrTrx->id; ?></p>
                <p><?= $arrTrx->updateOn; ?></p>
                <p><?= $arrTrx->trxStatus; ?></p>
            </center>
        </td>
    </tr>
</table>

<table class="table table-light">
    <tr>
        <td colspan="2">
            <center>
                <p><b>
                        <======================><b><br>
                                Pengiriman & Pembayaran</p>
            </center>
            </b>
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <center>
                <b>
                    <p>-----------------------</p>
                    <p><?= $arrUser->name; ?></p>
                    <p><?= $arrUser->mobile; ?></p>
                    <p>-----------------------</p>
                </b>
                <p><?= $arrUser->address; ?></p>
                <p><?= $arrUser->address1; ?></p>
            </center>
        </td>
    </tr>
    <tr>
        <td>
            <center>
                <p>-----------------------</p>
                <!-- <p>-<?= $arrPayment->shipingMethod; ?></p>
                <p> -<?= $arrPayment->paymentMethod; ?></p> -->
        </td>
        </center>
    </tr>
    <tr>
        <td>
            <center>
                <p>-----------------------</p>
                <p>Catatan :<br><?= $arrTrx->note; ?></p>
        </td>
        </center>
    </tr>

</table>

<table class="table table-light text-center">
    <tr>
        <th colspan="3"><br><br>
            <center>
                <p>
                    <======================>
                </p>
                <p><b>Detail Item<b></p>
                <p>
                    <======================>
                </p>
                <hr>
            </center>
        </th>
    </tr>


    <?php
    $totalAllPrice = 0;
    foreach ($arrChart as $chart) {
        $isRev = false;
        if ($chart->revPrice != '' & $chart->revPrice != null && isset($chart->revPrice)) {
            $totalAllPrice=$totalAllPrice-($chart->price*$chart->qty);
            $totalAllPrice = $totalAllPrice + ($chart->revPriceTotal);
            $isRev = true;
        } else {
            $totalAllPrice = $totalAllPrice + ($chart->price * $chart->qty);
        }

    ?>

        <?php if ($isRev) { ?>
            <tr style="text-decoration: line-through;">
                    
                    <td colspan="2">
                        <p>-----------------------</p>
                        <p><?= $chart->name; ?></p>
                        <p>(<?= $chart->qty; ?>x<?= $chart->total; ?> <?= $chart->unit; ?>)</p>
                    </td>
                    
            </tr>

            <tr style="text-decoration: line-through;">
                <center>
                    <td>
                        <p><?= $chart->qty; ?>x Rp.<?=number_format($chart->price,0,',','.')?>,- = Rp.<?=number_format($chart->priceTotal,0,',','.')?>,- [SHOP][DLVR]</p>
                    </td>
                </center>
            </tr>

            <tr>
                <center>
                    <td colspan="2">-----------------------<br><?= $chart->name; ?> (<?= $chart->qty; ?>x<?= $chart->revTotal; ?> <?= $chart->revUnit; ?>) (Revisi)</td>
                </center>
            </tr>
            <tr>
                <center>
                    <td><br><?= $chart->revQty; ?>x Rp.<?=number_format($chart->revPrice,0,',','.')?>,- = Rp.<?=number_format($chart->revPriceTotal,0,',','.')?>,- [SHOP][DLVR]<br></td>
                    
                </center>
            </tr>
        <?php } else { ?>
            <tr>
                <center>
                    <td colspan="2">-----------------------<br><?= $chart->name; ?> (<?= $chart->qty; ?>x<?= $chart->total; ?> <?= $chart->unit; ?>)</td>
                </center>
            </tr>
            <tr>
                <center>
                    <td><br><?= $chart->qty; ?>x Rp.<?=number_format($chart->price,0,',','.')?>,- = Rp.<?=number_format($chart->priceTotal)?>,- [SHOP][DLVR]<br></td>
                    
                </center>
            </tr>
    <?php }
    } ?>
    
</table>
<center> -----------------------<br>
    <======================>
</center>

<table class="table-deafult text-center">

    <tr>
        <center>
            <td colspan=5><br>Total</td>
            <td> [Rp.<?=number_format($totalAllPrice)?>,-]<br></td>
        </center>
    </tr>
    <tr>
        <td colspan=5><br>Pengiriman</td>
        <!-- <td> [Rp <?= $arrPayment->shipingPrice; ?> ,-]<br></td> -->
    </tr>
    <tr>
        <td colspan=5><br>Total Bayar</td>
        <!-- <td> [<b>Rp <?= $totalAllPrice + $arrPayment->shipingPrice; ?> ,-]<br></b> -->
        </td>
    </tr>
</table>

<br>
<center>
<======================><br>
        <br>
        Terimakasih telah menjadi mitra belanja Pasar.in.<br>
        Jika ada masalah pembelian, kakak bisa menghubungi CS WA kami di 085155055134. Kami akan sangat senang bisa membantu kakak :)
        <br>
        <br>-- with love from Pasar.in --<br>

        <br>
        <br>
        <br>
        -
    </center>