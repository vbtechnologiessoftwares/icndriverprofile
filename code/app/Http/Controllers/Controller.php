<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
    	//constructor
    }

    public function getDatatableData($dataForm = array()){
        
        if(isset($dataForm['start'])){
           $data['offset'] = $dataForm['start'];
        }else{
            $data['offset'] = 0;
        }
        if(isset($dataForm['length'])){
           $data['length'] = $dataForm['length'];
        }else{
           $data['length'] = 10;
        }
        if(isset($dataForm['draw'])){
           $data['draw'] = $dataForm['draw'];
        }else{
           $data['draw'] = 1;
        }
        if(isset($dataForm['search'])){
            $searchParameters = $dataForm['search'];
            parse_str($dataForm['search']['value'], $searcharray);
            $data['conditions'] = $searcharray;
        }else{
            $data['conditions'] = array();
        }
        if(isset($dataForm['order'])){
            $orderColumnNumber = $dataForm['order'];
            $data['orderColumn'] = $orderColumnNumber[0]['column'];
        $data['orderMethod'] = $orderColumnNumber[0]['dir'];
    }else{
        $data['orderColumn'] = 1;
        $data['orderMethod'] = 'desc';
    }
     return $data;
    }
}
