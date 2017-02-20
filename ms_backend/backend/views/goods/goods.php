<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>完整demo</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="utf8-php/ueditor.all.min.js"> </script>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<!--    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>-->


</head>
<body>
<div class="panel admin-panel">
    <form method="post" class="form-x" action="?r=goods/add" enctype="multipart/form-data">
        <li>
        <a class="button border-main icon-plus-square-o" id="nature"> 商品添加</a>
        <button type="button" class="button border-yellow" id="nature2"><span class="icon-plus-square-o"></span> 添加属性</button>
        </li>
    <div class="body-content"  id="content">

                        <div class="form-x">
                            <div class="form-group">
                                <div class="label">
                                    <label>分类：</label>
                                </div>
                                <div class="field">

                                    <select name="cat_id" style="width:230px;height: 40px;" >
                                      <?php foreach ($name as $k=>$v){?>
                                            <option value="<?php echo $v['cat_id']?>"><?php echo $v['cat_name']?></option>
                                        <?php }?>
                                    </select>

                                    <div class="tips"></div>
                                </div>
                            </div>
            <div class="form-group">
                <div class="label">
                    <label>商品名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="goods_name" data-validate="required:请输入商品名称" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>商品价格：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="goods_price" data-validate="required:请输入商品价格" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>商品数量：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="goods_number" data-validate="required:请输入商品数量" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>商品货号：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="goods_sn" data-validate="required:请输入商品货号" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>商品排序：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="sort" data-validate="required:请输入商品排序" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>商品是否促销：</label>
                </div>
                <div class="field">
                    <div class="tips" id="is_promote">

                        <input type="radio"  value="1" name="is_promote" id="is_promot" />是
                        <input type="radio"  value="0" name="is_promote" id="is_promot" checked="checked" />否</div>

                </div>
            </div>
            <div class="form-group" style="display:none;" id="form-group">
                <div class="label">
                    <label>商品促销：</label>
                </div>
                <div class="field">
                    <table>
                        <tr>
                            <td><input type="text" class="input w500" value="" name="promote_start_date"  />开始促销时间</td>
                        </tr>
                        <tr>
                            <td><input type="text" class="input w500" value="" name="promote_end_date"  />结束促销时间</td>
                        </tr>
                        <tr>
                            <td><input type="text" class="input w500" value="" name="promote_price"  />促销价格</td>
                        </tr>
                    </table>
                    <div class="tips"></div>
                </div>

            </div>
            <div class="form-group">
                <div class="label">
                    <label>商品是否热销：</label>
                </div>
                <div class="field">
                    <div class="tips">
                        <input type="radio"  value="1" name="is_hot" />是
                        <input type="radio"  value="0" name="is_hot" checked="checked" />否
                    </div>
                </div>
            </div>
            <div class="form-group">
                                <div class="label">
                                    <label>商品是否新品：</label>
                                </div>
                                <div class="field">
                                    <div class="tips">
                                        <input type="radio"  value="1" name="is_new" checked="checked"/>是
                                        <input type="radio"  value="0" name="is_new"  />否
                                    </div>
                                </div>
                            </div>
            <div class="form-group">
                <div class="label">
                    <label>商品是否在售：</label>
                </div>
                <div class="field">
                    <div class="tips">
                        <input type="radio"  value="1" name="is_on_sale" checked="checked" />在售
                        <input type="radio"  value="0" name="is_on_sale" />下架</div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>商品图片：</label>
                </div>
                <div class="field">
                    <input type="file"  value="" name="goods_img" data-validate="required:请输入图片" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>商品简短内容：</label>
                </div>
                <div class="field">
                    <textarea class="input" name="goods_brief" style=" height:90px;"></textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>内容：</label>
                </div>
                <div class="field">
                    <div>

                        <script id="editor" type="text/plain" style="width:1024px;height:500px;" name="goods_desc"></script>
                    </div>
                </div>
            </div>
                            <div class="form-group">
                                <div class="label">
                                    <label></label>
                                </div>
                                <div class="field">
                                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                                </div>
                            </div>


    </div>



        </div>
    <div class="body-content" style="display:none;"id="content1">
        <div class="form-group">
            <div class="label">
                <label>商品属性：</label>
            </div>
            <div class="field">
                <select name="goods_attr_id" style="width:230px;height: 40px;" id="attr_id">
                    <option>请选择商品属性</option>
                    <?php foreach ($type as $kk=>$vv){?>
                        <option value="<?php echo $vv['cat_goods_id']?>"><?php echo $vv['cat_name']?></option>
                    <?php }?>
                </select>

            </div>
            <div id="box"></div>
        </div>
        <div class="form-group">
            <div class="label">
                <label></label>
            </div>
            <div class="field">
                <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
            </div>
        </div>
        </div>

    </form>

</div>
<script type="text/javascript">
    //商品属性类型
    $(function(){
        $(document).on('change','#attr_id',function(){
            var attr_id = $(this).val();
            var url = "?r=goods/type";
            $.get(url,{'attr_id':attr_id},function(msg){
                $('#box').html(msg);
            })
        })
    })
    //属性切换
    $('#nature').click(function(){

        $('#content').show();
    })
    $('#nature2').click(function(){

        $('#content1').show();
        $('#content').hide();
    })
    //促销
    $('#is_promote').click(function(){

        var is_promote=$("[name='is_promote']:checked").val();
        if(is_promote==1)
        {
            $('#form-group').show();

        }else
        {

            $('#form-group').hide();
        }
    })
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("getContent()");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr);
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
</body></html>
