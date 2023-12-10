
<div id="ilang">
    <?php echo $this->session->flashdata('alert'); ?>
</div>
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
Tambah Kategori</button>

<!-- Modal -->
<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?=base_url('admin/Kategori/simpan')?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nama Kategori</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="kategori" placeholder="Ex : Pengumuman" required>
      </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">add</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>
    <div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-6 ">action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php  
        $no = 1;
        foreach($list_kategori as $user){
        ?>
        <td>
            <div class="d-flex px-2 py-1">
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?=$no?></h6>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex px-2 py-1">
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?=$user->kategori?></h6>
              </div>
            </div>
          </td>
          <td class="align-middle" style="margin-top: 10px;">
            <button type="button" class="btn bg-gradient-warning" data-original-title="Edit " data-bs-toggle="modal" data-bs-target="#edit<?= $user->id_kategori?>">
              Edit
            </button>
            <a onClick="return confirm('Apakah anda yakin ingin menghapus user ini?')" href="<?=base_url('admin/kategori/delete/'.$user->id_kategori)?>" class="btn bg-gradient-danger" data-toggle="tooltip" data-original-title="Delete">
              Delete
            </a>
          </td>
        </tr>
        <div class="modal fade" id="edit<?=$user->id_kategori?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?=base_url('admin/kategori/update')?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Kategori</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="Paijo" required value="<?=$user->kategori?>">
        <input type="hidden" name="id_katergori" value="<?=$user->id_kategori?>">
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
  </div>
</div>

        </form>

            <?php $no++; } ?>
      </tbody>
    </table>
    </div>
        </div>
        </div>
        </di
    