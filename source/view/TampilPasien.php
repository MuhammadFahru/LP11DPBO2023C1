<?php

include_once("kontrak/KontrakPasien.php");
include_once("presenter/ProsesPasien.php");

class TampilPasien implements KontrakPasienView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
				<a href='index.php?aksi=form_edit&id=" . $this->prosespasien->getId($i) . "' class='btn btn-warning'>Edit</a>
            	<a href='index.php?aksi=delete&id=" . $this->prosespasien->getId($i) . "' class='btn btn-danger confirmation'>Delete</a>
        	</td>";
		}

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode DATA_TABEL dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function form($id = null)
	{
		// Membaca template form.html
		$this->tpl = new Template("templates/form.html");

		if ($id) {
			// Mengganti kode DATA_TITLE dengan data yang sudah diproses
			$this->tpl->replace("DATA_TITLE", 'Edit');

			$this->prosespasien->prosesDataPasien();
			
			for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
				if ($id == $this->prosespasien->getId($i)) {

					$select_male = ($this->prosespasien->getGender($i) == 'Laki-laki') ? 'selected' : "";
					$select_female = ($this->prosespasien->getGender($i) == 'Perempuan') ? 'selected' : "";
					$options_gender = '
						<option value="">Pilih Gender</option>
						<option value="Laki-laki" ' . $select_male . '>Laki-laki</option>
						<option value="Perempuan" ' . $select_female . '>Perempuan</option>
					';

					// Mengganti kode DATA_VAL_NIK dengan data yang sudah diproses
					$this->tpl->replace("DATA_VAL_NIK", $this->prosespasien->getNik($i));

					// Mengganti kode DATA_VAL_NAMA dengan data yang sudah diproses
					$this->tpl->replace("DATA_VAL_NAMA", $this->prosespasien->getNama($i));

					// Mengganti kode DATA_VAL_TEMPAT dengan data yang sudah diproses
					$this->tpl->replace("DATA_VAL_TEMPAT", $this->prosespasien->getTempat($i));

					// Mengganti kode DATA_VAL_TL dengan data yang sudah diproses
					$this->tpl->replace("DATA_VAL_TL", $this->prosespasien->getTl($i));

					// Mengganti kode OPTIONS_GENDER dengan data yang sudah diproses
					$this->tpl->replace("OPTIONS_GENDER", $options_gender);

					// Mengganti kode DATA_VAL_EMAIL dengan data yang sudah diproses
					$this->tpl->replace("DATA_VAL_EMAIL", $this->prosespasien->getEmail($i));

					// Mengganti kode DATA_VAL_TELP dengan data yang sudah diproses
					$this->tpl->replace("DATA_VAL_TELP", $this->prosespasien->getTelp($i));
				}
			}

			// Mengganti kode DATA_LINK dengan data yang sudah diproses
			$this->tpl->replace("DATA_LINK", 'index.php?id=' . $id . '');

			// Mengganti kode DATA_BUTTON dengan data yang sudah diproses
			$this->tpl->replace("DATA_BUTTON", '<button type="submit" name="edit" class="btn btn-warning">Update</button>');
		} else {
			$options_gender = '
				<option value="">Pilih Gender</option>
				<option value="Laki-laki">Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			';

			// Mengganti kode DATA_TITLE dengan data yang sudah diproses
			$this->tpl->replace("DATA_TITLE", 'Tambah');

			// Mengganti kode DATA_LINK dengan data yang sudah diproses
			$this->tpl->replace("DATA_LINK", 'index.php');

			// Mengganti kode OPTIONS_GENDER dengan data yang sudah diproses
			$this->tpl->replace("OPTIONS_GENDER", $options_gender);

			// Mengganti kode DATA_BUTTON dengan data yang sudah diproses
			$this->tpl->replace("DATA_BUTTON", '<button type="submit" name="add" class="btn btn-primary">Simpan</button>');
		}

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function addData($nik, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		$this->prosespasien->addDataPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp);
		header("location:index.php");
	}

	function editData($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		$this->prosespasien->editDataPasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);
		header("location:index.php");
	}

	function deleteData($id)
	{
		$this->prosespasien->deleteDataPasien($id);
		header("location:index.php");
	}
}
