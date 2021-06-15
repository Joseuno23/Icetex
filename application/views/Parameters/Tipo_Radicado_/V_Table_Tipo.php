<table id="tabla_tipos" class="table table-bordered table-striped table-condensed ">
    <thead>
        <tr>
            <th>Description</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tipos as $v) : ?>
        <tr id="tipo<?=$v->id_tipo?>">
            <td id="desc<?=$v->id_tipo ?>"><?=$v->tipo?></td>
            <td style="text-align: center;" val="<?=$v->status?>" id="status<?=$v->id_tipo ?>"><?=$v->description?></td>
            <td style="text-align: center;">
                <button type="button"  class="btn btn-info btn-xs btn-tabla" onclick="Update(<?=$v->id_tipo?>)"><i class="fa fa-search"></i></button>
                <button type="button"  class="btn btn-danger btn-xs btn-tabla" onclick="Delete(<?=$v->id_tipo?>,'<?=$v->tipo?>')"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>