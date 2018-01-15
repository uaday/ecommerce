

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Checkout - Address</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li>Checkout - Address</li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">

        <div class="row">

            <div class="col-md-9 clearfix" id="checkout">

                <div class="box">
                    <form method="post" action="<?php echo base_url()?>cart/submit_product">

                        <?php
                        $grand_total = 0;
                        $i = 1;

                        foreach ($this->cart->contents() as $item) {
                            echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                            echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                            echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                            echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                            echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                            echo form_hidden('cart[' . $item['id'] . '][mcp_id]', $item['mcp_id']);
                            echo form_hidden('cart[' . $item['id'] . '][mcp_name]', $item['mcp_name']);
                        }
                        ?>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Name</label>
                                        <input required="required" type="text" class="form-control" id="firstname" name="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Email</label>
                                        <input required="required" type="email" class="form-control" id="lastname" name="email">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="company">Phone Number</label>
                                        <input required="required" type="text" class="form-control" id="company" name="phone_number">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="street">Address</label>
                                        <input required="required" type="text" class="form-control" id="street" name="address">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <!-- /.row -->
                        </div>

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="shop-basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-template-main">Confirm to finish shopping<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">

                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Total Product</td>
                                <th><?= count($this->cart->contents());?></th>
                            </tr>
                            <tr class="total">
                                <th>Total Price</th>
                                <th>৳<?= $this->session->userdata('total_money')?></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>