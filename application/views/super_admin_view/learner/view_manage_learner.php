<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Manage learner
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Learner Name</th>
                                <th>Mobile Number</th>
                                <th>Father Name</th>
                                <th>Gender</th>
                                <th>Present Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($learners as $learner) { ?>
                                <tr>
                                    <th scope="row"><?php echo ++$j; ?></th>
                                    <td><img src="<?php echo $learner['photo'] ?>" alt="learner_image"
                                             style="width: 200px;height: 100px;"></td>
                                    <td><?php echo $learner['learner_name'] ?></td>
                                    <td><?php echo $learner['mobile_number'] ?></td>
                                    <td><?php echo $learner['father_name'] ?></td>
                                    <td><?php echo $learner['gender'] ?></td>
                                    <td><?php echo $learner['present_address'] ?></td>
                                    <?php if ($learner['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>De-active</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($learner['status'] == '1') { ?>
                                            <a href="<?php echo base_url()?>portal/learner/block_learner/<?php echo $learner['learner_id'] ?>"><i class="material-icons">thumb_down</i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url()?>portal/learner/active_learner/<?php echo $learner['learner_id'] ?>"><i class="material-icons">thumb_up</i></a>
                                        <?php } ?>
                                        <a href="<?php echo base_url()?>portal/learner/edit_learner/<?php echo $learner['learner_id'] ?>"><i class="material-icons">edit</i></a>
                                        <a href="<?php echo base_url()?>portal/learner/delete_learner/<?php echo $learner['learner_id'] ?>" onclick="return delete_learner();"><i class="material-icons">delete</i></a>
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
    </div>
</section>