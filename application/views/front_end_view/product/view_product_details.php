<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 10/14/2017
 * Time: 1:05 PM
 */

//echo date('y-m-d',strtotime("+7 day",strtotime($product['0']['product_create_date'])));
//print_r($product['0']['mcp_id']);
//exit();
?>
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1><?= $product['0']['product_name']?></h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url()?>">Home</a>
                    </li>
                    <li><a href="<?= base_url()?>product">Product</a>
                    </li>
                    <li>Product Details
                    </li>
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

            <div class="col-md-9">

                <p class="lead"><?= $product['0']['product_description'] ?>
                </p>

                <div class="row" id="productMain">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <img src="<?= base_url().$product['0']['product_photo'] ?>" height="500.27px" width="350.57px"
                                 alt="" >
                        </div>
                        <?php if($product['0']['service']=='1'){?>
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
                        <?php if(date('y-m-d')<=date('y-m-d',strtotime("+7 day",strtotime($product['0']['product_create_date'])))){?>

                        <div class="ribbon new">
                            <div class="theribbon">NEW</div>
                            <div class="ribbon-background"></div>
                        </div>
                        <!-- /.ribbon -->
                        <?php }?>

                    </div>
                    <div class="col-sm-6">
                        <h2 class="" style="border-bottom: solid 5px  #ee008c"><?php if($product['0']['service']=='1') echo 'Service'; else echo 'Product';?> Details</h2>
                        <div >

                            <form method="post" action="<?php echo base_url()?>cart/add_to_cart">
                                <div id="details">

                                    <p>
                                    <h4><?php if($product['0']['service']=='1') echo 'Service'; else echo 'Product';?> Name</h4>
                                    <p><?= $product['0']['product_name']?></p>
                                    <?php if($product['0']['product_material']!=''&& $product['0']['service']=='0'){?>
                                    <h4>Product Material</h4>
                                    <p><?= $product['0']['product_material']?></p>
                                    <?php }?>
                                    <?php if($product['0']['product_color']!=''&& $product['0']['service']=='0'){?>
                                    <h4>Product Color</h4>
                                    <p><?= $product['0']['product_color']?></p>
                                    <?php }?>
                                    <?php if($product['0']['product_size']!=''&& $product['0']['service']=='0'){?>
                                    <h4>Product Size</h4>
                                    <p><?= $product['0']['product_size']?></p>
                                    <?php }?>
                                    <?php if($product['0']['product_design']!='' && $product['0']['service']=='0'){?>
                                    <h4>Product Design</h4>
                                    <p><?= $product['0']['product_design']?></p>
                                    <?php }?>
                                    <?php if($product['0']['product_condition']!='' && $product['0']['service']=='0'){?>
                                    <h4>Product Condition</h4>
                                    <p><?= $product['0']['product_condition']?></p>
                                    <?php }?>
                                    <?php if($product['0']['automatic_grade']!='' && $product['0']['service']=='0'){?>
                                    <h4>Automatic Grade</h4>
                                    <p><?= $product['0']['automatic_grade']?></p>
                                    <?php }?>

                                    <h4><?php if($product['0']['service']=='1') echo 'Service'; else echo 'Product';?> Price</h4>
                                    <p>৳ <?= $product['0']['product_price']?></p>
                                </div>

                                <p class="col-md-4">
                                    <input type="number" name="quantity" class="form-control" placeholder="Quantity" value="1">
                                    <input type="hidden" name="product_name" value="<?= $product['0']['product_name']?>">
                                    <input type="hidden" name="product_price" value="<?= $product['0']['product_price']?>">
                                    <input type="hidden" name="product_id" value="<?= $product['0']['product_id']?>">
                                    <input type="hidden" name="mcp_id" value="<?= $product['0']['mcp_id']?>">
                                    <input type="hidden" name="mcp_name" value="<?= $product['0']['mcp_name']?>">
                                    <input type="hidden" name="product_photo" value="<?= $product['0']['product_photo']?>">
                                </p>

                                <p>
                                    <button type="submit" class="btn btn-template-main"><i
                                                class="fa fa-shopping-cart"></i> Add to cart
                                    </button>
                                </p>

                            </form>
                        </div>
                    </div>

                </div>


                <div  id="details">
                    <h2 class="" style="border-bottom: solid 5px  #ee008c;">Shop Details</h2>
                    <h4>Shop Name</h4>
                    <p><?= $product['0']['shop_name']?></p>
                    <h4>Owner Name</h4>
                    <p><?= $product['0']['mcp_name']?></p>
                    <h4>Shop Address</h4>
                    <p><?= $product['0']['shop_address']?></p>
                    <h4>Phone Number</h4>
                    <p><?= $product['0']['phone_number']?></p>
                    <p>
                    <a class="btn btn-template-primary" href="<?= base_url() ?>profile/mcp_profile/<?php echo $product['0']['mcp_id']?>">View shop owner <?php if($product['0']['service']=='1') echo 'Service'; else echo 'Product';?> ></a>
                    </p>
                        <br>
                </div>

            </div>
            <!-- /.col-md-9 -->


            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
  _________________________________________________________ -->

            <div class="col-sm-3">

                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <?php foreach ($categories as $category){?>
                                <li class="<?php if($category['category_id']==$product['0']['tbl_category_category_id']) echo 'active'?>">
                                    <?php if($this->session->userdata('language_id')==1){?>
                                        <a href="<?php echo base_url()?>product/find_product_by_category?category_id=<?= $category['category_id']?>"><?= $category['bn_category_name']?></a>
                                    <?php } else {?>
                                        <a href="<?php echo base_url()?>product/find_product_by_category?category_id=<?= $category['category_id']?>"><?= $category['en_category_name']?></a>
                                    <?php }?>

                                </li>
                            <?php }?>

                        </ul>

                    </div>

                    <div class="panel-heading">
                        <h3 class="panel-title">Related <?php if($product['0']['service']=='1') echo 'Service'; else echo 'Product';?></h3>
                    </div>

                    <div class="row">
                        <?php foreach ($rels as $rel){?>
                        <div style="margin-top: 18px" class="col-sm-6"><a href="<?php echo base_url()?>product/product_details?product_id=<?php echo $rel['product_id'] ?>&type=<?php echo $rel['service'] ?>&category=<?php echo $rel['tbl_category_category_id'] ?>">
                                <img style="border-radius: 10px;border: 2px solid #333333" src="<?= base_url().$rel['product_photo']?>" class="img-responsive" alt="#">
                            </a></div>
                        <?php }?>


                    </div>
                    <div class="row">

                    </div>


                </div>

            </div>
            <!-- /.col-md-3 -->

            <!-- *** RIGHT COLUMN END *** -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
