<?php require_once('config/nav.php') ?>

<!-- ##### Header Area End ##### -->

<!-- ##### Hero Area Start ##### -->


<!-- ##### Hero Area End ##### -->

<!-- ##### Blog Wrapper Start ##### -->

<div class="container">
    <div class="row">
        <?php foreach ($galeri as $kk) { ?>
            <div class=" col-12 col-md-6 col-lg-4">
                <div class="single-blog-area blog-style-2 mb-25 mt-15">
                    <div class="single-blog-thumbnail">
                        <img src="<?= base_url('assets/upload/gallery/' . $kk->foto) ?>" alt="" class="img-thumbnail">
                    </div>
                    <!-- Blog Content -->
                    <div class=" single-blog-content ">
                        <div class=" line">
                    </div>
                    <h4><a href="<?= base_url('assets/upload/gallery/' . $kk->foto) ?>" target="_blank" class="post-headline"><?= $kk->judul ?></a></h4>
                </div>
            </div>
    </div>
<?php } ?>


<!-- Single Blog Area  -->

<!-- ##### Sidebar Area ##### -->

</div>

</div>
</div>
<!-- ##### Blog Wrapper End ##### -->

<!-- ##### Instagram Feed Area Start ##### -->
<?php require_once('config/footer.php') ?>