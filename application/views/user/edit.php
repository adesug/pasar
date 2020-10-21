<div class="card">
    <div class="card-header text-center bg-dark text-white">
        <h3><b>Edit User</b></h3>
    </div>
    <div class="card-body">
        <form action="<?= base_url('user/update/') . $arrUser->id ?>" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <!-- <input type="text" class="form-control hidden" id="id" name="id" value="<?= $arrUser->id; ?>"> -->
                <input type="text" class="form-control" id="name" name="name" value="<?= $arrUser->name; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" value="<?= $arrUser->pass; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" id="pass" name="email" value="<?= $arrUser->email; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <input type="text" class="form-control" id="pass" name="address" value="<?= $arrUser->address; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Alamat Lengkap</label>
                <input type="text" class="form-control" id="pass" name="adderss1" value="<?= $arrUser->address1; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Long</label>
                <input type="text" class="form-control" id="pass" name="long" value="<?= $arrUser->long; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Lat</label>
                <input type="text" class="form-control" id="pass" name="lat" value="<?= $arrUser->lat; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Device Token</label>
                <input type="text" class="form-control" id="pass" name="deviceToken" value="<?= $arrUser->deviceToken; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">No Telp</label>
                <input type="text" class="form-control" id="pass" name="mobile" value="<?= $arrUser->mobile; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Verifikasi Token</label>
                <input type="text" class="form-control" id="pass" name="verifToken" value="<?= $arrUser->verifToken; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Request Verifikasi</label>
                <input type="text" class="form-control" id="pass" name="requestVerif" value="<?= $arrUser->requestVerif; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Status Member</label>
                <input type="text" class="form-control" id="pass" name="statusMember" value="<?= $arrUser->statusMember; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">User Doc1</label>
                <input type="text" class="form-control" id="pass" name="userDoc1" value="<?= $arrUser->userDoc1; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">User Doc2</label>
                <input type="text" class="form-control" id="pass" name="userDoc2" value="<?= $arrUser->userDoc2; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Last Activity</label>
                <input type="text" class="form-control" id="pass" name="lastActivity" value="<?= $arrUser->lastActivity; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Kecamatan</label>
                <input type="text" class="form-control" id="pass" name="kecamatan" value="<?= $arrUser->kecamatan; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Kabupaten</label>
                <input type="text" class="form-control" id="pass" name="kabupaten" value="<?= $arrUser->kabupaten; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Kota</label>
                <input type="text" class="form-control" id="pass" name="kota" value="<?= $arrUser->kota; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Provinsi</label>
                <input type="text" class="form-control" id="pass" name="provinsi" value="<?= $arrUser->provinsi; ?>">
            </div>
            <button type="submit" value="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>

<hr>
<a class="btn btn-secondary btn-sm float-right ml-2 btn-sm" href="<?= base_url(); ?>dashboard">DASHBOARD
    <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
<a class="btn btn-secondary btn-sm float-right btn-sm mb-3 text-white" onclick="window.history.back();">
    <i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</a>

</hr>