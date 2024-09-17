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

                    <h4 class="mt-0 header-title">Silahkan buat pembayaran management anda</h4>

                    <?php echo form_error('nama_bank', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
                    <?php echo form_error('nomor_rekening', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

                    <?php echo $this->session->flashdata('message'); ?>

                    <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newModalPembayaran">Tambahkan jenis pembayaran baru</a>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Nama Bank</th>
                                    <th>Nomor Rekening</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pembayarans as $p) : ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $p['nama_bank']; ?></td>
                                        <td><?php echo $p['nomor_rekening']; ?></td>
                                        <td>
                                            <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditPembayaranModal<?php echo $p['id']; ?>">Edit</span></a>
                                            <a class="btn-hapus" href="<?php echo base_url('master/pembayaran/deletepembayaran/') . encrypt_url($p['id']); ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
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

<!-- START TAMBAH JENIS PEMBAYARAN MODAL -->
<div class="modal fade" id="newModalPembayaran" tabindex="-1" aria-labelledby="newModalPembayaranLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newModalPembayaranLabel">Tambah Jenis Pembayaran Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>master/pembayaran" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_bank">Nama Bank</label>
                        <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Contoh : BCA" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="nomor_rekening">Nomor Rekening</label>
                        <input type="number" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="Contoh Bank BCA : 1234567890" autocomplete="off" required>
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
<!-- END TAMBAH JENIS PEMBAYARAN MODAL -->


<!-- START EDIT JENIS PEMBAYARAN MODAL -->
<?php
foreach ($pembayarans as $p) :  ?>
    <div class="modal fade" id="newEditPembayaranModal<?php echo $p['id']; ?>" tabindex="-1" aria-labelledby="newEditPembayaranModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditPembayaranModalLabel">Edit Jenis Pembayaran Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/pembayaran/editpembayaran" method="POST">
                    <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_bank">Nama Bank</label>
                            <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Contoh : BCA" autocomplete="off" value="<?php echo $p['nama_bank']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor_rekening">Nomor Rekening</label>
                            <input type="number" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="Contoh Bank BCA : 1234567890" autocomplete="off" value="<?php echo $p['nomor_rekening']; ?>" required>
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
<!-- END EDIT JENIS PEMBAYARAN MODAL -->