<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function like($shop_id){
        // Recoger datos del usuario y la tienda
        $user = \Auth::user();
        
        // Condición para validar si el Like ya existe previamente
        $isset_like = Like::where('user_id', $user->id)
                            ->where('shop_id', $shop_id)
                            ->count();
        
        if($isset_like == 0){
            $like = new Like();
            $like->user_id = $user->id;
            $like->shop_id = (int)$shop_id;

            // Guardar 
            $like->save();
            
            return response()->json([
                'like' => $like
            ]);
        }else{
            return response()->json([
                'message' => 'El like ya existe'
            ]);
        }                
    }
    
    public function dislike($shop_id){
        // Recoger datos del usuario y la tienda
        $user = \Auth::user();
        
        // Condición para validar si el Like ya existe previamente
        $like = Like::where('user_id', $user->id)
                            ->where('shop_id', $shop_id)
                            ->first();
        
        if($like){
            // Eliminar like
            $like->delete();
            
            return response()->json([
                'like' => $like,
                'message' => 'Dislike ok'
            ]);
        }else{
            return response()->json([
                'message' => 'El like no existe'
            ]);
        }         
    }
}
