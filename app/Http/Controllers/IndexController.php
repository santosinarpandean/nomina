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
        $data['list_bank']  = [
            'ANZ'       => '061',
            'ARTOS'     => '542',
            'ATMALUKU'  => '131',
            'ATM ARGO'  => '494',
            'BANKBTN'   => '200',
            'BANK BJB'  => '110',
            'BANK BP'   => '485',
            'BANK INA'  => '153',
            'BANK JATIM' => '114',
            'BANK KALBAR'=> '123',
            'BANK NTB'  => '128',
            'BANK NTT'  => '130',
            'BANK RIAU' => '118',
            'BANK SAUDARA' => '212',
            'BANK SULSES'   => '126',
            'BENGKULU'      => '133',
            'BII'       => '016',
            'BKALTENG'  => '125',
            'BKE'       => '535',
            'BMUTIARA'  => '095',
            'BNAGARI'   => '118',
            'BNI'      => '002',
            'BNO'       => '145',
            'BPD ACEH'  => '116',
            'BPD BALI'  => '129',
            'BPD DIY'   => '112',
            'BPD KALTIM' => '124',
            'BPD PAPUA' => '132',
            'BPD SUMUT' => '117',
            'BPR KS'    => '688',
            'BRI'      => '002',
            'BRIS'      => '422',
            'BSM'       => '051',
            'BSMI'      => '506',
            'BSULTENG'  => '134',
            'BSUMSEL'   => '120',
            'BTPN'      => '213',
            'BUKOPIN'   => '441',
            'BWI'       => '068',
            'CAPITAL'   => '054',
            'CIMB NIAGA' => '022',
            'CITIBANK'  => '031',
            'COMMBANK'  => '950',
            'DANAMON'   => '011',
            'DBS'       => '046',
            'DKI'       => '111',
            'EKONOMI'   => '087',
            'GANESHA'   => '161',
            'HSBC'      => '041',
            'INDEX'     => '555',
            'JABARSYA'  => '425',
            'JAMBI'     => '115',
            'JATENG'    => '113',
            'KALSEL'    => '122',
            'LAMPUNG'   => '121',
            'MANDIRI'   => '008',
            'MAYAPADA'  => '097',
            'MAYORA'    => '553',
            'MEGA'      => '426',
            'MESTIKA'   => '151',
            'MUAMALAT'  => '147',
            'NISP'      => '028',
            'NOBUBANK'  => '503',
            'PANIN'     => '019',
            'PERMATA'   => '013',
            'PUNDI'     => '558',
            'QNB K'     => '167',
            'RABOBANK'  => '089',
            'SINARMAS'  => '153',
            'STANCHRT'  => '050',
            'SULTRA'    => '135',
            'SULUT'     => '127',
            'SWADESI'   => '146',
            'UOB'       => '023',
            ];
         return view('/transfer',compact('data'));
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
