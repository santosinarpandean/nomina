<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\MutasiModel     as mutasi;
use App\User            as users;
use DB;
use Auth;

class IndexController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        return view('/dashboard');
    }

    public function transfer(){
         return view('/transfer');
    }

    public function doTransfer(){
        $input              = input::except('_token');
        $input['id_user']   = auth::user()->id;
        DB::beginTransaction();
        try{
            session()->flash('result','Transfer success, you can check the mutation');
            mutasi::create($input);

            //update saldo member
            users::updateSaldoMember($input['jumlah']);

            DB::commit();
            return redirect()->back();
        }catch(\ErrorException $e){
            DB::rollback();
            session()->flash('result',$e->getMessage());
            return redirect()->back();
        }
    }

    public function mutasi(){
        $data       = mutasi::getListMutasi();
        return view('/mutasi',compact('data'));
    }
}
