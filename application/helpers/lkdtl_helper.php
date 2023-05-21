<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function conver_dtl($nowo, $tipe_form, $data_array, $user)
{
    switch ($tipe_form) {
        case 'frm_001':
            return convert_to_frm_001($nowo, $data_array, $user);
            break;
        case 'frm_002':
            return convert_to_frm_002($nowo, $data_array, $user);
            break;
        case 'frm_003':
            return convert_to_frm_003($nowo, $data_array, $user);
            break;
        case 'frm_004':
            return convert_to_frm_004($nowo, $data_array, $user);
            break;
        default:
            return null;
            break;
    }
}

function  convert_to_frm_001($nowo, $data_array, $user)
{
    $array_result = array();

    foreach ($data_array as $r) {
        array_push($array_result, array(
            "wo_no" => $nowo, "nama_alat" => $r["nama_alat"], "merk" => $r["merk"],  "tipe_alat" => $r["tipe_alat"],
            "no_seri" => $r["no_seri"], "resolusi" => $r["resolusi"], "created_by" => $user, "created_date" => date("Y-m-d H:i:s")
        ));
    }

    return $array_result;
}

function convert_to_frm_002($nowo, $data_array, $user)
{
    $array_result = array();
    foreach ($data_array as $r) {
        array_push($array_result, array(
            "wo_no" => $nowo, "sebelum_kalibrasi" => 0, "sesudah_kalibrasi" => 0, "param" => $r["param"],
            "satuan" => $r["satuan"], "ambang_batas" => $r["ambang_batas"], "opt" => $r["opt"], "toleransi_angka" =>  $r["toleransi_angka"],
            "toleransi_persen" => $r["toleransi_persen"], "created_by" => $user, "created_date" => date("Y-m-d H:i:s")
        ));
    }

    return $array_result;
}

function convert_to_frm_003($nowo, $data_array, $user)
{
    $array_result = array();
    foreach ($data_array as $r) {
        array_push($array_result, array(
            "wo_no" => $nowo,  "bagian" => $r["bagian"], "created_by" => $user, "created_date" => date("Y-m-d H:i:s")
        ));
    }

    return $array_result;
}

function convert_to_frm_004($nowo, $data_array, $user)
{
    $array_result = array();
    foreach ($data_array as $r) {
        array_push($array_result, array(
            "wo_no" => $nowo, "hasil_ukur" => 0, "param" => $r["Parameter"],
            "satuan" => $r["satuan"], "ambang_batas" => $r["ambang_batas"], "opt" => $r["opt"], "toleransi_angka" =>  $r["toleransi_angka"],
            "toleransi_persen" => $r["toleransi_persen"], "created_by" => $user, "created_date" => date("Y-m-d H:i:s")
        ));
    }

    return $array_result;
}
