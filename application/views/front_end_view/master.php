<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Brac E-commerce</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800'
          rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="<?php echo base_url() ?>asset/front_end/css/animate.css" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <!--    <link href="--><?php //echo base_url() ?><!--asset/front_end/css/style.default.css" rel="stylesheet" id="theme-stylesheet">-->
    <link href="<?php echo base_url() ?>asset/front_end/css/style.pink.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?php echo base_url() ?>asset/front_end/css/custom.css" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>asset/front_end/logo/brac_fav.png" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>asset/front_end/img/apple-touch-icon.png"/>
    <link rel="apple-touch-icon" sizes="57x57"
          href="<?php echo base_url() ?>asset/front_end/img/apple-touch-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="72x72"
          href="<?php echo base_url() ?>asset/front_end/img/apple-touch-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76"
          href="<?php echo base_url() ?>asset/front_end/img/apple-touch-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?php echo base_url() ?>asset/front_end/img/apple-touch-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120"
          href="<?php echo base_url() ?>asset/front_end/img/apple-touch-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?php echo base_url() ?>asset/front_end/img/apple-touch-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152"
          href="<?php echo base_url() ?>asset/front_end/img/apple-touch-icon-152x152.png"/>
    <!-- owl carousel css -->

    <link href="<?php echo base_url() ?>asset/front_end/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>asset/front_end/css/owl.theme.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri" rel="stylesheet">
</head>

<body>

<div id="all">

    <header>

        <!-- *** TOP ***
_________________________________________________________ -->
        <div id="top">
            <div class="container">
                <div class="row col-md-12">
                    <div class="col-md-offset-9 col-md-2 col-xs-offset-5 col-xs-4">

                        <div class="login">
                            <a href="<?php echo base_url()?>portal/login" target="_blank"><i class="fa fa-sign-in"></i>
                                <span class="text-uppercase">Sign in</span></a>
                        </div>
                    </div>
                    <div class="col-md-1 col-xs-3">
                        <?php if($this->session->userdata('language_id')=='1'){?>
                            <button onclick="language_change('2')" style="border-radius: 15px" class="btn btn-template-primary btn-sm">English</button>
                        <?php } else {?>
                            <button onclick="language_change('1')" style="border-radius: 15px" class="btn btn-template-primary btn-sm">বাংলা</button>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>

        <!-- *** TOP END *** -->

        <!-- *** NAVBAR ***
_________________________________________________________ -->

        <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

            <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                <div class="container">
                    <div class="navbar-header">

                        <a class="navbar-brand home" href="<?php echo base_url()?>">

                            <img style="width: 145px;height: 45px"
                                 src="<?php echo base_url() ?>asset/front_end/logo/logo.png" alt="Universal logo"
                                 class="hidden-xs hidden-sm">

                            <img style="width: 145px;height: 45px" src="<?php echo base_url() ?>asset/front_end/logo/logo.png" alt="Universal logo"
                                 class="visible-xs visible-sm"><span class="sr-only">Universal - go to homepage</span>

                        </a>
                        <div class="navbar-buttons">
                            <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse"
                                    data-target="#navigation">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="fa fa-align-justify"></i>
                            </button>
                        </div>
                    </div>
                    <!--/.navbar-header -->

                    <div class="navbar-collapse collapse" id="navigation">

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown active">
                                <?php if($this->session->userdata('language_id')=='1'){?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>home" >হোম</a>
                                <?php } else {?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>home" >Home</a>
                                <?php }?>

                            </li>
                            <li class=" ">
                                <?php if($this->session->userdata('language_id')=='1'){?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>about_us" >আমাদের সম্পর্কে</a>
                                <?php } else {?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>about_us" >About us</a>
                                <?php }?>
                            </li>

                            <li class=" ">
                                <?php if($this->session->userdata('language_id')=='1'){?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>notice" >সাফল্যের গল্প</a>
                                <?php } else {?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>notice" >Success Stories</a>
                                <?php }?>
                            </li>

                            <li class=" ">
                                <?php if($this->session->userdata('language_id')=='1'){?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>category" >ক্যাটেগরি</a>
                                <?php } else {?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>category" >Category</a>
                                <?php }?>
                            </li>
                            <li class=" ">
                                <?php if($this->session->userdata('language_id')=='1'){?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>product" >পণ্য/সেবা</a>
                                <?php } else {?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>product" >Products/Service</a>
                                <?php }?>
                            </li>
                            <li class=" ">
                                <?php if($this->session->userdata('language_id')=='1'){?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>contact" >যোগাযোগ</a>
                                <?php } else {?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>contact" >Contact</a>
                                <?php }?>

                            </li>
                            <li class=" ">
                                <?php if($this->session->userdata('language_id')=='1'){?>
                                    <a style="text-decoration: none;" href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"><span style="font-family: 'Hind Siliguri', sans-serif;text-transform: uppercase;text-decoration: underline;font-weight: bold;letter-spacing: 0.08em;border-top: solid 5px transparent; text-decoration: none">অনুসন্ধান</span></i></a>
                                <?php } else {?>
                                    <a style="text-decoration: none;" href="#" data-toggle="modal" data-target="#myModal" ><i class="fa fa-search"><span style="font-family: 'Hind Siliguri', sans-serif;text-transform: uppercase;text-decoration: underline;font-weight: bold;letter-spacing: 0.08em;border-top: solid 5px transparent; text-decoration: none">Search</span></i></a>
                                <?php }?>
                            </li>
                            <li>
                                <?php if($this->session->userdata('language_id')=='1'){?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>cart" ><i class="fa fa-shopping-cart"></i> <?= count($this->cart->contents());?> আইটেম</a>
                                <?php } else {?>
                                    <a style="text-decoration: none" href="<?php echo base_url()?>cart" ><i class="fa fa-shopping-cart"></i> <?= count($this->cart->contents());?> Item/s</a>
                                <?php }?>
                            </li>
                        </ul>

                    </div>
                    <!--/.nav-collapse -->


                    <div class="collapse clearfix" id="search">

                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                </span>
                            </div>
                        </form>

                    </div>
                    <!--/.nav-collapse -->

                </div>


            </div>
            <!-- /#navbar -->

        </div>

        <!-- *** NAVBAR END *** -->

    </header>

    <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Customer login</h4>
                </div>
                <div class="modal-body">
                    <form action="customer-orders.html" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email_modal" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password_modal" placeholder="password">
                        </div>

                        <p class="text-center">
                            <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                        </p>

                    </form>



                </div>
            </div>
        </div>
    </div>


    <?php
    if (isset($main_content)) {
        echo $main_content;
    }
    ?>

    <!-- *** FOOTER ***
_________________________________________________________ -->

<!--    <footer id="footer">-->
<!--        <div class="container">-->
<!--            <div class="col-md-3 col-sm-6">-->
<!--                --><?php //if($this->session->userdata('language_id')=='1'){?>
<!--                    <h4>আমাদের সম্পর্কে</h4>-->
<!--                    <p>প্রবৃদ্ধি ক্ষেত্রের মধ্যে ভাল চাকরির দক্ষতা প্রশিক্ষন হস্তশিল্পী ও শ্রম অভিবাসীদের উপর মনোযোগ নিবদ্ধ করে জাতীয় দক্ষতা উন্নয়ন নীতির সাথে সঙ্গতিপূর্ণ উদ্যোগ ও প্রতিষ্ঠান ভিত্তিক প্রশিক্ষণের উপর হাতে-ওপেনটিসশিপস।</p>-->
<!--                --><?php //} else {?>
<!--                    <h4>About us</h4>-->
<!--                    <p>Skills training for decent jobs in growth sectors Hands-on apprenticeships in enterprises and institution based training aligned with the National Skills Development Policy, focusing on disadvantaged groups and labour migrants.</p>-->
<!--                --><?php //}?>
<!---->
<!---->
<!--            </div>-->
<!--            <!-- /.col-md-3 -->
<!---->
<!---->
<!--            <!-- /.col-md-3 -->
<!---->
<!--            <div class="col-md-offset-6 col-sm-offset-6 col-md-3 col-sm-6">-->
<!---->
<!--                --><?php //if($this->session->userdata('language_id')=='1'){?>
<!--                    <h4>যোগাযোগ</h4>-->
<!--                --><?php //} else {?>
<!--                    <h4>Contact</h4>-->
<!--                --><?php //}?>
<!---->
<!---->
<!--                <p><strong>Brac e-commerce</strong>-->
<!--                    <br>BRAC Centre-->
<!--                    <br>75 Mohakhali-->
<!--                    <br>Dhaka-1212.-->
<!--                    <br>880-2-9881265-->
<!--                    <br>info@brac.net-->
<!--                </p>-->
<!---->
<!--                --><?php //if($this->session->userdata('language_id')=='1'){?>
<!--                    <a href="--><?//= base_url()?><!--contact" class="btn btn-small btn-template-main">যোগাযোগ করুন</a>-->
<!--                --><?php //} else {?>
<!--                    <a href="--><?//= base_url()?><!--contact" class="btn btn-small btn-template-main">CONTACT US</a>-->
<!--                --><?php //}?>
<!---->
<!---->
<!--                <hr class="hidden-md hidden-lg hidden-sm">-->
<!---->
<!--            </div>-->
<!--            <!-- /.col-md-3 -->
<!---->
<!--        </div>-->
<!--        <!-- /.container -->
<!--    </footer>-->
    <!-- /#footer -->

    <!-- *** FOOTER END *** -->

    <!-- *** COPYRIGHT ***
_________________________________________________________ -->

    <div id="copyright">
        <div class="container">
            <div class="col-md-12">
                <p class="pull-left">&copy; <?php echo date('Y') ?>. Brac e-commerce</p>

            </div>
        </div>
    </div>
    <!-- /#copyright -->

    <!-- *** COPYRIGHT END *** -->


</div>
<!-- /#all -->




<!-- #### MODAL ### -->



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <?php if($this->session->userdata('language_id')=='1'){?>
                    <h4 class="modal-title">অনুসন্ধান</h4>
                <?php } else {?>
                    <h4 class="modal-title">Search</h4>
                <?php }?>
            </div>
            <form action="<?= base_url()?>search" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="search_type" id="search_type" class="form-control">
                            <?php if($this->session->userdata('language_id')=='1'){?>
                                <option value="1">প্রোডাক্ট</option>
                                <option value="2">শিক্ষার্থী</option>
                                <option value="3">MCP</option>
                            <?php } else{?>
                                <option value="1">Product</option>
                                <option value="2">Learner</option>
                                <option value="3">MCP</option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="search_text" id="search_text" class="form-control">
                    </div>
                    <div class="form-group">
                        <?php if($this->session->userdata('language_id')=='1'){?>
                            <input type="submit" value="অনুসন্ধান" class="form-control btn btn-template-main">
                        <?php } else{?>
                            <input type="submit" value="Search" class="form-control btn btn-template-main">
                        <?php }?>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>



<!-- #### JAVASCRIPT FILES ### -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="<?php echo base_url()?>asset/front_end/js/jquery-1.11.0.min.js"><\/script>')
</script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="<?php echo base_url() ?>asset/front_end/js/jquery.cookie.js"></script>
<script src="<?php echo base_url() ?>asset/front_end/js/waypoints.min.js"></script>
<script src="<?php echo base_url() ?>asset/front_end/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url() ?>asset/front_end/js/jquery.parallax-1.1.3.js"></script>
<script src="<?php echo base_url() ?>asset/front_end/js/front.js"></script>


<!-- owl carousel -->
<script src="<?php echo base_url() ?>asset/front_end/js/owl.carousel.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

<script src="<?php echo base_url() ?>asset/front_end/js/gmaps.js"></script>
<script src="<?php echo base_url() ?>asset/front_end/js/gmaps.init.js"></script>


</body>

</html>

<script >
    function language_change(language) {
        $.ajax(
            {
                type: 'POST',
                data: {language_id: language},
                url: '<?php echo site_url('language/select_language')?>',
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }


    function sort_order(sort) {
        $.ajax(
            {
                type: 'POST',
                data: {sort: sort},
                url: '<?php echo site_url('language/select_sort_order')?>',
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }


</script>