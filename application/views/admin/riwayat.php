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
      <!-- Alert -->
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

      <!-- Tombol Cetak Data -->
      <button class="btn btn-danger" data-toggle="modal" data-target="#cetakData">
        <div class="fa fa-print"></div> Cetak Data
      </button>
      <button class="btn btn-success" data-toggle="modal" data-target="#exportExcel">
        <i class="fa fa-download"></i> Export Excel
      </button>
      <!-- Tabel Data -->
      <div class="box box-danger" style="margin-top: 15px">
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" id="example1">
              <thead>
                <tr>
                  <th width="5px">No</th>
                  <th>Kode Barang</th>
                  <th>Jenis</th>
                  <th>Jumlah</th>
                  <th>Waktu</th>
                  <th>Peruntukan</th>
                  <th>Penerima / Pengirim</th>
                  <th>Action</th>
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
                  <td><?php echo date('d-M-Y H:i:s', strtotime($rwt->createDate)) ?></td>
                  <td><?php echo $rwt->untuk ?></td>
                  <td><?php echo $rwt->penerima ?></td>
                  <td>
                    <!-- Tombol Delete -->
                    <a href="<?php echo base_url('admin/riwayat/delete/').$rwt->id; ?>" class="btn btn-danger btn-sm tombol-yakin" data-isiData="Ingin menghapus data ini!">
                      <i class="fa fa-trash"></i> Delete
                    </a>
                  </td>
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

  <!-- Modal Cetak Data -->
  <div class="modal fade" id="cetakData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><div class="fa fa-print"></div> Cetak Data</h4>
        </div>
        <form action="<?php echo base_url('admin/riwayat/cetak') ?>" method="POST">
          <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal awal</label>
                        <input type="date" class="form-control" name="tgl_awal" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal akhir</label>
                        <input type="date" class="form-control" name="tgl_akhir" required>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
            <button type="submit" class="btn btn-primary"><div class="fa fa-print"></div> Print</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Export Excel -->
  <div class="modal fade" id="exportExcel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><div class="fa fa-download"></div> Export Excel</h4>
        </div>
        <form action="<?php echo base_url('admin/riwayat/exportExcel') ?>" method="POST">
          <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal awal</label>
                        <input type="date" class="form-control" name="tgl_awal" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal akhir</label>
                        <input type="date" class="form-control" name="tgl_akhir" required>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
            <button type="submit" class="btn btn-primary"><div class="fa fa-download"></div> Export</button>
          </div>
        </form>
      </div>
    </div>
  </div>