<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Upload MCP
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <form method="post" action="<?php echo base_url() ?>portal/mcp/mcp_bulk_upload_file"
                              accept-charset="utf-8"
                              enctype="multipart/form-data">
                            <fieldset>

                    <pre><span class="alert alert-info">Instruction:</span>
                <br>
1. Please Upload CSV File Only
2. Please Follow The <strong>mcp data <a href="<?php echo base_url() ?>portal/download_file/mcp_format"
                                         target="_blank">Format</a></strong>.
            </pre>


                                    <input type="file" class="form-control" name="mcp_bulk">
                                <br>
                                <!-- Button -->
                                <div class="form-group">

                                    <input type="submit" class="btn btn-primary waves-effect btn-block"
                                           value="Submit">

                                </div>

                            </fieldset>
                        </form>
                        <pre><span class="alert alert-danger">Error:</span>
                                            <br>
<?php if($this->session->userdata('duplicate')){?>
<?php $i=1; foreach ($this->session->userdata('duplicate') as $dd){echo $i++;?>: Duplicate <strong><?php echo $dd;?></strong> mcp Id Please Check Manually<br><?php }} $this->session->unset_userdata('duplicate')?>
                    </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>