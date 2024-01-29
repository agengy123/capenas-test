  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">      
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-yellow">
                <div class="widget-user-image">
                  <img class="img-circle" src="<?php echo base_url('assets') ?>/dist/img/avatar4.png" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?php echo $this->session->userdata('nama'); ?></h3>
                <h5 class="widget-user-desc">Terdaftar Pada <?php echo date('d-M-Y H:i:s', strtotime($this->session->userdata('createDate'))); ?></h5>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                  <li><a>Nama Lengkap <span class="pull-right badge bg-yellow"><?php echo $this->session->userdata('nama'); ?></span></a></li>
                  <li><a>Username <span class="pull-right badge bg-yellow"><?php echo $this->session->userdata('username'); ?></span></a></li>
                  <li><a>Password <span class="pull-right badge bg-yellow">Disembunyikan</span></a></li>
                  <li><a>Level <span class="pull-right badge bg-yellow"><?php echo $this->session->userdata('level'); ?></span></a></li>
                  <li><a>Terdaftar Pada <span class="pull-right badge bg-yellow"><?php echo date('d-M-Y H:i:s', strtotime($this->session->userdata('createDate'))); ?></span></a></li>
                </ul>
              </div>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->