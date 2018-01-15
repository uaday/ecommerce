<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if ($this->session->userdata('language_id') == '1') { ?>
                    <h1>প্রশিক্ষণার্থীরা </h1>
                <?php } else { ?>
                    <h1>Learner </h1>
                <?php } ?>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>">Home</a>
                    </li>
                    <li>Our team</li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">

        <section>

            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <?php if ($this->session->userdata('language_id') == '1') { ?>
                            <h2><?php echo $home_tab['2']['bn_home_tab_header'] ?></h2>
                        <?php } else { ?>
                            <h2><?php echo $home_tab['2']['en_home_tab_header'] ?></h2>
                        <?php } ?>
                    </div>
                    <?php if ($this->session->userdata('language_id') == '1') { ?>
                        <p class="lead"><?php echo $home_tab['2']['bn_home_tab_text'] ?></p>
                    <?php } else { ?>
                        <p class="lead"><?php echo $home_tab['2']['en_home_tab_text'] ?></p>
                    <?php } ?>
                </div>
            </div>

            <div class="row">
                <?php
                foreach ($learner_list->result() as $learner) { ?>
                    <div class="col-md-2 col-sm-6">
                        <div class="team-member" data-animate="fadeInDown">
                            <div class="image">
                                <a href="#">
                                    <?php if ($learner->photo != "") { ?>
                                        <img src="<?php echo base_url() . $learner->photo ?>"
                                             style="height: 155px;width: 155px" class=" img-circle">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url() ?>asset/front_end/img/user_demo.png"
                                             style="height: 155px;width: 155px" class="img-circle">
                                    <?php } ?>
                                </a>
                            </div>
                            <h3><a href="#"><?php echo $learner->learner_name ?></a></h3>
                            <p class="role">Learner</p>
                        </div>
                        <!-- /.team-member -->
                    </div>
                <?php } ?>
            </div>
            <!-- /.row -->
        </section>
        <div class="pages">
            <?php
            if (strlen($pagination)) {
                echo $pagination;
            }
            ?>
        </div>

    </div>
    <!-- /.container -->

    <!-- /.bar -->

</div>
<!-- /#content -->
