
<div  class="ilang" id="ilang">
   <?php echo $this->session->flashdata('alert', true); ?>
   </div>    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
  Add User
</button>

<!-- Modal -->
<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?=base_url('admin/kategori/simpan')?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="Paijo" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Username</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="Evos.Galang*6638"required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Password</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="*****" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="level">Level</label>
        <select name="level" class="form-control"id="level" required>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Status</label>
        <select name="status" class="form-control"id="level" required>
            <option value="aktif">Active</option>
            <option value="nonaktif">Nonaktif</option>
        </select>
      </div>
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
</form>
    <div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Identitas</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Level</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Recent Login</th>

        </tr>
      </thead>
      <tbody>
      <?php  
        $no = 1;
        foreach($list_user as $user){
        ?>
        <tr>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?=$user->nama?></h6>
                <p class="text-xs text-secondary mb-0"><?=$user->username?></p>
              </div>
            </div>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0"><?=$user->level?></p>
            <p class="text-xs text-secondary mb-0"></p>
          </td>
          <td class="align-middle text-center">
            <span class="text-xs font-weight-bold mb-0"><?=$user->status?></span>
          </td>
          <td class="align-middle" style="margin-top: 10px;">
            <button type="button" class="btn bg-gradient-warning" data-original-title="Edit " data-bs-toggle="modal" data-bs-target="#edit<?= $user->user_id?>">
              Edit
            </button>
            <a onClick="return confirm('Apakah anda yakin ingin menghapus user ini?')" href="<?=base_url('admin/delete_user/'.$user->user_id)?>" class="btn bg-gradient-danger" data-toggle="tooltip" data-original-title="Delete">
              Delete
            </a>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0"><?=$user->recent_login?></p>
          </td>
        </tr>
        <div class="modal fade" id="edit<?=$user->user_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?=base_url('admin/update_user')?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="Paijo" required value="<?=$user->nama?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Username</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" readonly value="<?=$user->username?>"name="username" placeholder="Evos.Galang*6638"required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Password</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="*****"  ">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="level">Level</label>
        <select name="level" class="form-control"id="level" required >
            <option value="Admin"  <?php if ($user->level == 'admin') echo "selected" ;?>>Admin</option>
            <option value="User"  <?php if ($user->level == 'user') echo "selected" ;?>>User</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Status</label>
        <select name="status" class="form-control"id="level" required>
        <option value="aktif"  <?php if ($user->status == 'aktif') echo "selected" ;?>>Active</option>
            <option value="nonaktif"  <?php if ($user->status == 'nonaktif') echo "selected" ;?>>Nonaktif</option>
        </select>
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

            <?php } ?>
      </tbody>
    </table>
