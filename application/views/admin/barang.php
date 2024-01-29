  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Proses Pencatatan
        <small>Perjalanan Dinas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Proses Pencatatan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Alert -->
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

        <!-- Tombol Tambah Data -->
        <div class="btn btn-danger" data-toggle="modal" data-target="#tambahData">
            <div class="fa fa-plus"></div> Tambah Data
        </div>

        <!-- Tombol Cetak Data -->
        <a href="<?php echo base_url('admin/barang/printStokBarang') ?>" class="btn btn-primary">
            <div class="fa fa-print"></div> Cetak Data
        </a>

        <!-- Tabel Data -->
        <div class="box box-danger" style="margin-top: 15px">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="example1">
                        <thead>
                            <tr>
                                <th width="5px">No</th>
                                <th>Nama Pegawai</th> 
                                <th>Jenis Tugas</th>                               
                                <th>Tujuan</th>
                                <th>Tgl. Pergi</th>
                                <th>Tgl. Pulang</th>
                                <th>Jumlah Hari</th>
                                <th>Uraian Kegiatan</th>                                
                                <th>Surat Tugas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($barang as $brg) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $brg->nama_pg; ?></td>
                                    <td><?php echo $brg->jenis_tugas; ?></td>
                                    <td><?php echo $brg->tujuan; ?></td>
                                    <td><?php echo $brg->tgl_pergi; ?></td>
                                    <td><?php echo $brg->tgl_pulang; ?></td>
                                    <td><?php echo $brg->stok; ?></td>
                                    <td><?php echo $brg->uraian; ?></td>
                                    <td><img src="<?php echo base_url(); ?>uploads/<?php echo $brg->gambar; ?>" width="45" height="45"></td>
                                                                                                            
                                    <td>
                                        <!-- Tombol Kelola -->
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#kelola<?= $brg->id ?>">
                                            <div class="fa fa-plus-square"></div> Kelola
                                        </button>
                                        <!-- Tombol History -->
                                        <a href="<?php echo base_url('admin/barang/riwayat/').$brg->id ; ?>" class="btn btn-primary btn-sm">
                                            <div class="fa fa-history"></div> History
                                        </a>
                                        <!-- Tombol Delete -->
                                        <a href="<?php echo base_url('admin/barang/delete/').$brg->id; ?>" class="btn btn-danger btn-sm tombol-yakin" data-isiData="Ingin menghapus data ini!">
                                            <div class="fa fa-trash"></div> Delete
                                        </a>
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editData<?php echo $brg->id; ?>">
                                            <div class="fa fa-edit"></div> Edit
                                        </button>
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

  <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><div class="fa fa-plus"></div> Tambah Data</h4>
        </div>
        <?php echo form_open_multipart('admin/barang/insert') ?>
          <div class="modal-body">
           <!--  <div class="form-group">
                <label>NIP</label>
                <input type="text" class="form-control" name="kode" placeholder="NIP" required>
            </div> -->
            <!-- <div class="form-group">
                <label>Nama Pegawai</label>
                <input type="text" class="form-control" name="kode" placeholder="Nama Pegawai" required>
            </div> -->
            <div class="form-group">
            <label>Tahun Kegiatan</label>
            <select name="thn" class="form-control">
            <option value=""><?php 
            for ($i = 2023; $i <= (date('Y')); $i++) {
                if (date('Y') == $i) {
                    echo "<option value='$i' selected>$i</option>";
                } else {
                    echo "<option value='$i'>$i</option>";
                }
            }
            ?></option></select> 
            </div>



            <div class="form-group">
                <label>Nama Pegawai</label>                                     
                <select name="nip" class="form-control">
                     <?php foreach ($pegawai as $key): ?>
                    <option value="<?php echo $key->nip ?>"><?php echo "$key->nama_pg"; ?></option>
                     <?php endforeach ?>
                </select>         
                <div class="form-group">
                        <label>Jenis Tugas</label>
                        <!-- <input type="hidden" name="id" value="<?php echo $brg->id; ?>"> -->
                        <select class="form-control" name="jenis_tugas" required>
                            <option value="">-- Jenis Tugas --</option>
                            <option value="Dalam-Kota">Dalam Kota</option>
                            <option value="Luar-Kota">Luar Kota</option>
                        </select>
                    </div>
                 <div class="form-group">
                        <label>Tujuan</label>
                        <!-- <input type="hidden" name="id" value="<?php echo $brg->id; ?>"> -->
                        <select class="form-control" name="tujuan" required>
                            <option value="">-- Pilih Tujuan --</option>
                            <option value="Pangkalpinang">Pangkalpinang</option>
                            <option value="kab-bangka">Kab. Bangka</option>
                            <option value="kab-bateng">Kab. Bangka Tengah</option>
                            <option value="kab-babar">Kab. Bangka Barat</option>
                            <option value="kab-basel">Kab. Bangka Selatan</option>
                            <option value="belitung">Kab. Belitung Induk</option>
                            <option value="beltim">Kab. Belitung Timur</option>

                        </select>
                    </div>
                <div class="form-group">
                <td><label>Tanggal Pergi</label>
                <?php echo form_error('tgl_pergi') ?></td>
                <td><input type="date" class="form-control"  name="tgl_pergi"  placeholder="yyyy/mm/dd" required></td>
                 </div>
                 <div class="form-group">
                <td><label>Tanggal Pulang</label>
                <?php echo form_error('tgl_pergi') ?></td>
                <td><input type="date" class="form-control"  name="tgl_pulang"  placeholder="yyyy/mm/dd" required></td>
                 </div>
                 <div class="form-group">
                <label>Jumlah Hari</label>
                <input type="number" class="form-control" name="stok" placeholder="Jumlah Hari" required>
                </div>
                <div class="form-group">
                    <label>Isi Uraian Kegiatan</label>
                    <input type="text" class="form-control" name="uraian" placeholder="Uraian singkat kegiatan" required>
                </div>
          <div class="form-group">
                <label>Upload Surat Tugas</label>
                <input type="file" class="form-control" name="gambar" placeholder="Gambar Barang" size="20" required>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
            <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Save</button>
          </div>
        
        <?php echo form_close() ?>
      </div>
    </div>
  </div>

  <!-- Modal Edit Data -->
  <?php foreach ($barang as $brg) { ?>
    <div class="modal fade" id="editData<?php echo $brg->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><div class="fa fa-edit"></div> Edit Data</h4>
                </div>
                <form action="<?php echo base_url('admin/barang/update') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="hidden" name="id" value="<?php echo $brg->id; ?>">
                        <input type="text" class="form-control" name="kode" placeholder="Kode Barang" value="<?php echo $brg->kode; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Sisa Stok</label>
                        <input type="number" class="form-control" name="stok" placeholder="Sisa Stok" value="<?php echo $brg->stok; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Update Gambar</label>
                        <?php if($brg == 'editData')  
                            if($row->image !=null) ?>
                               <div style="margin-bottom: 5px"><img src="<?php echo base_url(); ?>uploads/<?php echo $brg->gambar; ?>" width="110" height="110"></div>                      
                        
                        <input type="file" class="form-control" name="gambar" placeholder="Gambar Barang" size="20">
                        <small>(Biarkan kosong jika gambar tidak diganti)</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
                    <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
  <?php } ?>

  <!-- Modal Kelola Data -->
  <?php foreach ($barang as $brg) { ?>
    <div class="modal fade" id="kelola<?= $brg->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><div class="fa fa-plus-square"></div> Kelola Data</h4>
                </div>
              
                    <?php echo form_open_multipart('admin/barang/insert_kelola') ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="hidden" name="id" value="<?php echo $brg->id; ?>">
                                <input type="text" class="form-control" name="kode" value="<?= $brg->kode ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sisa Stok</label>
                                <input type="text" class="form-control" name="stok" value="<?= $brg->stok ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <input type="hidden" name="id" value="<?php echo $brg->id; ?>">
                        <select class="form-control" name="jenis" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Masuk">Masuk</option>
                            <option value="Keluar">Keluar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" required>
                    </div>
                    <div class="form-group">
                        <label>Peruntukan</label>
                        <input type="text" class="form-control" name="untuk" placeholder="Peruntukan" required>
                    </div>
                    <div class="form-group">
                        <label>Penerima/ Pengirim</label>
                        <input type="text" class="form-control" name="penerima" placeholder="Nama Penerima / Pengirim" required>
                    </div>                   
                     <div class="form-group">
                        <label>Upload Bukti</label>
                        <input type="file" class="form-control" name="bukti" placeholder="Bukti Penerima / Pengirim" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
                    <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
  <?php } ?>