<style>
    .table-striped{
        margin-bottom: 18px !important;
    }
    .btn-box-tool{margin-left: 40px;}
    .box.box-primary { border-top-color: #5f5aa6; }
</style>
<?php
foreach ($listButton as $modulo => $sub) :?>
            
        <div class="card">
            <div class="card-status card-status-left bg-primary br-bl-3 br-tl-3"></div>
            <div class="card-header">
                <h3 class="card-title"><?=$modulo?></h3>
                <div class="card-options">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                </div>
            </div>
            
            <div class="card-body">
                <?php foreach ($sub as $ch) : ?>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><?=$ch['name']?></td>
                                <td style="text-align: right;"><input   class="minimal-red pull-right" id="ch-<?=$ch['id_button']?>" type="checkbox" value="" name=""></td>
                            </tr>
                        </tbody>
                    </table>
                <?php endforeach; ?>
            </div>
        </div>
        <?php

endforeach;
?>