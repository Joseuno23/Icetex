<?php 
$uri = $this->uri;
$n = 1;
$segment = $uri->segment($n);
?>

<ul class="side-menu toggle-menu">
    <li><h3>Menú</h3></li>
    <?php foreach ($menus as $m) : ?>
        <?php if ($m['type'] == 3){ ?>
            <li class="slide <?= ($segment == $m['url']) ? 'active' : ''; ?> ">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon fa <?= $m['icon'] ?> "></i>
                    <span class="side-menu__label"><?= $m['title'] ?></span>
                    <i class="angle fa fa-angle-right"></i>
                </a>
                <?php if (count($m['childs'])>0){
                    CreateChilds($m['childs'],"",$uri,$n); 
                } ?>
            </li>
        <?php }else{ ?>
            <li><a class="side-menu__item" href="<?= base_url().$m['url']?>"><i class="side-menu__icon fe fe-codepen <?= $m['icon'] ?>"></i><span class="side-menu__label"><?= $m['title'] ?></span></a></li>
        <?php } ?>

    <?php endforeach; ?>
</ul>

<?php 
function CreateChilds($childs,$html,$uri,$n){
    $html .= "<ul class='slide-menu'>";
        foreach ($childs as $h) :
            if ($h['type'] == 2){
                $html .= "<li><a class='slide-item' href='".base_url().$h['url']."'><span>".$h['title']."</span></a></li>";
            }else{
                $n++;
                $segment = $uri->segment($n);
                $active = ($segment == $h['url']) ? 'active' : '';
                $html .= "<li class='slide $active '>
                    <a class='side-menu__item' data-toggle='slide' href='".base_url().$h['url']."'>
                        <i class='side-menu__icon fa ".$h['icon']." '></i>
                        <span class='side-menu__label'>".$h['title']."</span>
                        <i class='angle fa fa-angle-right'></i>
                    </a>";
                    if (count($h['childs'])>0){
                        $html = CreateChilds($h['childs'],$html,$uri,$n); 
                    }

                $html .= "</li>";
            }
        endforeach;
    $html .= "</ul>";
    echo $html;
}

?>