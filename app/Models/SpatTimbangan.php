<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 2/21/2018
 * Time: 1:56 PM
 */

namespace App\Models;


class SpatTimbangan
{
    public function VByNoSpat($no_spat)
    {
        $query = $this->Query() . ' WHERE t_spta.no_spat = "'.$no_spat.'"';

        $results = app('db')->select($query);
        return $results;
    }

    public function VByNoLori($no_lori)
    {
        $query = $this->Query() . ' WHERE t_selektor.no_angkutan = "'.$no_lori.'"' .
        'and t_spta.selektor_status = "1" and t_spta.timb_netto_status = "0"';

        $results = app('db')->select($query);
        return $results;
    }

    public function ListPenimbangan($status)
    {
        $query = "";
        if($status == "selektor"){
            $query = $this->Query() . ' WHERE t_spta.selektor_status = "1" and t_spta.timb_netto_status = "0"';
        }elseif ($status == "ari"){
            $query = $this->Query() . ' WHERE t_spta.ari_status = "1" and t_spta.timb_netto_status = "0"';
        }elseif ($status == "bruto"){
            $query = $this->Query() . ' WHERE t_spta.timb_bruto_status = "1"';
        }elseif ($status == "netto"){
            $query = $this->Query() . ' WHERE t_spta.timb_netto_status = "1"';
        }

        $results = app('db')->select($query);
        return $results;
    }


    private function Query()
    {
        $qry = 'SELECT
                    t_spta.id,
                    t_spta.no_spat,
                    t_spta.kode_plant,
                    t_spta.kode_blok,
                    t_spta.persno_pta,
                    t_spta.id_petani_sap,
                    t_spta.tebang_pg,
                    t_spta.angkut_pg,
                    t_spta.kode_affd,
                    t_spta.kode_plant_trasnfer,
                    t_spta.metode_tma,
                    t_spta.ket,
                    t_spta.id_jenis_angkutan,
                    t_spta.selektor_status,
                    t_spta.selektor_tgl,
                    t_spta.pintu_masuk_status,
                    t_spta.pintu_masuk_tgl,
                    t_spta.timb_bruto_status,
                    t_spta.timb_bruto_tgl,
                    t_spta.timb_netto_status,
                    t_spta.timb_netto_tgl,
                    t_spta.meja_tebu_status,
                    t_spta.meja_tebu_tgl,
                    t_spta.ari_status,
                    t_spta.ari_tgl,
                    t_spta.hari_giling,
                    t_spta.tgl_giling,
                    t_spta.no_urut_analisa_rendemen,
                    sap_m_petani.nama AS nama_petani,
                    pta.`name` AS nama_pta,
                    t_spta.kode_kat_lahan,
                    t_selektor.tgl_tebang,
                    t_selektor.no_angkutan,
                    t_selektor.ptgs_angkutan,
                    t_selektor.ha_tertebang,
                    t_selektor.terbakar_sel,
                    t_selektor.ditolak_sel,
                    t_selektor.ditolak_alasan,
                    t_selektor.op_gl,
                    t_selektor.no_gl,
                    t_selektor.op_stipping,
                    t_selektor.no_stipping,
                    t_selektor.op_hv,
                    t_selektor.no_hv,
                    t_selektor.no_trainstat,
                    t_selektor.no_urut_timbang,
                    t_selektor.ptgs_pintumasuk,
                    t_selektor.tgl_pintumasuk,
                    t_selektor.tgl_selektor,
                    t_selektor.ptgs_selektor,
                    sap_field.deskripsi_blok,
                    kkw.`name` AS nama_kkw,
                    t_timbangan.transloading_status,
                    t_timbangan.bruto,
                    t_timbangan.tara,
                    t_timbangan.netto,
                    t_timbangan.lokasi_timbang_1,
                    t_timbangan.lokasi_timbang_2,
                    t_timbangan.id_timbangan,
                    t_timbangan.tgl_bruto,
                    t_timbangan.tgl_tara,
                    t_timbangan.tgl_netto,
                    t_timbangan.no_transloading,
                    t_timbangan.ptgs_transloading,
                    t_timbangan.ptgs_timbang_1,
                    t_timbangan.ptgs_timbang_2,
                    t_timbangan.tgl_transloading,
                    t_timbangan.multi_sling,
                    t_timbangan.train_stat,
                    t_timbangan.no_lori,
                    t_timbangan.netto_final,
                    t_timbangan.netto_rafaksi,
                    t_timbangan.rafaksi_prosentis
                    FROM
                    t_spta
                    LEFT JOIN sap_m_petani ON t_spta.id_petani_sap = sap_m_petani.Customer AND t_spta.id = sap_m_petani.Customer
                    LEFT JOIN sap_m_karyawan AS pta ON t_spta.persno_pta = pta.id_karyawan
                    LEFT JOIN t_selektor ON t_selektor.id_spta = t_spta.id
                    INNER JOIN sap_field ON t_spta.kode_blok = sap_field.kode_blok
                    INNER JOIN sap_m_affdeling AS aff1 ON t_spta.kode_affd = aff1.kode_affd
                    INNER JOIN sap_m_karyawan AS kkw ON aff1.Persno = kkw.Persno
                    LEFT JOIN t_timbangan ON t_spta.id = t_timbangan.id_spat';
        return $qry;
    }
}