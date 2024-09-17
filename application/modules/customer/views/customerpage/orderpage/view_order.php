<style>
    .faq-container {
        max-width: 1280px;
        padding-bottom: 1.5em;
        margin: 0 auto;
        width: 90%;
    }

    .mobile-expertise-faq {
        background-color: #f6f6f6;
    }

    p.mobile-faq-menu {
        margin: auto;
        padding: 20px;
        border-bottom: solid #eeeeee 1px;
    }

    .expertise-faq {
        width: 65%;
        display: inline-block;
    }

    .contact-faq {
        background: #f3f3f3;
        height: 1000px;
        width: 375px;
        display: inline-block;

    }

    /* Style the element that is used to open and close the accordion class */

    p.faq-accordion {
        background-color: #fff;
        color: #444;
        cursor: pointer;
        padding: 30px 30px 0px;
        width: 100%;
        text-align: left;
        outline: none;
        transition: 0.4s;
        margin-bottom: 0px;
        border-top: solid #f4f4f4 1px;
        font-weight: 700;
    }

    /* Add a background color to the accordion if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
    p.faq-accordion.active,
    p.accordion:hover {
        background-color: #fff;
    }

    /* Unicode character for "plus" sign (+) */
    p.faq-accordion:after {
        content: '\2795';
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }

    p.mobile-faq-menu:after {
        content: '\2795';
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }


    /* Unicode character for "minus" sign (-) */
    p.faq-accordion.active:after {
        content: "\2796";
    }

    p.mobile-faq-menu.active:after {
        content: "\2796";
    }

    /* Style the element that is used for the panel class */
    div.faq-panel {

        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: 0.6s ease-in-out;
        opacity: 0;
        text-align: left;
        padding-left: 50px;
        max-width: auto;

    }

    div.faq-panel.show {
        opacity: 1;
        max-height: 750px;
        /* Whatever you like, as long as its more than the height of the content (on all screen sizes) */
    }

    div.mobile-faq-panel {

        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: 0.6s ease-in-out;
        opacity: 0;
        text-align: left;
        padding-left: 18px;
    }

    div.mobile-faq-panel.show {
        opacity: 1;
        max-height: 750px;
        /* Whatever you like, as long as its more than the height of the content (on all screen sizes) */
    }

    /* @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"); */

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* body {
    font-family: "Open Sans", sans-serif;
    font-size: 15px;
    line-height: 1.5;
    font-weight: 400;
    background: #f0f3f6;
    color: #3a3a3a;
} */

    hr {
        margin: 20px 0;
        border: none;
        border-bottom: 1px solid #d9d9d9;
    }

    label,
    input {
        cursor: pointer;
    }

    h2,
    h3,
    h4,
    h5 {
        font-weight: 600;
        line-height: 1.3;
        color: #1f2949;
    }

    h2 {
        font-size: 24px;
    }

    h3 {
        font-size: 18px;
    }

    h4 {
        font-size: 14px;
    }

    h5 {
        font-size: 12px;
        font-weight: 400;
    }

    img {
        max-width: 100%;
        display: block;
    }

    .container {
        max-width: 99vw;
        margin: 15px auto;
        padding: 0 15px;
    }

    .top-text-wrapper {
        margin: 20px 0 30px 0;
    }

    .top-text-wrapper h4 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .top-text-wrapper code {
        font-size: 0.85em;
        background: linear-gradient(90deg, #fce3ec, #ffe8cc);
        color: #ff2200;
        padding: 0.1rem 0.3rem 0.2rem;
        border-radius: 0.2rem;
    }

    .tab-section-wrapper {
        padding: 30px 0;
    }

    .grid-wrapper {
        display: grid;
        grid-gap: 30px;
        place-items: center;
        place-content: center;
    }

    .grid-col-auto {
        grid-auto-flow: column;
        grid-template-rows: auto;
    }

    /* ******************* Main Styeles : Radio Card */
    label.radio-card {
        cursor: pointer;
    }

    label.radio-card .card-content-wrapper {
        background: #fff;
        border-radius: 5px;
        max-width: 280px;
        min-height: 330px;
        padding: 15px;
        display: grid;
        box-shadow: 0 2px 4px 0 rgba(219, 215, 215, 0.04);
        transition: 200ms linear;
    }

    label.radio-card .check-icon {
        width: 20px;
        height: 20px;
        display: inline-block;
        border: solid 2px #e3e3e3;
        border-radius: 50%;
        transition: 200ms linear;
        position: relative;
    }

    label.radio-card .check-icon:before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='12' height='9' viewBox='0 0 12 9' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0.93552 4.58423C0.890286 4.53718 0.854262 4.48209 0.829309 4.42179C0.779553 4.28741 0.779553 4.13965 0.829309 4.00527C0.853759 3.94471 0.889842 3.88952 0.93552 3.84283L1.68941 3.12018C1.73378 3.06821 1.7893 3.02692 1.85185 2.99939C1.91206 2.97215 1.97736 2.95796 2.04345 2.95774C2.11507 2.95635 2.18613 2.97056 2.2517 2.99939C2.31652 3.02822 2.3752 3.06922 2.42456 3.12018L4.69872 5.39851L9.58026 0.516971C9.62828 0.466328 9.68554 0.42533 9.74895 0.396182C9.81468 0.367844 9.88563 0.353653 9.95721 0.354531C10.0244 0.354903 10.0907 0.369582 10.1517 0.397592C10.2128 0.425602 10.2672 0.466298 10.3112 0.516971L11.0651 1.25003C11.1108 1.29672 11.1469 1.35191 11.1713 1.41247C11.2211 1.54686 11.2211 1.69461 11.1713 1.82899C11.1464 1.88929 11.1104 1.94439 11.0651 1.99143L5.06525 7.96007C5.02054 8.0122 4.96514 8.0541 4.90281 8.08294C4.76944 8.13802 4.61967 8.13802 4.4863 8.08294C4.42397 8.0541 4.36857 8.0122 4.32386 7.96007L0.93552 4.58423Z' fill='white'/%3E%3C/svg%3E%0A");
        background-repeat: no-repeat;
        background-size: 12px;
        background-position: center center;
        transform: scale(1.6);
        transition: 200ms linear;
        opacity: 0;
    }

    label.radio-card input[type=radio] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
    }

    label.radio-card input[type=radio]:checked+.card-content-wrapper {
        box-shadow: 0 2px 4px 0 rgba(219, 215, 215, 0.5), 0 0 0 2px #3057d5;
    }

    label.radio-card input[type=radio]:checked+.card-content-wrapper .check-icon {
        background: #3057d5;
        border-color: #3057d5;
        transform: scale(1.2);
    }

    label.radio-card input[type=radio]:checked+.card-content-wrapper .check-icon:before {
        transform: scale(1);
        opacity: 1;
    }

    label.radio-card input[type=radio]:focus+.card-content-wrapper .check-icon {
        box-shadow: 0 0 0 4px rgba(48, 86, 213, 0.2);
        border-color: #3056d5;
    }

    label.radio-card .card-content img {
        margin-bottom: 10px;
    }

    label.radio-card .card-content h4 {
        font-size: 16px;
        letter-spacing: -0.24px;
        text-align: center;
        color: #1f2949;
        margin-bottom: 10px;
    }

    label.radio-card .card-content h5 {
        font-size: 14px;
        line-height: 1.4;
        text-align: center;
        color: #686d73;
    }

    /*# sourceMappingURL=style.css.map */
</style>

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
                    <?php echo $this->session->flashdata('message'); ?>
                    <form action="<?php echo base_url(); ?>customer/order/addorder" method="POST">
                        <input type="hidden" name="id_customer" value="<?php echo encrypt_url($user['id']); ?>">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Contoh : Jl. Kelud Raya IV No. 35" required>
                            <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="kota">Kota</label>
                                <select class="form-control" name="kota" id="kota" required>
                                    <option disabled selected hidden value="">- Select -</option>
                                    <?php foreach ($kota as $k) : ?>
                                        <option value="<?php echo $k['kode']; ?>"><?php echo $k['nama_kota']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger"><?php echo form_error('kota'); ?></small>
                            </div>
                            <div class="col-6">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control" name="kecamatan" id="kecamatan" required>
                                </select>
                                <small class="text-danger"><?php echo form_error('kecamatan'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="tgl_order">Tanggal</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" autocomplete="off" placeholder="dd-mm-yyyy" name="tgl_order" id="tgl_order" value="<?php echo set_value('tgl_order'); ?>" required>
                                </div>
                                <small class="text-danger"><?php echo form_error('tgl_order'); ?></small>
                            </div>
                            <div class="col-6">
                                <label for="tgl_lahir">Waktu</label>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <select id="hours" name="hours" class="form-control"></select>
                                    </div>
                                    <div class="col-6">
                                        <select id="minutes" name="minutes" class="form-control">
                                            <option value="00">00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="tgl_lahir">Phone (Opsional)</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="085157267162" autocomplete="off" onkeypress="isInputNumber(event)">
                                <small class="text-danger"><?php echo form_error('phone'); ?></small>
                            </div>
                            <div class="col-6">
                                <label for="tgl_lahir">Note (Opsional)</label>
                                <input type="text" class="form-control" id="note" name="note" placeholder="Depan lapangan" autocomplete="off">
                                <small class="text-danger"><?php echo form_error('note'); ?></small>
                            </div>
                        </div>

                        <label for="Layanan">Layanan</label>
                        <!-- start mobile menu -->
                        <div class="mobile-expertise-faq">
                            <div>

                                <p class="mobile-faq-menu">Small Car</p>
                                <div class="mobile-faq-panel">
                                    <center>
                                        <div class="expertise-faq">
                                            <?php foreach ($layanan as $l) : ?>
                                                <?php if ($l['nama_jenis_layanan'] == 'Small Car' || $l['nama_jenis_layanan'] == 'small car' || $l['nama_jenis_layanan'] == 'smallcar' || $l['nama_jenis_layanan'] == 'SMALL CAR') : ?>

                                                    <label for="radio-card-<?= $l['id']; ?>" class="radio-card">
                                                        <input type="radio" name="layanan" id="radio-card-<?= $l['id']; ?>" value="<?= $l['kode']; ?>" checked />
                                                        <div class="card-content-wrapper">
                                                            <span class="check-icon"></span>
                                                            <div class="card-content">
                                                                <img src="https://image.freepik.com/free-vector/group-friends-giving-high-five_23-2148363170.jpg" alt="" />
                                                                <h4><?= $l['nama_layanan']; ?></h4>
                                                                <h5><?= $l['deskripsi']; ?></h5>
                                                                <h5><?= "Rp. " . number_format($l['harga'], 0, ",", ".");  ?></h5>
                                                            </div>
                                                        </div>
                                                    </label>

                                                    <!-- /.radio-card -->
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </center>
                                </div>

                                <p class="mobile-faq-menu">Medium Car</p>
                                <div class="mobile-faq-panel">
                                    <center>
                                        <div class="expertise-faq">
                                            <?php foreach ($layanan as $l) : ?>
                                                <?php if ($l['nama_jenis_layanan'] == 'Medium Car' || $l['nama_jenis_layanan'] == 'medium car' || $l['nama_jenis_layanan'] == 'mediumcar' || $l['nama_jenis_layanan'] == 'MEDIUM CAR') : ?>

                                                    <label for="radio-card-<?= $l['id']; ?>" class="radio-card">
                                                        <input type="radio" name="layanan" id="radio-card-<?= $l['id']; ?>" value="<?= $l['kode']; ?>" checked />
                                                        <div class="card-content-wrapper">
                                                            <span class="check-icon"></span>
                                                            <div class="card-content">
                                                                <img src="https://image.freepik.com/free-vector/group-friends-giving-high-five_23-2148363170.jpg" alt="" />
                                                                <h4><?= $l['nama_layanan']; ?></h4>
                                                                <h5><?= $l['deskripsi']; ?></h5>
                                                                <h5><?= "Rp. " . number_format($l['harga'], 0, ",", ".");  ?></h5>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <!-- /.radio-card -->

                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </center>
                                </div>

                                <p class="mobile-faq-menu">Big Car</p>
                                <div class="mobile-faq-panel">
                                    <center>
                                        <div class="expertise-faq">
                                            <?php foreach ($layanan as $l) : ?>
                                                <?php if ($l['nama_jenis_layanan'] == 'Big Car' || $l['nama_jenis_layanan'] == 'big car' || $l['nama_jenis_layanan'] == 'bigcar' || $l['nama_jenis_layanan'] == 'BIG CAR') : ?>

                                                    <label for="radio-card-<?= $l['id']; ?>" class="radio-card">
                                                        <input type="radio" name="layanan" id="radio-card-<?= $l['id']; ?>" value="<?= $l['kode']; ?>" checked />
                                                        <div class="card-content-wrapper">
                                                            <span class="check-icon"></span>
                                                            <div class="card-content">
                                                                <img src="https://image.freepik.com/free-vector/group-friends-giving-high-five_23-2148363170.jpg" alt="" />
                                                                <h4><?= $l['nama_layanan']; ?></h4>
                                                                <h5><?= $l['deskripsi']; ?></h5>
                                                                <h5><?= "Rp. " . number_format($l['harga'], 0, ",", ".");  ?></h5>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <!-- /.radio-card -->

                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </center>
                                </div>

                                <p class="mobile-faq-menu">Super Car</p>
                                <div class="mobile-faq-panel">
                                    <center>
                                        <div class="expertise-faq">
                                            <?php foreach ($layanan as $l) : ?>
                                                <?php if ($l['nama_jenis_layanan'] == 'Super Car' || $l['nama_jenis_layanan'] == 'super car' || $l['nama_jenis_layanan'] == 'supercar' || $l['nama_jenis_layanan'] == 'SUPER CAR') : ?>

                                                    <label for="radio-card-<?= $l['id']; ?>" class="radio-card">
                                                        <input type="radio" name="layanan" id="radio-card-<?= $l['id']; ?>" value="<?= $l['kode']; ?>" checked />
                                                        <div class="card-content-wrapper">
                                                            <span class="check-icon"></span>
                                                            <div class="card-content">
                                                                <img src="https://image.freepik.com/free-vector/group-friends-giving-high-five_23-2148363170.jpg" alt="" />
                                                                <h4><?= $l['nama_layanan']; ?></h4>
                                                                <h5><?= $l['deskripsi']; ?></h5>
                                                                <h5><?= "Rp. " . number_format($l['harga'], 0, ",", ".");  ?></h5>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <!-- /.radio-card -->

                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </center>
                                </div>


                            </div>
                        </div>
                        <!-- End mobile menu -->

                        <div class="container">
                            <div class="row">
                                <div class="col-8">
                                    <?php $no = 1; ?>
                                    <?php foreach ($additional as $ad) : ?>
                                        <div class="custom-control custom-checkbox mt-3">
                                            <input type="checkbox" class="custom-control-input" name="kode_additional[]" id="customCheck<?php echo $no; ?>" value="<?php echo $ad['kode']; ?>">
                                            <label class="custom-control-label" for="customCheck<?php echo $no; ?>"><?= $ad['nama']; ?> (<?php echo "Rp. " . number_format($ad['harga'], 0, ",", ".");  ?>)</label>
                                        </div>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <a href="javascript:void(0)" class="btn btn-primary mt-3" onclick="history.back(-1)">Kembali</a>
                        <button type="submit" class="btn btn-success waves-effect waves-light mt-3">Order</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
        <!--====END CONTENT HERE =====-->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
<script>
    $(function() {
        $('#tgl_lahir').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });
    });
</script>

<!-- Footer -->
<?php $this->load->view('templates/footers/footer'); ?>
<!-- End Footer -->
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var acc = document.getElementsByClassName("faq-accordion");
        var panel = document.getElementsByClassName('faq-panel');
        for (var i = 0; i < acc.length; i++) {
            acc[i].onclick = function() {
                var setClasses = !this.classList.contains('active');
                setClass(acc, 'active', 'remove');
                setClass(panel, 'show', 'remove');
                if (setClasses) {
                    this.classList.toggle("active");
                    this.nextElementSibling.classList.toggle("show");
                }
            }
        }

        function setClass(els, className, fnName) {
            for (var i = 0; i < els.length; i++) {
                els[i].classList[fnName](className);
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function(event) {
        var acc = document.getElementsByClassName("mobile-faq-menu");
        var panel = document.getElementsByClassName('mobile-faq-panel');
        for (var i = 0; i < acc.length; i++) {
            acc[i].onclick = function() {
                var setClasses = !this.classList.contains('active');
                setClass(acc, 'active', 'remove');
                setClass(panel, 'show', 'remove');
                if (setClasses) {
                    this.classList.toggle("active");
                    this.nextElementSibling.classList.toggle("show");
                }
            }
        }

        function setClass(els, className, fnName) {
            for (var i = 0; i < els.length; i++) {
                els[i].classList[fnName](className);
            }
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('input:radio').change(function() { //Clicking input radio
            var radioClicked = $(this).attr('id');
            unclickRadio();
            removeActive();
            clickRadio(radioClicked);
            makeActive(radioClicked);
        });
        $(".card").click(function() { //Clicking the card
            var inputElement = $(this).find('input[type=radio]').attr('id');
            unclickRadio();
            removeActive();
            makeActive(inputElement);
            clickRadio(inputElement);
        });
    });


    function unclickRadio() {
        $("input:radio").prop("checked", false);
    }

    function clickRadio(inputElement) {
        $("#" + inputElement).prop("checked", true);
    }

    function removeActive() {
        $(".card").removeClass("active");
    }

    function makeActive(element) {
        $("#" + element + "-card").addClass("active");
    }
</script>

<script>
    function createOption(value, text) {
        var option = document.createElement('option');
        if (text.toString().length == 1) {
            option.text = '0' + text;
        } else {
            option.text = text;
        }

        option.value = value;
        return option;
    }

    var hourSelect = document.getElementById('hours');
    for (var i = 8; i <= 18; i++) {
        hourSelect.add(createOption(i, i));
    }

    var minutesSelect = document.getElementById('minutes');
    for (var i = 15; i < 60; i += 15) {
        let length = i.length;
        minutesSelect.add(createOption(i, i));
    }
</script>