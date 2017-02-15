
<?php foreach($list as $key => $val){ ?>
<div class="form-group">
    <div class="label">
        <?php echo $val['goods_attr_name']."："; ?>
    </div>
            <?php if($val['attr_input_type'] == 0){ ?>
    <div class="field">
        <input type="hidden" name="attr_id[]" value="<?= $val['attr_id'] ?>">
                <select name="attr_name[]" id="" style="width:230px;height: 40px;">
                    <?php foreach($val['new_attr_values'] as $k => $v){ ?>
                    <option value="<?php echo $v?>"><?php echo $v ?></option>
                    <?php }?>
                </select>
        <div class="tips"></div>
        </div>
            <?php }else{ ?>
        <div class="field">
            <input type="hidden" name="attr_id[]" value="<?= $val['attr_id'] ?>">
            <input type="text" name="attr_name[]" class="input w50">
            </div>
                <div class="tips"></div>
            <?php }?>
</div>
<?php }?>
