<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 2/26/2018
 * Time: 9:45 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Lori;
use App\Models\VwTimbangan;
use App\Models\NoLoko;

class LoriController extends BaseController
{

    public function TaraByNoLori($no_lori)
    {
        $lori = new Lori();
        $result = $lori->where('nolori', $no_lori)->first();
        return $result;
    }

    public function DataCetakLori($train_stat, $no_loko)
    {
        $vw_timbangan = new VwTimbangan();
        $vw_timbangan->where('train_stat', $train_stat);
        $vw_timbangan->where('no_loko', $no_loko);
        $result = $vw_timbangan->get();

        if(count($result) > 0){
            foreach ($result[0] as $key => $value) {
                if (is_null($value)) {
                    $result[0]->$key = "";
                }
            }
            $output = array(
                'result' => $result,
                'count' => count($result),
                'msg' => 'success',
                'status' => 'true'
            );
        }else{
            $output = array(
                'result' => [],
                'count' => count($result),
                'msg' => 'data not found',
                'status' => 'false'
            );
        }

        return $output;
    }

    public function NoLoko()
    {
        $no_loko = new NoLoko();
        $result = $no_loko->select('*')->get();

        if(count($result) > 0){
            foreach ($result[0] as $key => $value) {
                if (is_null($value)) {
                    $result[0]->$key = "";
                }
            }
            $output = array(
                'result' => $result,
                'count' => count($result),
                'msg' => 'success',
                'status' => 'true'
            );
        }else{
            $output = array(
                'result' => [],
                'count' => count($result),
                'msg' => 'data not found',
                'status' => 'false'
            );
        }

        return $output;
    }
}