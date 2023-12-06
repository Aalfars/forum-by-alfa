<div class="col-12 col-md-4 col-lg-3 ">
    <div class="post-sidebar-area">

        <!-- Widget Area -->


        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title subscribe-title">Saran Untuk Website Ini</h5>
            <div class="widget-content">
                <form action="<?= base_url('home/saran') ?>" class="newsletterForm" method="post">
                    <input type="text" name="saran" id="">
                    <?php if ($this->session->userdata('logged_in') !== true) {
                        echo '<a href="' . base_url('auth') . '" <button type="button" class="btn original-btn">Login</button></a>';
                    } else {
                        echo '<button type="submit" class="btn original-btn">Kirim</button>';
                    }; ?>
                </form>
            </div>
        </div>
    <div class="sidebar-widget-area">
        <h5 class="title">Konten Terbaru</h5>
        <?php foreach ($recent_post as $re) { ?>

        <div class="widget-content">

            <!-- Single Blog Post -->
                <div class="single-blog-post d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                        <img src="<?= base_url('assets/upload/konten/' . $re->foto) ?>" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                        <a href="#" class="post-tag"><?= $re->username ?></a>
                        <h4><a href="<?=base_url('home/detail/'.$re->slug)?>" class="post-headline"><?= $re->judul ?></a></h4>
                        <div class="post-meta">
                            <p><a href="#"><?= $re->tanggal ?></a></p>
                        </div>
                    </div>
                </div>
        </div>
        <?php }; ?>

    </div>

    <!-- Widget Area -->
    <div class="sidebar-widget-area">
        <h5 class="title">Kategori</h5>
        <div class="widget-content">
            <ul class="tags">
                <?php foreach ($kategori as $k) { ?>
                    <a href="<?= base_url('home/by_kategori/'.$k->id_kategori) ?>"><?=$k->kategori?></a>  
                    </li> <?php } ?>
            </ul>
        </div>
    </div>
</div>
                </div>