<section class="content">
    <div class="container-fluid">
        <!-- Tabs With Icon Title -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit MCP Details
                        </h2>
                    </div>
                    <form action="<?php echo base_url()?>portal/mcp/edit_mcp_details" method="post" enctype="multipart/form-data">
                        <div class="body">

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="hidden" class="form-control" name="mcp_id" required value="<?php echo $mcp_details['0']['mcp_id']?>">
                                    <input type="text" class="form-control" name="mcp_name" required value="<?php echo $mcp_details['0']['mcp_name']?>">
                                    <label class="form-label">MCP NAME</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="shop_name" required value="<?php echo $mcp_details['0']['shop_name']?>">
                                    <label class="form-label">SHOP NAME</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                        <textarea name="shop_address" cols="30" rows="3" class="form-control no-resize"
                                                  required><?php echo $mcp_details['0']['shop_address']?></textarea>
                                    <label class="form-label">SHOP ADDRESS</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="product" required value="<?php echo $mcp_details['0']['product']?>">
                                    <label class="form-label">PRODUCT</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="phone_number" required value="<?php echo $mcp_details['0']['phone_number']?>">
                                    <label class="form-label">PHONE NUMBER</label>
                                </div>
                            </div>

                            <img src="<?php echo base_url().$mcp_details['0']['photo']?>" style="height: 200px;width: 400px"><br>
                            <input type="hidden" name="photo1" value="<?php echo $mcp_details['0']['photo']?>">
                            <b>MCP IMAGE</b>
                            <input  class="form-control" type="file" name="photo" >
                            <img src="<?php echo base_url().$mcp_details['0']['shop_photo']?>" style="height: 200px;width: 400px"><br>
                            <input type="hidden" name="photo2" value="<?php echo $mcp_details['0']['shop_photo']?>">
                            <b>SHOP IMAGE</b>
                            <input  class="form-control" type="file" name="shop_photo" >


                            <input  class="btn btn-primary waves-effect btn-block" type="submit" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Tabs With Icon Title -->
    </div>
</section>

<script >
    function hide()
    {
        document.getElementById('language').style.display='none';
    }
    function show() {
        document.getElementById('language').style.display='block';
    }
</script>