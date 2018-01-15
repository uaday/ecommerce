<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Manage MCP
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>

                                <th>Image</th>
                                <th>MCP ID</th>
                                <th>MCP NAME</th>
                                <th>Shop Name</th>
<!--                                <th>Shop Address</th>-->
<!--                                <th>Product</th>-->
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($mcps as $mcp) { ?>
                                <tr>
                                    <td><img src="<?php echo base_url().$mcp['photo'] ?>"
                                             style="width: 50px;height: 50px;" class="img-circle img-responsive"></td>
                                    <td><?php echo $mcp['mcp_id'] ?></td>
                                    <td><?php echo $mcp['mcp_name'] ?></td>
                                    <td><?php echo $mcp['shop_name'] ?></td>
<!--                                    <td>--><?php //echo $mcp['shop_address'] ?><!--</td>-->
<!--                                    <td>--><?php //echo $mcp['product'] ?><!--</td>-->
                                    <td><?php echo $mcp['phone_number'] ?></td>
                                    <?php if ($mcp['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>De-active</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($mcp['status'] == '1') { ?>
                                            <a href="<?php echo base_url()?>portal/mcp/block_mcp/<?php echo $mcp['mcp_id'] ?>"><i class="material-icons">thumb_down</i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url()?>portal/mcp/active_mcp/<?php echo $mcp['mcp_id'] ?>"><i class="material-icons">thumb_up</i></a>
                                        <?php } ?>
                                        <a href="<?php echo base_url()?>portal/mcp/edit_mcp/<?php echo $mcp['mcp_id'] ?>"><i class="material-icons">edit</i></a>
                                        <a href="<?php echo base_url()?>portal/mcp/delete_mcp/<?php echo $mcp['mcp_id'] ?>" onclick="return delete_mcp();"><i class="material-icons">delete</i></a>
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