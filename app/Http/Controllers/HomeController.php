<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

       

        $productCount = Product::count();
        $productSold = Product::where('status', '=' ,'sold')->count();


        return view('admin.dashboard',compact(['productCount', 'productSold']));
        // dd('controller');
    }
}
