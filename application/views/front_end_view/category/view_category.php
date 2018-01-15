<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if($this->session->userdata('language_id')=='1'){?>
                    <h1>ক্যাটেগরি</h1>
                <?php } else {?>
                    <h1>Category</h1>
                <?php }?>

            </div>
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li>Category</li>
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

            <div class="col-md-12" id="blog-listing-small">

                <div class="row">
                    <?php foreach ($categories as $category){?>

                    <div class="col-md-3 col-sm-6">
                        <div class="box-image-text blog">
                            <div class="top">
                                <div class="image">
                                    <img src="<?php echo base_url().$category['image']?>" width="262.5px" height="175.08px" alt="" >
                                </div>

                            </div>
                            <div class="content">
                                <?php if($this->session->userdata('language_id')=='1'){?>
                                <p class="read-more"><a href="<?php echo base_url()?>product/find_product_by_category?category_id=<?= $category['category_id']?>" class="btn btn-template-main"><?php echo $category['bn_category_name']?></a>
                                <?php } else {?>
                                <p class="read-more"><a href="<?php echo base_url()?>product/find_product_by_category?category_id=<?= $category['category_id']?>" class="btn btn-template-main"><?php echo $category['en_category_name']?></a>
                                </p>
                                <?php }?>
                            </div>
                        </div>
                        <!-- /.box-image-text -->

                    </div>

                    <?php }?>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
