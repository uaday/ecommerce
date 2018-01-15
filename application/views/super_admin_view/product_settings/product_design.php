<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Manage product_design
                        </h2>
                    </div>
                    <div>
                        <a class="btn btn-primary waves-effect" data-toggle="modal" data-target="#myModal1" href="#">Add Product Design</a>
                    </div>
                    <div align="center">
                        <?php if ($this->session->userdata('delete_pso_exams') == 'Pso Test Delete Successful') { ?>
                            <div class="alert alert-success"><strong><?php echo 'Pso Test Delete Successful'; ?></strong></div>
                            <?php $this->session->unset_userdata('delete_pso_exams');
                        } ?>
                        <?php if($this->session->userdata('product_design')){?>
                            <div class="alert alert-success"><strong><?php echo $this->session->userdata('product_design'); ?></strong>
                            </div>
                            <?php $this->session->unset_userdata('product_design'); }?>

                        <?php if($this->session->userdata('delete_gen')){?>
                            <div class="alert alert-success"><strong><?php echo $this->session->userdata('delete_gen'); ?></strong>
                            </div>
                            <?php $this->session->unset_userdata('delete_gen'); }?>

                        <?php if($this->session->userdata('product_design_error')){?>
                            <div class="alert alert-danger"><strong><?php echo $this->session->userdata('product_design_error'); ?></strong>
                            </div>
                            <?php $this->session->unset_userdata('product_design_error'); }?>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Design Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($product_designs as $product_design) { ?>
                                <tr>
                                    <th scope="row"><?php echo ++$j; ?></th>
                                    <td><?php echo $product_design['product_design_name'] ?></td>
                                    <?php if ($product_design['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>De-active</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($product_design['status'] == '1') { ?>
                                            <a href="<?php echo base_url()?>portal/product_settings/block_product_design/<?php echo $product_design['product_design_id'] ?>"><i class="material-icons">thumb_down</i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url()?>portal/product_settings/active_product_design/<?php echo $product_design['product_design_id'] ?>"><i class="material-icons">thumb_up</i></a>
                                        <?php } ?>
                                        <a href="#" data-target="#edit_gen<?php echo $j?>" data-toggle="modal"><i class="material-icons">edit</i></a>
                                        <a href="<?php echo base_url()?>portal/product_settings/delete_product_design/<?php echo $product_design['product_design_id'] ?>" onclick="return delete_product_design();"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>


                                <div class="modal fade" id="edit_gen<?php echo $j?>" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <form action="<?php echo base_url() ?>portal/product_settings/edit_product_design_details" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close cross_btn no_back_btn"
                                                            data-dismiss="modal">&times;
                                                    </button>
                                                    <h3 class="modal-title underline pull-left">Edit Product Design Name</h3>


                                                </div>
                                                <div class="modal-body" style="height: 120px">

                                                    <div>
                                                        <label>Product Design Name</label>
                                                        <input type="hidden" name="product_design_id" value="<?php echo $product_design['product_design_id']?>">
                                                        <input name="product_design_name" type="text" placeholder="Product Design Name" value="<?php echo $product_design['product_design_name']?>" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" style="width: 100px" value="Update">

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>


                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form action="<?php echo base_url() ?>portal/product_settings/add_new_product_design" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close cross_btn no_back_btn"
                            data-dismiss="modal">&times;
                    </button>
                    <h3 class="modal-title underline pull-left">Add Product Design</h3>


                </div>
                <div class="modal-body" style="height: 120px">

                    <div>
                        <label>Product Design Name</label>
                        <input name="product_design_name" type="text" placeholder="Product Design Name" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" style="width: 100px" value="Add">

                </div>
            </div>
        </form>

    </div>
</div>