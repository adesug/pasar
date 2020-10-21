<div class="card">
    <div class="card-header text-center bg-dark text-white">
        <h3><b>Add New Item</b></h3>
    </div>
    <div class="card-body">
        <?= form_open("") ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Barang</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Deskripsi singkat</label>
            <input type="text" class="form-control" name="sdesc">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Deskripsi</label>
            <input type="text" class="form-control" name="desc1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            <select class="form-control" name="category">
                <option value="">select option</option>
                <?php
                $menu = $this->db->query("SELECT * FROM menu")->result();
                ?>
                <?php foreach ($menu as $valmenu) { ?>
                    <option value="<?= $valmenu->code ?>"><?= $valmenu->name ?></option>
                <?php } ?>

            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Total</label>
            <input type="text" class="form-control" name="total">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Unit</label>
            <input type="text" class="form-control" name="unit">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Diskon</label>
            <input type="text" class="form-control" name="diskon">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">isAvailable</label>
            <input type="text" class="form-control" name="isAvailable">
        </div>

        <button type="submit" value="submit" class="btn btn-primary">Save</button>
    </div>
</div>
<?= form_close() ?>

<hr>