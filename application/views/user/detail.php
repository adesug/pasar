<center>
    <h1>USER DETAIL</h1>
</center>
<hr>
<?= form_open("") ?>
<table class="table table-striped table-bordered">
    <tr >
        <th width="300px" class="bg-dark text-center"
             style="color: white;"> Detail User 
        </th>
        <th class="bg-dark text-center"
             style="color: white;"> Keterangan
        </th>
    </tr>
    <tr>
        <td>Id</td>
        <td><?= $arrUser->id ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><?= $arrUser->name;?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?= $arrUser->address;?><br>
        </td>
    </tr>
    <tr>
        <td>Metode Pengiriman</td>
        <td>
            <h4><?= $kodeCOD; ?></h4>
        </td>
    </tr>
    <tr>
        <td>Status</td>
        <td><?= $arrUser->userDoc1 ?><br> <?= $arrUser->userDoc2 ?></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><?= $arrUser->pass;?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?= $arrUser->email;?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?= $arrUser->address;?></td>
    </tr>
    <tr>
        <td>Alamat Lengkap</td>
        <td><?= $arrUser->address1;?></td>
    </tr>
    <tr>
        <td>Long</td>
        <td><?= $arrUser->long;?></td>
    </tr>
    <tr>
        <td>Lat</td>
        <td><?= $arrUser->lat ;?></td>
    </tr>
    <tr>
        <td>Device Token</td>
        <td><?= $arrUser->deviceToken;?></td>
    </tr>
    <tr>
        <td>No Telp</td>
        <td><?= $arrUser->mobile;?></td>
    </tr>
    <tr>
        <td>Verifikasi Token</td>
        <td><?= $arrUser->verifToken ;?></td>
    </tr>
    <tr>
        <td>Request Verifikasi</td>
        <td><?= $arrUser->requestVerif;?></td>
    </tr>
    <tr>
        <td>Status Member</td>
        <td><?= $arrUser->statusMember; ?></td>
    </tr>
    <tr>
        <td>User Doc1</td>
        <td><?= $arrUser->userDoc1; ?></td>
    </tr>
    <tr>
        <td>User Doc2</td>
        <td><?= $arrUser->userDoc2;?></td>
    </tr>
    <tr>
        <td>Last Activity</td>
        <td><?= $arrUser->lastActivity ; ?></td>
    </tr>
    <tr>
        <td>Kecamatan</td>
        <td><?= $arrUser->kecamatan; ?></td>
    </tr>
    <tr>
        <td>Kabupaten</td>
        <td><?= $arrUser->kabupaten; ?></td>
    </tr>
    <tr>
        <td>Kota</td>
        <td><?= $arrUser->kota; ?></td>
    </tr>
    <tr>
        <td>Provinsi</td>
        <td><?= $arrUser->provinsi; ?></td>
    </tr>

    
</table>
    <hr>
    <div class="kontak d-flex justify-content-center">
        <a class="btn btn-primary btn-sm ml-2" href="<?= base_url(); ?>user/editUser/<?= $arrUser->id; ?>"><i class="fas fa-pen"></i> Edit</a>
        <a class="btn btn-primary btn-sm ml-2" href="<?= base_url(); ?>user/historyOrder/<?= $arrUser->id; ?>"><i class="fas fa-history"></i> History Order</a>
        <?php $mobPhone = preg_replace('/^0?/', '62', $arrUser->mobile); ?>
        <a class="btn btn-primary btn-sm ml-2" target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?= $arrUser->lat; ?>,<?= $arrUser->long; ?>"><i class="fas fa-map-marker-alt"></i> Lihat Peta</a>
    </div>  
    <hr>  
    <div class="kontak d-flex justify-content-center">
        <a class="btn btn-success btn-sm ml-2 mt-3" target="_blank" href="https://api.whatsapp.com/send?phone=<?= $mobPhone; ?>&text=Halo%20kak%20*<?= urlencode($arrUser->name) ?>*%2C%0AKami%20dari%20Pasar.in%20*mohon%20maaf%20atas%20ketidak%20nyamanan*%20yang%20terjadi.%20Kami%20lihat%20kakak%20*belum%20berhasil%20sukses%20verifikasi%20OTP*.%20Kami%20sudah%20*meningkatkan%20layanan%20OTP*%20untuk%20dapat%20membantu%20pengguna%20untuk%20verifikasi.%0A*Jika%20berkenan*%20kakak%20bisa%20melakukan%20*login%20ulang*%2C%20dan%20jika%20ada%20kendala%20bisa%20*menghubungi%20kami*%20kembali.%0ATerimakasih%0A%0A_Santi_"><i class="fab fa-whatsapp"></i> KIRIM WA GAGAL </a>
        <a class="btn btn-success btn-sm ml-2 mt-3" target="_blank" href="https://api.whatsapp.com/send?phone=<?= $mobPhone; ?>&text=Halo%20selamat%20pagi%20*kak%20<?= urlencode($arrUser->name) ?>%2C*%0A%0ABerhubungan%20dengan%20kondisi%20saat%20ini%20terkait%20_krisis%20COVID-19_%20%2C%20*Pasar.in%20berkomitmen*%20untuk%20_tetap%20memberikan%20layanan%20operasional%20terbaik_%20untuk%20mendukung%20kegiatan%20para%20*pelanggan%20Pasar.in*.%0A%0AUntuk%20itu%20kami%20informasikan%20bahwasanya%20jadwal%20antar%20*07%3A00%20%3B%2012%3A00%20%3B%2017%3A00*%20*tetap%20pelanggan%20bisa%20nikmati*.%20Pelanggan%20juga%20bisa%20menggunakan%20*paket%20Express%203%20Jam*%20untuk%20belanja%20cepat.%0A%0AKami%20harap%20sobat%20bisa%20menginfomasikan%20*jika%20ada%20kendala*%20ketika%20*belanja%20di%20Pasar.in*%20di%20tengah%20pandemik%20sekarang%20ini.%20Tim%20kami%20akan%20sangat%20*senang%20bisa%20membantu%20sobat*%20%26%20memastikan%20sobat%20mendapatkan%20*pelayanan%20terbaik*%20.%0A%0A*Yuk%2C%20Belanja%20di%20Pasar.in!*%0A_Sayur%20Buah.%20Bumbu.%20Lauk%20Pauk.%20Sembako.%20Daging%20%26%20Ikan_%0AMudah%2C%20Murah%2C%20Lengkap%20%26%20Cepat%0Ahttp%3A%2F%2Fwww.pasar.in%2Fdownload%0Ahttp%3A%2F%2Fbit.lt%2Fwa-pasarin"><i class="fab fa-whatsapp"></i> KIRIM WA GRETING 1</a>
    </div>

<?= form_close() ?>
<hr>
    <a class="btn btn-secondary btn-sm float-right ml-2 btn-sm" href="<?= base_url(); ?>dashboard">DASHBOARD
    <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
    <a class="btn btn-secondary btn-sm float-right btn-sm mb-3 text-white" onclick="window.history.back();">
    <i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</a>
</hr>
