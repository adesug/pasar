<div class="card">
  <div class="card-header text-center bg-dark text-white">
    <h3><b>Edit Item</b></h3>
  </div>
  <div class="card-body">
    <form action="<?= base_url('item/update/') . $arrItem->id ?>" method="POST">
      <div class="custom-control custom-switch d-flex justify-content-end">
        <label for="basic-url" style="font-size: 16px; color: black;" class="mr-4">Apakah Item Tersedia ?</label>
        <input type="checkbox" data-id="<?php echo $item['id']; ?>" name="isAvailable" class="js-switch" <?php echo $arrItem->isAvailable == 1 ? 'checked' : ''; ?>>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Barang</label>
        <!-- <input type="text" class="form-control hidden" id="id" name="id" value="<?= $arrItem->id; ?>"> -->
        <input type="text" class="form-control" id="name" name="name" value="<?= $arrItem->name; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Deskripsi singkat</label>
        <input type="text" class="form-control" id="pass" name="sdesc" value="<?= $arrItem->sdesc; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Deskripsi</label>
        <input type="text" class="form-control" id="pass" name="desc1" value="<?= $arrItem->desc1; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Total </label>
        <input type="text" class="form-control" id="pass" name="total" value="<?= $arrItem->total; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Satuan Barang</label>
        <input type="text" class="form-control" id="pass" name="unit" value="<?= $arrItem->unit; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Harga</label>
        <input type="text" class="form-control" id="pass" name="price" value="<?= $arrItem->price; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Harga 1</label>
        <input type="text" class="form-control" id="pass" name="price1" value="<?= $arrItem->price1; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Harga 2</label>
        <input type="text" class="form-control" id="pass" name="price2" value="<?= $arrItem->price2; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Harga 3</label>
        <input type="text" class="form-control" id="pass" name="price3" value="<?= $arrItem->price3; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Harga 4</label>
        <input type="text" class="form-control" id="pass" name="price4" value="<?= $arrItem->price4; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Diskon</label>
        <input type="text" class="form-control" id="pass" name="diskon" value="<?= $arrItem->diskon; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Kategori Barang</label>
        <input type="text" class="form-control" id="pass" name="category" value="<?= $arrItem->category; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Ketersedian</label>
        <input type="text" class="form-control hidden" id="pass" name="isAvailable" value="<?= $arrItem->isAvailable; ?>">
        <input type="text" class="form-control" Readonly id="pass" name="ketersesiaan" value="<?php if ($arrItem->isAvailable == 1) {
                                                                                                echo "Tersedia";
                                                                                              } else {
                                                                                                echo "Kosong";
                                                                                              } ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Gambar</label>
        <input type="text" class="form-control" id="pass" name="img" value="<?= $arrItem->img; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Thumbnail</label>
        <input type="text" class="form-control" id="pass" name="img_thumb" value="<?= $arrItem->img_thumb; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Gambar 1</label>
        <input type="text" class="form-control" id="pass" name="img1" value="<?= $arrItem->img1; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Gambar 2</label>
        <input type="text" class="form-control" id="pass" name="img2" value="<?= $arrItem->img2; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Lokasi</label>
        <input type="text" class="form-control" id="pass" name="loc" value="<?= $arrItem->loc; ?>">
      </div>
      <button type="submit" value="submit" class="btn btn-success">Update</button>
    </form>
  </div>
</div>

<hr>
<h2>Picture Handling</h2>

<?= form_open_multipart("item/editimg/$arrItem->id") ?>
<input type="file" name="filefoto" class="mt-2">
<input type="file" name="filefoto2" class="mt-2">
<input type="file" name="filefoto3" class="mt-2">
<button type="submit" class="btn btn-primary mt-3">Upload</button>
<?= form_close() ?>

</hr>
<hr>

<a class="btn btn-secondary btn-sm float-right ml-2" href="<?= base_url(); ?>dashboard">DASHBOARD
  <i class="fa fa-arrow-right" aria-hidden="true"></i>
</a>
<a class="btn btn-secondary btn-sm float-right mb-3 text-white" onclick="window.history.back();">
  <i class="fa fa-arrow-left" aria-hidden="true"></i> BACK
</a>
</hr>
<script>
  let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

  elems.forEach(function(html) {
    let switchery = new Switchery(html, {
      size: 'small'
    });
  });

  $(document).ready(function() {
    $('.js-switch').change(function() {
      let isAvailable = $(this).prop('checked') === true ? 1 : 0;
      let itemId = $(this).data('id');

      $.ajax({
        type: "GET",
        dataType: "json",
        url: '<?= base_url() . 'item/checkItem/'; ?>' + itemId,
        data: {
          'isAvailable': isAvailable
        },
        success: function(data) {
          window.location.reload();
        }
      })
    })
  })
</script>