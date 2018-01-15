<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <?php if($this->session->userdata('user_type')==2){?>
                        <div class="icon">
                            <i class="material-icons">card_giftcard</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Product/Service</div>
                            <div class="number count-to" data-from="0" data-to="<?= $total_learner['0']['total_learner']?>" data-speed="20" data-fresh-interval="15"><?= $total_learner['0']['total_learner']?></div>
                        </div>
                    <?php } else {?>
                        <div class="icon">
                            <i class="material-icons">school</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Trainee</div>
                            <div class="number count-to" data-from="0" data-to="<?= $total_learner['0']['total_learner']?>" data-speed="20" data-fresh-interval="15"><?= $total_learner['0']['total_learner']?></div>
                        </div>
                    <?php }?>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <?php if($this->session->userdata('user_type')==2){?>
                        <div class="icon">
                            <i class="material-icons">card_giftcard</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Approved Product</div>
                            <div class="number count-to" data-from="0" data-to="<?= $total_mcp['0']['total_mcp']?>" data-speed="20" data-fresh-interval="15"><?= $total_mcp['0']['total_mcp']?></div>
                        </div>
                    <?php } else {?>
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">Total MCP</div>
                            <div class="number count-to" data-from="0" data-to="<?= $total_mcp['0']['total_mcp']?>" data-speed="20" data-fresh-interval="15"><?= $total_mcp['0']['total_mcp']?></div>
                        </div>
                    <?php }?>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <?php if($this->session->userdata('user_type')==2){?>
                        <div class="icon">
                            <i class="material-icons">card_giftcard</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Approved Service</div>
                            <div class="number count-to" data-from="0" data-to="<?= $total_product['0']['total_product']?>" data-speed="20" data-fresh-interval="15"><?= $total_product['0']['total_product']?></div>
                        </div>
                    <?php } else {?>
                        <div class="icon">
                            <i class="material-icons">store mall directory</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Online Product</div>
                            <div class="number count-to" data-from="0" data-to="<?= $total_product['0']['total_product']?>" data-speed="20" data-fresh-interval="15"><?= $total_product['0']['total_product']?></div>
                        </div>
                    <?php }?>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <?php if($this->session->userdata('user_type')==2){?>
                        <div class="icon">
                            <i class="material-icons">card_giftcard</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Request Product</div>
                            <div class="number count-to" data-from="0" data-to="<?= $total_request_product['0']['total_request_product']?>" data-speed="20" data-fresh-interval="15"><?= $total_request_product['0']['total_request_product']?></div>
                        </div>
                    <?php } else {?>
                        <div class="icon">
                            <i class="material-icons">card_giftcard</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Request Product</div>
                            <div class="number count-to" data-from="0" data-to="<?= $total_request_product['0']['total_request_product']?>" data-speed="20" data-fresh-interval="15"><?= $total_request_product['0']['total_request_product']?></div>
                        </div>
                    <?php }?>

                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
        <!-- CPU Usage -->

    </div>
</section>