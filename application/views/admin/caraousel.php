   <div  id="ilang">
   <?php echo $this->session->flashdata('alert', true); ?>
   </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
Tambah Caraousel    </button>

    <!-- Modal -->
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Caraousel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?= base_url('admin/Caraousel/simpan') ?>" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama">Judul</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" placeholder="Ex : Pengumuman" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" name="foto" placeholder="Teori MU calon degradasi" required accept="image/png, image/jpeg"> </input>
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
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Judul</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-6 ">Foto</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              $no = 1;
              foreach ($list_caraousel as $aa) {
              ?>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-xs"><?= $no ?></h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-xs"><?= $aa->judul ?></h6>
                    </div>
                  </div>
                </td>
                <td>
                <td>
                  <img src="<?= base_url('assets/upload/caraousel/' . $aa->foto) ?>" alt="<?= $aa->foto ?>" width="160" height="90px">
                </td>
                <td class="align-middle" style="margin-top: 10px;">
                  <button type="button" class="btn bg-gradient-warning" data-original-title="Edit " data-bs-toggle="modal" data-bs-target="#edit<?= $aa->id_caraousel ?>">
                    Edit
                  </button>
                  <a onClick="return confirm('Apakah anda yakin ingin menghapus foto caraousel ini?')" href="<?= base_url('admin/caraousel/delete/' . $aa->id_caraousel) ?>" class="btn bg-gradient-danger" data-toggle="tooltip" data-original-title="Delete">
                    Delete
                  </a>
                </td>
            </tr>
            <div class="modal fade" id="edit<?= $aa->id_caraousel ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Caraousel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="<?= base_url('admin/caraousel/update') ?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nama">Judul</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" placeholder="Ex: Pengumuman" required value="<?= $aa->judul ?>">
                          </div>
                          <div class="form-group">
                          <input type="file" name="caraousel" id="">
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

    <?php $no++;
              } ?>
    </tbody>
    </table>