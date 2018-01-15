<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if($this->session->userdata('language_id')=='1'){?>
                    <h1>যোগাযোগ</h1>
                <?php } else {?>
                    <h1>Contact</h1>
                <?php }?>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li>Contact</li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container" id="contact">

        <div class="row">
            <div class="col-md-8">

                <section>
                    <div align="center">


                        <?php if($this->session->userdata('send_message')){?>
                            <div class="alert alert-primary"><strong><?php echo $this->session->userdata('send_message'); ?></strong>
                            </div>
                            <?php $this->session->unset_userdata('send_message'); }?>

                    </div>
                    <form action="<?= base_url()?>contact/send_message" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php if($this->session->userdata('language_id')=='1'){?>
                                        <label for="firstname">প্রথম নাম</label>
                                    <?php } else {?>
                                        <label for="firstname">Firstname</label>
                                    <?php }?>
                                    <input name="fname" required="required" type="text" class="form-control" id="firstname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php if($this->session->userdata('language_id')=='1'){?>
                                        <label for="lastname">নামের শেষাংশ</label>
                                    <?php } else {?>
                                        <label for="lastname">Lastname</label>
                                    <?php }?>
                                    <input name="lname" required="required" type="text" class="form-control" id="lastname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php if($this->session->userdata('language_id')=='1'){?>
                                        <label for="email">ই-মেইল</label>
                                    <?php } else {?>
                                        <label for="email">Email</label>
                                    <?php }?>
                                    <input name="email" required="required" type="email" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php if($this->session->userdata('language_id')=='1'){?>
                                        <label for="subject">বিষয়</label>
                                    <?php } else {?>
                                        <label for="subject">Subject</label>
                                    <?php }?>
                                    <input name="subject" required="required" type="text" class="form-control" id="subject">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?php if($this->session->userdata('language_id')=='1'){?>
                                        <label for="message">বার্তা</label>
                                    <?php } else {?>
                                        <label for="message">Message</label>
                                    <?php }?>
                                    <textarea name="message" required="required" id="message" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-template-main"><i class="fa fa-envelope-o"></i> Send message</button>

                            </div>
                        </div>
                        <!-- /.row -->
                    </form>

                </section>

            </div>

            <div class="col-md-4">

                <section>

                    <h3 class="text-uppercase">Address</h3>

                    <p><strong>Brac e-commerce</strong>
                        <br>BRAC Centre
                        <br>75 Mohakhali
                        <br>Dhaka-1212.
                        <br>880-2-9881265
                        <br>info@brac.net
                    </p>
                </section>

            </div>

        </div>
        <!-- /.row -->


    </div>
    <!-- /#contact.container -->
</div>
<!-- /#content -->

<!--<div id="map">-->
<!--</div>-->