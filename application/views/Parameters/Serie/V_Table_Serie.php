<table id="tabla_series" class="table table-bordered table-striped table-condensed ">
    <thead>
        <tr>
            <th>Description</th>
            <th>Dpendencia</th>
            <th>Codigo</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $v) : ?>
        <tr id="rol<?=$v->id_serie?>">
            <td id="desc<?=$v->id_serie ?>"><?=$v->serie?></td>
            <td val="<?=$v->id_dependencia?>" id="id_dependencia<?=$v->id_serie ?>"><?=$v->dependencia?></td>
            <td style="text-align: center;" val="<?=$v->codigo?>" id="codigo<?=$v->id_serie ?>"><?=$v->codigo?></td>
            <td style="text-align: center;" val="<?=$v->status?>" id="status<?=$v->id_serie ?>"><?=$v->description?></td>
            <td style="text-align: center;">
                <button type="button"  class="btn btn-info btn-xs btn-tabla" onclick="Update(<?=$v->id_serie?>)"><i class="fa fa-search"></i></button>
                <button type="button"  class="btn btn-danger btn-xs btn-tabla" onclick="Delete(<?=$v->id_serie?>,'<?=$v->serie?>')"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>