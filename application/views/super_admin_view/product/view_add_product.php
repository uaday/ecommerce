<section class="content">
    <div class="container-fluid">
        <!-- Tabs With Icon Title -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add Product
                        </h2>
                    </div>
                    <form action="<?php echo base_url()?>portal/product/add_new_product" method="post" enctype="multipart/form-data">
                        <div class="body">

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <p >PRODUCT/SERVICE</p>
                                    <select id="p_s" name="p_s" class="form-control show-tick" onchange="product_service_selection()">
                                        <option value="0">Product</option>
                                        <option value="1">Service</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="product_name" required >
                                    <label class="form-label">PRODUCT/SERVICE NAME</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea class="form-control" required="required" name="p_s_description"></textarea>
                                    <label class="form-label">PRODUCT/SERVICE DESCRIPTION</label>
                                </div>
                            </div>
                            <div id="p_material" class="form-group form-float">
                                <div class="form-line">
                                    <input id="p_material1" type="text" class="form-control" name="product_material" >
                                    <label class="form-label">PRODUCT MATERIAL</label>
                                </div>
                            </div>
                            <div id="p_color" class="form-group form-float">
                                <div class="form-line">
                                    <input id="p_color1" type="text" class="form-control" name="product_color" >
                                    <label class="form-label">PRODUCT COLOR</label>
                                </div>
                            </div>
                            <div id="p_size" class="form-group form-float">
                                <div class="form-line">
                                    <input id="p_size1" type="text" class="form-control" name="product_size" >
                                    <label class="form-label">PRODUCT SIZE</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="product_price" required>
                                    <label class="form-label">PRODUCT/SERVICE PRICE</label>
                                </div>
                            </div>
                            <div id="p_design" class="form-group form-float">
                                <div class="form-line">
                                    <p >PRODUCT DESIGN</p>
                                    <select name="product_design[]" class="form-control show-tick" multiple>
                                        <?php foreach ($designs as $design){?>
                                            <option value="<?= $design['product_design_name']?>"><?= $design['product_design_name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div id="p_condition" class="form-group form-float">
                                <div class="form-line">
                                    <p >PRODUCT CONDITION</p>
                                    <select name="product_condition" class="form-control show-tick">
                                        <?php foreach ($conditions as $condition){?>
                                            <option value="<?= $condition['product_condition_name']?>"><?= $condition['product_condition_name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div id="p_grade" class="form-group form-float">
                                <div class="form-line">
                                    <p >PRODUCT GRADE</p>
                                    <select name="product_grade[]" class="form-control show-tick" multiple>
                                        <?php foreach ($grades as $grade){?>
                                            <option value="<?= $grade['product_grade_name']?>"><?= $grade['product_grade_name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div  class="form-group form-float">
                                <div class="form-line">
                                    <p >PRODUCT CATEGORY</p>
                                    <select name="product_category" class="form-control show-tick">
                                        <?php foreach ($categories as $category){?>
                                            <option value="<?php echo $category['category_id']?>"><?php echo $category['en_category_name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <b>PRODUCT IMAGE</b>
                                    <input required="required" class="form-control" type="file" name="product_image" >
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
    function product_service_selection()
    {
        var p_s=$('#p_s').val();
        if(p_s==1)
        {
            document.getElementById('p_material').style.display="none";
            document.getElementById('p_color').style.display="none";
            document.getElementById('p_size').style.display="none";
            document.getElementById('p_design').style.display="none";
            document.getElementById('p_condition').style.display="none";
            document.getElementById('p_grade').style.display="none";

            $("#p_material1").prop('required',false);
            $("#p_color1").prop('required',false);
            $("#p_size1").prop('required',false);


        }
        else
        {
            document.getElementById('p_material').style.display="block";
            document.getElementById('p_color').style.display="block";
            document.getElementById('p_size').style.display="block";
            document.getElementById('p_design').style.display="block";
            document.getElementById('p_condition').style.display="block";
            document.getElementById('p_grade').style.display="block";

            $("#p_material1").prop('required',true);
            $("#p_color1").prop('required',true);
            $("#p_size1").prop('required',true);
        }
    }
</script>