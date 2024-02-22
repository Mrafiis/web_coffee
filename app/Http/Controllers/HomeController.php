<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $role=Auth::user()->role;
         if($role=='owner'){
            return view('owner.owner');
         }
         if($role=='admin'){
            return view('admin.admin',compact('products'));
         }
        else{
            return view('dashboard');
        }
    }

    public function welcome(){
        return view('welcome');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('welcome')->with('success','Kamu Berhasil Logout');
    }
}
