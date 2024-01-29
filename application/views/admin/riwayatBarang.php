  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Riwayat Barang
        <small>Riwayat Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Riwayat Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">
                Kode Barang : <?php echo $kode; ?>
            </h3>
            <div class="pull-right btn-group">
                <a href="<?php echo base_url('admin/barang') ?>" class="btn btn-success btn-sm">
                    <div class="fa fa-arrow-left"></div> Kembali
                </a>
                <a href="<?php echo base_url('admin/barang/printRiwayatBarang/').$id ?>" class="btn btn-primary btn-sm">
                    <div class="fa fa-print"></div> Cetak Data
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th width="5px">No</th>
                            <th>Kode Barang</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Peruntukan</th>
                            <th>Penerima / Pengirim</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $no =1;
                            foreach ($riwayat as $rwt) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $rwt->kode ?></td>
                            <td>
                                <?php
                                if($rwt->jenis == 'Masuk'){
                                    echo '<div class="label label-success">'.$rwt->jenis.'</div>';
                                } else {
                                    echo '<div class="label label-danger">'.$rwt->jenis.'</div>';
                                }
                                ?>
                            </td>
                            <td><?php echo $rwt->jumlah ?></td>
                            <td><?php echo $rwt->untuk ?></td>
                            <td><?php echo $rwt->penerima ?></td>
                            <td><?php echo date('d-M-Y H:i:s', strtotime($rwt->createDate)) ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->