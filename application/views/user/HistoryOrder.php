<h1> HISTORY ORDER</h1>
<hr>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>id</th>
            <th>user</th>
            <th>address</th>
            <th>trxStatus</th>
            <th>UpdateOn</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($arrTrx as $trx) { ?>
            <tr>
                <td><a class="btn btn-default" href="<?= base_url(); ?>order/orderDetail/<?= $trx->id; ?>">#<?= $trx->id; ?></a></td>
                <td><?= $trx->name; ?> - <?= $trx->mobile; ?> </td>
                <td><?= $trx->address; ?></td>
                <td>
                    <?php
                    if ($trx->trxStatus == "PROCESSED") {
                        $button = "btn-primary";
                    } elseif ($trx->trxStatus == "COMPLETE") {
                        $button = "btn-success";
                    } elseif ($trx->trxStatus == "READY TO SHIP") {
                        $button = "btn-primary";
                    } elseif ($trx->trxStatus == "SHIPPED") {
                        $button = "btn-info";
                    } elseif ($trx->trxStatus == "ONCHART") {
                        $button = "btn-warning";
                    } elseif ($trx->trxStatus == "Waiting Order Confirmation") {
                        $button = "btn-danger";
                    } elseif ($trx->trxStatus == "CANCELED") {
                        $button = "btn-danger";
                    } else {
                        $button = "btn-danger";
                    }
                    ?>
                    <button type="button" class="btn <?= $button; ?>"><?= $trx->trxStatus; ?></button>
                </td>
                <td><?= $trx->updateOn; ?></td>
            </tr>
        <?php } ?>

    </tbody>
</table>
<hr>
<a class="btn btn-secondary btn-sm float-right ml-2 btn-sm" href="<?= base_url(); ?>dashboard">DASHBOARD
    <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
<a class="btn btn-secondary btn-sm float-right btn-sm mb-3 text-white" onclick="window.history.back();">
    <i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</a>

</hr>