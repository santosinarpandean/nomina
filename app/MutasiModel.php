<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class MutasiModel extends Model
{
    //
    protected $table = 'mutasi';
    protected $guarded = [];

    static function getListMutasi(){
        return self::where('id_user',auth::user()->id)
                    ->get();
    }
}
