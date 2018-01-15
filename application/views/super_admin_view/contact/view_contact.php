<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Request Contact
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($contacts as $contact) { ?>
                                <tr>
                                    <th scope="row"><?php echo ++$j; ?></th>

                                    <td><?php echo $contact['fname'].$contact['lname'] ?></td>
                                    <td><?php echo $contact['email'] ?></td>
                                    <td><?php echo $contact['subject'] ?></td>
                                    <td><?php echo $contact['message'] ?></td>

                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>