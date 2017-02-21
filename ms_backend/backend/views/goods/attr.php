<?php foreach($list as $key => $val){ ?>
    <div class="form-group">
        <div class="label">
            <?php echo $val['goods_attr_name']."："; ?>
        </div>
        <?php if($val['attr_input_type'] == 0){ ?>
            <div class="field">
                <input type="hidden" name="attr_id[<?php echo $key?>]" value="<?= $val['attr_id'] ?>">


                <?php foreach($val['new_attr_values'] as $k => $v){ ?>
                    <table>
                        <tr>
                            <td> <?php echo $v ?></td>
                            <td>  <input type="checkbox" style="width:30px;height: 0px;" name="attr_name[<?php echo $key?>][]" value="<?php echo $v?>"></td>
                        </tr>
                    </table>

                <?php }?>

                <div class="tips"></div>
            </div>
        <?php }else{ ?>
            <div class="field">
                <input type="hidden" name="attr_id[<?php echo $key?>]" value="<?= $val['attr_id'] ?>">
                <input type="text" name="attr_name[<?php echo $key?>][]" class="input w50">
            </div>
            <div class="tips"></div>
        <?php }?>
    </div>
<?php }?>