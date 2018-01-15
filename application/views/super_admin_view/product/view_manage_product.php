<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Manage Product
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product/Service</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($products as $product) { ?>
                                <tr>
                                    <th scope="row"><?php echo ++$j; ?></th>
                                    <td><img src="<?php echo base_url() . $product['product_photo'] ?>" alt="product_image"
                                             style="width: 200px;height: 100px;"></td>
                                    <?php if($product['service']=='0'){?>
                                        <td>Product</td>
                                    <?php }else {?>
                                        <td>Service</td>
                                    <?php }?>
                                    <td><?php echo $product['product_name'] ?></td>
                                    <td><?php echo $product['product_price'] ?></td>
                                    <?php if ($product['status'] == '1') { ?>
                                        <td>Approved</td>
                                    <?php } else { ?>
                                        <td>Not Approved</td>
                                    <?php } ?>
                                    <td>
                                        <a href="<?php echo base_url()?>portal/product/edit_product/<?php echo $product['product_id'] ?>"><i class="material-icons">edit</i></a>
                                        <a href="<?php echo base_url()?>portal/product/delete_product/<?php echo $product['product_id'] ?>" onclick="return delete_product();"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>