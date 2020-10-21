<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=template.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
 
                <th>ID</th>
                <th>NAMA</th>
                <th>TOTAL</th>
                <th>SATUAN</th>
                <th>HARGA</th>
                <th>HARGA 21.00-07.00</th>
                <th>HARGA2 07.00-12.00</th>
                <th>HARGA3 12.00-21.00</th>
                <th>HARGA DISKON</th>
                <th>IS AVAILABLE</th>
                <th>CATEGORY</th>
                <th>LOKASI</th>
 
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
                <td><?php echo $item->price1; ?></td>
                <td><?php echo $item->price2; ?></td>
                <td><?php echo $item->price3; ?></td>
                <td><?php echo $item->diskon; ?></td>
                <td><?php echo $item->isAvailable; ?></td>
                <td><?php echo $item->category; ?></td>
                <td><?php echo $item->loc; ?></td>
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>