<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if ($this->session->userdata('language_id') == '1') { ?>
                    <h1>প্রশিক্ষণার্থীরা </h1>
                <?php } else { ?>
                    <h1>MCP </h1>
                <?php } ?>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>">Home</a>
                    </li>
                    <li>Our MCP</li>
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
                            <h2><?php echo $home_tab['1']['bn_home_tab_header'] ?></h2>
                        <?php } else { ?>
                            <h2><?php echo $home_tab['1']['en_home_tab_header'] ?></h2>
                        <?php } ?>
                    </div>
                    <?php if ($this->session->userdata('language_id') == '1') { ?>
                        <p class="lead"><?php echo $home_tab['1']['bn_home_tab_text'] ?></p>
                    <?php } else { ?>
                        <p class="lead"><?php echo $home_tab['1']['en_home_tab_text'] ?></p>
                    <?php } ?>
                </div>
            </div>

            <div class="row">
                <?php
                foreach ($mcp_list->result() as $mcp) { ?>
                    <div class="col-md-2 col-sm-6">
                        <div class="team-member" data-animate="fadeInDown">
                            <div class="image">
                                <a href="<?= base_url() ?>profile/mcp_profile/<?php echo $mcp->mcp_id ?>">
                                    <?php if ($mcp->photo != "") { ?>
                                        <img src="<?php echo base_url() . $mcp->photo ?>"
                                             style="height: 155px;width: 155px" class="img-circle">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url() ?>asset/front_end/img/user_demo.png"
                                             style="height: 155px;width: 155px" class="img-circle">
                                    <?php } ?>
                                </a>
                            </div>
                            <h5>
                                <a href="<?= base_url() ?>profile/mcp_profile/<?php echo $mcp->mcp_id ?>"><?php echo $mcp->mcp_name ?>
                            </h5>
                            <p class="role">mcp</p>
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
