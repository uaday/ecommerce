<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Product Request
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>Address</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Product Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($Prequests as $Prequest) { ?>
                                <tr>
                                    <th scope="row"><?php echo ++$j; ?></th>

                                    <td><?php echo $Prequest['name']?></td>
                                    <td><?php echo $Prequest['email'] ?></td>
                                    <td><?php echo $Prequest['phone_number'] ?></td>
                                    <td><?php echo $Prequest['address'] ?></td>
                                    <td><?php echo $Prequest['product_name'] ?></td>
                                    <td><?php echo $Prequest['product_price'] ?></td>
                                    <td><?php echo $Prequest['quantity'] ?></td>
                                    <td><?php echo $Prequest['total_price'] ?></td>

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