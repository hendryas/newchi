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

                    <h4 class="mt-0 header-title">Silahkan buat management lokasi kota anda</h4>


                    <?php echo $this->session->flashdata('message'); ?>

                    <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal"
                        data-target="#newKotaModal">Tambahkan Data Kota</a>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th class="col-md-2">Kode</th>
                                    <th class="col-md-4">Nama</th>
                                    <th class="col-md-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php $no = 1; ?> -->
                                <?php foreach ($kota as $k) : ?>
                                <tr class="text-center">
                                    <!-- <th scope="row"><?php echo $no; ?></th> -->
                                    <td><?php echo $k['kode']; ?></td>
                                    <td><?php echo $k['nama_kota']; ?></td>
                                    <td>
                                        <a class="btn-hapus"
                                            href="<?php echo base_url('master/kota/deletekota/') . encrypt_url($k['kode']); ?>"><span
                                                class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
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

<!-- Footer -->
<?php $this->load->view('templates/footers/footer'); ?>
<!-- End Footer -->

<!-- START TAMBAH VOUCHER MODAL -->
<div class="modal fade" id="newKotaModal" tabindex="-1" aria-labelledby="newKotaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newKotaModalLabel">Tambah Data Kota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>master/kota" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" id="kode" name="kode" placeholder="1"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama_kota">Nama kota</label>
                        <input type="text" class="form-control" id="nama_kota" name="nama_kota" placeholder="Semarang"
                            autocomplete="off">
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