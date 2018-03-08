<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 2/21/2018
 * Time: 8:51 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\SpatTimbangan;

class LaporanTimbanganController extends BaseController
{

    public function LaporanHarian($status)
    {
        $spat = new SpatTimbangan();
        if($status == 'ari'){
            $data['result'] = $spat->ListPenimbangan('selektor');
        }elseif($status == 'core'){
            $data['result'] = $spat->ListPenimbangan('ari');
        }
        $data['hasil'] = $spat->ListPenimbangan('netto');
        return view('laporan-timbangan.laporan_harian', $data);
    }


}