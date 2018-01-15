<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Brac E-commerce (Portal)</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url() ?>asset/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url() ?>asset/admin/plugins/node-waves/waves.css" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="<?php echo base_url() ?>asset/admin/plugins/animate-animate.css" rel="stylesheet"/>

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url() ?>asset/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
          rel="stylesheet"/>

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url() ?>asset/admin/plugins/bootstrap-select/css/bootstrap-select.css"
          rel="stylesheet"/>

    <!-- Sweet Alert Css -->
    <link href="<?php echo base_url() ?>asset/admin/plugins/sweetalert/sweetalert.css" rel="stylesheet"/>

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url() ?>asset/admin/plugins/morrisjs/morris.css" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="<?php echo base_url() ?>asset/admin/css/style.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url() ?>asset/admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
          rel="stylesheet">

    <!-- Wait Me Css -->
    <link href="<?php echo base_url() ?>asset/admin/plugins/waitme/waitMe.css" rel="stylesheet"/>

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url() ?>asset/admin/css/themes/theme-pink.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="<?php echo base_url() ?>asset/front_end/logo/brac_fav.png" type="image/x-icon"/>
</head>

<body class="theme-pink">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
               data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php echo base_url() ?>portal/home">Brac Ecommerce</a>
        </div>

    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?php echo base_url() ?>asset/admin/images/user.png" width="48" height="48" alt="User"/>
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('name')?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="<?php echo base_url() ?>portal/login/logout"><i
                                        class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="<?php echo base_url() ?>portal/home">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <?php if($this->session->userdata('user_type')=='1'){?>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">image</i>
                        <span>Slider</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?php echo base_url() ?>portal/slider/add_slider">Add Slider</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>portal/slider/manage_slider">Manage Slider</a>
                        </li>
                    </ul>
                </li>
                <?php }?>
                <?php if($this->session->userdata('user_type')=='1'){?>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">image</i>
                        <span>About Slider</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?php echo base_url() ?>portal/about_slider/add_slider">Add About Slider</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>portal/about_slider/manage_slider">Manage About Slider</a>
                        </li>
                    </ul>
                </li>
                <?php }?>

                <?php if($this->session->userdata('user_type')=='1'){?>
                    <li >
                        <a href="<?php echo base_url() ?>portal/home_body">
                            <i class="material-icons">line_weight</i>
                            <span>Home Body</span>
                        </a>
                    </li>
                <?php }?>
                <?php if($this->session->userdata('user_type')=='1'){?>
                    <li >
                        <a href="<?php echo base_url() ?>portal/home_tab">
                            <i class="material-icons">assignment</i>
                            <span>Home Tab</span>
                        </a>
                    </li>
                <?php }?>
                <?php if($this->session->userdata('user_type')=='1'){?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">announcement</i>
                            <span>Notice</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url() ?>portal/notice/add_notice">Add Notice</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>portal/notice/manage_notice">Manage Notice</a>
                            </li>
                        </ul>
                    </li>
                <?php }?>
                <?php if($this->session->userdata('user_type')=='1'){?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_comfy</i>
                            <span>Category</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url() ?>portal/category/add_category">Add Category</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>portal/category/manage_category">Manage Category</a>
                            </li>
                        </ul>
                    </li>
                <?php }?>
                <?php if($this->session->userdata('user_type')=='1'){?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_comfy</i>
                            <span>Product Settings</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url() ?>portal/product_settings/product_design">Product Design</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>portal/product_settings/product_condition">Product Condition</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>portal/product_settings/product_grade">Product Grade</a>
                            </li>
                        </ul>
                    </li>
                <?php }?>
                <?php if($this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='1'){?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">card_giftcard</i>
                            <span>Product/Service</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if($this->session->userdata('user_type')=='2'){?>
                            <li>
                                <a href="<?php echo base_url() ?>portal/product/add_product">Add Product/Service</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>portal/product/manage_product">Manage Product/Service</a>
                            </li>
                            <?php } else {?>
                            <li>
                                <a href="<?php echo base_url() ?>portal/product/product_approve">Approve Product/Service</a>
                            </li>
                            <?php }?>
                        </ul>
                    </li>
                <?php }?>
                <?php if($this->session->userdata('user_type')=='1'){?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_comfy</i>
                            <span>Learner</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url() ?>portal/learner/add_learner">Bulk Learner</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>portal/learner/manage_learner">Manage Learner</a>
                            </li>
                        </ul>
                    </li>
                <?php }?>
                <?php if($this->session->userdata('user_type')=='1'){?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_comfy</i>
                            <span>MCP</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url() ?>portal/mcp/add_mcp">Bulk MCP</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>portal/mcp/manage_mcp">Manage MCP</a>
                            </li>
                        </ul>
                    </li>
                <?php }?>
                <?php if($this->session->userdata('user_type')=='1'){?>
                    <li >
                        <a href="<?php echo base_url() ?>portal/contact">
                            <i class="material-icons">line_weight</i>
                            <span>Contact</span>
                        </a>
                    </li>
                <?php }?>
                <?php if($this->session->userdata('user_type')=='2'){?>
                    <li >
                        <a href="<?php echo base_url() ?>portal/product_request">
                            <i class="material-icons">line_weight</i>
                            <span>Product/Service Request</span>
                        </a>
                    </li>
                <?php }?>
                <?php if($this->session->userdata('user_type')=='1'){?>
                    <li >
                        <a href="<?php echo base_url() ?>portal/admin_user/admin_user">
                            <i class="material-icons">account_circle</i>
                            <span>Admin User</span>
                        </a>
                    </li>
                <?php }?>
<!--                <li>-->
<!--                    <a href="javascript:void(0);" class="menu-toggle">-->
<!--                        <i class="material-icons">shop</i>-->
<!--                        <span>Shop</span>-->
<!--                    </a>-->
<!--                    <ul class="ml-menu">-->
<!--                        <li>-->
<!--                            <a href="--><?php //echo base_url() ?><!--portal/shop/create_shop">Create Shop</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            --><?php //if ($this->session->userdata('user_type') == '1') { ?>
<!--                                <a href="javascript:void(0);" class="menu-toggle">-->
<!--                                    <span>Track Shop</span>-->
<!--                                </a>-->
<!--                                <ul class="ml-menu">-->
<!--                                    <li><a href="--><?php //echo base_url() ?><!--portal/shop/request_shop">Request Shop</a>-->
<!--                                    </li>-->
<!--                                    <li><a href="--><?php //echo base_url() ?><!--portal/shop/online_shop">Online Shop</a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            --><?php //} else { ?>
<!--                                <a href="--><?php //echo base_url() ?><!--portal/shop/shop_list">Shop List</a>-->
<!--                            --><?php //} ?>
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; <?php echo date('Y') ?> <a href="<?php echo base_url()?>" target="_blank">BRAC E-COMMERCE</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>


<!-- Jquery Core Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Jquery Validation Plugin Css -->
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-validation/jquery.validate.js"></script>

<!-- JQuery Steps Plugin Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-steps/jquery.steps.js"></script>

<!-- Sweet Alert Plugin Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<script src="<?php echo base_url() ?>asset/admin/plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/flot-charts/jquery.flot.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Autosize Plugin Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/momentjs/moment.js"></script>

<script src="<?php echo base_url() ?>asset/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!--<script src="--><?php //echo base_url()?><!--asset/admin/js/pages/forms/basic-form-elements.js"></script>-->


<!-- Jquery DataTable Plugin Js -->
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>asset/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>


<!-- Custom Js -->
<script src="<?php echo base_url() ?>asset/admin/js/admin.js"></script>
<script src="<?php echo base_url() ?>asset/admin/js/pages/tables/jquery-datatable.js"></script>
<!--<script src="--><?php //echo base_url()?><!--asset/admin/js/pages/index.js"></script>-->
<script src="<?php echo base_url() ?>asset/admin/js/pages/forms/form-wizard.js"></script>

<!-- Demo Js -->
<script src="<?php echo base_url() ?>asset/admin/js/demo.js"></script>
</body>

</html>


<script >
    function delete_accout() {
        var check = confirm('Are You Sure To Delete This Account');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_product() {
        var check = confirm('Are You Sure To Delete Product');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_slider() {
        var check = confirm('Are You Sure To Delete The Slider');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_notice() {
        var check = confirm('Are You Sure To Delete The Notice');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_category() {
        var check = confirm('Are You Sure To Delete The Category');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_learner() {
        var check = confirm('Are You Sure To Delete Learner');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_product_design() {
        var check = confirm('Are You Sure To Delete Product Design');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_product_condition() {
        var check = confirm('Are You Sure To Delete Product Condition');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_product_grade() {
        var check = confirm('Are You Sure To Delete Product Grade');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
</script>