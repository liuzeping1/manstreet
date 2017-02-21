<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\ArticleModel;

class ArticleController extends Controller
{
    //文章展示页面
    public function index(Request $r)
    {
        //展示文章的详情
        $art_id = $r->input('art_id');
        $articleList = ArticleModel::where(array('art_id'=>$art_id))->first();
        return view('article/article',['articleList'=>$articleList]);
    }

}
