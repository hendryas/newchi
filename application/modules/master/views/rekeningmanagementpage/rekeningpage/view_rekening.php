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

                    <h4 class="mt-0 header-title">Silahkan buat rekening bank management anda</h4>

                    <?php echo form_error('nama_jenis_layanan', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

                    <?php echo $this->session->flashdata('message'); ?>

                    <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newTambahRekening">Tambahkan rekening bank baru</a>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Nama Bank</th>
                                    <th>Nomor Rekening</th>
                                    <th>Atas Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($rekenings as $r) : ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $r['nama_bank']; ?></td>
                                        <td><?php echo $r['no_rekening']; ?></td>
                                        <td><?php echo $r['atas_nama']; ?></td>
                                        <td>
                                            <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditRekening<?php echo $r['kode']; ?>">Edit</span></a>
                                            <a class="btn-hapus" href="<?php echo base_url('master/rekening/deleterekening/') . encrypt_url($r['kode']); ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
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

<!-- START TAMBAH REKENING MODAL -->
<div class="modal fade" id="newTambahRekening" tabindex="-1" aria-labelledby="newTambahRekeningLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTambahRekeningLabel">Tambah Rekening Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>master/rekening" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_bank">Nama Bank</label>
                        <select name="kode_bank" id="kode_bank" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Select Bank</option>
                            <?php foreach ($banks as $b) : ?>
                                <option value="<?php echo $b['kode']; ?>"><?php echo $b['nama_bank']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_rekening">Nomor Rekening</label>
                        <input type="text" class="form-control" id="no_rekening" name="no_rekening" onkeypress="isInputNumber(event)" placeholder="Input Nomor Rekening Anda" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="atas_nama">Atas Nama</label>
                        <input type="text" class="form-control" id="atas_nama" name="atas_nama" placeholder="Input Atas Nama Rekening" autocomplete="off" required>
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
<!-- END TAMBAH REKENING MODAL -->

<!-- START EDIT REKENING MODAL -->
<?php
foreach ($rekenings as $r) :  ?>
    <div class="modal fade" id="newEditRekening<?php echo $r['kode']; ?>" tabindex="-1" aria-labelledby="newEditRekeningLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditRekeningLabel">Edit Rekening Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/rekening/editrekening" method="POST">
                    <input type="hidden" name="kode" value="<?php echo encrypt_url($r['kode']); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kode_bank">Nama Bank</label>
                            <select name="kode_bank" id="kode_bank" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select Bank</option>
                                <?php foreach ($banks as $b) : ?>
                                    <option value="<?php echo $b['kode']; ?>"><?php echo $b['nama_bank']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_rekening">Nomor Rekening</label>
                            <input type="text" class="form-control" id="no_rekening" name="no_rekening" onkeypress="isInputNumber(event)" placeholder="Input Nomor Rekening Anda" autocomplete="off" value="<?= $r['no_rekening']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="atas_nama">Atas Nama</label>
                            <input type="text" class="form-control" id="atas_nama" name="atas_nama" placeholder="Input Atas Nama Rekening" autocomplete="off" value="<?= $r['atas_nama']; ?>" required>
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
<!-- END EDIT REKENING MODAL -->