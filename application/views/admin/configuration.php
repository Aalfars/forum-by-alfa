<div  id="ilang">
   <?php echo $this->session->flashdata('alert', true); ?>
   </div>
<!-- Modal -->

<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Judul Website</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Intagram</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Twitter</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Github</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">linkedIn</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">facebook</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $no = 1;
                    foreach ($konfig as $k) {
                    ?>
                        <td>
                        <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs"><?= $k->judul_website ?></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs"><?= $k->instagram ?></h6>
                                </div>
                            </div>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs"><?= $k->twitter ?></h6>
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs"><?= $k->email ?></h6>
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs"><?= $k->github ?></h6>
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs"><?= $k->linkedln ?></h6>
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs"><?= $k->facebook ?></h6>
                                </div>
                            </div>
                            </td>
                        </td>
                        <td class="align-middle" style="margin-top: 10px;">
                            <button type="button" class="btn bg-gradient-warning" data-original-title="Edit " data-bs-toggle="modal" data-bs-target="#edit<?= $k->id_konfigurasi ?>">
                                Edit
                            </button>

                        </td>
                </tr>
                <div class="modal fade" id="edit<?= $k->id_konfigurasi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Konfigurasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?= base_url('admin/Configuration/update') ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Judul Website</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="judul_website" placeholder="Paijo" required value="<?= $k->judul_website ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Instagram</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="instagram" placeholder="Paijo" required value="<?= $k->instagram ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Twitter</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="twitter" placeholder="Paijo" required value="<?= $k->twitter ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Email</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Paijo" required value="<?= $k->email ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">LindeIn</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="linkedln" placeholder="Paijo" required value="<?= $k->linkedln ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="nama">Github</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="github" placeholder="Paijo" required value="<?= $k->github ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Facebook</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="facebook" placeholder="Paijo" required value="<?= $k->facebook ?>">
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
</div>
</div>
</div>
</di