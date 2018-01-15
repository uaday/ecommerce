<!-- *** LOGIN MODAL END *** -->


<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if($this->session->userdata('language_id')=='1'){?>
                    <h1>আমদের সম্পর্কে</h1>
                <?php } else {?>
                    <h1>About Us</h1>
                <?php }?>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    </li>
                    <li>About Us</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <section>
            <!-- *** HOMEPAGE CAROUSEL ***
        _________________________________________________________ -->
            <div class="project owl-carousel">

                <div class="project owl-carousel">
                    <?php foreach ($sliders as $slider) { ?>
                        <div class="item">
                            <img src="<?php echo base_url() ?><?php echo $slider['image'] ?>" height="354px" width="1140px" alt=""
                                 >
                        </div>
                    <?php } ?>
                </div>

            </div>
            <!-- *** HOMEPAGE CAROUSEL END *** -->
        </section>
        <section class="bar background-white no-mb">
            <div class="container" data-animate="fadeInUpBig">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($this->session->userdata('language_id') == '1') { ?>
                            <div class="heading text-center">

                                <h2><?php echo $home_body['0']['bn_body_header'] ?></h2>
                            </div>

                            <p class="lead"><?php echo $home_body['0']['bn_body_text'] ?></p>
                        <?php } else { ?>
                            <div class="heading text-center">

                                <h2><?php echo $home_body['0']['en_body_header'] ?></h2>
                            </div>

                            <p class="lead"><?php echo $home_body['0']['en_body_text'] ?></p>
                        <?php } ?>


                        <div class="row portfolio">
                            <div class="col-sm-4">
                                <div class="box-image">
                                    <div class="image">
                                        <img style="height:238px;width: 360px"
                                             src="<?php echo base_url() . $home_tab['0']['image'] ?>" alt="tab_image"
                                             class="img-responsive">
                                    </div>
                                    <div class="bg"></div>
                                    <?php if ($this->session->userdata('language_id') == '1') { ?>
                                        <div class="name">
                                            <h3><a href="#"><?php echo $home_tab['0']['bn_home_tab_header'] ?></a></h3>
                                        </div>
                                        <div class="text">
                                            <p class="hidden-sm"><?php echo $home_tab['0']['bn_home_tab_text'] ?></p>
                                            <p class="buttons">
                                                <a href="#"
                                                   class="btn btn-template-transparent-primary">বিস্তারিত</a>
                                            </p>
                                        </div>
                                    <?php } else { ?>
                                        <div class="name">
                                            <h3><a href="#"><?php echo $home_tab['0']['en_home_tab_header'] ?></a></h3>
                                        </div>
                                        <div class="text">
                                            <p class="hidden-sm"><?php echo $home_tab['0']['en_home_tab_text'] ?></p>
                                            <p class="buttons">
                                                <a href="#"
                                                   class="btn btn-template-transparent-primary">Details</a>
                                            </p>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- /.item -->

                            </div>

                            <div class="col-sm-4">
                                <div class="box-image">
                                    <div class="image">
                                        <img style="height:238px;width: 360px"
                                             src="<?php echo base_url() . $home_tab['1']['image'] ?>" alt="tab_image"
                                             class="img-responsive">
                                    </div>
                                    <div class="bg"></div>
                                    <?php if ($this->session->userdata('language_id') == '1') { ?>
                                        <div class="name">
                                            <h3>
                                                <a href="<?php echo base_url() ?>mcp"><?php echo $home_tab['1']['bn_home_tab_header'] ?></a>
                                            </h3>
                                        </div>
                                        <div class="text">
                                            <p class="hidden-sm"><?php echo $home_tab['1']['bn_home_tab_text'] ?></p>
                                            <p class="buttons">
                                                <a href="<?php echo base_url() ?>mcp"
                                                   class="btn btn-template-transparent-primary">বিস্তারিত</a>
                                            </p>
                                        </div>
                                    <?php } else { ?>
                                        <div class="name">
                                            <h3>
                                                <a href="<?php echo base_url() ?>mcp"><?php echo $home_tab['1']['en_home_tab_header'] ?></a>
                                            </h3>
                                        </div>
                                        <div class="text">
                                            <p class="hidden-sm"><?php echo $home_tab['1']['en_home_tab_text'] ?></p>
                                            <p class="buttons">
                                                <a href="<?php echo base_url() ?>mcp"
                                                   class="btn btn-template-transparent-primary">Details</a>
                                            </p>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- /.item -->

                            </div>

                            <div class="col-sm-4">
                                <div class="box-image">
                                    <div class="image">
                                        <img style="height:238px;width: 360px"
                                             src="<?php echo base_url() . $home_tab['2']['image'] ?>" alt="tab_image"
                                             class="img-responsive">
                                    </div>
                                    <div class="bg"></div>
                                    <?php if ($this->session->userdata('language_id') == '1') { ?>
                                        <div class="name">
                                            <h3>
                                                <a href="<?php echo base_url() ?>learner"><?php echo $home_tab['2']['bn_home_tab_header'] ?></a>
                                            </h3>
                                        </div>
                                        <div class="text">
                                            <p class="hidden-sm"><?php echo $home_tab['2']['bn_home_tab_text'] ?></p>
                                            <p class="buttons">
                                                <a href="<?php echo base_url() ?>learner"
                                                   class="btn btn-template-transparent-primary">বিস্তারিত</a>
                                            </p>
                                        </div>
                                    <?php } else { ?>
                                        <div class="name">
                                            <h3>
                                                <a href="<?php echo base_url() ?>learner"><?php echo $home_tab['2']['en_home_tab_header'] ?></a>
                                            </h3>
                                        </div>
                                        <div class="text">
                                            <p class="hidden-sm"><?php echo $home_tab['2']['en_home_tab_text'] ?></p>
                                            <p class="buttons">
                                                <a href="<?php echo base_url() ?>learner"
                                                   class="btn btn-template-transparent-primary">Details</a>
                                            </p>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- /.item -->

                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </section>
    </div>
        <!-- /.bar -->


        <!-- *** GET IT ***
        _________________________________________________________ -->


        <!-- *** GET IT END *** -->