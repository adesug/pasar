<table id="exampleItem" class="table table-striped table-bordered" style="width:100%">
<thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Unit</th>
            <th width="70px">Price</th>
            <th>Kategori</th>
            <th>isAvailable</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($arrItem as $item) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $item->name; ?></td>
                <td><?= $item->total; ?> <?= $item->unit; ?></td>
                <td>Rp.<?= number_format($item->price, 0,',','.'); ?>,-</td>
                <td><?= $item->category; ?></td>
                <td>
                    <?php if ($item->isAvailable == 1) {
                        echo "Tersedia";
                    } else {
                        echo "Kosong";
                    } ?>
                </td>
                <td><a class="btn btn-primary" href="<?= base_url(); ?>item/detail/<?= $item->id; ?>">Detail</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>