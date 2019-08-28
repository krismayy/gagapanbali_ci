<?php

class Generateid {
    public function idtoko($tipe, $id) {
        $split = explode($tipe, $id);
        $increment = (int) $split[1] + 1;
        $digit = strlen($split[1]) - strlen($increment);
        $combined = substr($split[1], 0, $digit) . $increment;
        $result = $tipe . '' . $combined;

        return $result;
    }
    public function idcust($tipe, $id) {
        $split = explode($tipe, $id);
        $increment = (int) $split[1] + 1;
        $digit = strlen($split[1]) - strlen($increment);
        $combined = substr($split[1], 0, $digit) . $increment;
        $result = $tipe . '' . $combined;

        return $result;
    }

    public function fromTanggal($tipe, $id, $tanggal) {
        $tanggalFormat = str_replace('-', '', $tanggal);
        $split = explode($tanggalFormat, $id);
        $newDate = date('Ymd');
        
        $increment = (int) $split[1] + 1;
        $digits = strlen($split[1]) - strlen($increment);
        $combined = substr($split[1], 0, $digits) . $increment;
        $result = $tipe . '' . $newDate . '' . $combined;

        return $result;
    }
}

/*
// Kode ini sampe bawah jangan di copy
$generate = new Generate;
// parameter no 2 kamu harus ambil dulu id terakhir dari tabel tertentu kris, baru masukkin id nya
// kayak TOK000001
$kodeBiasa = $generate->kode('TOK', 'TOK000099');

// ini kalau pake tanggal, parameter ke tiga harus tanggal dengan format tahun-bulan-tanggal,
// kan defaultnya mysql juga gitu formatnya
$kodeTanggal = $generate->fromTanggal('TR', 'TR20190526009', '2019-05-26');

echo '<strong>Kode Biasa</strong> : ' . $kodeBiasa . '<br><br>';
echo '<strong>Kode Tanggal</strong> : ' . $kodeTanggal;

function buatKode($nomor_terakhir, $kunci, $jumlah_karakter = 0) {
    $nomor_baru = intval(substr($nomor_terakhir, strlen($kunci))) + 1;
    $nomor_baru_plus_nol = str_pad($nomor_baru, $jumlah_karakter, '0', STR_PAD_LEFT);
    $kode = $kunci . $nomor_baru_plus_nol;

    return $kode;
}

echo '<br>';

// echo buatKode('9', 'HNR', 6);
echo intval('TOK000001');
*/