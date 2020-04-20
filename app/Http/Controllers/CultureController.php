<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CultureSite;
class CultureController extends Controller
{
    //

    public function showCultureSite(Request $request){
    validateRequest($request->all(),[
        'offset' => 'required',
        'limit' => 'required'
    ]);

       return showResponseSuccess(CultureSite::select("id","object_name as name", "object_category as category","object_exist as exist","photo","object_address as address")->offset($request->offset)->limit($request->limit)->get());
    }
    
   
}
