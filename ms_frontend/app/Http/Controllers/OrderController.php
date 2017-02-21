<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    //确认订单页
    public function order()
    {
        return view('order/order');
    }
}
