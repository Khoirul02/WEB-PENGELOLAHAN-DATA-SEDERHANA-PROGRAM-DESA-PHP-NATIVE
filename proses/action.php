<?php
date_default_timezone_set('Asia/Jakarta');
$action = $_GET['action'];
if(isset($_GET['data'])){
    $data = $_GET['data'];
}else{
    $data = "";
}
if ($data == 'program') {
    if ($action == 'tambah') {
        include "../connection/config.php";
        //pokok
        $nik_pokok = mysqli_real_escape_string($connect, $_POST['nik_pokok']);
	    $nama_pokok = mysqli_real_escape_string($connect, $_POST['nama_pokok']);
	    $kohort_pokok = mysqli_real_escape_string($connect, $_POST['kohort_pokok']); 
	    $no_id_bdt_pokok = mysqli_real_escape_string($connect, $_POST['no_id_bdt_pokok']); 
	    $alamat_pokok = mysqli_real_escape_string($connect, $_POST['alamat_pokok']);
        //key 
	    $key_pokok = mysqli_real_escape_string($connect, md5($nik_pokok));
        //art
        $nama_art = mysqli_real_escape_string($connect, $_POST['nama_art']);
	    $tempat_lahir_art = mysqli_real_escape_string($connect, $_POST['tempat_lahir_art']);
	    $tgl_lahir_art = mysqli_real_escape_string($connect, $_POST['tgl_lahir_art']); 
	    $ket_art = mysqli_real_escape_string($connect, $_POST['ket_art']); 
	    $status_art = mysqli_real_escape_string($connect, $_POST['status_art']); 
        //penghasilan
	    $nama_penghasilan = mysqli_real_escape_string($connect, $_POST['nama_penghasilan']); 
	    $pekerjaan_penghasilan = mysqli_real_escape_string($connect, $_POST['pekerjaan_penghasilan']); 
	    $hasil_bulanan = mysqli_real_escape_string($connect, $_POST['hasil_bulanan']); 
	    $status_penghasilan = mysqli_real_escape_string($connect, $_POST['status_penghasilan']);
        //sosial
        $nama_aset_sosial = mysqli_real_escape_string($connect,$_POST['nama_aset_sosial']);
	    $jumlah_sosial = mysqli_real_escape_string($connect,$_POST['jumlah_sosial']); 
	    $sat_sosial = mysqli_real_escape_string($connect,$_POST['sat_sosial']); 
	    $nilai_perkiran_sosial = mysqli_real_escape_string($connect,$_POST['nilai_perkiran_sosial']);
	    $status_aset_sosial = mysqli_real_escape_string($connect,$_POST['status_aset_sosial']);
        //potensi
        $ketrampilan_art_potensi = mysqli_real_escape_string($connect, $_POST['ketrampilan_art_potensi']); 
	    $sda_potensi = mysqli_real_escape_string($connect, $_POST['sda_potensi']); 
	    $sdl_potensi = mysqli_real_escape_string($connect, $_POST['sdl_potensi']); 
	    $usaha_ekonomi_potensi = mysqli_real_escape_string($connect, $_POST['usaha_ekonomi_potensi']);
        //usaha
        $nama_usaha = mysqli_real_escape_string($connect, $_POST['nama_usaha']);
	    $omset_usaha = mysqli_real_escape_string($connect, $_POST['omset_usaha']);
	    $keuntungan_usaha = mysqli_real_escape_string($connect, $_POST['keuntungan_usaha']);
        //catatan
        $foto_kondisi_rumah_catatan = mysqli_real_escape_string($connect,$_FILES['foto_kondisi_rumah_catatan']['name']);
	    $keterangan_lain_catatan = mysqli_real_escape_string($connect,$_POST['keterangan_lain_catatan']); 
	    $status_ekonomi_catatan = mysqli_real_escape_string($connect,$_POST['status_ekonomi_catatan']);
	    $kelayakan_catatan = mysqli_real_escape_string($connect,$_POST['kelayakan_catatan']);
        //pihak
        $nama_pihak = mysqli_real_escape_string($connect, $_POST['nama_pihak']);
	    $jabatan_pihak = mysqli_real_escape_string($connect, $_POST['jabatan_pihak']);
	    $alamat_pihak = mysqli_real_escape_string($connect, $_POST['alamat_pihak']);
        //sql pokok
        $sql_pokok = "INSERT INTO pokok(nik_pokok,nama_pokok,kohort_pokok,no_id_bdt_pokok,alamat_pokok,key_pokok)VALUE('$nik_pokok','$nama_pokok','$kohort_pokok','$no_id_bdt_pokok','$alamat_pokok','$key_pokok')";
        $simpan_pokok = mysqli_query($connect, $sql_pokok);
        if (!$simpan_pokok) {
            die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                            " - " . mysqli_error($connect));
        } else {
            //sql art
            $sql_art = "INSERT INTO art(nama_art,tempat_lahir_art,tgl_lahir_art,ket_art,status_art,key_pokok)VALUE('$nama_art','$tempat_lahir_art','$tgl_lahir_art','$ket_art','$status_art','$key_pokok')";
            $simpan_art = mysqli_query($connect, $sql_art);
            if (!$simpan_art) {
                die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                                " - " . mysqli_error($connect));
            } else {
                //sql penghasilan
                $sql_penghasilan = "INSERT INTO penghasilan(nama_penghasilan,pekerjaan_penghasilan,hasil_bulanan,status_penghasilan,key_pokok)VALUE('$nama_penghasilan','$pekerjaan_penghasilan','$hasil_bulanan','$status_penghasilan','$key_pokok')";
                $simpan_penghasilan = mysqli_query($connect, $sql_penghasilan);
                if (!$simpan_penghasilan) {
                    die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                                    " - " . mysqli_error($connect));
                } else {
                    //sql sosial
                    $sql_sosial = "INSERT INTO sosial(nama_aset_sosial,jumlah_sosial,sat_sosial,nilai_perkiran_sosial,status_aset_sosial,key_pokok)VALUE('$nama_aset_sosial','$jumlah_sosial','$sat_sosial','$nilai_perkiran_sosial','$status_aset_sosial','$key_pokok')";
                    $simpan_sosial = mysqli_query($connect, $sql_sosial);
                    if (!$simpan_sosial) {
                        die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                                        " - " . mysqli_error($connect));
                    } else {
                        //sql potensi
                        $sql_potensi = "INSERT INTO potensi(ketrampilan_art_potensi,sda_potensi,sdl_potensi,usaha_ekonomi_potensi,key_pokok)VALUE('$ketrampilan_art_potensi','$sda_potensi','$sdl_potensi','$usaha_ekonomi_potensi','$key_pokok')";
                        $simpan_potensi = mysqli_query($connect, $sql_potensi);
                        if (!$simpan_potensi) {
                            die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                                            " - " . mysqli_error($connect));
                        } else {
                            //sql usaha
                            $sql_usaha = "INSERT INTO usaha(nama_usaha,omset_usaha,keuntungan_usaha,key_pokok)VALUE('$nama_usaha','$omset_usaha','$keuntungan_usaha','$key_pokok')";
                            $simpan_usaha = mysqli_query($connect, $sql_usaha);
                            if (!$simpan_usaha) {
                                die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                                                " - " . mysqli_error($connect));
                            } else {
                                //sql pihak
                                $sql_pihak = "INSERT INTO pihak(nama_pihak,jabatan_pihak,alamat_pihak,key_pokok)VALUE('$nama_pihak','$jabatan_pihak','$alamat_pihak','$key_pokok')";
                                $simpan_pihak = mysqli_query($connect, $sql_pihak);
                                if (!$simpan_pihak) {
                                    die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                                                    " - " . mysqli_error($connect));
                                } else {
                                    //sql catatan
                                    if ($foto_kondisi_rumah_catatan != "") {
                                        $ekstensi_diperbolehkan = array('png', 'jpg','jpeg'); //ekstensi file gambar yang bisa diupload
                                        $x = explode('.', $foto_kondisi_rumah_catatan); //memisahkan nama file dengan ekstensi yang diupload
                                        $ekstensi = strtolower(end($x));
                                        $file_tmp = $_FILES['foto_kondisi_rumah_catatan']['tmp_name'];
                                        $angka_acak = rand(1, 999);
                                        $nama_gambar_baru = $angka_acak . '-' . $foto_kondisi_rumah_catatan; //menggabungkan angka acak dengan nama file sebenarnya
                                        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                                            move_uploaded_file($file_tmp, '../upload/dokumentasi/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
                                            // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                                            $sql_catatan = "INSERT INTO catatan (foto_kondisi_rumah_catatan,keterangan_lain_catatan,status_ekonomi_catatan,kelayakan_catatan,key_pokok)VALUE('$nama_gambar_baru','$keterangan_lain_catatan','$status_ekonomi_catatan','$kelayakan_catatan','$key_pokok')";
                                            $simpan_catatan = mysqli_query($connect, $sql_catatan);
                                            // periska query apakah ada error
                                            if (!$simpan_catatan) {
                                                die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                                                    " - " . mysqli_error($connect));
                                            } else {
                                                echo "<script>alert('Berhasil Tambah Data Program');window.location='../daftar-data.php?data=".$data."';</script>";
                                            }
                                        }else{
                                            echo "<script>alert('Format Foto Tidak Sesuai');window.location='../form-data.php?data=".$data."';</script>";
                                        }
                                    }else{
                                        $sql_catatan = "INSERT INTO catatan(foto_kondisi_rumah_catatan,keterangan_lain_catatan,status_ekonomi_catatan,kelayakan_catatan,key_pokok)VALUE(null,'$keterangan_lain_catatan','$status_ekonomi_catatan','$kelayakan_catatan','$key_pokok')";
                                        $simpan_catatan = mysqli_query($connect, $sql_catatan);
                                            // periska query apakah ada error
                                        if (!$simpan_catatan) {
                                            die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                                            " - " . mysqli_error($connect));
                                        } else {
                                            echo "<script>alert('Berhasil Tambah Data Program dan Foto Kosong');window.location='../daftar-data.php?data=".$data."';</script>";
                                        }
                                    }
                                }   
                            }    
                        }   
                    }
                }
            }
        }
    }elseif ($action == 'edit') {
        include "../connection/config.php";
        $id_no_telp = mysqli_real_escape_string($connect, $_POST['id_no_telp']);
        $unit_no_telp = mysqli_real_escape_string($connect, $_POST['unit_no_telp']);
        $no_telp = mysqli_real_escape_string($connect, $_POST['no_telp']);
        $sql = "UPDATE no_telp SET unit_no_telp='$unit_no_telp', no_telp='$no_telp' WHERE id_no_telp='$id_no_telp'";
        $simpan = mysqli_query($connect, $sql);
        if (!$simpan) {
            die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                            " - " . mysqli_error($connect));
        } else {
            echo "<script>alert('Berhasil Memperbarui data');window.location='../daftar-registrasi.php?data=".$data."';</script>";
        }
    }
    else{
        include "../connection/config.php";
        $id = $_GET['id'];
        $sql = "DELETE FROM no_telp WHERE id_no_telp='$id'";
        $simpan = mysqli_query($connect, $sql);
        if($simpan == true){
           echo "<script>alert('Berhasil Menghapus Data Telepon');window.location='../daftar-registrasi.php?data=".$data."';</script>";
        }else{
            die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                        " - " . mysqli_error($connect));
        }
    }
}else{
    if($action == 'tambahart'){
        include "../connection/config.php";
	    //art
        $key_pokok = mysqli_real_escape_string($connect, $_POST['key_pokok']);
        $nama_art = mysqli_real_escape_string($connect, $_POST['nama_art']);
	    $tempat_lahir_art = mysqli_real_escape_string($connect, $_POST['tempat_lahir_art']);
	    $tgl_lahir_art = mysqli_real_escape_string($connect, $_POST['tgl_lahir_art']); 
	    $ket_art = mysqli_real_escape_string($connect, $_POST['ket_art']); 
	    $status_art = mysqli_real_escape_string($connect, $_POST['status_art']);
        //sql art
        $sql_art = "INSERT INTO art(nama_art,tempat_lahir_art,tgl_lahir_art,ket_art,status_art,key_pokok)VALUE('$nama_art','$tempat_lahir_art','$tgl_lahir_art','$ket_art','$status_art','$key_pokok')";
        $simpan_art = mysqli_query($connect, $sql_art);
        if (!$simpan_art) {
            die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                            " - " . mysqli_error($connect));
        } else {
            echo "<script>alert('Berhasil Tambah Data ART');window.location='../detail-data.php?data=".$data."&key=".$key_pokok."';</script>";
        } 
    }elseif ($action == 'tambahpenghasilan') {
        include "../connection/config.php";
	    //penghasilan
        $key_pokok = mysqli_real_escape_string($connect, $_POST['key_pokok']);
        $nama_penghasilan = mysqli_real_escape_string($connect, $_POST['nama_penghasilan']); 
	    $pekerjaan_penghasilan = mysqli_real_escape_string($connect, $_POST['pekerjaan_penghasilan']); 
	    $hasil_bulanan = mysqli_real_escape_string($connect, $_POST['hasil_bulanan']); 
	    $status_penghasilan = mysqli_real_escape_string($connect, $_POST['status_penghasilan']);
        $sql_penghasilan = "INSERT INTO penghasilan(nama_penghasilan,pekerjaan_penghasilan,hasil_bulanan,status_penghasilan,key_pokok)VALUE('$nama_penghasilan','$pekerjaan_penghasilan','$hasil_bulanan','$status_penghasilan','$key_pokok')";
        $simpan_penghasilan = mysqli_query($connect, $sql_penghasilan);
        if (!$simpan_penghasilan) {
            die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                " - " . mysqli_error($connect));
        } else {
            echo "<script>alert('Berhasil Tambah Data Penghasilan');window.location='../detail-data.php?data=".$data."&key=".$key_pokok."';</script>";   
        }
    }elseif ($action == 'tambahsosial') {
        include "../connection/config.php";
        //sosial
        $key_pokok = mysqli_real_escape_string($connect, $_POST['key_pokok']);
        $nama_aset_sosial = mysqli_real_escape_string($connect,$_POST['nama_aset_sosial']);
	    $jumlah_sosial = mysqli_real_escape_string($connect,$_POST['jumlah_sosial']); 
	    $sat_sosial = mysqli_real_escape_string($connect,$_POST['sat_sosial']); 
	    $nilai_perkiran_sosial = mysqli_real_escape_string($connect,$_POST['nilai_perkiran_sosial']);
	    $status_aset_sosial = mysqli_real_escape_string($connect,$_POST['status_aset_sosial']);
        $sql_sosial = "INSERT INTO sosial(nama_aset_sosial,jumlah_sosial,sat_sosial,nilai_perkiran_sosial,status_aset_sosial,key_pokok)VALUE('$nama_aset_sosial','$jumlah_sosial','$sat_sosial','$nilai_perkiran_sosial','$status_aset_sosial','$key_pokok')";
        $simpan_sosial = mysqli_query($connect, $sql_sosial);
        if (!$simpan_sosial) {
            die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                            " - " . mysqli_error($connect));
        } else {
            echo "<script>alert('Berhasil Tambah Data Aset Sosial');window.location='../detail-data.php?data=".$data."&key=".$key_pokok."';</script>";   
        }
    }elseif ($action == 'tambahusaha') {
        include "../connection/config.php";
        //sosial
        $key_pokok = mysqli_real_escape_string($connect, $_POST['key_pokok']);
        $nama_usaha = mysqli_real_escape_string($connect, $_POST['nama_usaha']);
	    $omset_usaha = mysqli_real_escape_string($connect, $_POST['omset_usaha']);
	    $keuntungan_usaha = mysqli_real_escape_string($connect, $_POST['keuntungan_usaha']);
        $sql_usaha = "INSERT INTO usaha(nama_usaha,omset_usaha,keuntungan_usaha,key_pokok)VALUE('$nama_usaha','$omset_usaha','$keuntungan_usaha','$key_pokok')";
        $simpan_usaha = mysqli_query($connect, $sql_usaha);
        if (!$simpan_usaha) {
            die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                            " - " . mysqli_error($connect));
        } else {
            echo "<script>alert('Berhasil Tambah Data Usaha Ekonomi');window.location='../detail-data.php?data=".$data."&key=".$key_pokok."';</script>";   
        }
    }elseif ($action == 'tambahpihak') {
        include "../connection/config.php";
        //pihak
        $key_pokok = mysqli_real_escape_string($connect, $_POST['key_pokok']);
        $nama_pihak = mysqli_real_escape_string($connect, $_POST['nama_pihak']);
	    $jabatan_pihak = mysqli_real_escape_string($connect, $_POST['jabatan_pihak']);
	    $alamat_pihak = mysqli_real_escape_string($connect, $_POST['alamat_pihak']);
        $sql_pihak = "INSERT INTO pihak(nama_pihak,jabatan_pihak,alamat_pihak,key_pokok)VALUE('$nama_pihak','$jabatan_pihak','$alamat_pihak','$key_pokok')";
        $simpan_pihak = mysqli_query($connect, $sql_pihak);
        if (!$simpan_pihak) {
            die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                             " - " . mysqli_error($connect));
        } else {
            echo "<script>alert('Berhasil Tambah Data Pihak Terkait');window.location='../detail-data.php?data=".$data."&key=".$key_pokok."';</script>";   
        }
    }
}