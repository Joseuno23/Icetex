<style>
    .table-striped{
        margin-bottom: 18px !important;
    }
    .btn-box-tool{margin-left: 40px;}
    .box.box-primary {border-top-color: #5f5aa6; }
</style>
<?php
foreach ($listmenus as $id_menu => $sub) :
    if ($sub['type'] == 3):
        ?>
        <div class="card card-collapsed">
            <div class="card-status card-status-left bg-primary br-bl-3 br-tl-3"></div>
            <div class="card-header">
                <h3 class="card-title"><?= $sub['title'] ?></h3>
                <div class="card-options">
                    <input   class="minimal-red pull-right" id="ch-<?=$id_menu?>" type="checkbox" value="" name="">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                </div>
            </div>
            
            <div class="card-body">
                <?php if ($sub['type'] == 3) { ?>
                    <?php foreach ($sub['child'] as $id_menu2 =>  $ch) : ?>
                        <?php if ($ch['type'] == 4) { ?>
                               <div class="box box-default collapsed-box">
                                    <div class="box-header with-border" style="text-align: left;">
                                        <h3 class="box-title"><?=$ch['title']?></h3>

                                        <div class="box-tools pull-right">
                                            <input   class="minimal-red pull-right" id="ch-<?=$id_menu2?>" type="checkbox" value="" name="">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                            </button>
                                        </div>

                                    </div>
                                    <div class="box-body">
                                        <?php foreach ($ch['child'] as $id_menu3 => $ch2) : ?>
                                            <?php if ($ch2['type'] == 4) { ?>
                                        
                                             <?php }else{ ?>
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td><?=$ch2['title']?></td>
                                                                <td style="text-align: right;"><input   class="minimal-red pull-right" id="ch-<?=$id_menu3?>" type="checkbox" value="" name=""></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            <?php } ?>
                                        
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                        <?php }else{ ?>
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td><?=$ch['title']?></td>
                                            <td style="text-align: right;"><input   class="minimal-red pull-right" id="ch-<?=$id_menu2?>" type="checkbox" value="" name=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                        <?php } ?>
                        
                    <?php endforeach; ?>
                <?php } else { ?>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><?=$sub['title']?></td>
                                <td style="text-align: right;"><input   class="minimal-red pull-right" type="checkbox" value="" name=""></td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
        <?php
    endif;

endforeach;
?>