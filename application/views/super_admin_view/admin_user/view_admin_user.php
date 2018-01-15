<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Manage Admin User
                        </h2>
                    </div>
                    <div>
                        <a class="btn btn-primary waves-effect" data-toggle="modal" data-target="#myModal1" href="#">Add Admin User</a>
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
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($admins as $admin) { ?>
                                <tr>
                                    <th scope="row"><?php echo ++$j; ?></th>
                                    <td><?php echo $admin['user_id'] ?></td>
                                    <td><?php echo $admin['name'] ?></td>
                                    <td><?php echo $admin['email'] ?></td>
                                    <td><?php echo $admin['phone_number'] ?></td>
                                    <?php if ($admin['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>Inactive</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($admin['status'] == '1') { ?>
                                            <a href="<?php echo base_url()?>portal/admin_user/block_admin_user/<?php echo $admin['user_id'] ?>"><i class="material-icons">thumb_down</i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url()?>portal/admin_user/active_admin_user/<?php echo $admin['user_id'] ?>"><i class="material-icons">thumb_up</i></a>
                                        <?php } ?>
                                        <a href="#" data-target="#edit_admin_user<?php echo $j?>" data-toggle="modal"><i class="material-icons">edit</i></a>
                                        <a href="<?php echo base_url()?>portal/admin_user/delete_admin_user/<?php echo $admin['user_id'] ?>" onclick="return delete_accout();"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>


                                <div class="modal fade" id="edit_admin_user<?php echo $j?>" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <form action="<?php echo base_url() ?>portal/admin_user/edit_admin_user" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close cross_btn no_back_btn"
                                                            data-dismiss="modal">&times;
                                                    </button>
                                                    <h3 class="modal-title underline pull-left">Edit Old Admin User</h3>


                                                </div>
                                                <div class="modal-body" style="height: 250px">

                                                    <div>
                                                        <label>User ID</label>
                                                        <input name="user_id1" type="text" placeholder="User ID" class="form-control" disabled="disabled" required="required" value="<?php echo $admin['user_id'] ?>">
                                                        <input name="user_id" type="hidden" placeholder="User ID" class="form-control" required="required" value="<?php echo $admin['user_id'] ?>">
                                                    </div>
                                                    <div>
                                                        <label>User Name</label>
                                                        <input name="user_name" type="text" placeholder="User Name" class="form-control" required="required" value="<?php echo $admin['name'] ?>">
                                                    </div>
                                                    <div>
                                                        <label>Email</label>
                                                        <input name="email" type="email" placeholder="Email" class="form-control" value="<?php echo $admin['email'] ?>">
                                                    </div>
                                                    <div>
                                                        <label>Phone Number</label>
                                                        <input name="phone_number" type="number" placeholder="Phone Number" class="form-control" required="required" value="<?php echo $admin['phone_number'] ?>">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" style="width: 100px" value="Add">

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
        <form action="<?php echo base_url() ?>portal/admin_user/add_new_admin_user" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close cross_btn no_back_btn"
                            data-dismiss="modal">&times;
                    </button>
                    <h3 class="modal-title underline pull-left">Add New Admin User</h3>


                </div>
                <div class="modal-body" style="height: 250px">

                    <div>
                        <label>User ID</label>
                        <input name="user_id" type="text" placeholder="User ID" class="form-control" required="required">
                    </div>
                    <div>
                        <label>User Name</label>
                        <input name="user_name" type="text" placeholder="User Name" class="form-control" required="required">
                    </div>
                    <div>
                        <label>Email</label>
                        <input name="email" type="email" placeholder="Email" class="form-control">
                    </div>
                    <div>
                        <label>Phone Number</label>
                        <input name="phone_number" type="number" placeholder="Phone Number" class="form-control" required="required">
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" style="width: 100px" value="Add">

                </div>
            </div>
        </form>

    </div>
</div>