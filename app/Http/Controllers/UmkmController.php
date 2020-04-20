<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Umkm;
use App\Model\Product;
class UmkmController extends Controller
{
    //
    public function showUMKM(Request $req){
      validateRequest($req->all(),[
        'offset' => 'required',
        'limit' => 'required'
    ]);
     return showResponseSuccess(Umkm::select("id","umkm_name","owner","phone","logo","address","phone","fax","website")->offset($req->offset)->limit($req->limit)->get());
    }

    public function showProduct(Request $req){
        validateRequest($req->all(),[
            'offset' => 'required',
            'limit' => 'required',
            'umkm_id' => 'required'
        ]);
          return showResponseSuccess(
          	Product::select( "name","photo","price","umkm_id")
          	->offset($req->offset)
          	->where("umkm_id",$req->umkm_id)
          	->limit($req->limit)->get());
    }
}
