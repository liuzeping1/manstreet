<div class="col-md-8 products-right">
    <div class="products-right-grid">
        <div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
            <!--<div class="sorting">-->
            <!--<select id="country" onChange="change_country(this.value)" class="frm-field required sect">-->
            <!--<option value="null">服饰</option>-->
            <!--<option value="null">鞋子</option>-->
            <!--<option value="null">袜子</option>-->
            <!--<option value="null">领带</option>-->
            <!--</select>-->
            <!--</div>-->
            <!--<div class="sorting-left">-->
            <!--<select id="country1" onChange="change_country(this.value)" class="frm-field required sect">-->
            <!--<option value="null">春季</option>-->
            <!--<option value="null">夏季</option>-->
            <!--<option value="null">秋季</option>-->
            <!--<option value="null">冬季</option>-->
            <!--</select>-->
            <!--</div>-->
            <div class="clearfix"> </div>
        </div>
        <div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
            <img src="images/18.jpg" alt=" " class="img-responsive" />
            <div class="products-right-grids-position1">
                <h4>2016 New Collection</h4>
                <p>Temporibus autem quibusdam et aut officiis debitis aut rerum
                    necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae
                    non recusandae.</p>
            </div>
        </div>
    </div>
    <div class="products-right-grids-bottom">
        <?php foreach($goodsList as $goodskey): ?>
            <div class="col-md-4 products-right-grids-bottom-grid">
                <div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
                    <div class="new-collections-grid1-image">
                        <a href="single?goods_id=<?php echo $goodskey['goods_id'] ?>" class="product-image"><img src="<?php echo $goodskey['goods_img'] ?>" width="190px" height="190px" alt=" " class="img-responsive"></a>
                        <div class="new-collections-grid1-image-pos products-right-grids-pos">
                            <a href="single?goods_id=<?php echo $goodskey['goods_id'] ?>">产品详情</a>
                        </div>
                        <div class="new-collections-grid1-right products-right-grids-pos-right">
                            <div class="rating">

                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                    <h4><a href="single?goods_id=<?php echo $goodskey['goods_id'] ?>"><?php echo $goodskey['goods_name'] ?></a></h4>
                    <p><?php echo $goodskey['goods_brief'] ?></p>
                    <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                        <p><span class="item_price"><?php echo $goodskey['goods_price'] ?>&nbsp;&nbsp;RMB</span><a class="item_add0" href="single?goods_id=<?php echo $goodskey['goods_id'] ?>">产品详情 </a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="clearfix"> </div>
    </div>
    <nav class="" data-wow-delay=".5s">
        <ul class="pagination paging" style="margin-left:65px;margin-bottom:65px; " >

            <li><?php echo $goodsList->render(); ?></li>

        </ul>
    </nav>
</div>
<div class="clearfix"> </div>