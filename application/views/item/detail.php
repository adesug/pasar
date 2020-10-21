<?= form_open("") ?>

<!-- <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <td class="bg-dark">
        <h4><center style="color: white; width: 100%;" > Detail Item</center></h4>  
      </td>
    </tr>
  </thead> -->
  <center>
    <h1>ITEM DETAIL</h1>
</center>
<hr>
  <table class="table table-striped table-bordered">
  <thead>
    <tr class="bg-dark" style="color: white;">
    
      <th scope="col" class="text-center">Detail Item</th>

      <th scope="col" class="text-center">Keterangan</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Id</th>
      <td>
         <?= $arrItem->id;?>
      </td> 
    </tr>
    <tr>
      <th scope="row">Nama Barang</th>
      <td>
         <?= $arrItem->name;?>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Deskripsi singkat</th>
      <td>
      <?= $arrItem->sdesc;?>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Deskripsi</th>
      <td>
      <?= $arrItem->desc1;?>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Total</th>
      <td>
      <?= $arrItem->total;?>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Unit</th>
      <td>
      <?= $arrItem->unit;?>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Harga</th>
      <td>Rp.<?= number_format($arrItem->price,0,',','.')?>,-</td>
    </tr>
    <tr>
      <th scope="row">Harga 1</th>
      <td>Rp.<?= number_format($arrItem->price1,0,',','.')?>,-</td>
    </tr>
    <tr>
      <th scope="row">Harga 2</th>
      <td>Rp.<?= number_format($arrItem->price2,0,',','.')?>,-</td>
      
    </tr>
    <tr>
      <th scope="row">Harga 3</th>
      <td>Rp.<?= number_format($arrItem->price3,0,',','.')?>,-</td>
      
    </tr>
    <tr>
      <th scope="row">Harga 4</th>
      <td>Rp.<?= number_format($arrItem->price4,0,',','.')?>,-</td>
      
    </tr>
    <tr>
      <th scope="row">Diskon</th>
      <td>
      <?= $arrItem->diskon;?>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Kategori Barang</th>
      <td>
      <?= $arrItem->category;?>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Ketersedian</th>
      <td>
      <?php if($arrItem->isAvailable == 1){
          echo "Tersedia";
        }else{
          echo "kosong";
        }?>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Gambar</th>
      <td>
      <?= $arrItem->img;?>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Thumbnail</th>
      <td>
      <?= $arrItem->img_thumb;?>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Gambar 1</th>
      <td>
      <?= $arrItem->img1;?>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Gambar 2</th>
      <td>
      <?= $arrItem->img2;?>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Lokasi</th>
      <td>
      <?= $arrItem->loc;?>
      </td>
      
    </tr>
  </tbody>
</table>
<a href="<?= base_url(); ?>item/editItem/<?= $arrItem->id ?>" class="btn btn-primary" ><i class="fas fa-pen"></i> EDIT</a>
<a href="<?= base_url(); ?>item/delete/<?= $arrItem->id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i> DELETE</a>
<hr>
<a class="btn btn-secondary btn-sm float-right ml-2 btn-sm" href="<?= base_url(); ?>dashboard">DASHBOARD
<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
<a class="btn btn-secondary btn-sm float-right btn-sm mb-3 text-white" onclick="window.history.back();">
<i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</a>
</hr>