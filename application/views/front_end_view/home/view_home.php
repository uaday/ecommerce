<!-- *** LOGIN MODAL END *** -->

<section>
    <!-- *** HOMEPAGE CAROUSEL ***
_________________________________________________________ -->

    <div class="home-carousel">

        <div class="dark-mask"></div>

        <div class="container">
            <div class="homepage owl-carousel">
                <?php foreach ($sliders as $slider) {
                    $ran = rand(1, 4); ?>
                    <?php if ($ran == '2') { ?>
                        <div class="item">
                            <div class="row">

                                <div class="col-sm-7 text-center">
                                    <img class="img-responsive"
                                         src="<?php echo base_url() ?><?php echo $slider['image'] ?>"
                                         alt="slider_image">
                                </div>

                                <div class="col-sm-5">
                                    <?php if ($this->session->userdata('language_id') == '1') { ?>
                                        <h2><?php echo $slider['bn_slider_header'] ?></h2>
                                        <p><?php echo $slider['bn_slider_text'] ?></p>
                                    <?php } else { ?>
                                        <h2><?php echo $slider['en_slider_header'] ?></h2>
                                        <p><?php echo $slider['en_slider_text'] ?></p>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    <?php } else if ($ran == '3') { ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5 right">
                                    <?php if ($this->session->userdata('language_id') == '1') { ?>
                                        <h2><?php echo $slider['bn_slider_header'] ?></h2>
                                        <p><?php echo $slider['bn_slider_text'] ?></p>
                                    <?php } else { ?>
                                        <h2><?php echo $slider['en_slider_header'] ?></h2>
                                        <p><?php echo $slider['en_slider_text'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="col-sm-7">
                                    <img class="img-responsive"
                                         src="<?php echo base_url() ?><?php echo $slider['image'] ?>"
                                         alt="slider_image">
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-7">
                                    <img class="img-responsive"
                                         src="<?php echo base_url() ?><?php echo $slider['image'] ?>"
                                         alt="slider_image">
                                </div>
                                <div class="col-sm-5">
                                    <?php if ($this->session->userdata('language_id') == '1') { ?>
                                        <h2><?php echo $slider['bn_slider_header'] ?></h2>
                                        <p><?php echo $slider['bn_slider_text'] ?></p>
                                    <?php } else { ?>
                                        <h2><?php echo $slider['en_slider_header'] ?></h2>
                                        <p><?php echo $slider['en_slider_text'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <!-- /.project owl-slider -->
        </div>
    </div>

    <!-- *** HOMEPAGE CAROUSEL END *** -->
</section>



<div id="get-it">
    <div class="container">
        <div class="col-md-8 col-sm-12">
            <?php if($this->session->userdata('language_id')=='1'){?>
                <h3>আপনি বাজারে পণ্য/সেবা দেখতে চান?</h3>
            <?php } else {?>
                <h3>Do you want See The Product/Service in marketplace?</h3>
            <?php }?>
        </div>
        <div class="col-md-2 col-sm-12">
            <?php if($this->session->userdata('language_id')=='1'){?>
                <a href="<?= base_url()?>product" class="btn btn-template-transparent-primary">মার্কেটপ্লেসে যান</a>
            <?php } else {?>
                <a href="<?= base_url()?>product" class="btn btn-template-transparent-primary">Go To Marketplace</a>
            <?php }?>
        </div>
    </div>
</div>
<br>

<section class="bar background-pentagon no-mb">
    <div class="container">
        <div class="row showcase">
            <div class="col-md-4 col-sm-6">
                <div class="item">
                    <div class="icon"><i class="fa fa-gift"></i>
                    </div>
                    <?php if($this->session->userdata('language_id')=='1'){?>
                        <h4><span class="counter"><?= $total_product['0']['total_product']?></span><br>
                            পণ্য</h4>
                    <?php } else {?>
                        <h4><span class="counter"><?= $total_product['0']['total_product']?></span><br>
                            Product</h4>
                    <?php }?>




                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="item">
                    <div class="icon"><i class="fa fa-user-secret"></i>
                    </div>
                    <?php if($this->session->userdata('language_id')=='1'){?>
                        <h4><span class="counter"><?= $total_mcp['0']['total_mcp']?></span><br>
                            প্রশিক্ষক</h4>
                    <?php } else {?>
                        <h4><span class="counter"><?= $total_mcp['0']['total_mcp']?></span><br>
                            TRAINERS</h4>
                    <?php }?>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="item">
                    <div class="icon"><i class="fa fa-users"></i>
                    </div>
                    <?php if($this->session->userdata('language_id')=='1'){?>
                        <h4><span class="counter"><?= $total_learner['0']['total_learner']?></span><br>
                            শিক্ষার্থী</h4>
                    <?php } else {?>
                        <h4><span class="counter"><?= $total_learner['0']['total_learner']?></span><br>
                            Learner</h4>
                    <?php }?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /.bar -->


<!-- *** GET IT ***
_________________________________________________________ -->




<!-- *** GET IT END *** -->