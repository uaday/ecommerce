<section class="content">
    <div class="container-fluid">
        <!-- Tabs With Icon Title -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit Learner Details
                        </h2>
                    </div>
                    <form action="<?php echo base_url()?>portal/learner/edit_learner_details" method="post" enctype="multipart/form-data">
                        <div class="body">

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="hidden" class="form-control" name="learner_id" required value="<?php echo $learner_details['0']['learner_id']?>">
                                    <input type="text" class="form-control" name="learner_name" required value="<?php echo $learner_details['0']['learner_name']?>">
                                    <label class="form-label">LEARNER NAME</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="mobile_number" required value="<?php echo $learner_details['0']['mobile_number']?>">
                                    <label class="form-label">MOBILE NUMBER</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="father_name" required value="<?php echo $learner_details['0']['father_name']?>">
                                    <label class="form-label">FATHER NAME</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="gender" id="">
                                        <option <?php if($learner_details['0']['gender']=='Male')echo 'selected'?> value="Male">Male</option>
                                        <option <?php if($learner_details['0']['gender']=='Female')echo 'selected'?> value="Female">Female</option>
                                    </select>
                                    <label class="form-label">PRODUCT</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="mcp_id" required value="<?php echo $learner_details['0']['mcp_id']?>">
                                    <label class="form-label">MCP ID</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                        <textarea name="present_address" cols="30" rows="3" class="form-control no-resize"
                                                  required><?php echo $learner_details['0']['present_address']?></textarea>
                                    <label class="form-label">Present ADDRESS</label>
                                </div>
                            </div>

                            <img src="<?php echo base_url().$learner_details['0']['photo']?>" style="height: 200px;width: 400px"><br>
                            <input type="hidden" name="photo1" value="<?php echo $learner_details['0']['photo']?>">
                            <b>learner IMAGE</b>
                            <input  class="form-control" type="file" name="photo" >


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