  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>


  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?=base_url();?>assets/images_slide/slide-1.jpg?<?=rand(1,100);?>" width="100%" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="<?=base_url();?>assets/images_slide/slide-2.jpg?<?=rand(1,100);?>" width="100%" alt="Chicago">
    </div>

    <div class="item">
      <img src="<?=base_url();?>assets/images_slide/slide-3.jpg?<?=rand(1,100);?>" width="100%" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<?=form_open_multipart("asset/upload")?>
  <input type="file" name="filefoto">
  <input type="file" name="filefoto2">
  <input type="file" name="filefoto3">
<button type="submit" class="btn btn-primary">Upload</button>
<?=form_close()?>