
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Data Lengkap Penilai</h3>
                </div>
                <div>
        <table class="table table-bordered">
	    <tr><td>Nip Penilai</td><td><?php echo $nip_penilai; ?></td></tr>
	    <tr><td>Nama Penilai</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Pangkat</td><td><?php echo $pangkat; ?></td></tr>
	    <tr><td>Golongan</td><td><?php echo $golongan; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	   
	    
	    <tr><td></td><td><a href="<?php echo site_url('penilai') ?>" class="btn btn-default">Kembali</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->