<!---->
<?php
$user_data=$this->session->userdata("printUser");
//print_r($user_data['name']);
//        exit();


        $total=0;
?>
<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;

    }
</script>


<div id="printRecipt" style="display: none">
    <h2 class="text-center">Brac E-commerce</h2>
    <p class="text-center">Address: BRAC Centre,75 Mohakhali, Dhaka-1212, Phone: 880-2-9881265, Email: info@brac.net</p>
    <hr>
    <div class="row">
        <div class="col-md-offset-2 col-md-3" style="float: left">
            <div class="form-group">
                <h5>Bill To</h5>
            </div>
            <div class="form-group">
                <label>Name: <?= $user_data['name']?></label>
            </div>
            <div class="form-group">
                <label>Address: <?= $user_data['address']?></label>
            </div>
            <div class="form-group">
                <label>Email: <?= $user_data['email']?></label>
            </div>
            <div class="form-group">
                <label>Phone: +880<?= $user_data['phone_number']?></label>
            </div>
        </div>
        <div class="col-md-3" style="float: right">
            <div class="form-group">
                Invoice# 00<?= $this->session->userdata("invoice_id")?>
            </div>
            <div class="form-group">
                Invoice Date# <?php echo  date('d-m-y')?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <table class="table ">
                <thead>
                <tr>
                    <th >Product</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th >Total</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($this->session->userdata('printCart') as $row){?>
                    <tr>
                        <td><?= $row['name']?></td>
                        <td><?= $row['qty']?></td>
                        <td><?= $row['price']?></td>
                        <td><?= $row['qty']*$row['price']?></td>
                        <?php $total=$total+($row['qty']*$row['price'])?>
                    </tr>
                <?php }?>
                <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th >৳ <?php echo number_format($total, 2); ?></th>
                </tr>
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <br>
    <br>
    <h6 class="text-center">Invoice powered by BRAC E-commerce</h6>
</div>

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

            <div class="col-md-12 clearfix" id="checkout">

                <div class="box">

                    <div class="content">
                        <div class="row">
                            <h1 class="text-center">Thank you for Shopping, desire person will contact you soon.</h1>
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="text-center">
                            <a href="<?= base_url()?>home" class="btn btn-template-primary">Back to home</a>
                            <a href="#" onclick="printContent('printRecipt')" class="btn btn-template-primary">Print Receipt</a>
                        </div>
                    </div>
                </div>
                <!-- /.box -->


            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>