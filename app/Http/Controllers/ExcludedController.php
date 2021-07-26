<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Excluded;


class ExcludedController extends Controller
{
    public function excludeShop($shop_id){
        // Recoger datos del usuario y la tienda
        $user = \Auth::user();
        
        // Condición para validar si el Like ya existe previamente
        $isset_exclusion = Excluded::where('user_id', $user->id)
                            ->where('shop_id', $shop_id)
                            ->count();
                
        if($isset_exclusion == 0){
            $excluded = new Excluded;
            $excluded->user_id = $user->id;
            $excluded->shop_id = (int)$shop_id;
            // Guardar 
            $excluded->save();
            
            return response()->json([
                'excluded' => $excluded
            ]);
        }else{
            return response()->json([
                'message' => 'La tienda ya está excluida.'
            ]);
        }                
    }
}
