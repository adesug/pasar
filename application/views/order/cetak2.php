
    <center><img class="img-responsive" onclick="window.print();" class="img-fluid" alt="Responsive image" src="<?=base_url();?>/assets/logo1.svg" style="
    height: auto;
    width: 200px;
"></center>

        <hr>
        <table  class="table table-striped table-bordered">
            <tr>
                <td class="bg-dark"><b style="color: white;"><center>Bukti Transaksi</center></b></td>
            </tr>
            <tr>
                <td><center> #<?=$arrTrx->id;?> / <?=$arrTrx->updateOn;?> / <?=$arrTrx->trxStatus;?> </center>
                </td>
            </tr> 
        </table>
        <hr>
        <table  class="table table-striped table-bordered">
        <tr>
            <td colspan="2" class="bg-dark"><b style="color: white;"><center>Pengiriman & Pembayaran</center></b></td>
        </tr>

        <tr>
            <td colspan="2">
                <b><?=$arrUser->name;?> 
            <br> <?=$arrUser->mobile;?></b>
            <br><?=$arrUser->address;?>
            <br><?=$arrUser->address1;?>
    
            </td>                
        </tr> 
        <tr>
            <td>-<?=$arrPayment->shipingMethod;?> <br> -<?=$arrPayment->paymentMethod;?></td>                
            
        </tr> 
        <tr>
            <td><i class="bg-warning"><b> Catatan :<br><?=$arrTrx->note;?></b></i></td>                
        </tr> 
        
    </table>
        <hr>
    <table  id="example" class="table table-bordered" style="width:100%">
            <tr>
                <th colspan="3" class="text-center bg-dark"><b style="color: white;">Detail Item<b></th>
            </tr>
            <tr>
                <th class="text-center">Deskripsi</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Total</th>
            </tr>

        <?php
        $totalAllPrice=0; 
        foreach($arrChart as $chart){ 
            $isRev=false;
if($chart->revPrice!=''&$chart->revPrice!=null&&isset($chart->revPrice)){
    // $totalAllPrice=$totalAllPrice-($chart->price*$chart->qty);
    $totalAllPrice=$totalAllPrice+($chart->revPriceTotal);
    $isRev=true;
}else{
    $totalAllPrice=$totalAllPrice+($chart->price*$chart->qty);
} 
        
        ?>

            <?php if($isRev){?>
                <tr style="text-decoration: line-through;">
                <td colspan="3"><?=$chart->name;?> (<?=$chart->total;?> <?=$chart->unit;?>)</td>
            </tr>
            <tr style="text-decoration: line-through;">
                <td>(0000<?=$chart->id;?>)</td>
                <td><?=$chart->qty;?>x<?=$chart->price;?></td>
                <td><?=$chart->priceTotal;?></td>
            </tr>
            <tr>
                <td colspan="3"><?=$chart->name;?> (<?=$chart->revTotal;?> <?=$chart->revUnit;?>) (Revisi)</td>
            </tr>
            <tr>
                <td>(0000<?=$chart->id;?>)</td>
                <td><?=$chart->revQty;?>x<?=$chart->revPrice;?></td>
                <td><?=$chart->revPriceTotal;?></td>
            </tr>
            <?php }else{?>
                <tr>
                <td colspan="3"><?=$chart->name;?> (<?=$chart->total;?> <?=$chart->unit;?>)</td>
            </tr>
            <tr>
                <td>(0000<?=$chart->id;?>)</td>
                <td><?=$chart->qty;?>x Rp.<?=number_format( $chart->price,0,',','.')?>,-</td>
                <td>Rp.<?=number_format($chart->priceTotal)?>,-</td>
            </tr>
        <?php }} ?>
</table>
<hr>
<table class="float-right">
        <tr>
            <td colspan=5>Total </td>
            <td><strong> Rp.<?=number_format($totalAllPrice,0,',','.')?>,-</strong></td>
        </tr>
        <tr>
            <td colspan=5>Pengiriman </td>
            <td><strong> Rp.<?=number_format($arrPayment->shipingPrice,0,',','.')?>,-</strong></td>
        </tr>
        <tr>
            <td colspan=5>Total Bayar </td>
            <td><b>Rp.<?=number_format($totalAllPrice+$arrPayment->shipingPrice,0,',','.')?>,-</b></td>
        </tr>
</table>
<br><br><br>
<center>
<hr>
    TERIMAKASIH TELAH BERBELANJA DI<BR>PASAR.IN
<br>
     Follow kami di @pasar.in
<br>
</center>
<br>


