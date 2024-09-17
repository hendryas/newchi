<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?php echo $title; ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <!--====START CONTENT HERE =====-->
        <div class="col-lg">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Silahkan buat jenis layanan management anda</h4>

                    <?php echo form_error('nama_jenis_layanan', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

                    <?php echo $this->session->flashdata('message'); ?>

                    <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newModalTambahJenisLayanan">Tambahkan jenis layanan baru</a>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Jenis Layanan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($jenis_layanans as $jl) : ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $jl['nama_jenis_layanan']; ?></td>
                                        <td>
                                            <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditJenisLayanan<?php echo $jl['kode']; ?>">Edit</span></a>
                                            <a class="btn-hapus" href="<?php echo base_url('master/jenislayanan/deletejenislayanan/') . encrypt_url($jl['kode']); ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
        <!--====END CONTENT HERE =====-->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->

<!-- START TAMBAH JENIS LAYANAN MODAL -->
<div class="modal fade" id="newModalTambahJenisLayanan" tabindex="-1" aria-labelledby="newModalTambahJenisLayananLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newModalTambahJenisLayananLabel">Tambah Jenis Layanan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>master/jenislayanan" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_jenis_layanan">Nama Jenis Layanan</label>
                        <input type="text" class="form-control" id="nama_jenis_layanan" name="nama_jenis_layanan" placeholder="Contoh : Medium Car" autocomplete="off" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END TAMBAH JENIS LAYANAN MODAL -->

<!-- START EDIT JENIS LAYANAN MODAL -->
<?php
foreach ($jenis_layanans as $jl) :  ?>
    <div class="modal fade" id="newEditJenisLayanan<?php echo $jl['kode']; ?>" tabindex="-1" aria-labelledby="newEditJenisLayananLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditJenisLayananLabel">Edit Jenis Layanan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/jenislayanan/editjenislayanan" method="POST">
                    <input type="hidden" name="kode" value="<?php echo $jl['kode']; ?>">
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_jenis_layanan">Nama Jenis Layanan</label>
                                <input type="text" class="form-control" id="nama_jenis_layanan" name="nama_jenis_layanan" placeholder="Contoh : Medium Car" autocomplete="off" value="<?php echo $jl['nama_jenis_layanan']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- END EDIT JENIS LAYANAN MODAL -->