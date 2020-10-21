<!-- <center><h1>KIRIM PUSH NOTIFICATION PROMO</h1></center> -->

<?=form_open("")?>
<div class="card">
  <div class="card-header bg-dark text-center" style="color: white;">
  KIRIM PUSH NOTIFICATION PROMO
  </div>
  <div class="card-body">
    <b><h4 class="card-title text-center">Kirim Pesan</h4></b>
    <tr>
        <b><th>Title</th></b>
        <td><input class="form-control"  name="title"/></td>
    </tr>
    <tr>
        <b><th>Message</th></b>
        <td><input class="form-control" name="message"/></td>
    </tr>
    <button type="submit" value="submit" class="btn btn-success btn-sm mt-5" onclick="return confirm('Apakah kamu yakin mengirimkanya??')" >Update</button><br>
  </div>
  
</div>
    
    

<?=form_close()?>
<hr>
<a class="btn btn-secondary btn-sm mt-2 ml-2 float-right" href="<?=base_url();?>dashboard" >  DASHBOARD 
<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
<button class="btn btn-secondary btn-sm mt-2 float-right" onclick="window.history.back();"><i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</button>
