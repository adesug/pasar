<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Alamat Lengkap</th>
            <th>Keterangan</th>
            <th>Detail</th>
            
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($arrUser as $item) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $item->name; ?></td>
                <td><?= $item->mobile; ?></td>
                <td><?= $item->address; ?></td>
                <td><?= $item->address1; ?></td>
                <td><?php
                    $mobPhone = preg_replace('/^0?/', '62', $item->mobile);

                    if ($item->statusMember != "REGISTERED") { ?>
                        <a class="btn btn-success" target="_blank" href="https://api.whatsapp.com/send?phone=<?= $mobPhone; ?>&text=Halo%20kak%20*<?= urlencode($item->name) ?>*%2C%0AKami%20dari%20Pasar.in%20*mohon%20maaf%20atas%20ketidak%20nyamanan*%20yang%20terjadi.%20Kami%20lihat%20kakak%20*belum%20berhasil%20sukses%20verifikasi%20OTP*.%20Kami%20sudah%20*meningkatkan%20layanan%20OTP*%20untuk%20dapat%20membantu%20pengguna%20untuk%20verifikasi.%0A*Jika%20berkenan*%20kakak%20bisa%20melakukan%20*login%20ulang*%2C%20dan%20jika%20ada%20kendala%20bisa%20*menghubungi%20kami*%20kembali.%0ATerimakasih%0A%0A_Santi_">KIRIM WA GAGAL </a>
                    <?php } ?></td>
                <td><a class="btn btn-primary" href="<?= base_url(); ?>user/detail/<?= $item->id; ?>">Details</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>