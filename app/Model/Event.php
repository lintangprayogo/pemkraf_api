<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function showEvent(Request $req){
      validateRequest($req->all(),[
        'offset' => 'required',
        'limit' => 'required'
    ]);
     return showResponseSuccess(Event::get()->offset($req->offset)->limit($req->limit)->get());
    }
}
