<table id="tabla_roles" class="table table-bordered table-striped table-condensed ">
    <thead>
        <tr>
            <th>Description</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $v) : ?>
        <tr id="rol<?=$v->id_canal?>">
            <td id="desc<?=$v->id_canal ?>"><?=$v->canal?></td>
            <td style="text-align: center;" val="<?=$v->status?>" id="status<?=$v->id_canal ?>"><?=$v->description?></td>
            <td style="text-align: center;">
                <button type="button"  class="btn btn-info btn-xs btn-tabla" onclick="Update(<?=$v->id_canal?>)"><i class="fa fa-search"></i></button>
                <button type="button"  class="btn btn-danger btn-xs btn-tabla" onclick="Delete(<?=$v->id_canal?>,'<?=$v->canal?>')"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>