<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Shop;

class ShopController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(){
        // Devolvemos todas las tiendas paginadas de 10 en 10 y que no tengan un like por parte del usuario conectado
        
        $shops = DB::table('shops')->whereNotIn('id', function($q){
            // No mostrar las tiendas favoritas en lista de tiendas cercanas
            $user = \Auth::user();
            $q->select('shop_id')->from('likes')->where('user_id', '=', $user->id);
        })->whereNotIn('id', function($q){
            // No mostrar las tiendas excluidas por el usuario durante las siguientes dos horas;
            $user = \Auth::user();
            $now = time();
            $timeNextTwoHours = 2 * 60 * 60;
            $timeInPast = $now - $timeNextTwoHours;
            $q->select('shop_id')->from('excluded')->where('user_id', '=', $user->id)->where('updated_at', '>=', date('Y-m-d H:i:s',$timeInPast));
        })->orderBy('distance', 'asc')->paginate(10);
        
        return view('shop.index', [
            'shops' => $shops
        ]);
    }
    
    public function favorites(){
        // Devolvemos todas las tiendas paginadas de 10 en 10 y que no tengan un like por parte del usuario conectado
        $shops = DB::table('shops')->whereIn('id', function($q){
            $user = \Auth::user();
            $q->select('shop_id')->from('likes')->where('user_id', '=', $user->id);
        })->orderBy('distance', 'asc')->paginate(10);
        
        return view('shop.favorites', [
            'shops' => $shops
        ]);
    }
    
}
