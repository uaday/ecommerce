<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if($this->session->userdata('language_id')=='1'){?>
                    <h1>সাফল্যের গল্প</h1>
                <?php } else {?>
                    <h1>Success Stories</h1>
                <?php }?>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li>Success Stories</li>
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

            <div class="col-md-offset-1 col-md-10" id="blog-listing-medium">

                <?php
                foreach ($notice_list->result() as $notice) {
                $notice_bn_text = strip_tags($notice->bn_notice_text);
                $notice_en_text = strip_tags($notice->en_notice_text);

                if (strlen($notice_bn_text) > 200) {
                    // truncate string
                    $stringCut = substr($notice_bn_text, 0, 200);
                    // make sure it ends in a word so assassinate doesn't become ass...
                    $notice_bn_text = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                }
                if (strlen($notice_en_text) > 200) {
                    // truncate string
                    $stringCut = substr($notice_en_text, 0, 200);
                    // make sure it ends in a word so assassinate doesn't become ass...
                    $notice_en_text = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                }
                ?>



                <section class="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image">
                                <?php if (isset($notice->image)) { ?>
                                        <img src="<?php echo base_url() . $notice->image ?>" class="img-responsive"
                                             alt="notice_image">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <?php if ($this->session->userdata('language_id') == '1') { ?>
                                <h2><?php echo $notice->bn_notice_header ?></h2>
                                <div class="clearfix">
                                    <p class="date-comments">
                                        <a href="blog-post.html"><i
                                                    class="fa fa-calendar-o"></i> <?php echo $notice->post_date ?>
                                        </a>
                                    </p>
                                </div>
                                <p class="intro"><?php echo $notice_bn_text ?></p>
                                <p class="read-more"><a href="<?php echo base_url()?>notice/details_notice/<?php echo $notice->notice_id ?>" class="btn btn-template-main">পড়া
                                        চালিয়ে যান</a>
                                </p>
                            <?php } else { ?>
                                <h2><a href="post.htmls"><?php echo $notice->en_notice_header ?></a></h2>
                                <div class="clearfix">
                                    <p class="date-comments">
                                        <a href="blog-post.html"><i
                                                    class="fa fa-calendar-o"></i> <?php echo $notice->post_date ?>
                                        </a>
                                    </p>
                                </div>
                                <p class="intro"><?php echo $notice_en_text ?></p>
                                <p class="read-more"><a href="<?php echo base_url()?>notice/details_notice/<?php echo $notice->notice_id ?>" class="btn btn-template-main">Continue
                                        reading</a>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                </section>
                <div class="pages">
                        <?php
                        }
                        if (strlen($pagination)) {
                            echo $pagination;
                        }
                        ?>
                </div>
            </div>
            </div>
            <!-- /.col-md-9 -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
     _________________________________________________________ -->

            <!-- /.col-md-3 -->

            <!-- *** RIGHT COLUMN END *** -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /#content -->


