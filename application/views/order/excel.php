<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=template.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
           <tr>
 
                <th colspan="8">DAFTAR BELANJA PASARIN</th>
           </tr>
 
           <tr>
                <th>ID</th>
                <th>NAMA</th>
                <th>TOTAL</th>
                <th>SATUAN</th>
                <th>HARGA</th>
                <th>HARGA DISKON</th>
                <th>IS AVAILABLE</th>
                <th>CATEGORY</th>
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($item as $item) { ?>
 
           <tr>

                <td><?php echo $item->id; ?></td>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $item->total; ?></td>
                <td><?php echo $item->unit; ?></td>
                <td><?php echo $item->price; ?></td>
                <td><?php echo $item->diskon; ?></td>
                <td><?php echo $item->isAvailable; ?></td>
                <td><?php echo $item->category; ?></td>
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>