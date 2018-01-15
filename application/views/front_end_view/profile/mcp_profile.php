<style>

    .fb-profile img.fb-image-lg {
        z-index: 0;
        width: 100%;
        margin-bottom: 10px;
    }

    .fb-image-profile {
        margin: -120px 10px 0px 50px;
        z-index: 9;
        width: 15%;
        height: 167px;
    }

    @media (max-width: 768px) {
        .fb-profile img.fb-image-lg {
            z-index: 0;
            width: 100%;
            margin-bottom: 10px;
            height: 100px;
        }

        .fb-profile-text > h1 {
            font-weight: 700;
            font-size: 20px;
        }

        .fb-image-profile {
            margin: -35px 10px 0px 25px;
            z-index: 9;
            width: 18%;
            height: 72px;
        }
    }
</style>

<div id="content">
    <div class="container">

        <div class="row">
            <!-- *** LEFT COLUMN ***
     _________________________________________________________ -->

            <div class="col-md-12" id="blog-listing-small">

                <div class="row">
                    <div class="fb-profile">
                        <?php if($mcp['0']['shop_photo']!=''){?>
                            <img align="left" class="fb-image-lg  " height="350px"
                                 src="<?= base_url().$mcp['0']['shop_photo'] ?>"
                                 alt="Profile image example"/>
                        <?php } else {?>
                            <img align="left" class="fb-image-lg " height="350px"
                                 src="<?= base_url() ?>upload/shop_image/demo_shop.jpg"
                                 alt="Profile image example"/>
                        <?php }?>
                        <?php if(isset($mcp['0']['photo'])){?>
                            <img align="left" class="fb-image-profile img-circle "
                                 src="<?= base_url().$mcp['0']['photo'] ?>"/>
                        <?php } else {?>
                            <img align="left" class="fb-image-profile img-circle "
                                 src="<?= base_url() ?>asset/front_end/img/user_demo.png"/>
                        <?php }?>
                        <div class="fb-profile-text">
                            <h1><?= $mcp['0']['mcp_name']?></h1>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row heading">
                    <h3>Shop Info</h3>
                </div>
                <div class="col-md-12">
                    <div class="col-md-3"><h4>Shop Name</h4>
                        <p><?= $mcp['0']['shop_name']?></p></div>
                    <div class="col-md-3"><h4>Products</h4>
                        <p><?= $mcp['0']['product']?></p></div>
                    <div class="col-md-3"><h4>Shop Address</h4>
                        <p><?= $mcp['0']['shop_address']?></p></div>
                    <div class="col-md-3"><h4>Phone Number</h4>
                        <p>+880<?= $mcp['0']['phone_number']?></p></div>

                </div>


            </div>

        </div>
        <!-- /.row -->
    </div>
    <section class="bar background-gray no-mb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2>Shop Products</h2>
                    </div>

                    <p class="lead text-center">Visualize all this shop product in this platform for sell and showcase purpose.</p>


                    <!-- *** TESTIMONIALS CAROUSEL ***
_________________________________________________________ -->

                    <ul class="owl-carousel testimonials same-height-row">
                        <?php
                        foreach ($product_list->result() as $product) { ?>
                        <li class="item">
                            <div class="product">
                                <div class="image">
                                    <a href="<?php echo base_url()?>product/product_details/<?php echo $product->product_id ?>">
                                        <?php if($product->product_photo!=""){?>
                                            <img src="<?php echo base_url().$product->product_photo; ?>" alt="img" style=" height: 262.48px;width: 262.48px" class="img-responsive image1">
                                        <?php } else {?>
                                            <img src="<?php echo base_url()?>asset/front_end/img/product.jpg" style=" height: 262.48px;width: 262.48px" class="img-responsive image1">
                                        <?php }?>
                                    </a>
                                </div>

                                <?php if($product->service=='1'){?>
                                    <div class="ribbon sale">
                                        <div class="theribbon">Service</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                <?php } else {?>
                                    <div class="ribbon sale">
                                        <div class="theribbon">Product</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                <?php }?>
                                <!-- /.ribbon -->
                                <?php if(date('y-m-d')<=date('y-m-d',strtotime("+7 day",strtotime($product->product_create_date)))){?>

                                    <div class="ribbon new">
                                        <div class="theribbon">NEW</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                    <!-- /.ribbon -->
                                <?php }?>

                                <!-- /.image -->
                                <div class="text">
                                    <h5><a href="shop-detail.html"><?php echo $product->product_name ?></a></h5>
                                    <p class="price">৳<?php echo $product->product_price ?></p>
                                    <a href="<?php echo base_url()?>product/product_details/<?php echo $product->product_id ?>" class="btn btn-default">View detail</a>
                                </div>
                                <!-- /.text -->
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                    <!-- /.owl-carousel -->

                    <!-- *** TESTIMONIALS CAROUSEL END *** -->


                    <div class="heading text-center">
                        <h2>Learner Lists</h2>
                    </div>

                    <p class="lead text-center">This MCP learner list who train them</p>

                    <ul class="owl-carousel testimonials same-height-row">
                        <?php
                        foreach ($learner_list->result() as $learner) { ?>
                                <div class="team-member" data-animate="fadeInDown">
                                    <div class="image">
                                        <a href="#">
                                            <?php if($learner->photo!=""){?>
                                                <img src="<?php echo base_url().$learner->photo ?>" style="height: 155px;width: 155px" class=" img-circle">
                                            <?php } else {?>
                                                <img src="<?php echo base_url()?>asset/front_end/img/user_demo.png" style="height: 155px;width: 155px" class="img-circle">
                                            <?php }?>
                                        </a>
                                    </div>
                                    <h3><a href="#"><?php echo $learner->learner_name ?></a></h3>
                                    <p class="role">Learner</p>
                                </div>
                                <!-- /.team-member -->
                        <?php }?>
                    </ul>


                </div>

            </div>
        </div>
    </section>
    <!-- /.container -->
</div>
<!-- /#content -->
