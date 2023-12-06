<div class="instagram-feed-area mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="insta-title">
                    <h5>Follow me @aalfarss_</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer-area text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Footer Nav Area -->
                <?php foreach ($config as $c) ?>
                <!-- Footer Social Area -->
                <div class="footer-social-area ">
                    <a href="<?= $c->facebook ?>" data-toggle="tooltip" data-placement="top" target="_blank" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="<?= $c->twitter ?>" data-toggle="tooltip" data-placement="top" target="_blank" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="<?= $c->github ?>" data-toggle="tooltip" data-placement="top" target="_blank" title="Github"><i class="fa fa-github" aria-hidden="true"></i></a>
                    <a href="<?= $c->instagram ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="<?= $c->linkedln ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>
        document.write(new Date().getFullYear());
    </script> All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://instagram.com/aalfars_" target="_blank">Arufaa</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

</footer>
<!-- ##### Footer Area End ##### -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="<?= base_url('assets/home/') ?>js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="<?= base_url('assets/home/') ?>js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="<?= base_url('assets/home/') ?>js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="<?= base_url('assets/home/') ?>js/plugins.js"></script>
<!-- Active js -->
<script src="<?= base_url('assets/home/') ?>js/active.js"></script>

<script src="<?= base_url('assets/') ?>bootstrap.min.js"></script>

</body>

</html>