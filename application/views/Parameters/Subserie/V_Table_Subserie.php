<table id="tabla_subseries" class="table table-bordered table-striped table-condensed ">
    <thead>
        <tr>
            <th>Description</th>
            <th>Serie</th>
            <th>Codigo</th>
            <th>Status</th>
            <th>Dias Respuesta</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $v) : ?>
        <tr id="rol<?=$v->id_sub_serie?>">
            <td id="desc<?=$v->id_sub_serie ?>"><?=$v->subserie?></td>
            <td  val="<?=$v->id_serie?>" id="id_serie<?=$v->id_sub_serie ?>"><?=$v->serie?></td>
            <td style="text-align: center;" val="<?=$v->codigo?>" id="codigo<?=$v->id_sub_serie ?>"><?=$v->codigo?></td>
            <td style="text-align: center;" val="<?=$v->status?>" id="status<?=$v->id_sub_serie ?>"><?=$v->description?></td>
            <td style="text-align: center;" val="<?=$v->dias_respuesta?>" id="dias_respuesta<?=$v->id_sub_serie ?>"><?=$v->dias_respuesta?></td>
            <td style="text-align: center;">
                <button type="button"  class="btn btn-info btn-xs btn-tabla" onclick="Update(<?=$v->id_sub_serie?>)"><i class="fa fa-search"></i></button>
                <button type="button"  class="btn btn-danger btn-xs btn-tabla" onclick="Delete(<?=$v->id_sub_serie?>,'<?=$v->subserie?>')"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>