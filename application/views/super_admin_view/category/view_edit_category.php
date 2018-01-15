<section class="content">
    <div class="container-fluid">
        <!-- Tabs With Icon Title -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit Category
                        </h2>
                    </div>
                    <form action="<?php echo base_url()?>portal/category/edit_category_details" method="post" enctype="multipart/form-data">
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#general" data-toggle="tab" onclick="show()">
                                        <i class="material-icons">description</i> General
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#image" data-toggle="tab" onclick="hide()">
                                        <i class="material-icons">image</i> Image
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="general">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#bangla" data-toggle="tab">
                                                <i class="material-icons">flag</i> Bangla
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#english" data-toggle="tab">
                                                <i class="material-icons">flag</i> English
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="image">
                                    <img src="<?php echo base_url().$categorys['0']['image']?>" style="height: 200px;width: 400px"><br>
                                    <input type="hidden" name="category_image1" value="<?php echo $categorys['0']['image']?>">
                                    <b>Category Image</b>
                                    <input  class="form-control" type="file" name="category_image" >
                                </div>
                            </div>

                            <!-- Tab panes -->
                            <div class="tab-content" id="language">
                                <div role="tabpanel" class="tab-pane fade in active" id="bangla">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="hidden" class="form-control" name="category_id" required value="<?php echo $categorys['0']['category_id']?>">
                                            <input type="text" class="form-control" name="bangla_category_name" required value="<?php echo $categorys['0']['bn_category_name']?>">
                                            <label class="form-label">Category Name(Bangla)</label>
                                        </div>
                                    </div>

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="english">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="english_category_name" required value="<?php echo $categorys['0']['en_category_name']?>">
                                            <label class="form-label">Category Name(English)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


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