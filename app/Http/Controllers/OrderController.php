<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    // order owner
    public function index(){
        return view('owner.order');
    }

    // order admin
    public function order(){
        return view('admin.order');
    }
}
