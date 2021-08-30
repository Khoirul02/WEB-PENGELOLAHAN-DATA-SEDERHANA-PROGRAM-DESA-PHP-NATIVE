<!DOCTYPE html>
<html lang="en">
<?php
// session_start();
include "connection/config.php";
$key_pokok = $_GET['key'];
$query_detail = mysqli_query($connect, "SELECT * FROM pokok WHERE key_pokok='$key_pokok'");
$data_detail = mysqli_fetch_array($query_detail);
function tgl_indo($tanggal){
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember');
    $pecahkan = explode('-', $tanggal);
      // variabel pecahkan 0 = tanggal
      // variabel pecahkan 1 = bulan
      // variabel pecahkan 2 = tahun
         return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Program</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
  <?php include "component/navbar.php" ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include "component/aside.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include "component/page-header.php" ?>
    <!-- /.content-header -->    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">I. Data Pokok Keluarga</h3>
                <!-- <div style="text-align: right;">
                    <a href="#">
                    <button type="button" class="btn btn-success btn-sm">Cetak Formulir</button>
                    </a>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nama_pokok">NAMA KPM</label>
                        <input type="text" class="form-control" value="<?php echo $data_detail['nama_pokok'] ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label for="kohort_pokok">KOHORT</label>
                        <input type="text" class="form-control" value="<?php echo $data_detail['kohort_pokok'] ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nik_pokok">NIK</label>
                        <input type="text" class="form-control" value="<?php echo $data_detail['nik_pokok'] ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label for="no_id_bdt_pokok">NO. ID BDT</label>
                        <input type="text" class="form-control" value="<?php echo $data_detail['no_id_bdt_pokok'] ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="alamat_pokok">ALAMAT</label>
                      <textarea class="form-control" name="sdl_potensi" id="sdl_potensi" rows="3" readonly><?php echo $data_detail['alamat_pokok'] ?></textarea>
                    </div>
                </div>
              </div>
            <br>
            <div class="card-header">
              <h3 class="card-title">DATA HUBUNGAN ART</h3>
                <div style="text-align: right;">
                    <a href="#modal-sm-1">
                    <button type="button" data-toggle="modal" data-target="#modal-sm-1" class="btn btn-success btn-sm">Tambah</button>
                    </a>
                </div>
             </div>  
              <!-- /.card-body -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>HUBUNGAN ART</th>
                    <th>NAMA ART</th>
                    <th>TEMPAT LAHIR</th>
                    <th>TANGGAL LAHIR</th>
                    <th>KETERANGAN / KETRAMPILAN</th>
                  </tr>
                  </thead> 
                  <tbody>
                     <?php
                        $query_art = mysqli_query($connect, "SELECT * FROM art WHERE key_pokok='$key_pokok'");
                        while ($data_art = mysqli_fetch_array($query_art)) {
                        if($data_art['status_art'] == 'suami'){
                            $status = 'SUAMI';
                        }elseif($data_art['status_art'] == 'anak1'){
                            $status = 'ANAK-1';
                        }elseif($data_art['status_art'] == 'anak2'){
                            $status = 'ANAK-2';
                        }elseif($data_art['status_art'] == 'anak3'){
                            $status = 'ANAK-3';
                        }else{
                            $status = 'ART LAIN';
                        }
                        ?>
                        <tr>
                          <td><?php echo $status ?></td>
                          <td><?php echo $data_art['nama_art'] ?></td> 
                          <td><?php echo $data_art['tempat_lahir_art'] ?></td> 
                          <td><?php echo tgl_indo($data_art['tgl_lahir_art']) ?></td> 
                          <td><?php echo $data_art['ket_art'] ?></td>            
                        </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">II. Penghasilan Keluarga Per-Bulan</h3>
                <div style="text-align: right;">
                    <a href="#modal-sm-1">
                    <button type="button" data-toggle="modal" data-target="#modal-sm-2" class="btn btn-success btn-sm">Tambah</button>
                    </a>
                </div>
              </div> 
              <!-- /.card-body -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ANGGOTA RT</th>
                    <th>NAMA ART</th>
                    <th>URAIN PEKERJAAN</th>
                    <th>PENGHASILAN BULANAN</th>
                  </tr>
                  </thead> 
                  <tbody>
                     <?php
                        $total_penghasilan = 0;
                        $query_penghasilan = mysqli_query($connect, "SELECT * FROM penghasilan WHERE key_pokok='$key_pokok'");
                        while ($data_penghasilan = mysqli_fetch_array($query_penghasilan)) {
                        $total_penghasilan += $data_penghasilan['hasil_bulanan'];
                        if($data_penghasilan['status_penghasilan'] == 'kpm'){
                            $status_penghasilan = 'KPM';
                        }elseif($data_penghasilan['status_penghasilan'] == 'suami'){
                            $status_penghasilan = 'SUAMI';
                        }elseif($data_penghasilan['status_penghasilan'] == 'anak'){
                            $status_penghasilan = 'ANAK';
                        }else{
                            $status_penghasilan = 'ART LAIN';
                        }
                        ?>
                        <tr>
                          <td><?php echo $status_penghasilan ?></td>
                          <td><?php echo $data_penghasilan['nama_penghasilan'] ?></td> 
                          <td><?php echo $data_penghasilan['pekerjaan_penghasilan'] ?></td> 
                          <td>Rp. <?php echo number_format($data_penghasilan['hasil_bulanan'],2,',','.'); ?></td>            
                        </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                  <tr>
                    <td style="font-weight: bold;text-align: center;background-color: white" colspan="3">JUMLAH PENGHASILAN KELUARGA</td>
                    <td style="font-weight: bold;background-color: white"colspan="auto">Rp. <?php echo number_format($total_penghasilan,2,',','.'); ?></td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">III. STATUS SOSIAL EKONOMI</h3>
                <div style="text-align: right;">
                    <a href="#modal-sm-3">
                    <button type="button" data-toggle="modal" data-target="#modal-sm-3" class="btn btn-success btn-sm">Tambah</button>
                    </a>
                </div>
              </div> 
              <!-- /.card-body -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example4" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STATUS KEPEMILIKAN</th>
                    <th>NAMA ASET</th>
                    <th>JUMLAH ASET</th>
                    <th>SAT</th>
                    <th>PERKIRAAN HARGA ASET</th>
                  </tr>
                  </thead> 
                  <tbody>
                     <?php
                        $total_aset = 0;
                        $query_sosial = mysqli_query($connect, "SELECT * FROM sosial WHERE key_pokok='$key_pokok'");
                        while ($data_sosial = mysqli_fetch_array($query_sosial)) {
                        $total_aset += $data_sosial['nilai_perkiran_sosial']; 
                        if($data_sosial['nama_aset_sosial'] == 'tanah/sawah'){
                            $nama_aset_sosial = 'TANAH / SAWAH';
                        }elseif($data_sosial['nama_aset_sosial'] == 'roda2'){
                            $nama_aset_sosial = 'KENDARAAN RODA 2';
                        }elseif($data_sosial['nama_aset_sosial'] == 'roda4'){
                            $nama_aset_sosial = 'KENDARAAN RODA 4';
                        }elseif($data_sosial['nama_aset_sosial'] == 'ternak'){
                            $nama_aset_sosial = 'BINATANG TERNAK';
                        }elseif($data_sosial['nama_aset_sosial'] == 'perhiasan'){
                            $nama_aset_sosial = 'PERHIASAN';
                        }else{
                            $nama_aset_sosial = 'LAINNYA';
                        }
                        if($data_sosial['status_aset_sosial'] == 'sendiri'){
                            $aset_sosial = "SENDIRI";
                        }else{
                            $aset_sosial = "ORANG LAIN";
                        }
                        ?>
                        <tr>
                          <!-- <td>DAFTAR KEPEMILIKAN</td> -->
                          <td><?php echo $aset_sosial ?></td>
                          <td><?php echo $nama_aset_sosial ?></td> 
                          <td><?php echo $data_sosial['jumlah_sosial'] ?></td>
                          <td><?php echo $data_sosial['sat_sosial'] ?></td> 
                          <td>Rp. <?php echo number_format($data_sosial['nilai_perkiran_sosial'],2,',','.'); ?></td>            
                        </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                  <tr>
                    <td style="font-weight: bold;text-align: center;background-color: white" colspan="4">NILAI KESELURUHAN ASET</td>
                    <td style="font-weight: bold;background-color: white"colspan="auto">Rp. <?php echo number_format($total_aset,2,',','.'); ?></td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">IV. Potensi Pemberdayaan Ekonomi</h3>
              </div>
              <?php
                $query_potensi = mysqli_query($connect, "SELECT * FROM potensi WHERE key_pokok='$key_pokok'");
                $data_potensi = mysqli_fetch_array($query_potensi);
              ?>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label for="ketrampilan_art_potensi">1. KETERAMPILAN YANG DIMILIKI ART KPM</label>
                        <textarea class="form-control" name="ketrampilan_art_potensi" id="ketrampilan_art_potensi" rows="3" readonly><?php echo $data_potensi['ketrampilan_art_potensi'] ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label for="sda_potensi">2. SUMBER DAYA ALAM YANG DIMILIKI</label>
                        <textarea class="form-control" name="sda_potensi" id="sda_potensi" rows="3" readonly><?php echo $data_potensi['sda_potensi'] ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label for="sdl_potensi">3. SUMBER DAYA LINGKUNGAN SEKITAR</label>
                        <textarea class="form-control" name="sdl_potensi" id="sdl_potensi" rows="3" readonly><?php echo $data_potensi['sdl_potensi'] ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label for="usaha_ekonomi_potensi">4. USAHA EKONOMI YANG DIMILIKI</label>
                        <textarea class="form-control" name="usaha_ekonomi_potensi" id="usaha_ekonomi_potensi" rows="3" readonly><?php echo $data_potensi['usaha_ekonomi_potensi'] ?></textarea>
                    </div>
                  </div>
              </div>
            <br>
            <div class="card-header">
              <h3 class="card-title">DATA POTENSI USAHA</h3>
                <div style="text-align: right;">
                    <a href="#modal-sm-4">
                    <button type="button" data-toggle="modal" data-target="#modal-sm-4" class="btn btn-success btn-sm">Tambah</button>
                    </a>
                </div>
             </div>  
              <!-- /.card-body -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example5" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA USAHA EKONOMI</th>
                    <th>OMZET / BULAN</th>
                    <th>KEUNTUNGAN / BULAN</th>
                  </tr>
                  </thead> 
                  <tbody>
                     <?php
                        $no = 1;
                        $query_usaha = mysqli_query($connect, "SELECT * FROM usaha WHERE key_pokok='$key_pokok'");
                        while ($data_usaha = mysqli_fetch_array($query_usaha)) {
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $data_usaha['nama_usaha'] ?></td> 
                          <td>Rp. <?php echo number_format($data_usaha['omset_usaha'],2,',','.'); ?></td> 
                          <td>Rp. <?php echo number_format($data_usaha['keuntungan_usaha'],2,',','.'); ?></td>            
                        </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">V. Foto KPM dan Kondisi Rumah</h3>
              </div> 
              <!-- /.card-body -->
              <!-- /.card-header -->
              <?php
                $query_catatan = mysqli_query($connect, "SELECT * FROM catatan WHERE key_pokok='$key_pokok'");
                $data_catatan = mysqli_fetch_array($query_catatan);
              ?>
              <div class="card-body">
                <div class="image">
                     <p style="text-align: center;">
                     <img style="width: 160px" src="upload/dokumentasi/<?php echo $data_catatan['foto_kondisi_rumah_catatan'] ?>" class="img-circle elevation-2" alt="User Image">
                     </p>
                </div>
              </div>
              <br>
              <div class="card-header">
                <h3 class="card-title">VI. Catatan / Keterangan Lain</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <textarea class="form-control" name="sdl_potensi" id="sdl_potensi" rows="3" readonly><?php echo $data_catatan['keterangan_lain_catatan'] ?></textarea>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">VII. KESIMPULAN</h3>
              </div> 
              <!-- /.card-body -->
              <!-- /.card-header -->
                  <?php
                    if($data_catatan['status_ekonomi_catatan'] == 'Y'){
                        $status_ekonomi_catatan = "SUDAH";
                    }else{
                        $status_ekonomi_catatan = "BELUM";
                    }
                    if($data_catatan['kelayakan_catatan'] == 'Y'){
                        $kelayakan_catatan = "SUDAH";
                    }else{
                        $kelayakan_catatan = "BELUM";
                    }
                  ?>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nama_pokok">KETERANGAN</label>
                        <input type="text" class="form-control" value="STATUS SOSIAL EKONOMI" readonly>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label for="kohort_pokok">STATUS</label>
                        <input type="text" class="form-control" value="<?php echo $status_ekonomi_catatan." SEJAHTERA" ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" value="KELAYAKAN GRADUASI" readonly>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $kelayakan_catatan." LAYAK" ?>" readonly>
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">VIII. Konfirmasi Pihak Terkait</h3>
                <div style="text-align: right;">
                    <a href="#modal-sm-5">
                    <button type="button" data-toggle="modal" data-target="#modal-sm-5" class="btn btn-success btn-sm">Tambah</button>
                    </a>
                </div>
              </div> 
              <!-- /.card-body -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example6" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>JABATAN</th>
                    <th>ALAMAT</th>
                  </tr>
                  </thead> 
                  <tbody>
                     <?php
                        $no = 1;
                        $query_pihak = mysqli_query($connect, "SELECT * FROM pihak WHERE key_pokok='$key_pokok'");
                        while ($data_pihak = mysqli_fetch_array($query_pihak)) {
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $data_pihak['nama_pihak'] ?></td> 
                          <td><?php echo $data_pihak['jabatan_pihak'] ?></td>
                          <td><?php echo $data_pihak['alamat_pihak'] ?></td>  
                        </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "component/footer.php" ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
     <div class="modal fade" id="modal-sm-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data ART </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="proses/action.php?data=<?php echo $_GET['data'] ?>&action=tambahart" method="post">
                <div class="card-body">
                     <input type="hidden" class="form-control" name="key_pokok" id="key_pokok" value="<?php echo $_GET['key'] ?>">
                      <div class="form-group">
                        <label for="nama_art">NAMA ART</label>
                        <input type="text" class="form-control" name="nama_art" id="nama_art" placeholder="NAMA ART">
                      </div>
                      <div class="form-group">
                        <label for="tempat_lahir_art">TEMPAT LAHIR</label>
                        <input type="text" class="form-control" name="tempat_lahir_art" id="tempat_lahir_art" placeholder="TEMPAT LAHIR">
                      </div>
                      <div class="form-group">
                        <label for="tgl_lahir_art">TANGGAL LAHIR</label>
                        <input type="date" class="form-control" name="tgl_lahir_art" id="tgl_lahir_art">
                      </div>
                      <div class="form-group">
                        <label for="ket_art">KETERANGAN</label>
                        <textarea class="form-control" name="ket_art" id="ket_art" rows="3" placeholder="KETERANGAN..."></textarea>
                      </div>
                      <div class="form-group">
                      <label>STATUS ART</label>
                        <select class="custom-select" name="status_art" id="status_art">
                          <option>PILIH STATUS</option>
                          <option value="suami">SUAMI</option>
                          <option value="anak1">ANAK 1</option>
                          <option value="anak2">ANAK 2</option>
                          <option value="anak3">ANAK 3</option>
                          <option value="lain">ART LAIN</option>
                        </select>
                      </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-last">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-sm-2">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Penghasilan </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="proses/action.php?data=<?php echo $_GET['data'] ?>&action=tambahpenghasilan" method="post">
                <div class="card-body">
                     <input type="hidden" class="form-control" name="key_pokok" id="key_pokok" value="<?php echo $_GET['key'] ?>">
                     <div class="form-group">
                        <label for="nama_penghasilan">NAMA PENGHASILAN</label>
                        <input type="text" class="form-control" name="nama_penghasilan" id="nama_penghasilan" placeholder="NAMA PENGHASILAN">
                      </div>
                      <div class="form-group">
                        <label for="pekerjaan_penghasilan">PEKERJAAN PENGHASILAN</label>
                        <input type="text" class="form-control" name="pekerjaan_penghasilan" id="pekerjaan_penghasilan" placeholder="PEKERJAAN PENGHASILAN">
                      </div>
                      <div class="form-group">
                        <label for="hasil_bulanan">HASIL BULANAN</label>
                        <input type="text" class="form-control" name="hasil_bulanan" id="hasil_bulanan" placeholder="JUMLAH PENGHASILAN / BULAN">
                      </div>
                      <div class="form-group">
                      <label>STATUS PENGHASILAN</label>
                        <select class="custom-select" name="status_penghasilan" id="status_penghasilan">
                          <option>PILIH STATUS</option>
                          <option value="kpm">KPM</option>
                          <option value="suami">SUAMI</option>
                          <option value="anak">ANAK</option>
                          <option value="lain">LAINNYA</option>
                        </select>
                      </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-last">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modal-sm-3">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Sosial Ekonomi </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="proses/action.php?data=<?php echo $_GET['data'] ?>&action=tambahsosial" method="post">
                <div class="card-body">
                     <input type="hidden" class="form-control" name="key_pokok" id="key_pokok" value="<?php echo $_GET['key'] ?>">
                     <div class="form-group">
                      <label>NAMA ASET</label>
                        <select class="custom-select" name="nama_aset_sosial" id="nama_aset_sosial">
                          <option>PILIH ASET</option>
                          <option value="tanah/sawah">KPM</option>
                          <option value="roda2">KENDARAAN RODA 2</option>
                          <option value="roda4">KENDARAAN RODA 4</option>
                          <option value="ternak">PERTERNAKAN</option>
                          <option value="perhiasan">PERHIASAN</option>
                          <option value="lain">LAINNYA</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="jumlah_sosial">JUMLAH ASET</label>
                        <input type="text" class="form-control" name="jumlah_sosial" id="jumlah_sosial" placeholder="JUMLAH ASET">
                      </div>
                      <div class="form-group">
                        <label for="sat_sosial">SATUAN ASET</label>
                        <input type="text" class="form-control" name="sat_sosial" id="sat_sosial" placeholder="SATUAN ASET">
                      </div>
                      <div class="form-group">
                        <label for="nilai_perkiran_sosial">NILAI PERKIRAAN ASET</label>
                        <input type="text" class="form-control" name="nilai_perkiran_sosial" id="nilai_perkiran_sosial" placeholder="JUMLAH PERKIRAAN ASET">
                      </div>
                      <div class="form-group">
                      <label>STATUS ASET</label>
                        <select class="custom-select" name="status_aset_sosial" id="status_aset_sosial">
                          <option>PILIH STATUS</option>
                          <option value="sendiri">MILIK SENDIRI</option>
                          <option value="lain">MILIK ORANG LAIN</option>
                        </select>
                      </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-last">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modal-sm-4">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Usaha Ekonomi </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="proses/action.php?data=<?php echo $_GET['data'] ?>&action=tambahusaha" method="post">
                <div class="card-body">
                     <input type="hidden" class="form-control" name="key_pokok" id="key_pokok" value="<?php echo $_GET['key'] ?>">
                     <div class="form-group">
                        <label for="nama_usaha">NAMA USAHA EKONOMI</label>
                        <input type="text" class="form-control" name="nama_usaha" id="nama_usaha" placeholder="NAMA USAHA">
                      </div>
                      <div class="form-group">
                        <label for="omset_usaha">OMSET USAHA / BULAN</label>
                        <input type="text" class="form-control" name="omset_usaha" id="omset_usaha" placeholder="OMSET USAHA / BULAN">
                      </div>
                      <div class="form-group">
                        <label for="keuntungan_usaha">KEUNTUNGAN USAHA / BULAN</label>
                        <input type="text" class="form-control" name="keuntungan_usaha" id="keuntungan_usaha" placeholder="KEUNTUNGAN USAHA / BULAN">
                      </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-last">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modal-sm-5">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Konfirmasi Pihak Terkait </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="proses/action.php?data=<?php echo $_GET['data'] ?>&action=tambahpihak" method="post">
                <div class="card-body">
                     <input type="hidden" class="form-control" name="key_pokok" id="key_pokok" value="<?php echo $_GET['key'] ?>">
                     <div class="form-group">
                        <label for="nama_pihak">NAMA PIHAK</label>
                        <input type="text" class="form-control" name="nama_pihak" id="nama_pihak" placeholder="NAMA PIHAK">
                      </div>
                      <div class="form-group">
                        <label for="jabatan_pihak">JABATAN PIHAK</label>
                        <input type="text" class="form-control" name="jabatan_pihak" id="jabatan_pihak" placeholder="JABATAN PIHAK">
                      </div>
                      <div class="form-group">
                        <label for="alamat_pihak">ALAMAT PIHAK</label>
                        <textarea class="form-control" name="alamat_pihak" id="alamat_pihak" rows="3" placeholder="ALAMAT PIHAK..."></textarea>
                      </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-last">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#example3").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#example4").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#example5").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#example6").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
