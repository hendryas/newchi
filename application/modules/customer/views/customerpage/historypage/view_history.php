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
            <div class="col-xl-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title mb-5">History Customer</h4>

                        <?php echo $this->session->flashdata('message'); ?>

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-toggle="tab" href="#order-1" role="tab">Order</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#order-di-proses-1" role="tab">Order di Proses</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#menuju-ke-lokasi-1" role="tab">Menuju ke Lokasi</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#selesai-1" role="tab">Selesai</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="order-1" role="tabpanel">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>No. Order</th>
                                                <th>Tanggal</th>
                                                <th>Layanan</th>
                                                <th>Jenis Layanan</th>
                                                <th>Layanan Tambahan</th>
                                                <th>Total Bayar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($order as $ord) : ?>
                                                <?php $data_jenis_layanan = $this->db->get_where('jenis_layanan', ['kode' => $ord['kode_jenis']])->row_array(); ?>
                                                <?php
                                                $data_additional = $this->db->get_where('order_additional', ['kode_order' => $ord['kode']])->result_array();
                                                if ($data_additional != null) {
                                                    $additionals = array();
                                                    $index = 0;
                                                    foreach ($data_additional as $data_add) {
                                                        $additional = $this->db->get_where('additional', ['kode' => $data_add['kode_additional']])->row_array();
                                                        array_push($additionals, array(
                                                            'nama' => $additional['nama']
                                                        ));
                                                        $index++;
                                                    }
                                                }
                                                // var_dump($additionals);
                                                // die;
                                                ?>
                                                <tr class="text-center">
                                                    <th scope="row"><?php echo $no; ?></th>
                                                    <td><?php echo $ord['kode']; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($ord['tgl_order'])); ?></td>
                                                    <td><?php echo $ord['nama_layanan']; ?></td>
                                                    <td><?php echo $data_jenis_layanan['nama_jenis_layanan']; ?></td>

                                                    <?php if ($data_additional == null) : ?>
                                                        <td> - </td>
                                                    <?php else : ?>
                                                        <td>
                                                            <?php foreach ($additionals as $name_additional) : ?>
                                                                <p><?php echo $name_additional['nama']; ?>,</p>
                                                            <?php endforeach; ?>
                                                        </td>
                                                    <?php endif; ?>

                                                    <td>
                                                        <?php echo "Rp. " . number_format($ord['harga_final'], 0, ",", ".");  ?> <br>
                                                        <?php if ($ord['status_pembayaran'] == 0) : ?>
                                                            <span class="badge badge-pill badge-danger">Belum Bayar</span>
                                                        <?php else : ?>
                                                            <span class="badge badge-pill badge-success">Sudah Bayar</span>
                                                            <span class="badge badge-pill badge-primary">Menunggu diverifikasi</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <?php if ($ord['status_pembayaran'] == 0) : ?>
                                                        <td> <a href="<?= base_url('customer/ordersaya/bayar/' . encrypt_url($ord['kode'])); ?>" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light">Bayar</span></a></td>
                                                    <?php else : ?>
                                                        <td> <button class="btn btn-sm btn-danger waves-effect waves-light" disabled>Menunggu Verifikasi</button></td>
                                                    <?php endif; ?>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="order-di-proses-1" role="tabpanel">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>No. Order</th>
                                                <th>Tanggal</th>
                                                <th>Layanan</th>
                                                <th>Jenis Layanan</th>
                                                <th>Layanan Tambahan</th>
                                                <th>Total Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($order_di_proses as $odp) : ?>
                                                <?php $data_jenis_layanan = $this->db->get_where('jenis_layanan', ['kode' => $odp['kode_jenis']])->row_array(); ?>
                                                <?php
                                                $data_additional = $this->db->get_where('order_additional', ['kode_order' => $odp['kode']])->result_array();
                                                if ($data_additional != null) {
                                                    $additionals = array();
                                                    $index = 0;
                                                    foreach ($data_additional as $data_add) {
                                                        $additional = $this->db->get_where('additional', ['kode' => $data_add['kode_additional']])->row_array();
                                                        array_push($additionals, array(
                                                            'nama' => $additional['nama']
                                                        ));
                                                        $index++;
                                                    }
                                                }
                                                // var_dump($additionals);
                                                // die;
                                                ?>
                                                <tr class="text-center">
                                                    <th scope="row"><?php echo $no; ?></th>
                                                    <td><?php echo $odp['kode']; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($odp['tgl_order'])); ?></td>
                                                    <td><?php echo $odp['nama_layanan']; ?></td>
                                                    <td><?php echo $data_jenis_layanan['nama_jenis_layanan']; ?></td>

                                                    <?php if ($data_additional == null) : ?>
                                                        <td> - </td>
                                                    <?php else : ?>
                                                        <td>
                                                            <?php foreach ($additionals as $name_additional) : ?>
                                                                <p><?php echo $name_additional['nama']; ?>,</p>
                                                            <?php endforeach; ?>
                                                        </td>
                                                    <?php endif; ?>

                                                    <td>
                                                        <?php echo "Rp. " . number_format($odp['harga_final'], 0, ",", ".");  ?> <br>
                                                        <?php if ($odp['status_pembayaran'] == 0) : ?>
                                                            <span class="badge badge-pill badge-danger">Belum Bayar</span>
                                                        <?php else : ?>
                                                            <span class="badge badge-pill badge-info">Terverifikasi</span>
                                                            <span class="badge badge-pill badge-primary">Sedang di Proses</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="menuju-ke-lokasi-1" role="tabpanel">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>No. Order</th>
                                                <th>Tanggal</th>
                                                <th>Layanan</th>
                                                <th>Jenis Layanan</th>
                                                <th>Layanan Tambahan</th>
                                                <th>Total Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($order_menuju_ke_lokasi as $omkl) : ?>
                                                <?php $data_jenis_layanan = $this->db->get_where('jenis_layanan', ['kode' => $omkl['kode_jenis']])->row_array(); ?>
                                                <?php
                                                $data_additional = $this->db->get_where('order_additional', ['kode_order' => $omkl['kode']])->result_array();
                                                if ($data_additional != null) {
                                                    $additionals = array();
                                                    $index = 0;
                                                    foreach ($data_additional as $data_add) {
                                                        $additional = $this->db->get_where('additional', ['kode' => $data_add['kode_additional']])->row_array();
                                                        array_push($additionals, array(
                                                            'nama' => $additional['nama']
                                                        ));
                                                        $index++;
                                                    }
                                                }
                                                // var_dump($additionals);
                                                // die;
                                                ?>
                                                <tr class="text-center">
                                                    <th scope="row"><?php echo $no; ?></th>
                                                    <td><?php echo $omkl['kode']; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($omkl['tgl_order'])); ?></td>
                                                    <td><?php echo $omkl['nama_layanan']; ?></td>
                                                    <td><?php echo $data_jenis_layanan['nama_jenis_layanan']; ?></td>

                                                    <?php if ($data_additional == null) : ?>
                                                        <td> - </td>
                                                    <?php else : ?>
                                                        <td>
                                                            <?php foreach ($additionals as $name_additional) : ?>
                                                                <p><?php echo $name_additional['nama']; ?>,</p>
                                                            <?php endforeach; ?>
                                                        </td>
                                                    <?php endif; ?>

                                                    <td>
                                                        <?php echo "Rp. " . number_format($omkl['harga_final'], 0, ",", ".");  ?> <br>
                                                        <?php if ($omkl['status_order'] == 2) : ?>
                                                            <span class="badge badge-pill badge-info">Sedang Perjalanan</span>
                                                        <?php elseif ($omkl['status_order'] == 3) : ?>
                                                            <span class="badge badge-pill badge-success">Sampai di Lokasi Tujuan</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="selesai-1" role="tabpanel">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>No. Order</th>
                                                <th>Tanggal</th>
                                                <th>Layanan</th>
                                                <th>Jenis Layanan</th>
                                                <th>Layanan Tambahan</th>
                                                <th>Total Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($order_selesai as $os) : ?>
                                                <?php $data_jenis_layanan = $this->db->get_where('jenis_layanan', ['kode' => $os['kode_jenis']])->row_array(); ?>
                                                <?php
                                                $data_additional = $this->db->get_where('order_additional', ['kode_order' => $os['kode']])->result_array();
                                                if ($data_additional != null) {
                                                    $additionals = array();
                                                    $index = 0;
                                                    foreach ($data_additional as $data_add) {
                                                        $additional = $this->db->get_where('additional', ['kode' => $data_add['kode_additional']])->row_array();
                                                        array_push($additionals, array(
                                                            'nama' => $additional['nama']
                                                        ));
                                                        $index++;
                                                    }
                                                }
                                                // var_dump($additionals);
                                                // die;
                                                ?>
                                                <tr class="text-center">
                                                    <th scope="row"><?php echo $no; ?></th>
                                                    <td><?php echo $os['kode']; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($os['tgl_order'])); ?></td>
                                                    <td><?php echo $os['nama_layanan']; ?></td>
                                                    <td><?php echo $data_jenis_layanan['nama_jenis_layanan']; ?></td>

                                                    <?php if ($data_additional == null) : ?>
                                                        <td> - </td>
                                                    <?php else : ?>
                                                        <td>
                                                            <?php foreach ($additionals as $name_additional) : ?>
                                                                <p><?php echo $name_additional['nama']; ?>,</p>
                                                            <?php endforeach; ?>
                                                        </td>
                                                    <?php endif; ?>

                                                    <td>
                                                        <?php echo "Rp. " . number_format($os['harga_final'], 0, ",", ".");  ?> <br>
                                                        <?php if ($os['status_order'] == 4) : ?>
                                                            <span class="badge badge-pill badge-info">Order Selesai</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--====END CONTENT HERE =====-->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->


<!-- Footer -->
<?php $this->load->view('templates/footers/footer'); ?>
<!-- End Footer -->