<hr>
<h1>import update</h1>
<hr>

<a href="<?=base_url();?>item/csvdwn">DOWNLOAD DATA</a>

<?=form_open_multipart("item/csvup")?>
<input type="file" name="uploadFile">
        <button type="submit"  name="submit" value="submit" class="btn btn-primary mt-2">Upload</button>
<?=form_close()?>



<hr>
<h1>add item by excel</h1>
<a href="<?=base_url();?>assets/exim/add.xlsx">DOWNLOAD template</a>
<?=form_open_multipart("item/csvadd")?>
<input type="file" name="uploadFile">
        <button type="submit"  name="submit" value="submit" class="btn btn-primary mt-2">Upload</button>
<?=form_close()?>