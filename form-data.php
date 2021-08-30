<!DOCTYPE html>
<html lang="en">
<?php
// session_start();
include "connection/config.php";
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Program</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Formulir Program</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist" style="overflow-x: auto;">
                    <!-- your steps here -->
                    <div class="step" data-target="#pokok">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Data Pokok</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#hub-art">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Hubungan ART</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#penghasilan">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Penghasilan</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#sosial">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label">Sosial Ekonomi</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#potensi">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">5</span>
                        <span class="bs-stepper-label">Potensi</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#usaha">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">6</span>
                        <span class="bs-stepper-label">Usaha</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#catatan">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">7</span>
                        <span class="bs-stepper-label">Catatan</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#pihak">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">8</span>
                        <span class="bs-stepper-label">Pihak</span>
                      </button>
                    </div>
                  </div>
                  <br>
                  <form action="proses/action.php?data=<?php echo $_GET['data'] ?>&action=tambah" method="post" enctype="multipart/form-data">
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="pokok" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="form-group">
                        <label for="nama_pokok">NAMA KPM</label>
                        <input type="text" class="form-control" name="nama_pokok" id="nama_pokok" placeholder="NAMA KPM">
                      </div>
                      <div class="form-group">
                        <label for="nik_pokok">NIK</label>
                        <input type="text" class="form-control" name="nik_pokok" id="nik_pokok" placeholder="NIK">
                      </div>
                      <div class="form-group">
                        <label for="kohort_pokok">KOHORT</label>
                        <input type="text" class="form-control" name="kohort_pokok" id="kohort_pokok" placeholder="KOHORT">
                      </div>
                      <div class="form-group">
                        <label for="no_id_bdt_pokok">NO ID BDT</label>
                        <input type="text" class="form-control" name="no_id_bdt_pokok" id="no_id_bdt_pokok" placeholder="NO ID BDT">
                      </div>
                        <div class="form-group">
                          <label for="alamat_pokok">ALAMAT</label>
                          <textarea class="form-control" name="alamat_pokok" id="alamat_pokok" rows="3" placeholder="ALAMAT..."></textarea>
                        </div>
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="hub-art" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
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
                      <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="penghasilan" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
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
                      <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="sosial" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
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
                      <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="potensi" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="form-group">
                        <label for="ketrampilan_art_potensi">KETRAMPILAN ART KPM</label>
                        <textarea class="form-control" name="ketrampilan_art_potensi" id="ketrampilan_art_potensi" rows="3" placeholder="KETRAMPILAN ART KPM..."></textarea>
                      </div>
                      <div class="form-group">
                        <label for="sda_potensi">SUMBER DAYA ALAM KPM</label>
                        <textarea class="form-control" name="sda_potensi" id="sda_potensi" rows="3" placeholder="SUMBER DAYA ALAM KPM..."></textarea>
                      </div>
                      <div class="form-group">
                        <label for="sdl_potensi">SUMBER DAYA LAINNYA KPM</label>
                        <textarea class="form-control" name="sdl_potensi" id="sdl_potensi" rows="3" placeholder="SUMBER DAYA LAINNYA..."></textarea>
                      </div>
                      <div class="form-group">
                        <label for="usaha_ekonomi_potensi">USAHA EKONOMI</label>
                        <textarea class="form-control" name="usaha_ekonomi_potensi" id="usaha_ekonomi_potensi" rows="3" placeholder="USAHA EKONOMI..."></textarea>
                      </div>
                      <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="usaha" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
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
                      <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="catatan" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <?php
                      $foto_kondisi_rumah_catatan = "dist/img/logo_rs.png";
                      ?>
                      <div class="image">
                        <p style="text-align: center;">
                        <img style="width: 160px" src="<?php echo $foto_kondisi_rumah_catatan ?>" id="tampil_foto_kondisi_rumah_catatan" class="img-circle elevation-2" alt="User Image">
                        </p>
                      </div>
                      <div class="form-group">
                        <label for="foto_kondisi_rumah_catatan">FOTO RUMAH USAHA KPM</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto_kondisi_rumah_catatan" id="foto_kondisi_rumah_catatan">
                            <label class="custom-file-label" for="foto_kondisi_rumah_catatan">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="keterangan_lain_catatan">KETERANGAN LAIN</label>
                        <textarea class="form-control" name="keterangan_lain_catatan" id="keterangan_lain_catatan" rows="3" placeholder="KETERNAGAN LAINNYA..."></textarea>
                      </div>
                      <div class="form-group">
                      <label>STATUS EKONOMI</label>
                        <select class="custom-select" name="status_ekonomi_catatan" id="status_ekonomi_catatan">
                          <option>PILIH STATUS</option>
                          <option value="Y">SUDAH SEJAHTERA</option>
                          <option value="N">BELUM SEJAHTERA</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label>KELAYAKAN EKONOMI</label>
                        <select class="custom-select" name="kelayakan_catatan" id="kelayakan_catatan">
                          <option>PILIH STATUS</option>
                          <option value="Y">SUDAH LAYAK</option>
                          <option value="N">BELUM LAYAK</option>
                        </select>
                      </div>
                      <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="pihak" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
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
                      <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
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

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#foto_kondisi_rumah_catatan").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil_foto_kondisi_rumah_catatan').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
    });
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>
</body>
</html>
