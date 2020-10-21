<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Address</th>
                <th>TrxStatus</th>
                <th>UpdateOn</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach($arrTrx as $trx){?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?=$trx->name;?> - <?=$trx->mobile;?> </td>
                <td><?=$trx->address;?></td>
                <td>
                    <?php
                        if($trx->trxStatus=="PROCESSED"){                            
                            $button="btn-primary";
                        }elseif($trx->trxStatus=="COMPLETE"){
                            $button="btn-success";
                        }elseif($trx->trxStatus=="READY TO SHIP"){
                            $button="btn-primary";
                        }elseif($trx->trxStatus=="SHIPPED"){
                            $button="btn-info";
                        }elseif($trx->trxStatus=="ONCHART"){
                            $button="btn-warning";
                        }elseif($trx->trxStatus=="Waiting Order Confirmation"){
                            $button="btn-danger";
                        }elseif($trx->trxStatus=="CANCELED"){
                            $button="btn-danger";
                        }else{
                            $button="btn-danger";
                        }
                    ?>
                    <button type="button" class="btn <?=$button;?>"><?=$trx->trxStatus;?></button>
                </td>
                <td><?=$trx->updateOn;?></td>
                <td><a class="btn btn-primary" href="<?=base_url();?>order/orderDetailSimple/<?=$trx->id;?>">Details</a></td>
            </tr>
        <?php } ?>

        </tbody>
</table>