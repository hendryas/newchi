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

        <div class="row layout-top-spacing">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="col-lg-6 mx-auto">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">No. Rekening Bank</h4>
                        <p class="text-muted m-b-30 font-14">
                            Silahkan transfer pada rekening bank dibawah ini sebesar : <br>
                        <h3 class="text-primary">Total <?= " Rp. " . number_format($DataDetailOrder['harga_final'], 0, ",", "."); ?></h3>
                        </p>

                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Nama Bank</th>
                                        <th>Nomor Rekening</th>
                                        <th>Atas Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($DataRekeningBankNewchi as $drbn) : ?>
                                        <tr class="text-center">
                                            <th scope="row"><?php echo $no; ?></th>
                                            <td><?php echo $drbn['nama_bank']; ?></td>
                                            <td><?php echo $drbn['no_rekening']; ?></td>
                                            <td><?php echo $drbn['atas_nama']; ?></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mx-auto">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Upload Bukti Pembayaran</h4>
                        <p class="text-muted m-b-30 font-14">
                            Jika sudah melakukan pembayaran, silahkan upload bukti pembayaran anda di form dibawah ini.
                        </p>

                        <?php echo $this->session->flashdata('message'); ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal auth-form my-4" enctype="multipart/form-data" method="POST" action="<?php echo base_url('customer/ordersaya/bayar/') . encrypt_url($DataDetailOrder['kode']); ?>">

                                    <div class="form-group">
                                        <label for="nama_rekening_customer">Atas Nama</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kode_order" name="kode_order" placeholder="Nomer Order" value="<?= $DataDetailOrder['kode']; ?>" hidden>
                                            <input type="text" class="form-control" id="nama_rekening_customer" name="nama_rekening_customer" placeholder="Nama Pemilik Rekening" value="<?php echo set_value('nama_rekening_customer'); ?>" required>
                                        </div>
                                        <small class="text-danger"><?php echo form_error('nama_rekening_customer'); ?></small>
                                        <small>Tulis Nama Pemilik Bank</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_bank_customer">Nama Bank</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nama_bank_customer" name="nama_bank_customer" placeholder="Nama Bank" value="<?php echo set_value('nama_bank_customer'); ?>" required>
                                        </div>
                                        <small class="text-danger"><?php echo form_error('nama_bank_customer'); ?></small>
                                        <small>Tulis Nama Bank</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_rekening_customer">No. Rekening</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="no_rekening_customer" name="no_rekening_customer" placeholder="Nomer Rekening" value="<?php echo set_value('no_rekening_customer'); ?>" required>
                                        </div>
                                        <small class="text-danger"><?php echo form_error('no_rekening_customer'); ?></small>
                                        <small>Tulis Nomer Rekening Bank</small>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Bukti Bayar</label>
                                        <div class="card shadow-lg">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">File Upload</h4>
                                                <p class="text-muted mb-3">Upload gambar disini</p>
                                                <input type="file" id="input-file-now" name="image" class="dropify" required />
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                        <small>Upload foto Maksimal 3MB</small>
                                        <!--end form-group-->
                                    </div>
                                    <!--end form-group-->

                                    <div class="form-group mb-0 row">
                                        <div class="col-6">
                                            <button class="btn btn-info btn-block waves-effect waves-light" onclick="history.back()">Go Back</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Submit</button>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end form-group-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        <!--====END CONTENT HERE =====-->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->


<!-- Footer -->
<?php $this->load->view('templates/footers/footer'); ?>
<!-- End Footer -->