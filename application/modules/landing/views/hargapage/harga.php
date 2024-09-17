<style>
/*
SCSS variables and mixins
*/
/*
Some styles to make this demo look pretty (or at least decent)
If you want to style everything yourself, you shouldn't need these
*/
@import url("https://fonts.googleapis.com/css?family=Roboto:300,400,900");

.tabbed-content {
    max-width: fit-content;
    margin: 1em auto;
}

.tabs ul {
    margin: 0;
    padding: 0 0 1em 0;
    font-weight: bold;
}

.tabs ul li {
    background: #eee;
    border-radius: 5px;
}

.tabs ul li a {
    padding: 0.5em 1em;
    width: 100px;
}

.tabs ul li a:hover,
.tabs ul li a.active {
    background: #3F8EFC;
    color: #eee;
    border-radius: 5px;
    width: 100px;
}

.item {
    margin-bottom: 2px;
}

.item::before {
    cursor: pointer;
    font-weight: bold;
    background: #eee;
    padding: 0.5em;
    display: block;
}

.item.active::before {
    background: #3F8EFC;
    color: #eee;
}

.item.active .item-content {
    padding: 1em;
    transition: opacity 0.3s ease-in-out;
}

@media all and (min-width: 800px) {
    .item.active .item-content {
        padding-top: 0;
    }

    .tabs-side .tabs li {
        margin-bottom: 2px;
    }
}

/* 
The project specific CSS starts here
This is the minimum CSS that you will need in order for this to work
*/
.tabbed-content .tabs {
    display: none;
}

.tabbed-content .item {
    min-height: 2em;
}

.tabbed-content .item::before {
    content: attr(data-title);
}

.tabbed-content .item .item-content {
    opacity: 0;
    visibility: hidden;
    height: 0;
}

.tabbed-content .item.active .item-content {
    opacity: 1;
    visibility: visible;
    height: auto;
}

body {
    background-color: #25272B;
    /*Same as body, you could also use transparent */
    color: #25272B;
}


@media all and (min-width: 800px) {
    .tabbed-content .tabs {
        display: block;
    }

    .tabbed-content .tabs li {
        display: inline-block;
    }

    .tabbed-content .tabs li a {
        display: block;
    }

    .tabbed-content .item {
        min-height: 0;
    }

    .tabbed-content .item::before {
        display: none;
    }

    .tabbed-content.tabs-side .tabs {
        width: 150px;
        float: left;
    }

    .tabbed-content.tabs-side .tabs li {
        display: block;
    }

    .tabbed-content.tabs-side .item {
        margin-left: 150px;
    }
}

/*# sourceMappingURL=style.css.map */
</style>
<!-- START PRICING -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-4 mt-3">
                    <h3>Our Pricing</h3>
                    <p class="text-muted mt-2">It is a long established fact that a reader will be of a page when
                        established fact looking at its layout.</p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <br>
        <article class="tabbed-content">
            <nav class="tabs">
                <center>
                    <ul>
                        <li><a href="#tab1" class="active"><i class="mdi mdi-car-side mdi-24px"></i></a></li>
                        <li><a href="#tab2"><i class="mdi mdi-car-estate mdi-24px"></i></a></li>
                        <li><a href="#tab3"><i class="mdi mdi-car-lifted-pickup mdi-24px"></i></a></li>
                        <li><a href="#tab4"><i class="mdi mdi-car-sports mdi-24px"></i></a></li>
                    </ul>
                </center>
            </nav>
            <section id="tab1" class="item active" data-title="SMALL">
                <div class="item-content">
                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="price-box card border-0 mt-4">
                                <div class="text-center">
                                    <h5 class="mb-0">Starter</h5>
                                </div>
                                <div class="plan-price text-center mt-4">
                                    <h1 class="text-primary mb-0 display-4 fw-medium"><sup>$</sup>9<sub
                                            class="text-muted">/month</sub></h1>
                                </div>
                                <div class="price-features mt-5">
                                    <p><i class="mdi mdi-check text-primary"></i> Bandwidth: <span
                                            class="fw-medium float-end">1GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Onlinespace: <span
                                            class="fw-medium float-end">500MB</span></p>
                                    <p><i class="mdi mdi-close text-primary"></i> Support: <span
                                            class="fw-medium float-end">No</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Domain: <span
                                            class="fw-medium float-end">1</span>
                                    </p>
                                    <p><i class="mdi mdi-check text-primary"></i> Hidden Fees: <span
                                            class="fw-medium float-end">No</span></p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-outline-primary w-100">Join Now</a>
                                </div>
                            </div>
                            <!--end pricing-box-->
                        </div>
                        <!--end col-->
                        <div class="col-md-6 col-lg-4">
                            <div class="price-box card border-0 mt-4">
                                <div class="ribbon">20% sale</div>
                                <div class="text-center">
                                    <h5 class="mb-0">Advanced</h5>
                                </div>
                                <div class="plan-price text-center mt-4">
                                    <h1 class="text-primary mb-0 display-4 fw-medium"><sup>$</sup>19<sub
                                            class="text-muted">/month</sub></h1>
                                </div>
                                <div class="price-features mt-5">
                                    <p><i class="mdi mdi-check text-primary"></i> Bandwidth: <span
                                            class="fw-medium float-end">2GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Onlinespace: <span
                                            class="fw-medium float-end">1GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Support: <span
                                            class="fw-medium float-end">Yes</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Domain: <span
                                            class="fw-medium float-end">3</span>
                                    </p>
                                    <p><i class="mdi mdi-check text-primary"></i> Hidden Fees: <span
                                            class="fw-medium float-end">No</span></p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-primary w-100">Join Now</a>
                                </div>
                            </div>
                            <!--end pricing-box-->
                        </div>
                        <!--end col-->
                        <div class="col-md-6 col-lg-4">
                            <div class="price-box card border-0 mt-4">
                                <div class="text-center">
                                    <h5 class="mb-0">Professional</h5>
                                </div>
                                <div class="plan-price text-center mt-4">
                                    <h1 class="text-primary mb-0 display-4 fw-medium"><sup>$</sup>29<sub
                                            class="text-muted">/month</sub></h1>
                                </div>
                                <div class="price-features mt-5">
                                    <p><i class="mdi mdi-check text-primary"></i> Bandwidth: <span
                                            class="fw-medium float-end">3GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Onlinespace: <span
                                            class="fw-medium float-end">2GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Support: <span
                                            class="fw-medium float-end">Yes</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Domain: <span
                                            class="fw-medium float-end">Unlimited</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Hidden Fees: <span
                                            class="fw-medium float-end">No</span></p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-outline-primary w-100 ">Join Now</a>
                                </div>
                            </div>
                            <!--end pricing-box-->
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </section>
            <section id="tab2" class="item" data-title="MEDIUM">
                <div class="item-content">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="price-box card border-0 mt-4">
                                <div class="text-center">
                                    <h5 class="mb-0">Starter</h5>
                                </div>
                                <div class="plan-price text-center mt-4">
                                    <h1 class="text-primary mb-0 display-4 fw-medium"><sup>$</sup>9<sub
                                            class="text-muted">/month</sub></h1>
                                </div>
                                <div class="price-features mt-5">
                                    <p><i class="mdi mdi-check text-primary"></i> Bandwidth: <span
                                            class="fw-medium float-end">1GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Onlinespace: <span
                                            class="fw-medium float-end">500MB</span></p>
                                    <p><i class="mdi mdi-close text-primary"></i> Support: <span
                                            class="fw-medium float-end">No</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Domain: <span
                                            class="fw-medium float-end">1</span>
                                    </p>
                                    <p><i class="mdi mdi-check text-primary"></i> Hidden Fees: <span
                                            class="fw-medium float-end">No</span></p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-outline-primary w-100">Join Now</a>
                                </div>
                            </div>
                            <!--end pricing-box-->
                        </div>
                        <!--end col-->
                        <div class="col-md-6 col-lg-4">
                            <div class="price-box card border-0 mt-4">
                                <div class="ribbon">20% sale</div>
                                <div class="text-center">
                                    <h5 class="mb-0">Advanced</h5>
                                </div>
                                <div class="plan-price text-center mt-4">
                                    <h1 class="text-primary mb-0 display-4 fw-medium"><sup>$</sup>19<sub
                                            class="text-muted">/month</sub></h1>
                                </div>
                                <div class="price-features mt-5">
                                    <p><i class="mdi mdi-check text-primary"></i> Bandwidth: <span
                                            class="fw-medium float-end">2GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Onlinespace: <span
                                            class="fw-medium float-end">1GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Support: <span
                                            class="fw-medium float-end">Yes</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Domain: <span
                                            class="fw-medium float-end">3</span>
                                    </p>
                                    <p><i class="mdi mdi-check text-primary"></i> Hidden Fees: <span
                                            class="fw-medium float-end">No</span></p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-primary w-100">Join Now</a>
                                </div>
                            </div>
                            <!--end pricing-box-->
                        </div>
                        <!--end col-->
                        <div class="col-md-6 col-lg-4">
                            <div class="price-box card border-0 mt-4">
                                <div class="text-center">
                                    <h5 class="mb-0">Professional</h5>
                                </div>
                                <div class="plan-price text-center mt-4">
                                    <h1 class="text-primary mb-0 display-4 fw-medium"><sup>$</sup>29<sub
                                            class="text-muted">/month</sub></h1>
                                </div>
                                <div class="price-features mt-5">
                                    <p><i class="mdi mdi-check text-primary"></i> Bandwidth: <span
                                            class="fw-medium float-end">3GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Onlinespace: <span
                                            class="fw-medium float-end">2GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Support: <span
                                            class="fw-medium float-end">Yes</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Domain: <span
                                            class="fw-medium float-end">Unlimited</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Hidden Fees: <span
                                            class="fw-medium float-end">No</span></p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-outline-primary w-100 ">Join Now</a>
                                </div>
                            </div>
                            <!--end pricing-box-->
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </section>
            <section id="tab3" class="item" data-title="BIG">
                <div class="item-content">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="price-box card border-0 mt-4">
                                <div class="text-center">
                                    <h5 class="mb-0">Starter</h5>
                                </div>
                                <div class="plan-price text-center mt-4">
                                    <h1 class="text-primary mb-0 display-4 fw-medium"><sup>$</sup>9<sub
                                            class="text-muted">/month</sub></h1>
                                </div>
                                <div class="price-features mt-5">
                                    <p><i class="mdi mdi-check text-primary"></i> Bandwidth: <span
                                            class="fw-medium float-end">1GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Onlinespace: <span
                                            class="fw-medium float-end">500MB</span></p>
                                    <p><i class="mdi mdi-close text-primary"></i> Support: <span
                                            class="fw-medium float-end">No</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Domain: <span
                                            class="fw-medium float-end">1</span>
                                    </p>
                                    <p><i class="mdi mdi-check text-primary"></i> Hidden Fees: <span
                                            class="fw-medium float-end">No</span></p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-outline-primary w-100">Join Now</a>
                                </div>
                            </div>
                            <!--end pricing-box-->
                        </div>
                        <!--end col-->
                        <div class="col-md-6 col-lg-4">
                            <div class="price-box card border-0 mt-4">
                                <div class="ribbon">20% sale</div>
                                <div class="text-center">
                                    <h5 class="mb-0">Advanced</h5>
                                </div>
                                <div class="plan-price text-center mt-4">
                                    <h1 class="text-primary mb-0 display-4 fw-medium"><sup>$</sup>19<sub
                                            class="text-muted">/month</sub></h1>
                                </div>
                                <div class="price-features mt-5">
                                    <p><i class="mdi mdi-check text-primary"></i> Bandwidth: <span
                                            class="fw-medium float-end">2GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Onlinespace: <span
                                            class="fw-medium float-end">1GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Support: <span
                                            class="fw-medium float-end">Yes</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Domain: <span
                                            class="fw-medium float-end">3</span>
                                    </p>
                                    <p><i class="mdi mdi-check text-primary"></i> Hidden Fees: <span
                                            class="fw-medium float-end">No</span></p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-primary w-100">Join Now</a>
                                </div>
                            </div>
                            <!--end pricing-box-->
                        </div>
                        <!--end col-->
                        <div class="col-md-6 col-lg-4">
                            <div class="price-box card border-0 mt-4">
                                <div class="text-center">
                                    <h5 class="mb-0">Professional</h5>
                                </div>
                                <div class="plan-price text-center mt-4">
                                    <h1 class="text-primary mb-0 display-4 fw-medium"><sup>$</sup>29<sub
                                            class="text-muted">/month</sub></h1>
                                </div>
                                <div class="price-features mt-5">
                                    <p><i class="mdi mdi-check text-primary"></i> Bandwidth: <span
                                            class="fw-medium float-end">3GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Onlinespace: <span
                                            class="fw-medium float-end">2GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Support: <span
                                            class="fw-medium float-end">Yes</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Domain: <span
                                            class="fw-medium float-end">Unlimited</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Hidden Fees: <span
                                            class="fw-medium float-end">No</span></p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-outline-primary w-100 ">Join Now</a>
                                </div>
                            </div>
                            <!--end pricing-box-->
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </section>
            <section id="tab4" class="item" data-title="SUPER">
                <div class="item-content">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="price-box card border-0 mt-4">
                                <div class="text-center">
                                    <h5 class="mb-0">Starter</h5>
                                </div>
                                <div class="plan-price text-center mt-4">
                                    <h1 class="text-primary mb-0 display-4 fw-medium"><sup>$</sup>9<sub
                                            class="text-muted">/month</sub></h1>
                                </div>
                                <div class="price-features mt-5">
                                    <p><i class="mdi mdi-check text-primary"></i> Bandwidth: <span
                                            class="fw-medium float-end">1GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Onlinespace: <span
                                            class="fw-medium float-end">500MB</span></p>
                                    <p><i class="mdi mdi-close text-primary"></i> Support: <span
                                            class="fw-medium float-end">No</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Domain: <span
                                            class="fw-medium float-end">1</span>
                                    </p>
                                    <p><i class="mdi mdi-check text-primary"></i> Hidden Fees: <span
                                            class="fw-medium float-end">No</span></p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-outline-primary w-100">Join Now</a>
                                </div>
                            </div>
                            <!--end pricing-box-->
                        </div>
                        <!--end col-->
                        <div class="col-md-6 col-lg-4">
                            <div class="price-box card border-0 mt-4">
                                <div class="ribbon">20% sale</div>
                                <div class="text-center">
                                    <h5 class="mb-0">Advanced</h5>
                                </div>
                                <div class="plan-price text-center mt-4">
                                    <h1 class="text-primary mb-0 display-4 fw-medium"><sup>$</sup>19<sub
                                            class="text-muted">/month</sub></h1>
                                </div>
                                <div class="price-features mt-5">
                                    <p><i class="mdi mdi-check text-primary"></i> Bandwidth: <span
                                            class="fw-medium float-end">2GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Onlinespace: <span
                                            class="fw-medium float-end">1GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Support: <span
                                            class="fw-medium float-end">Yes</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Domain: <span
                                            class="fw-medium float-end">3</span>
                                    </p>
                                    <p><i class="mdi mdi-check text-primary"></i> Hidden Fees: <span
                                            class="fw-medium float-end">No</span></p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-primary w-100">Join Now</a>
                                </div>
                            </div>
                            <!--end pricing-box-->
                        </div>
                        <!--end col-->
                        <div class="col-md-6 col-lg-4">
                            <div class="price-box card border-0 mt-4">
                                <div class="text-center">
                                    <h5 class="mb-0">Professional</h5>
                                </div>
                                <div class="plan-price text-center mt-4">
                                    <h1 class="text-primary mb-0 display-4 fw-medium"><sup>$</sup>29<sub
                                            class="text-muted">/month</sub></h1>
                                </div>
                                <div class="price-features mt-5">
                                    <p><i class="mdi mdi-check text-primary"></i> Bandwidth: <span
                                            class="fw-medium float-end">3GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Onlinespace: <span
                                            class="fw-medium float-end">2GB</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Support: <span
                                            class="fw-medium float-end">Yes</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Domain: <span
                                            class="fw-medium float-end">Unlimited</span></p>
                                    <p><i class="mdi mdi-check text-primary"></i> Hidden Fees: <span
                                            class="fw-medium float-end">No</span></p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-outline-primary w-100 ">Join Now</a>
                                </div>
                            </div>
                            <!--end pricing-box-->
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </section>
        </article>
    </div>
    <!--end row-->
    </div>
    <!--end container-->
</section>
<!-- END PRICING -->