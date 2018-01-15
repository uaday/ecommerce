<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 8/30/2017
 * Time: 2:38 AM
 */
?>
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if($this->session->userdata('language_id')=='1'){?>
                    <h1>পণ্য/সেবা</h1>
                <?php } else {?>
                    <h1>Product/Service</h1>
                <?php }?>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url()?>home">Home</a>
                    </li>
                    <li>Product</li>
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

            <div class="col-sm-3">

                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Sort By</h3>
                    </div>

                    <div class="panel-body">
                        <select name="sort" id="" class="form-control" onchange="sort_order(this.value)">
                            <option <?php if($this->session->userdata('sort')=='1') echo 'selected'?> value="1">Newest on top</option>
                            <option  <?php if($this->session->userdata('sort')=='2') echo 'selected'?> value="2">Oldest on top</option>
                            <option <?php if($this->session->userdata('sort')=='3') echo 'selected'?> value="3">Highest price on top</option>
                            <option  <?php if($this->session->userdata('sort')=='4') echo 'selected'?> value="4">Lowest price on top</option>
                            <option  <?php if($this->session->userdata('sort')=='5') echo 'selected'?> value="5">Product on top</option>
                            <option  <?php if($this->session->userdata('sort')=='6') echo 'selected'?> value="6">Service on top</option>
                        </select>

                    </div>
                </div>


                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <?php foreach ($categories as $category){?>
                                <li class="<?php if($category['category_id']==$this->session->userdata('category_id')) echo 'active'?>">
                                    <?php if($this->session->userdata('language_id')==1){?>
                                        <a href="<?php echo base_url()?>product/find_product_by_category?category_id=<?= $category['category_id']?>"><?= $category['bn_category_name']?></a>
                                    <?php } else {?>
                                        <a href="<?php echo base_url()?>product/find_product_by_category?category_id=<?= $category['category_id']?>"><?= $category['en_category_name']?></a>
                                    <?php }?>

                                </li>
                            <?php }?>

                        </ul>

                    </div>
                </div>




                <!-- *** MENUS AND FILTERS END *** -->

            </div>
            <!-- /.col-md-3 -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
    _________________________________________________________ -->

            <div class="col-sm-9">

                <form action="<?php echo base_url()?>product/search_product" method="post">
                    <div class="row form-group">
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="search_product" placeholder="Search your desire product">
                        </div>
                        <div class="col-md-3">
                            <button class="form-control btn btn-template-primary" type="submit"><i class="fa fa-search"> Search</i></button>
                        </div>
                    </div>
                </form>

                <div class="row products">
                    <?php
                    foreach ($product_list->result() as $product) { ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="product">
                            <div class="image">
                                <a href="<?php echo base_url()?>product/product_details?product_id=<?php echo $product->product_id ?>&type=<?php echo $product->service ?>&category=<?php echo $product->tbl_category_category_id ?>">
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
                                <a href="<?php echo base_url()?>product/product_details?product_id=<?php echo $product->product_id ?>&type=<?php echo $product->service ?>&category=<?php echo $product->tbl_category_category_id ?>" class="btn btn-default">View detail</a>
                                <p class="buttons">
                                    <a href="#" class="btn btn-default">View detail</a>
                                    <a href="#" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </p>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>
                    <?php }?>


                    <!-- /.col-md-4 -->
                </div>
                <!-- /.products -->



                <div class="pages">
                    <?php
                    if (strlen($pagination)) {
                        echo $pagination;
                    }
                    ?>
                </div>


            </div>
            <!-- /.col-md-9 -->

            <!-- *** RIGHT COLUMN END *** -->

        </div>

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->