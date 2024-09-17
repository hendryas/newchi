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

                    <h4 class="mt-0 header-title">Silahkan buat layanan tambahan management anda</h4>

                    <?php echo form_error('nama', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
                    <?php echo form_error('harga', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

                    <?php echo $this->session->flashdata('message'); ?>

                    <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newAddLayananTambahan">Tambahkan layanan tambahan baru</a>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Nama Layanan Tambahan</th>
                                    <th>Harga Layanan Tambahan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($additionals as $a) : ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $a['nama']; ?></td>
                                        <td><?php echo "Rp. " . number_format($a['harga'], 0, ",", ".");  ?></td>
                                        <td>
                                            <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditAdditional<?php echo $a['kode']; ?>">Edit</span></a>
                                            <a class="btn-hapus" href="<?php echo base_url('master/additional/deleteadditional/') . encrypt_url($a['kode']); ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
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

<!-- START TAMBAH LAYANAN TAMBAHAN MODAL -->
<div class="modal fade" id="newAddLayananTambahan" tabindex="-1" aria-labelledby="newAddLayananTambahanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAddLayananTambahanLabel">Tambah Additional Layanan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>master/additional" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Layanan Tambahan</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama Layanan Tambahan" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Layanan Tambahan</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Input Harga Layanan Tambahan" autocomplete="off" onkeypress="isInputNumber(event)" required>
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
<!-- END TAMBAH LAYANAN TAMBAHAN MODAL -->

<!-- START EDIT LAYANAN TAMBAHAN MODAL -->
<?php
foreach ($additionals as $a) :  ?>
    <div class="modal fade" id="newEditAdditional<?php echo $a['kode']; ?>" tabindex="-1" aria-labelledby="newEditAdditionalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditAdditionalLabel">Edit Additional Layanan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/additional/editadditional" method="POST">
                    <input type="hidden" name="kode" value="<?php echo encrypt_url($a['kode']); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Layanan Tambahan</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama Layanan Tambahan" autocomplete="off" required value="<?= $a['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Layanan Tambahan</label>
                            <input type="text" class="form-control" id="harga" name="harga" placeholder="Input Harga Layanan Tambahan" autocomplete="off" onkeypress="isInputNumber(event)" required value="<?= $a['harga'] ?>">
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
<!-- END EDIT LAYANAN TAMBAHAN MODAL -->