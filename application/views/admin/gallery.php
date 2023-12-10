<div  id="ilang">
   <?php echo $this->session->flashdata('alert', true); ?>
   </div>    
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
Tambah Foto Gallery    </button>

    <!-- Modal -->
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?= base_url('admin/Gallery/simpan') ?>" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama">Nama foto</label>
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
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Judul</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
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
                  <a href="<?= base_url('assets/upload/gallery/' . $aa->foto) ?>" target="_blank"  alt="<?= $aa->foto ?>" ><?=$aa->foto?></a>
                </td>
                <td class="align-middle" style="margin-top: 10px;">
                  <button type="button" class="btn bg-gradient-warning" data-original-title="Edit " data-bs-toggle="modal" data-bs-target="#edit<?= $aa->id_foto ?>">
                    Edit
                  </button>
                  <a onClick="return confirm('Apakah anda yakin ingin menghapus foto caraousel ini?')" href="<?= base_url('admin/gallery/delete/' . $aa->id_foto) ?>" class="btn bg-gradient-danger" data-toggle="tooltip" data-original-title="Delete">
                    Delete
                  </a>
                </td>
            </tr>
            <div class="modal fade" id="edit<?= $aa->id_foto ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gambar Gallery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="<?= base_url('admin/gallery/update') ?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nama">Judul</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" placeholder="Ex: Pemandangan" required value="<?= $aa->judul ?>">
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