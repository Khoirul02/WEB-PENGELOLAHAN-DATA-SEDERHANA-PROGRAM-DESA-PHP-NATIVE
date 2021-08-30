	<?php
	if(isset($_GET['data'])){
		$data = $_GET['data'];
		if($data == 'program'){
			$page_title = "Data Program";
		}else{
			$page_title = "Program ".$data_detail['nama_pokok'];
		}
	}else{
		$page_title = "Dashboard";
	}
	?>
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $page_title; ?> </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>