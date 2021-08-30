    <?php
      include "connection/config.php";
      $data_sudah = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM catatan WHERE status_ekonomi_catatan='Y'"));
      $data_belum = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM catatan WHERE status_ekonomi_catatan='N'"));
    ?>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $data_sudah ?></h3>

                <p>Sejahtera</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $data_belum ?></h3>

                <p>Belum Sejahtera</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <?php
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
                        $tanggal = date('Y-m-d');

                ?>
                <h3 class="card-title">Data Program 10 Terbaru</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NIK</th>
                    <!-- <th>AKSI</th> -->
                    <th>NAMA KPM</th>
                    <th>KOHORT</th>
                    <th>NO ID BDT</th>
                    <th>ALAMAT</th>                    
                  </tr>
                  </thead> 
                  <tbody>
                     <?php
                        $query_pokok = mysqli_query($connect, "SELECT * FROM pokok limit 10");
                        while ($data_pokok = mysqli_fetch_array($query_pokok)) {
                        ?>
                        <tr>
                          <td><?php echo $data_pokok['nik_pokok'] ?></td>
                          <!-- <td>
                            <a href="detail-data.php?data=detail&key=<?php echo $data_pokok['key_pokok'] ?>">
                             <button type="button" class="btn btn-success btn-sm"><i class="fas fa-folder"></i> Detail</button>
                            </a>
                          </td> -->
                          <td><?php echo $data_pokok['nama_pokok'] ?></td> 
                          <td><?php echo $data_pokok['kohort_pokok'] ?></td> 
                          <td><?php echo $data_pokok['no_id_bdt_pokok'] ?></td> 
                          <td><?php echo $data_pokok['alamat_pokok'] ?></td>            
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
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>