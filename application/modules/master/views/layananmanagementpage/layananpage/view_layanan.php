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

                    <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newTambahLayananModal">Tambahkan jenis layanan baru</a>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Jenis Layanan</th>
                                    <th>Nama Layanan</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($layanans as $l) : ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $l['nama_jenis_layanan']; ?></td>
                                        <td><?php echo $l['nama_layanan']; ?></td>
                                        <td><?php echo $l['deskripsi']; ?></td>
                                        <td><?php echo "Rp. " . number_format($l['harga'], 0, ",", ".");  ?></td>
                                        <td>
                                            <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditLayanan<?php echo $l['kode']; ?>">Edit</span></a>
                                            <a class="btn-hapus" href="<?php echo base_url('master/layanan/deletelayanan/') . encrypt_url($l['kode']); ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
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

<!-- START TAMBAH LAYANAN MODAL -->
<div class="modal fade" id="newTambahLayananModal" tabindex="-1" aria-labelledby="newTambahLayananModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTambahLayananModalLabel">Tambah Layanan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>master/layanan" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_jenis">Jenis Layanan</label>
                        <select name="kode_jenis" id="kode_jenis" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Pilih Jenis Layanan</option>
                            <?php foreach ($jenis_layanans as $jl) : ?>
                                <option value="<?php echo $jl['kode']; ?>"><?php echo $jl['nama_jenis_layanan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_layanan">Nama Layanan</label>
                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" placeholder="Input Nama Layanan" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <div class="input-group">
                            <textarea autocomplete="off" name="deskripsi" id="deskripsi_layanans" class="form-control" cols="30" rows="10" required>
                                ...
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" onkeypress="isInputNumber(event)" placeholder="Input Harga Layanan" autocomplete="off" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                <script>
                    CKEDITOR.replace('deskripsi_layanans');
                </script>
            </form>
        </div>
    </div>
</div>
<!-- END TAMBAH LAYANAN MODAL -->


<!-- START EDIT JENIS LAYANAN MODAL -->
<?php
foreach ($layanans as $l) :  ?>
    <div class="modal fade" id="newEditLayanan<?php echo $l['kode']; ?>" tabindex="-1" aria-labelledby="newEditLayananLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditLayananLabel">Edit Layanan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/layanan/editlayanan" method="POST">
                    <input type="hidden" name="kode" value="<?php echo $l['kode']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kode_jenis">Jenis Layanan</label>
                            <select name="kode_jenis" id="kode_jenis" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Pilih Jenis Layanan</option>
                                <?php foreach ($jenis_layanans as $jl) : ?>
                                    <option value="<?php echo $jl['kode']; ?>"><?php echo $jl['nama_jenis_layanan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_layanan">Nama Layanan</label>
                            <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" placeholder="Input Nama Layanan" autocomplete="off" value="<?php echo $l['nama_layanan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <div class="input-group">
                                <textarea autocomplete="off" name="deskripsi" id="deskripsi_layanans" class="form-control ckeditor" cols="30" rows="10" required>
                                <?php echo $l['deskripsi']; ?>
                            </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" onkeypress="isInputNumber(event)" placeholder="Input Harga Layanan" autocomplete="off" value="<?php echo $l['harga']; ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                    <script>
                        CKEDITOR.replaceClass('ckeditor');
                    </script>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- END EDIT JENIS LAYANAN MODAL -->