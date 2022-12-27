<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Range Slider | Skote - Admin & Dashboard Template</title>
    <?php include 'layouts/head.php'; ?>
    <!-- ION Slider -->
    <link href="assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" type="text/css" />
    <?php include 'layouts/head-style.php'; ?>

</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Range Slider</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">UI Elements</a></li>
                                    <li class="breadcrumb-item active">Range Slider</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">ION Range slider</h4>
                                <p class="card-title-desc">Cool, comfortable, responsive and easily customizable range slider</p>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3 mt-0">Default</h5>
                                            <input type="text" id="range_01">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3 mt-0">Min-Max</h5>
                                            <input type="text" id="range_02">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3 mt-0">Prefix</h5>
                                            <input type="text" id="range_03">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3 mt-0">Range</h5>
                                            <input type="text" id="range_04">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3 mt-0">Step</h5>
                                            <input type="text" id="range_05">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3 mt-0">Custom Values</h5>
                                            <input type="text" id="range_06">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3 mt-0">Prettify Numbers</h5>
                                            <input type="text" id="range_07">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3 mt-0">Disabled</h5>
                                            <input type="text" id="range_08">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3 mt-0">Extra Example</h5>
                                            <input type="text" id="range_09">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3 mt-0">Use decorate_both option</h5>
                                            <input type="text" id="range_10">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3 mt-0">Postfixes</h5>
                                            <input type="text" id="range_11">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3 mt-0">Hide</h5>
                                            <input type="text" id="range_12">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- Ion Range Slider-->
<script src="assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<!-- Range slider init js-->
<script src="assets/js/pages/range-sliders.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>