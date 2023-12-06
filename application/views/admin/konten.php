
<div  id="ilang">
   <?php echo $this->session->flashdata('alert', true); ?>
   </div>    <!-- Button trigger modal -->
<a href="<?=base_url('admin/Konten/add')?>"><button type="button" class="btn btn-primary" >
  Add Konten
</button>
</a>
</form>
    <div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">No</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Judul</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  ps-3">Kategori</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  ps-3">Tanggal</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Kreator</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-7">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php  
        $no = 0;
        foreach($list_konten as $aa){
        ?>
                    <?php $no++;  ?>
        <tr>
   

        <td>
            <div class="d-flex px-2 py-1 ">
              <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs"><?=$no?></h6>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex px-2 py-1">
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?=$aa->judul?></h6>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex px-2 py-1">
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?=$aa->kategori?></h6>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex px-2 py-1">
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?=$aa->tanggal?></h6>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex px-2 py-1">
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?=$aa->username?></h6>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex px-2 py-1">
              <div class="d-flex flex-row justify-content-center">
              <a href="<?=base_url('admin/konten/detail/'.$aa->id_konten)?>"><button type="button" class="btn bg-gradient-warning mx-2" data-original-title="Edit " >
              Detail
            </button></a>
            <a onClick="return confirm('Apakah anda yakin ingin menghapus Konten ini?')" href="<?=base_url('Admin/Konten/delete/'.$aa->foto)?>"><button type="button" class="btn bg-gradient-danger" data-original-title="Edit " ">
              Delete
            </button></a>
              </div>
            </div>
        </tr> 
          <?php } ?>
        </tbody>
  </div>
  
</div>
        </form>

      