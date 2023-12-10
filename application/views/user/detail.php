<?php foreach($konten as $konten){ ?>
    <div class="container-fluid py-4">
        <h3>Detail Konten</h3>
        <img src="<?= base_url('assets/upload/konten/'.$konten->foto)?>" alt="<?=$konten->foto?>">
    <form method="post" action="<?=base_url('Konten/update')?>" enctype="multipart/form-data" onsubmit="tinyMCE.triggerSave();">
    
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Judul</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" value="<?=$konten->judul?>" placeholder="Paijo" required>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <label for="nama">Isi</label>
        <textarea type="text" class="form-control" id="exampleFormControlInput1" name="isi"  required><?=$konten->isi_konten?></textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="level">Kategori</label>
        <select name="id_kategori" class="form-control"id="level" required>
            <option value="<?=$konten->id_kategori?>"><?=$konten->kategori?></option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" name="foto" placeholder="Teori MU calon degradasi" accept="image/png, image/jpeg"> </input>
        <input type="hidden" name="namafoto" value="<?=$konten->foto?>">
        <input type="hidden" name="id" value="<?=$konten->id_konten?>">

      </div>
    </div>
    <button type="submit" class="btn bg-gradient-success">Update</button>
<?php } ?>
</form>