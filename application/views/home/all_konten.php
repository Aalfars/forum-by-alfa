<?php require_once('config/nav.php') ?>

<!-- ##### Header Area End ##### -->

<!-- ##### Hero Area Start ##### -->


<!-- ##### Hero Area End ##### -->

<!-- ##### Blog Wrapper Start ##### -->

<div class="container">
    <div class="row">
        <?php foreach ($konten as $kk) { ?>
            <?php
            $string = $kk['isi_konten'];
            $limit = 50;
            if (strlen($string) > $limit) {
                $limited_string = substr($string, 0, $limit) . '...';
            } else {
                $limited_string = $string;
            }
            ?>
            <div class=" col-12 col-md-6 col-lg-4">
                <div class="single-blog-area blog-style-2 mb-50 mt-30">
                    <div class="single-blog-thumbnail">
                        <img src="<?= base_url('assets/upload/konten/' . $kk['foto']) ?>" alt="" class="img-thumbnail"">
                    </div>
                    <!-- Blog Content -->
                    <div class=" single-blog-content ">
                        <div class=" line">
                    </div>
                    <a href="#" class="post-tag"><?= $kk['kategori'] ?></a>
                    <h4><a href="<?= base_url('home/detail/' . $kk['slug']) ?>" class="post-headline"><?= $kk['judul'] ?></a></h4>
                    <p><?= $limited_string ?></p>
                    <div class="post-meta">
                        <p>Oleh <a href="#"><?= $kk['username'] ?></a></p>
                    </div>
                </div>
            </div>
    </div>
<?php } ?>


<!-- Single Blog Area  -->

<!-- ##### Sidebar Area ##### -->

</div>
<style>
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination a,
    .pagination .page-link {
        padding: 10px 15px;
        text-decoration: none;
        border: 1px solid #ddd;
        color: #333;
        background-color: #fff;
        display: inline-block; /* Membuat elemen tampil sebagai inline block */
    }
    .pagination strong,
    .pagination .page-link {
        padding: 10px 15px;
        text-decoration:underline;
        border: 1px solid #ddd;
        color: #333;
        background-color: #fff;
        display: inline-block; /* Membuat elemen tampil sebagai inline block */
    }

    .pagination a:hover,
    .pagination .page-link:hover {
        background-color: #eee;
    }

    .pagination .active {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination .active strong,
    .pagination .active .page-link {
        padding: 10px 15px;
        text-decoration: none;
        border: 1px solid #ddd;
        color: #333;
        background-color: #fff;
        display: inline-block; 
    }
</style>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php echo $links; ?>
    </ul>
</nav>
</div>
</div>
<!-- ##### Blog Wrapper End ##### -->

<!-- ##### Instagram Feed Area Start ##### -->
<?php require_once('config/footer.php') ?>