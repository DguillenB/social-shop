<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Shop;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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
        
        return view('home', [
            'shops' => $shops
        ]);
    }
}
