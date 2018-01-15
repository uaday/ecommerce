<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if($this->session->userdata('language_id')=='1'){?>
                    <h1><?php echo $notice['0']['bn_notice_header']?></h1>
                <?php } else {?>
                    <h1><?php echo $notice['0']['en_notice_header']?></h1>
                <?php }?>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url()?>home/">Home</a>
                    </li>
                    <li><a href="<?php echo base_url()?>notice/">Success Stories</a>
                    </li>
                    <li>Details Success Stories</li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">

        <div class="row">

            <!-- *** LEFT COLUMN ***
    _________________________________________________________ -->

            <div class="col-md-offset-1 col-md-10" id="blog-post">


                    <p class="text-muted text-uppercase mb-small text-right"> <?php echo $notice['0']['post_date']?></p>

                    <div id="post-content">


                        <p>
                        <img src="<?php echo base_url() .$notice['0']['image']?>" class="img-responsive" alt="" style="width: 1000px;height: 400px">
                    </p>


                    <blockquote>
                        <?php if($this->session->userdata('language_id')=='1'){?>
                            <p><?php echo $notice['0']['bn_notice_text']?></p>
                        <?php } else {?>
                            <p><?php echo $notice['0']['en_notice_text']?></p>
                        <?php }?>

                    </blockquote>
                </div>



            </div>
            <!-- /#blog-post -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
        _________________________________________________________ -->


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->