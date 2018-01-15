<?php $i = 0; ?>
<section class="content">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Request Shop List
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Shop Name</th>
                                    <th>Owner Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>Status Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Shop Name</th>
                                    <th>Owner Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>Status Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach ($shops as $shop) {
                                    $i++; ?>
                                    <tr>
                                        <td><?php echo $shop['shop_name'] ?></td>
                                        <td><?php echo $shop['shop_owner'] ?></td>
                                        <td><?php echo $shop['phone'] ?></td>
                                        <td><?php echo $shop['email'] ?></td>
                                        <td><?php echo $shop['address'] ?></td>
                                        <td><?php echo $shop['country'] ?></td>
                                        <?php if ($shop['status'] == 1) { ?>
                                            <td>
                                                <button data-toggle="modal" data-target="#smallModal<?php echo $i ?>"
                                                        class="btn btn-warning btn-sm btn-block waves-effect"
                                                        type="button">Pending
                                                </button>
                                            </td>
                                        <?php } else if ($shop['status'] == 2) { ?>
                                            <td>
                                                <button data-toggle="modal" data-target="#smallModal<?php echo $i ?>"
                                                        class="btn btn-primary btn-sm btn-block waves-effect"
                                                        type="button">Processing
                                                </button>
                                            </td>
                                        <?php } else { ?>
                                            <td>
                                                <button data-toggle="modal" data-target="#smallModal<?php echo $i ?>"
                                                        class="btn btn-success btn-sm btn-block waves-effect"
                                                        type="button">Accepted
                                                </button>
                                            </td>
                                        <?php } ?>
                                        <!--                                    <td><button title="View" type="button"  class="btn btn-default btn-circle waves-effect waves-circle waves-float">-->
                                        <!--                                            <i class="material-icons">search</i>-->
                                        <!--                                        </button></td>-->
                                    </tr>


                                    <div class="modal fade" id="smallModal<?php echo $i ?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"
                                                        id="smallModalLabel"><?php echo $shop['shop_name'] ?>
                                                        Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Shop Name: </strong><?php echo $shop['shop_name'] ?></p>
                                                    <p><strong>Shop Owner: </strong><?php echo $shop['shop_owner'] ?>
                                                    </p>
                                                    <p><strong>Address: </strong><?php echo $shop['address'] ?></p>
                                                    <p><strong>Email: </strong><?php echo $shop['email'] ?></p>
                                                    <p><strong>Phone: </strong><?php echo $shop['phone'] ?></p>
                                                    <p><strong>Opening
                                                            Time: </strong><?php echo $shop['opening_time'] ?></p>
                                                    <p><strong>Country: </strong><?php echo $shop['country'] ?></p>
                                                    <p><strong>Region: </strong><?php echo $shop['region'] ?></p>
                                                    <p><strong>Currency: </strong><?php echo $shop['currency'] ?></p>
                                                    <strong>Status: </strong><?php if ($shop['status'] == 1) { ?><span
                                                            class="label bg-orange">Pending</span><?php } else if ($shop['status'] == 2) { ?>
                                                        <span class="label bg-blue">Processing</span><?php } else { ?>
                                                        <span class="label bg-green">Accepted</span><?php } ?>
                                                    <br>
                                                    <hr>
                                                    <strong>Action</strong>
                                                    <a href="<?php echo base_url() ?>portal/shop/pending_shop?shop_id=<?php echo $shop['shop_id'] ?>"
                                                       class="btn btn-warning btn-lg btn-block waves-effect"
                                                       type="button">Pending</a>
                                                    <a href="<?php echo base_url() ?>portal/shop/processing_shop?shop_id=<?php echo $shop['shop_id'] ?>"
                                                       class="btn btn-primary btn-lg btn-block waves-effect"
                                                       type="button">Processing</a>
                                                    <a href="<?php echo base_url() ?>portal/shop/accept_shop?shop_id=<?php echo $shop['shop_id'] ?>"
                                                       class="btn btn-success btn-lg btn-block waves-effect"
                                                       type="button">Accepted</a>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link waves-effect"
                                                            data-dismiss="modal">CLOSE
                                                    </button>
                                                </div>
                                            </div>
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
        <!-- #END# Exportable Table -->
    </div>
</section>