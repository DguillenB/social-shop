<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(){
        $shops = DB::table('shops')->orderBy('distance', 'asc')->paginate(10);
        return view('shop.index', [
            'shops' => $shops
        ]);
    }
    
}
