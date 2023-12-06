<?php require_once('config/nav.php') ?>

    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <!-- Hero Slides Area -->
    
    </div>

    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row align-items-end">
                <!-- Single Blog Area -->
                <!-- Single Blog Area -->
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <!-- Single Blog Area  -->
                    <?php foreach($result as $kk){ ?>
            <?php
            $string = $kk->isi_konten;
            $limit = 100;
            if (strlen($string) > $limit) {
                $limited_string = substr($string, 0, $limit) . '...';
            } else {
                $limited_string = $string;
            }
            ?>
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail">
                                    <img src="<?=base_url('assets/upload/konten/'.$kk->foto)?>" alt="">
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-6">
                                <!-- Blog Content -->
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag"><?=$kk->kategori ?></a>
                                    <h4><a href="<?=base_url('home/detail/'.$kk->slug)?>" class="post-headline"><?=$kk->judul ?></a></h4>
                                    <p><?=$limited_string ?></p>
                                    <div class="post-meta">
                                        <p>Oleh <a href="#"><?=$kk->nama ?></a></p>
                                        <div class="load-more-btn mt-10 wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="1000ms">
                        <a href="<?=base_url('home/detail/'.$kk->slug)?>" class="btn original-btn">Read More</a>
                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>


                    <!-- Single Blog Area  -->
                    

                    <!-- Single Blog Area  -->
                   

                    <!-- Single Blog Area  -->
                   
                    <!-- Single Blog Area  -->
                 

                </div>

                <!-- ##### Sidebar Area ##### -->
               <?php require_once('config/side.php') ?>
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->

    <!-- ##### Instagram Feed Area Start ##### -->
    <?php require_once('config/footer.php') ?>