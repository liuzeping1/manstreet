<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProductModel;
use DB;

class ProductController extends Controller
{
    //商品列表页
    public function product()
    {
        //展示男人街商品分类
        $categoryList = ProductModel::all();
        //展示所有商品在分类下的种类数量

        //展示男人街热卖商品
        $hotGoods = DB::table('man_goods')
                    ->where('is_hot','=','1')
                    ->limit(5)
                    ->get();
        //dd($hotGoods);
        //展示主页上面的所有商品信息
        $goodsList = DB::table('man_goods')->paginate(12);
        //商品分类页面的所有文章信息
        $articleList = DB::table('man_article')->limit(10)->get();

        return view('product/product',['categoryList'=>$categoryList,'hotGoods'=>$hotGoods,'goodsList'=>$goodsList,'articleList'=>$articleList]);
    }


    //分类页面替换页面展示
    public function updateReplace(Request $r)
    {
        $cat_id = $r->input('cat_id');
        //查询在分类下的所有数据
        $goodsList = DB::table('man_goods')
                              ->join('man_category','man_goods.cat_id','=','man_category.cat_id')
                              ->where(array('man_category.cat_id'=>$cat_id))
                              ->paginate(9);
        return view('product/replace',['goodsList'=>$goodsList]);
    }
}
