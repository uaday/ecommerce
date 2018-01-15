<section class="content">
    <div class="container-fluid">
        <!-- Advanced Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Create Shop Form</h2>
                    </div>
                    <div class="body">
                        <form id="form_advanced_validation" method="POST" action="<?php echo base_url()?>portal/shop/add_shop">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="shop_owner" required>
                                    <label class="form-label">Shop Owner*</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                        <textarea name="address" cols="30" rows="3" class="form-control no-resize"
                                                  required></textarea>
                                    <label class="form-label">Address*</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" name="email" class="form-control" >
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" name="phone" class="form-control" required>
                                    <label class="form-label">phone*</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="shop_name" class="form-control" required>
                                    <label class="form-label">Shop Name*</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="timepicker form-control" name="opening_time" placeholder="Select Opening Time">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="country" id="country" class="form-control">
                                        <option value="Bangladesh" selected>Bangladesh</option>
                                        <label class="form-label">Country</label>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="region" id="region" class="form-control">
                                        <option value="Dhaka" selected>Dhaka</option>
                                        <label class="form-label">Region</label>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="language" id="language" class="form-control">
                                        <option value="Bangla" selected>Bangla</option>
                                        <option value="English" >English</option>
                                        <label class="form-label">Language</label>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="currency" id="currency" class="form-control" >
                                        <option value="Taka" selected>Taka</option>
                                        <option value="Doller" >Doller</option>
                                        <label class="form-label">Currency</label>
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary waves-effect" value="CREATE">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Advanced Validation -->
    </div>
</section>


<script>
    $(function () {
        //Textare auto growth
        autosize($('textarea.auto-growth'));

        //Datetimepicker plugin
        $('.datetimepicker').bootstrapMaterialDatePicker({
            format: 'dddd DD MMMM YYYY - HH:mm',
            clearButton: true,
            weekStart: 1
        });

        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'dddd DD MMMM YYYY',
            clearButton: true,
            weekStart: 1,
            time: false
        });

        $('.timepicker').bootstrapMaterialDatePicker({
            format: 'HH:mm',
            clearButton: true,
            date: false
        });
    });
</script>