        <h3>Add Konten</h3>
    <form method="post" action="<?=base_url('admin/konten/simpan')?>" enctype="multipart/form-data" onsubmit="tinyMCE.triggerSave();">

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Judul</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" placeholder="Paijo" required>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <label for="nama">Isi</label>
        <textarea type="text" class="form-control" id="myTextarea" name="isi" placeholder="Teori MU calon degradasi"required></textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="level">Kategori</label>
        <select name="id_kategori" class="form-control"id="level" required>
            <?php
            foreach($list_kategori as $kategori){?>
            <option value="<?=$kategori->id_kategori?>"><?=$kategori->kategori?></option>
            <?php }?>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" name="foto" placeholder="Teori MU calon degradasi"required accept="image/png, image/jpeg"> </input>
      </div>
    </div>
    <button type="submit" class="btn bg-gradient-success">Add</button>
</form>
