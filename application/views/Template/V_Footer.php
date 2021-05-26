<footer class="footer side-footer">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-12 col-sm-12   text-center">
                Copyright © 2021 <a href="#"><?=TITLE_?></a>. All rights reserved.
            </div>
        </div>
    </div>
</footer>
<!-- End Footer-->

</div>
</div>
<!-- End Page -->

<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<?php
if (isset($array_js)):
    foreach ($array_js as $js):
        ?>
        <script src="<?= base_url() ?>assets/<?= $js ?>"></script>
        <?php
    endforeach;
endif;
?>
        
<?php
    if (isset($datatable)):
        $array = unserialize($datatable);
        foreach ($array as $ajs):
            ?>
            <script src="<?= base_url() ?>assets/<?= $ajs ?>"></script>
        <?php
        endforeach;
    endif;
?>      

<!--Bootstrap.min js-->
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!--Side-menu js-->
<script src="<?= base_url() ?>/assets/plugins/sidemenu/sidemenu.js"></script>

<!--Time Counter js-->
<script src="<?= base_url() ?>/assets/plugins/counters/jquery.missofis-countdown.js"></script>
<script src="<?= base_url() ?>/assets/plugins/counters/counter.js"></script>

<!-- Custom js-->
<script src="<?= base_url() ?>/assets/js/custom.js"></script>

</body>
</html>