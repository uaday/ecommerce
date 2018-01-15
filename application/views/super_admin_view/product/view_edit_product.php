
<?php $myArray1 = explode(',', $product['0']['product_design']);
$myArray2 = explode(',', $product['0']['automatic_grade']);
?>

<script >
    $( document ).ready(function() {

        product_service_selection();
    });
</script>
<section class="content">
    <div class="container-fluid">
        <!-- Tabs With Icon Title -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit Product
                        </h2>
                    </div>
                    <form action="<?php echo base_url()?>portal/product/edit_product_details" method="post" enctype="multipart/form-data">
                        <div class="body">

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <p >PRODUCT/SERVICE</p>
                                    <select id="p_s" name="p_s" class="form-control show-tick" onchange="product_service_selection()">
                                        <option <?php if($product['0']['service']=='0') echo 'selected'?> value="0">Product</option>
                                        <option <?php if($product['0']['service']=='1') echo 'selected'?> value="1">Service</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="hidden" class="form-control" name="product_id" required value="<?= $product['0']['product_id']?>">
                                    <input type="text" class="form-control" name="product_name" required value="<?= $product['0']['product_name']?>">
                                    <label class="form-label">PRODUCT NAME</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea class="form-control" required="required" name="p_s_description"><?= $product['0']['product_description']?></textarea>
                                    <label class="form-label">PRODUCT/SERVICE DESCRIPTION</label>
                                </div>
                            </div>
                            <div id="p_material" class="form-group form-float">
                                <div class="form-line">
                                    <input  id="p_material1" type="text" class="form-control" name="product_material"  value="<?= $product['0']['product_material']?>">
                                    <label class="form-label">PRODUCT MATERIAL</label>
                                </div>
                            </div>
                            <div id="p_color" class="form-group form-float">
                                <div class="form-line">
                                    <input id="p_color1" type="text" class="form-control" name="product_color"  value="<?= $product['0']['product_color']?>">
                                    <label class="form-label">PRODUCT COLOR</label>
                                </div>
                            </div>
                            <div id="p_size" class="form-group form-float">
                                <div class="form-line">
                                    <input id="p_size1" type="text" class="form-control" name="product_size"  value="<?= $product['0']['product_size']?>">
                                    <label class="form-label">PRODUCT SIZE</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="product_price" required value="<?= $product['0']['product_price']?>">
                                    <label class="form-label">PRODUCT PRICE</label>
                                </div>
                            </div>
                            <div id="p_design" class="form-group form-float">
                                <div class="form-line">
                                    <p >PRODUCT DESIGN</p>

                                    <select name="product_design[]" class="form-control show-tick" multiple>
                                        <?php foreach ($designs as $design){
                                            $design_key=array_search($design['product_design_name'],$myArray1);
                                        ?>
                                            <?php if($design_key> -1){?>
                                                <option selected="selected" value="<?= $design['product_design_name']?>"><?= $design['product_design_name']?></option>
                                                <?php } else {?>
                                                <option  value="<?= $design['product_design_name']?>"><?= $design['product_design_name']?></option>
                                                <?php }?>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div id="p_condition" class="form-group form-float">
                                <div class="form-line">
                                    <p >PRODUCT CONDITION</p>
                                    <select name="product_condition" class="form-control show-tick">
                                        <?php foreach ($conditions as $condition){?>
                                            <option <?php if($condition['product_condition_name']==$product['0']['product_condition']) echo 'Selected'?> value="<?= $condition['product_condition_name']?>"><?= $condition['product_condition_name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div id="p_grade" class="form-group form-float">
                                <div class="form-line">
                                    <p >PRODUCT GRADE</p>
                                    <select name="product_grade[]" class="form-control show-tick" multiple>
                                        <?php foreach ($grades as $grade){
                                            $grade_key=array_search($grade['product_design_name'],$myArray2);
                                            ?>
                                            <?php if($grade_key> -1){?>
                                                <option selected="selected" value="<?= $grade['product_grade_name']?>"><?= $grade['product_grade_name']?></option>
                                            <?php } else {?>
                                                <option  value="<?= $grade['product_grade_name']?>"><?= $grade['product_grade_name']?></option>
                                            <?php }?>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div  class="form-group form-float">
                                <div class="form-line">
                                    <p >PRODUCT CATEGORY</p>
                                    <select name="product_category" class="form-control show-tick">
                                        <?php foreach ($categories as $category){?>
                                            <option <?php if($category['category_id']==$product['0']['tbl_category_category_id']) echo 'Selected'?> value="<?php echo $category['category_id']?>"><?php echo $category['en_category_name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <img src="<?= base_url().$product['0']['product_photo']?>" style="height: 100px;width: 200px">
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <b>PRODUCT IMAGE</b>
                                    <input  class="form-control" type="hidden" name="product_image1" value="<?=$product['0']['product_photo']?>" >
                                    <input  class="form-control" type="file" name="product_image" >
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

<script type="text/javascript">


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