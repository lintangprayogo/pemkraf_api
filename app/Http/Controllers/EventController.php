<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;

class EventController extends Controller
{
   

public function showEvent(Request $req){
      validateRequest($req->all(),[
        'offset' => 'required',
        'limit' => 'required'
    ]);
     return showResponseSuccess(Event::select("id","event_name", "longitude","location","price","start_date","end_date","description","poster")->offset($req->offset)->limit($req->limit)->get());
    }

    
}


