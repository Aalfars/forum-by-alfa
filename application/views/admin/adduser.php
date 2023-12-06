
        <h3>Add User</h3>
    <form method="post" action="<?=base_url('admin/simpan')?>">
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
    <button type="submit" class="btn bg-gradient-success">Add</button>

</form>
