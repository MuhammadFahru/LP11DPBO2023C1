<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");

$tp = new TampilPasien();

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == "form_add") {
        $tp->form();
    } elseif ($_GET['aksi'] == "form_edit") {
        $tp->form($_GET['id']);
    } elseif ($_GET['aksi'] == "delete") {
        $tp->deleteData($_GET['id']);
    }
} elseif (isset($_POST['add'])) {
    $tp->addData($_POST['nik'], $_POST['nama'], $_POST['tempat'], $_POST['tl'], $_POST['gender'], $_POST['email'], $_POST['telp']);
} elseif (isset($_POST['edit'])) {
    $tp->editData($_GET['id'], $_POST['nik'], $_POST['nama'], $_POST['tempat'], $_POST['tl'], $_POST['gender'], $_POST['email'], $_POST['telp']);
} else {
    $tp->tampil();
}