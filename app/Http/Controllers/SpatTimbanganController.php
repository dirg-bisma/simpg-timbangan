<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 2/21/2018
 * Time: 1:56 PM
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\SpatTimbangan as Spat;

class SpatTimbanganController extends BaseController
{
    public function SearchByNoSpat($no_spat)
    {
        $spat = new Spat();
        $result = $spat->VByNoSpat($no_spat);

        if(count($result) == 1){
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

    public function SearchByNoLori($no_lori)
    {
        $spat = new Spat();
        $result = $spat->VByNoLori($no_lori);

        if(count($result) == 1){
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