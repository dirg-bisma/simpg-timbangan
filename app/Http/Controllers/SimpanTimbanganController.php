<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 2/21/2018
 * Time: 2:42 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Timbangan;
use App\Models\Spat;
use App\Models\Selektor;
use Mockery\Exception;

class SimpanTimbanganController extends BaseController
{
    public function SimpanDcs(Request $request)
    {
        try{
            $spatCek = new Spat();
            $id_spat = $spatCek->where('no_spat', $request->input('no_spat'))->first();

            $timbangan = new Timbangan();
            $timbangan->id_spat = $id_spat->id;
            $timbangan->bruto = "0";
            $timbangan->tara = "0";
            $timbangan->netto = $request->input('netto');
            $timbangan->netto_final = $request->input('netto');
            $timbangan->tgl_netto = date('Y-m-d H:i:s');
            $timbangan->tgl_tara = date('Y-m-d H:i:s');
            $timbangan->tgl_bruto = date('Y-m-d H:i:s');
            $timbangan->lokasi_timbang_1 = $request->input('kode_timbangan');
            $timbangan->ptgs_timbang_1 = $request->input('ptgs_timbang');

            if($request->input('transloading_status') == 1){
                $timbangan->transloading_status = $request->input('transloading_status');
                $timbangan->no_transloading = $request->input('no_transloading');
                $timbangan->ptgs_transloading = $request->input('ptgs_timbang');
                $timbangan->tgl_transloading = date('Y-m-d H:i:s');
            }
            $timbangan->multi_sling = $request->input('multi_sling');

            $timbangan->save();

            /**
            $spat = new Spat();
            $data_spat = array(
                'timb_bruto_status' => "1",
                'timb_bruto_tgl' => date('Y-m-d H:i:s'),
                'timb_netto_status' => "1",
                'timb_netto_tgl' => date('Y-m-d H:i:s')
            );
            $spat->where('id', $id_spat->id);
            $spat->update($data_spat);
             */
            $result = array(
                'msg' => $request->input('no_spat'),
                'status' => 'true'
            );
            return $result;
        }catch (Exception $ex){
            $result = array(
                'msg' => $ex,
                'status' => 'false'
            );

            return $result;
        }

    }

    public function SimpanBrutoJembatan(Request $request)
    {
        try{
            $spatCek = new Spat();
            $id_spat = $spatCek->where('no_spat', $request->input('no_spat'))->first();

            $timbangan = new Timbangan();
            $timbangan->id_spat = $id_spat->id;
            $timbangan->bruto = $request->input('bruto');
            $timbangan->tgl_bruto = date('Y-m-d H:i:s');
            $timbangan->lokasi_timbang_1 = $request->input('kode_timbangan');
            $timbangan->ptgs_timbang_1 = $request->input('ptgs_timbang');

            $timbangan->save();

            /*
            $spat = new Spat();
            $data_spat = array(
                'timb_bruto_status' => "1",
                'timb_bruto_tgl' => date('Y-m-d H:i:s'),

            );
            $spat->where('id', $id_spat->id);
            $spat->update($data_spat);
            */

            $result = array(
                'msg' => $request->input('no_spat'),
                'status' => 'true'
            );
            return $result;

        }catch (Exception $ex){
            $result = array(
                'msg' => $ex,
                'status' => 'false'
            );

        return $result;
        }

    }

    public function SimpanNettoJembatan(Request $request)
    {
        try{
            $spatCek = new Spat();
            $id_spat = $spatCek->where('no_spat', $request->input('no_spat'))->first();
            $cekTimbangan = new Timbangan();
            $resultCek = $cekTimbangan->where('id_spat', $id_spat->id)->first();
            $data_netto = ['tara' => $request->input('tara'),
                'netto' => $request->input('netto'),
                'netto_final' => $request->input('netto'),
                'tgl_netto' => date('Y-m-d H:i:s'),
                'tgl_tara' => date('Y-m-d H:i:s'),
                'lokasi_timbang_2' => $request->input('kode_timbangan'),
                'ptgs_timbang_2' => $request->input('ptgs_timbang'),];




            if($request->input('transloading_status') == 1){
                $data_netto += ['transloading_status' => $request->input('transloading_status'),
                    'no_transloading' => $request->input('no_transloading'),
                    'ptgs_transloading' => $request->input('ptgs_transloading'),
                    'tgl_transloading' => date('Y-m-d H:i:s'),];
            }

            \DB::table('t_timbangan')
                ->where('id_timbangan', $resultCek->id_timbangan)
                ->update($data_netto);

            /*
            $spat = new Spat();
            $data_spat = array(
                'timb_netto_status' => "1",
                'timb_netto_tgl' => date('Y-m-d H:i:s')
            );
            $spat->where('id', $id_spat->id);
            $spat->update($data_spat);
            */

            $result = array(
                'msg' => $request->input('no_spat'),
                'status' => 'true'
            );
            return $result;

        }catch (Exception $ex){
            $result = array(
                'msg' => $ex,
                'status' => 'false'
            );

            return $result;
        }


    }


    public function SimpanNettoLori(Request $request)
    {
        try{
            $spatCek = new Spat();
            $id_spat = $spatCek->where('no_spat', $request->input('no_spat'))->first();

            $timbangan = new Timbangan();
            $timbangan->id_spat = $id_spat->id;
            $timbangan->bruto = $request->input('bruto');
            $timbangan->tgl_bruto = $request->input('tgl_timbang');
            $timbangan->lokasi_timbang_1 = $request->input('kode_timbangan');
            $timbangan->ptgs_timbang_1 = $request->input('ptgs_timbang');
            $timbangan->tara = $request->input('tara');
            $timbangan->netto = $request->input('netto');
            $timbangan->netto_final = $request->input('netto');
            $timbangan->tgl_netto = $request->input('tgl_timbang');
            $timbangan->tgl_tara = $request->input('tgl_timbang');
            $timbangan->lokasi_timbang_2 = $request->input('kode_timbangan');
            $timbangan->ptgs_timbang_2 = $request->input('ptgs_timbang');
            $timbangan->no_lori = $request->input('no_lori');
            $timbangan->train_stat = $request->input('train_stat');
            $timbangan->no_loko = $request->input('no_loko');
            $timbangan->save();

            $selektor = new Selektor();
            $data_selektor = array(
                'no_kendaraan' => $request->input('no_kendaraan')
            );

            $selektor->where('id_spta', $id_spat->id);
            $selektor->update($data_selektor);

            /**
            $spat = new Spat();
            $data_spat = array(
                'timb_netto_status' => "1",
                'timb_netto_tgl' => $request->input('tgl_timbang')
            );
            $spat->where('id', $id_spat->id);
            $spat->update($data_spat);
             */

            $result = array(
                'msg' => $request->input('no_spat'),
                'status' => 'true'
            );
            return $result;

        }catch (Exception $ex){
            $result = array(
                'msg' => $ex,
                'status' => 'false'
            );

            return $result;
        }


    }
}