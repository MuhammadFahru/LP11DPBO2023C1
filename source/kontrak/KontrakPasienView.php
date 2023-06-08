<?php

interface KontrakPasienView
{
    public function tampil();
    public function form($id);
    public function addData($nik, $nama, $tempat, $tl, $gender, $email, $telp);
    public function editData($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);
    public function deleteData($id);
}