<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 10/16/2017
 * Time: 12:08 AM
 */

$cart_check = $this->cart->contents();
//print_r($this->cart->contents());
//exit();
?>

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if($this->session->userdata('language_id')=='1'){?>
                <h1>বাজারের ব্যাগ</h1>
                <?php } else {?>
                <h1>Shopping cart</h1>
                <?php }?>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url()?>">Home</a>
                    </li>
                    <li>Shopping cart</li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <?php if(empty($cart_check)) {?>
                    <p class="text-muted lead">You currently have 0 item in your cart.</p>
                <?php } else {?>
                    <p class="text-muted lead">You currently have <?php echo count($this->cart->contents());?> item in your cart.</p>
                <?php }?>
            </div>


            <div class="col-md-12 clearfix" id="basket">

                <div class="box">

                    <form method="post" action="<?=base_url()?>cart/update_cart">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th >Product Image</th>
                                    <th >Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th >Total</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $grand_total = 0;
                                $i = 1;

                                foreach ($this->cart->contents() as $item){
                                echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                ?>

                                <tr>
                                    <td>
                                        <a href="#">
                                            <img src="<?= base_url()?><?php echo $item['product_photo']; ?>" >
                                        </a>
                                    </td>
                                    <td><a href="#"><?php echo $item['name']; ?></a>
                                    </td>
                                    <td>
                                        <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: left"'); ?>
<!--                                        <input type="number" value="--><?php //echo $item['qty']; ?><!--" class="form-control">-->
                                    </td>
                                    <td>৳<?php echo $item['price']; ?></td>
                                    <?php $grand_total = $grand_total + $item['subtotal']; ?>
                                    <td>৳<?php echo number_format($item['subtotal'], 2) ?></td>
                                    <td><a href="<?php echo base_url()?>cart/remove/<?= $item['rowid']?>"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php }?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="4">Total</th>
                                    <?php $this->session->set_userdata('total_money',$grand_total);?>
                                    <th >৳<?php echo number_format($grand_total, 2); ?></th>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url()?>product" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit"  class="btn btn-default"><i class="fa fa-refresh"></i> Update cart</button>
                                <?php if($cart_check) {?>
                                <button type="button" onclick="window.location = '<?php echo base_url()?>cart/check_out'" class="btn btn-template-main">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                </button>
                                <?php }?>
                            </div>
                        </div>

                    </form>

                </div>
                <!-- /.box -->


            </div>


        </div>

    </div>
    <!-- /.container -->
</div>
