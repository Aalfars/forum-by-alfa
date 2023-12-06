<div  id="ilang">
   <?php echo $this->session->flashdata('alert', true); ?>
   </div>
<a onClick="return confirm('Apakah anda yakin ingin menghapus semua saran ?')"  href="<?=base_url('admin/saran/hapus_semua')?>" class="btn btn-danger">Hapus Semua</a>

<div class="row">
<?php foreach($saran as $ss) { ?>
<div class="card border border-dark"style="width: 18rem;margin:5px;">
    <div class="card-body">
    <h5 class="card-title"><?= $ss->username?></h5>
        <p class="card-text"><?= $ss->saran; ?></p>
        <a onClick="return confirm('Apakah anda yakin ingin menghapus saran ini?')"  href="<?=base_url('admin/delete_saran/'.$ss->id_saran)?>" class="btn btn-danger">Delete</a>
</div>
</div>
<?php } ?>
</div>