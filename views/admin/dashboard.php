<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<!-- Add Bootstrap CSS from CDN -->
<link href="./assets/css/app.min.css" rel="stylesheet" />
<link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="./assets/css/custom.min.css" rel="stylesheet" />
<link href="./assets/css/icons.min.css" rel="stylesheet" />


<head>

    <meta charset="utf-8" />
    <title>Dashboard | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "header.php";

        require_once "siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">Good Morning</h4>
                                                <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                                            </div>
                                            <div class="mt-3 mt-lg-0">
                                                <form action="javascript:void(0);">
                                                    <div class="row g-3 mb-0 align-items-center">
                                                        <div class="col-auto">
                                                            <button type="button" class="btn btn-soft-success material-shadow-none">
                                                                <i class="ri-add-circle-line align-middle me-1"></i> Add Product
                                                            </button>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" class="btn btn-soft-info btn-icon waves-effect material-shadow-none waves-light layout-rightside-btn">
                                                                <i class="ri-pulse-line"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Row 1 -->
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body text-center">
                                                <img src="./assets/images/imgadmin/danhmuc.png" alt="Image 1" class="img-fluid mb-3" style="max-width: 80%; height: auto;">
                                                <a href=""><h1 class="fs-22 fw-semibold ff-secondary">Danh mục</h1></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body text-center">
                                                <img src="./assets/images/imgadmin/sanpham.png" alt="Image 2" class="img-fluid mb-3" style="max-width: 80%; height: auto;">
                                                <a href=""><h1 class="fs-22 fw-semibold ff-secondary">Sản phẩm</h1></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body text-center">
                                                <img src="./assets/images/imgadmin/binhluan.png" alt="Image 3" class="img-fluid mb-3" style="max-width: 80%; height: auto;">
                                                <a href=""><h1 class="fs-22 fw-semibold ff-secondary">Bình luận</h1></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Row 2 -->
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body text-center">
                                                <img src="./assets/images/imgadmin/taikhoan.png" alt="Image 1" class="img-fluid mb-3" style="max-width: 80%; height: auto;">
                                                <a href=""><h1 class="fs-22 fw-semibold ff-secondary">Tài khoản</h1></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body text-center">
                                                <img src="./assets/images/imgadmin/donhang.png" alt="Image 2" class="img-fluid mb-3" style="max-width: 80%; height: auto;">
                                                <a href=""><h1 class="fs-22 fw-semibold ff-secondary">Đơn hàng</h1></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body text-center">
                                                <img src="./assets/images/imgadmin/thongke.png" alt="Image 3" class="img-fluid mb-3" style="max-width: 80%; height: auto;">
                                                <a href=""><h1 class="fs-22 fw-semibold ff-secondary">Thống kê</h1></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> HOMEMEST - G.
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end d-none d-sm-block">
                                        Design & Develop by Themesbrand
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->



            <!--start back-to-top-->
            <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
                <i class="ri-arrow-up-line"></i>
            </button>
            <!--end back-to-top-->

            <!--preloader-->
            <div id="preloader">
                <div id="status">
                    <div class="spinner-border text-primary avatar-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>

            <div class="customizer-setting d-none d-md-block">
                <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                    <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
                </div>
            </div>

            <!-- JAVASCRIPT -->
            <?php
            require_once "./libs_js.php";
            ?>
        </div>
    </div>
</body>

</html>