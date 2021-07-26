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
        $db_excluded = Excluded::where('user_id', $user->id)
                            ->where('shop_id', $shop_id)
                            ->first();
        
        if( is_null($db_excluded) ){
            $excluded = new Excluded;
            $excluded->user_id = $user->id;
            $excluded->shop_id = (int)$shop_id;
            $excluded->save();      // Guardar 
        }else{
            $excluded = Excluded::find($db_excluded->id);
            $excluded->touch();     // Actualizar
        }
        
        return response()->json([
                'excluded' => $excluded
            ]);
    }
}
