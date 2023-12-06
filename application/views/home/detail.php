<?php require_once('config/nav.php') ?>


<!-- ##### Header Area End ##### -->

<!-- ##### Single Blog Area Start ##### -->
<div class="single-blog-wrapper section-padding-0-100">
    <?php foreach ($detail as $dd) { ?>
        <div class="card">
            <!-- Single Blog Area  -->
            <div class="single-blog-area blog-style-2 mb-50">
                <div class="single-blog-thumbnail">
                    <img src="<?= base_url('assets/upload/konten/' . $dd->foto) ?>" alt="">
                    <div class="post-tag-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <!-- ##### Post Content Area ##### -->
                    <div class="col-12 col-lg-9">
                        <!-- Single Blog Area  -->
                        <div class="single-blog-area blog-style-2 mb-50">
                            <!-- Blog Content -->
                            <div class="single-blog-content">
                                <div class="line"></div>
                                <a href="#" class="post-tag"><?= $dd->kategori ?></a></a>
                                <h4><a href="#" class="post-headline mb-0"><?= $dd->judul ?></a></a></h4>
                                <div class="post-meta mb-50">
                                    <p>Oleh <a href="#"><?= $dd->nama ?></a></p>
                                </div>
                                <p><?= $dd->isi_konten ?></a></p>
                            </div>
                        </div>

                        <!-- About Author -->

                        <div class="author-info">
                            <div class="line"></div>
                            <span class="author-role">Penulis</span>
                            <h4><a href="#" class="author-name"><?= $dd->nama ?> aka @<?= $dd->username ?></a></h4>

                        </div>
                    </div>
                <?php } ?>
                </div>

                <!-- Comment Area Start -->
                <div class="comment_area clearfix mt-70">
                    <h5 class="title">Komentar</h5>

                    <ol>
                        <!-- Single Comment Area -->
                        <?php foreach ($komen as $k) { ?>
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <a href=""><i class="fa fa-ellipsis-vertical"></i></a>
                                        <a href="#" class="post-date"><?= $k->tanggal ?></a>
                                        <p><a href="#" class="post-author"><?= $k->nama ?></a></p>
                                        <p><?= $k->komen ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                </div>

                <div class="post-a-comment-area mt-70">
                    <h5>Leave a reply</h5>
                    <!-- Reply Form -->
                    <form action="<?= base_url('home/komen') ?>" method="post">
                        <input type="hidden" name="id_konten" value="<?= $dd->id_konten ?>">
                        <input type="hidden" name="slug" value="<?= $dd->slug ?>">

                        <div class="row">
                            <div class="col-12">
                                <div class="group">
                                    <textarea name="komentar" id="message" required></textarea>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Komentar</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <?php if ($this->session->userdata('logged_in') !== true) {
                                    echo '<a href="' . base_url('auth') . '" <button type="button" class="btn original-btn">Login</button></a>';
                                } else {
                                    echo '<button type="submit" class="btn original-btn">Reply</button>';
                                }; ?>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ##### Sidebar Area ##### -->






        </div>
</div>

<!-- Widget Area -->

</div>
</div>
</div>
</div>
</div>
<!-- ##### Single Blog Area End ##### -->

<!-- ##### Instagram Feed Area Start ##### -->
<?php require_once('config/footer.php') ?>