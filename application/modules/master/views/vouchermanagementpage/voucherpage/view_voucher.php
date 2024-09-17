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

                    <h4 class="mt-0 header-title">Silahkan buat voucher management anda</h4>


                    <?php echo $this->session->flashdata('message'); ?>

                    <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newMenuModal">Tambahkan voucher baru</a>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Nama Voucher</th>
                                    <th>Kode Voucher</th>
                                    <th>Diskon Voucher</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($vouchers as $v) : ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $v['nama_voucher']; ?></td>
                                        <td><?php echo $v['kode_voucher']; ?></td>
                                        <td><?php echo $v['diskon_voucher']; ?>%</td>
                                        <td>
                                            <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditVoucherModal<?php echo $v['id']; ?>">Edit</span></a>
                                            <a class="btn-hapus" href="<?php echo base_url('master/voucher/deletevoucher/') . encrypt_url($v['id']); ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
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

<!-- START TAMBAH VOUCHER MODAL -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Voucher Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>master/voucher" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_voucher">Nama Voucher</label>
                        <input type="text" class="form-control" id="nama_voucher" name="nama_voucher" placeholder="Contoh : Voucher Tahun Baru 2023" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="kode_voucher">Kode Voucher</label>
                        <input type="text" class="form-control" id="kode_voucher" name="kode_voucher" placeholder="Contoh : TAHUNBARU23" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="diskon_voucher">Diskon Voucher (%)</label>
                        <input type="number" class="form-control" id="diskon_voucher" name="diskon_voucher" placeholder="Contoh : 1 - 100 %" autocomplete="off">
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
<!-- END TAMBAH VOUCHER MODAL -->

<!-- START EDIT VOUCHER MODAL -->
<?php
foreach ($vouchers as $v) :  ?>
    <div class="modal fade" id="newEditVoucherModal<?php echo $v['id']; ?>" tabindex="-1" aria-labelledby="newEditVoucherModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditVoucherModalLabel">Edit Voucher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/voucher/editvoucher" method="POST">
                    <input type="hidden" name="id" value="<?php echo $v['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_voucher">Nama Voucher</label>
                            <input type="text" class="form-control" id="nama_voucher" name="nama_voucher" placeholder="Contoh : Voucher Tahun Baru 2023" autocomplete="off" value="<?php echo $v['nama_voucher']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="kode_voucher">Kode Voucher</label>
                            <input type="text" class="form-control" id="kode_voucher" name="kode_voucher" placeholder="Contoh : TAHUNBARU23" autocomplete="off" value="<?php echo $v['kode_voucher']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="diskon_voucher">Diskon Voucher (%)</label>
                            <input type="number" class="form-control" id="diskon_voucher" name="diskon_voucher" placeholder="Contoh : 1 - 100 %" autocomplete="off" value="<?php echo $v['diskon_voucher']; ?>" required>
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
<!-- END EDIT VOUCHER MODAL -->


<!-- Footer -->
<?php $this->load->view('templates/footers/footer'); ?>
<!-- End Footer -->