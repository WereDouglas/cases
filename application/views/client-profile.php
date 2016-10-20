<!-- Bootstrap -->
<?php //var_dump($sch); ?>
<link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- FullCalendar -->
<link href="<?php echo base_url(); ?>vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

<!-- Custom styling plus plugins -->
<link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/easyui.css?date=<?php echo date('Y-m-d') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/icon.css?date=<?php echo date('Y-m-d') ?>">
<style type="text/css" media="screen">

    table{
        border-collapse:collapse;
        border:0px solid #FF0000;
    }

    table td{
        border:0px solid #FF0000;
    }

    table tr{
        border:0px solid #FF0000;
    }
</style>
<div class="row container">
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="col-md-12 col-sm-12 col-xs-12"> <span class="info-box status col-md-12 col-sm-12 col-xs-12" id="status"></span></div>

        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">           
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#profile" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">PROFILE</a>
                    </li>
                    <li role="presentation" class=""><a href="#fees" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">FEES</a>
                    </li>
                    <li role="presentation" class=""><a href="#disbursements" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">DISBURSEMENTS</a>
                    </li>
                    <li role="presentation" class=""><a href="#invoices" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">INVOICES</a>
                    </li>
                    <li role="presentation" class=""><a href="#requisitions" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">REQUISITIONS</a>
                    </li>
                    <li role="presentation" class=""><a href="#expenses" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">EXPENSES</a>
                    </li>

                    <li role="presentation" class=""><a href="#files" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">FILES</a>
                    </li>
                    <li role="presentation" class=""><a href="#document" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">DOCUMENTS</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="profile" aria-labelledby="home-tab">


                        <div  class="col-md-12" >

                            <table >
                                <h2>CLIENT PROFILE</h2>
                                <tbody>
                                    <?php
                                    if (is_array($users) && count($users)) {
                                        foreach ($users as $loop) {
                                            ?>
                                            <tr class="odd">
                                                <td> 
                                                    <div class="profile_img">
                                                        <div id="crop-avatar">
                                                            <!-- Current avatar -->

                                                            <?php
                                                            if ($loop->image != "") {
                                                                ?>
                                                                <img height="20px" width="50px" class="img-responsive avatar-view" src="<?= base_url(); ?>uploads/<?php echo $loop->image; ?>" alt="Avatar" title="Change the avatar">

                                                                <?php
                                                            } else {
                                                                ?>

                                                                <img height="20px" width="50px" class="img-responsive avatar-view" src="<?= base_url(); ?>images/user_place.png" alt="Avatar" title="Change the avatar">
                                                                <?php
                                                            }
                                                            ?>


                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                </td>
                                                <td></td>
                                                <td>
                                                   </td>


                                            </tr>
                                            <tr>
                                                <td>NAME:</td>
                                                <td id="name:<?php echo $loop->clientID; ?>" contenteditable="true">
                                                    <span class="green"><?php echo $loop->name; ?></span> 
                                                </td>
                                                <td>EMAIL:</td>
                                                <td id="email:<?php echo $loop->clientID; ?>" contenteditable="true"><span class="green"><?php echo $loop->email; ?></span></td>

                                            </tr>
                                            <tr>
                                                <td>DESIGNATION:</td>
                                                <td id="designation:<?php echo $loop->clientID; ?>" contenteditable="true"><span class="red"><?php echo $loop->designation; ?></span></td>

                                                <td>STATUS:</td>
                                                <td id="status:<?php echo $loop->clientID; ?>" contenteditable="false"><span class="red"><?php echo $loop->status; ?></span></td>


                                            </tr>
                                            <tr>
                                                <td>CONTACT:</td>
                                                <td id="contact:<?php echo $loop->clientID; ?>" contenteditable="true"><?php echo $loop->contact; ?></td>

                                                <td>CHARGE/HR:</td>
                                                <td id="charge:<?php echo $loop->clientID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->charge; ?></span> </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/client/update_image'  method="post">                                       

                                                        <input type="file" name="userfile" id="userfile" />
                                                        <div id="imagePreview" ></div>
                                                        <input type="hidden" name="clientID" id="clientID" value="<?php echo $loop->clientID; ?>" />                                                   
                                                        <input type="hidden" name="namer" id="namer" value="<?php echo $loop->name; ?>" />
                                                        <button id="send" type="submit" >Update picture</button>


                                                    </form></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div> 
                    </div>

                    <div role="tabpanel" class="tab-pane fade  in" id="fees" aria-labelledby="home-tab">


                        <div  class="col-md-12" >

                            <table id="datatable" class="table table-striped table-bordered scroll ">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>INVOICE</th>                   
                                        <th>CLIENT</th>
                                        <th>FILE</th>
                                        <th>DETAILS</th> 
                                        <th>V.A.T</th> 
                                        <th>FEES</th>                   
                                        <th>TOTAL AMOUNT</th>
                                        <th>BALANCE ON TRANSACTION</th>
                                        <th>RECEIVED BY</th>
                                        <th>APPROVED</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    // var_dump($pay);
                                    foreach ($fees as $loop) {
                                        ?>  
                                        <tr class="odd">
                                            <td id="invoice:<?php echo $loop->date; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->date; ?></span>                      
                                            </td>
                                            <td id="invoice:<?php echo $loop->invoice; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->invoice; ?></span>                      
                                            </td>                         
                                            <td><?php echo $loop->client; ?></td>
                                            <td><?php echo $loop->file; ?></td>
                                            <td id="details:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->details; ?></td>
                                            <td><?php echo number_format(($loop->vat), 2); ?></td>
                                            <td><?php echo number_format($loop->fees, 2); ?></td>
                                            <td><?php echo number_format(($loop->vat + $loop->fees), 2); ?></td>
                                            <td><?php echo number_format($loop->balance, 2); ?></td>
                                            <td id="received:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->received; ?></td>
                                            <td id="approved:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->approved; ?></td>




                                        </tr>

                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane fade  in" id="disbursements" aria-labelledby="home-tab">

                        <div  class="col-md-12" >

                            <table id="datatable" class="table table-striped table-bordered scroll ">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>INVOICE</th>

                                        <th>CLIENT</th>
                                        <th>FILE</th>
                                        <th>DETAILS</th>                   
                                        <th>DISBURSEMENT</th>                  
                                        <th>BALANCE ON TRANSACTION</th>
                                        <th>RECEIVED BY</th>
                                        <th>APPROVED</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    // var_dump($pay);
                                    foreach ($dis as $loop) {
                                        ?>  
                                        <tr class="odd">
                                            <td id="invoice:<?php echo $loop->date; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->date; ?></span>                      
                                            </td>

                                            <td id="invoice:<?php echo $loop->invoice; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->invoice; ?></span>                      
                                            </td>

                                            <td><?php echo $loop->client; ?></td>
                                            <td><?php echo $loop->file; ?></td>
                                            <td id="details:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->details; ?></td>

                                            <td><?php echo number_format($loop->disbursement, 2); ?></td>
                                            <td><?php echo number_format($loop->balance, 2); ?></td>
                                            <td id="received:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->received; ?></td>
                                            <td id="approved:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->approved; ?></td>

                                        </tr>

                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="invoices" aria-labelledby="home-tab">

                        <div  class="col-md-12" >

                            <table id="datatable" class="table table-striped table-bordered scroll ">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>INVOICE</th>
                                        <th>CLIENT</th>
                                        <th>FILE</th>
                                        <th>DETAILS</th> 
                                        <th>AMOUNT PAID</th>
                                        <th>V.A.T</th> 
                                        <th>FEES</th>
                                        <th>DISBURSEMENT</th>
                                        <th>TOTAL AMOUNT</th>
                                        <th>BALANCE</th>
                                        <th>RECEIVED BY</th>
                                        <th>APPROVED</th>
                                        <th>APPROVE</th>
                                        <th>CLIENT HAS PAID</th>
                                        <th>ACTION</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    // var_dump($pay);
                                    foreach ($inv as $loop) {
                                        $approved = $loop->approved;
                                        ?>  
                                        <tr class="odd">
                                            <td id="invoice:<?php echo $loop->date; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->date; ?></span>                      
                                            </td>

                                            <td id="invoice:<?php echo $loop->invoice; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->invoice; ?></span>                      
                                            </td>

                                            <td><?php echo $loop->client; ?></td>
                                            <td><?php echo $loop->file; ?></td>
                                            <td id="details:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->details; ?></td>
                                            <td><?php echo number_format(($loop->disbursement + $loop->fees + $loop->vat) - $loop->balance, 2); ?></td>
                                            <td><?php echo number_format(($loop->vat), 2); ?></td>
                                            <td><?php echo number_format($loop->fees, 2); ?></td>
                                            <td><?php echo number_format($loop->disbursement, 2); ?></td>
                                            <td><?php echo number_format(($loop->disbursement + $loop->fees + $loop->vat), 2); ?></td>
                                            <td><?php echo number_format($loop->balance, 2); ?></td>
                                            <td id="received:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->received; ?></td>

                                            <td class="center">
                                                <?php if ($approved == "false") { ?>
                                                    <strong> <p  class="text-danger"><?= $approved ?></p></strong>
                                                <?php } else { ?>
                                                    <strong> <p  class="green"><?= $approved ?></p></strong>
                                                <?php } ?>

                                            </td> 
                                            <td class="td-actions">

                                                <a href="<?php echo base_url() . "index.php/payment/approve/" . $loop->disbursementID . "/" . $loop->approved; ?>" class="tooltip-info qualification" data-rel="tooltip" title="verify">
                                                    <img  height="30px" width="30px" class="nav-user-photo" src="<?= base_url(); ?>images/Bill-32.png" alt="account" />
                                                </a>
                                            </td>
                                            <td class="td-actions">
                                                <?php if ($approved == "true") { ?>
                                                    <a href="<?php echo base_url() . "index.php/payment/pay/" . $loop->disbursementID . "/" . $loop->paid; ?>" class="tooltip-info qualification" data-rel="tooltip" title="verify">
                                                        <img  height="30px" width="30px" class="nav-user-photo" src="<?= base_url(); ?>images/cash.png" alt="account" />
                                                    </a>
                                                <?php } ?>
                                            </td>
                                            <td class="center">
                                                <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/payment/delete/" . $loop->disbursementID; ?>"><li class="fa fa-trash">Delete</li></a>
                                            </td>


                                        </tr>

                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="requisitions" aria-labelledby="home-tab">

                        <div  class="col-md-12" >

                            <table id="datatable" class="table table-striped table-bordered scroll ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>DATE</th>
                                        <th>DETAILS</th>

                                        <th>AMOUNT</th>
                                        <th>SIGNED</th>
                                        <th>REASON</th> 
                                        <th>RECEIVED BY</th>
                                        <th>OUTCOME</th> 
                                        <th>CLIENT</th>
                                        <th>FILE</th>
                                        <th>REQUESTED BY</th>
                                        <th>BALANCE</th>
                                        <th>APPROVED</th>
                                        <th>TO BE APPROVED BY</th>
                                        <th>DEADLINE</th>                   
                                        <th>APPROVE</th>
                                        <th>PAY</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    //var_dump($expenses);
                                    $count = 1;
                                    foreach ($reqs as $loop) {
                                        $approved = $loop->approved;
                                        ?>  
                                        <tr class="odd">
                                            <td><?php echo $count++; ?></td>
                                            <td id="date:<?php echo $loop->date; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->date; ?></span>                      
                                            </td>

                                            <td id="details:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->details; ?></span>                      
                                            </td>
                                            <td >
                                                <span class="blue"><?php echo number_format($loop->amount, 2); ?></span>                      
                                            </td>
                                            <td id="signed:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->signed; ?></span>                      
                                            </td>
                                            <td id="reason:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->reason; ?></span>                      
                                            </td>
                                            <td id="laywer:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->lawyer; ?></span>                      
                                            </td>
                                            <td id="outcome:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->outcome; ?></span>                      
                                            </td>
                                            <td><?php echo $loop->client; ?></td>
                                            <td><?php echo $loop->file; ?></td>
                                            <td id="laywer:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->lawyer; ?></span>                      
                                            </td>                        
                                            <td><?php echo number_format($loop->balance, 2); ?></td>
                                            <td class="center">
                                                <?php if ($approved == "false") { ?>
                                                    <strong> <p  class="text-danger"><?= $approved ?></p></strong>
                                                <?php } else { ?>
                                                    <strong> <p  class=" text-green"><?= $approved ?></p></strong>
                                                <?php } ?>

                                            </td> 
                                            <td id="signed:<?php echo $loop->expenseID; ?>" contenteditable="true"><?php echo $loop->signed; ?></td>

                                            <td id="deadline:<?php echo $loop->expenseID; ?>" contenteditable="true"><?php echo $loop->deadline; ?></td>


                                            <td class="td-actions">

                                                <a href="<?php echo base_url() . "index.php/expense/approve/" . $loop->expenseID . "/" . $loop->approved; ?>" class="tooltip-info qualification" data-rel="tooltip" title="verify">
                                                    <img  height="30px" width="30px" class="nav-user-photo" src="<?= base_url(); ?>images/Bill-32.png" alt="account" />
                                                </a>
                                            </td>
                                            <td class="td-actions">
                                                <?php if ($approved == "true") { ?>
                                                    <a href="<?php echo base_url() . "index.php/expense/pay/" . $loop->expenseID . "/" . $loop->paid; ?>" class="tooltip-info qualification" data-rel="tooltip" title="verify">
                                                        <img  height="30px" width="30px" class="nav-user-photo" src="<?= base_url(); ?>images/cash.png" alt="account" />
                                                    </a>
                                                <?php } ?>
                                            </td>
                                            <td class="center">
                                                <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/expense/delete/" . $loop->expenseID; ?>"><li class="fa fa-trash">Delete</li></a>
                                            </td>

                                        </tr>

                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="expenses" aria-labelledby="home-tab">

                        <div  class="col-md-12" >

                            <table id="datatable" class="table table-striped table-bordered scroll ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>DATE</th>
                                        <th>DETAILS</th>

                                        <th>AMOUNT</th>
                                        <th>SIGNED</th>
                                        <th>REASON</th> 
                                        <th>RECEIVED BY</th>
                                        <th>OUTCOME</th> 
                                        <th>CLIENT</th>
                                        <th>FILE</th>
                                        <th>REQUESTED BY</th>

                                        <th>BALANCE</th>
                                        <th>APPROVED</th>
                                        <th>DEADLINE</th>
                                        <th>ACTION</th>
                                        <th>VIEW</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    //var_dump($expenses);
                                    $count = 1;
                                    foreach ($expenses as $loop) {
                                        ?>  
                                        <tr class="odd">
                                            <td><?php echo $count++; ?></td>
                                            <td id="date:<?php echo $loop->date; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->date; ?></span>                      
                                            </td>

                                            <td id="details:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->details; ?></span>                      
                                            </td>
                                            <td id="amount:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo number_format($loop->amount, 2); ?></span>                      
                                            </td>
                                            <td id="signed:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->signed; ?></span>                      
                                            </td>
                                            <td id="reason:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->reason; ?></span>                      
                                            </td>
                                            <td id="laywer:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->lawyer; ?></span>                      
                                            </td>
                                            <td id="outcome:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->outcome; ?></span>                      
                                            </td>
                                            <td><?php echo $loop->client; ?></td>
                                            <td><?php echo $loop->file; ?></td>
                                            <td id="laywer:<?php echo $loop->expenseID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->lawyer; ?></span>                      
                                            </td>                        
                                            <td><?php echo number_format($loop->balance, 2); ?></td>
                                            <td id="approved:<?php echo $loop->expenseID; ?>" contenteditable="true"><?php echo $loop->approved; ?></td>
                                            <td id="deadline:<?php echo $loop->expenseID; ?>" contenteditable="true"><?php echo $loop->deadline; ?></td>

                                            <td class="center">
                                                <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/document/delete/" . $loop->documentID; ?>"><li class="fa fa-trash">Delete</li></a>
                                            </td>
                                            <td class="center">
                                                <a class="btn btn-successr btn-xs" href="<?php echo base_url() . "documents/" . $loop->fileUrl; ?>"><li class="fa fa-download">Download</li></a>
                                            </td>


                                        </tr>

                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="files" aria-labelledby="profile-tab">
                        <table id="datatable" class="table table-striped table-bordered scroll ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>TYPE</th>
                                    <th>DETAILS</th>
                                    <th>SUBJECT</th>
                                    <th>CITATION</th>                     
                                    <th>LAW</th>
                                    <th>STATUS</th>
                                    <th>CLIENT</th>
                                    <th>LAWYER</th> 
                                    <th>DUE DATE</th>
                                    <th>CONTACT PERSON</th>
                                    <th>CONTACT NUMBER</th>
                                    <th>CREATED:</th>                    
                                    <th>VIEW</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($files as $loop) {
                                    $name = $loop->name;
                                    $no = $loop->no;
                                    $id = $loop->fileID;
                                    $subject = $loop->subject;
                                    $citation = $loop->citation;
                                    $details = $loop->details;
                                    $status = $loop->status;
                                    $type = $loop->type;
                                    $client = $loop->client;
                                    $lawyer = $loop->lawyer;
                                    $law = $loop->law;
                                    $created = $loop->created;
                                    ?>  
                                    <tr id="<?php echo $id; ?>" class="edit_tr">
                                        <td class="edit_td">
                                            <span id="no_<?php echo $id; ?>" class="text"><?php echo $no; ?></span>
                                            <input type="text" value="<?php echo $no; ?>" class="editbox" id="no_input_<?php echo $id; ?>"
                                        </td>
                                        <td class="edit_td">
                                            <span id="name_<?php echo $id; ?>" class="text"><?php echo $name; ?></span>
                                            <input type="text" value="<?php echo $name; ?>" class="editbox" id="name_input_<?php echo $id; ?>"
                                        </td>
                                        <td class="edit_td">
                                            <span id="type_<?php echo $id; ?>" class="text"><?php echo $type; ?></span>                                                       
                                            <select  name="type" class="editbox" id="type_input_<?php echo $id; ?>" >
                                                <option value="<?php echo $type; ?>" /><?php echo $type; ?>
                                                <option value="General" />General
                                                <option value="Litigation" />Litigation
                                                <option value="Conclusive" />Conclusive
                                                <option value="Non-conclusive" />Non-conclusive
                                            </select>
                                        </td> 
                                        <td class="edit_td">

                                            <span id="details_<?php echo $id; ?>" class="text">
                                                <?php
                                                //echo $abstract;
                                                // strip tags to avoid breaking any html
                                                $string = strip_tags($details);

                                                if (strlen($string) > 15) {

                                                    // truncate string
                                                    $stringCut = substr($string, 0, 15);

                                                    // make sure it ends in a word so assassinate doesn't become ass...
                                                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '... <a href="' . base_url() . "index.php/file/details/" . $loop->id . '">Read More</a>';
                                                }
                                                echo $string;
                                                ?>
                                            </span>
                                            <textarea type="text" value="<?php echo $details; ?>" class="editbox" id="details_input_<?php echo $id; ?>"><?php echo $details; ?></textarea>
                                        </td>
                                        <td class="edit_td">
                                            <span id="subject_<?php echo $id; ?>" class="text"><?php echo $subject; ?></span>
                                            <input type="text" value="<?php echo $subject; ?>" class="editbox" id="subject_input_<?php echo $id; ?>"
                                        </td>
                                        <td class="edit_td">
                                            <span id="citation_<?php echo $id; ?>" class="text"><?php echo $citation; ?></span>
                                            <input type="text" value="<?php echo $citation; ?>" class="editbox" id="citation_input_<?php echo $id; ?>"
                                        </td>

                                        <td class="edit_td">
                                            <span id="law_<?php echo $id; ?>" class="text"><?php echo $law; ?></span>                                                       
                                            <select  name="law" class="editbox" id="law_input_<?php echo $id; ?>" >
                                                <option value="<?php echo $law; ?>" /><?php echo $law; ?>
                                                <option value="Civil" />Civil
                                                <option value="Criminal" />Criminal
                                                <option value="Litigation" />Litigation
                                            </select>
                                        </td>
                                        <td class="edit_td">
                                            <span id="status_<?php echo $id; ?>" class="text"><?php echo $status; ?></span>                                                       
                                            <select  name="status" class="editbox" id="status_input_<?php echo $id; ?>" >
                                                <option value="<?php echo $status; ?>" /><?php echo $status; ?>
                                                <option value="Civil" />Active
                                                <option value="Criminal" />Dull
                                            </select>
                                        </td>
                                        <td class="edit_td">
                                            <span id="client_<?php echo $id; ?>" class="text"><?php echo $client; ?></span>                                                       
                                            <select  name="client" class="editbox" id="client_input_<?php echo $id; ?>" >
                                                <option value="<?php echo $client; ?>" /><?php echo $client; ?>
                                                <?php
                                                foreach ($users as $user) {
                                                    ?>
                                                    <option value="<?php echo $user->name; ?>" /><?php echo $user->name; ?>

                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </td>  
                                        <td class="edit_td">
                                            <span id="lawyer_<?php echo $id; ?>" class="text"><?php echo $lawyer; ?></span>                                                       
                                            <select  name="client" class="editbox" id="lawyer_input_<?php echo $id; ?>" >
                                                <option value="<?php echo $lawyer; ?>" /><?php echo $lawyer; ?>
                                                <?php
                                                foreach ($users as $user) {
                                                    ?>
                                                    <option value="<?php echo $user->name; ?>" /><?php echo $user->name; ?>

                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="edit_td">
                                            <?php echo $loop->due; ?>
                                        </td> 
                                        <td class="edit_td">
                                            <?php echo $loop->contact_person; ?>
                                        </td> 
                                        <td class="edit_td">
                                            <?php echo $loop->contact_number; ?>
                                        </td> 
                                        <td class="edit_td">
                                            <?php echo $created; ?>
                                        </td> 
                                        <td class="edit_td">
                                            <a class="btn btn-primary btn-xs" href="<?php echo base_url() . "index.php/file/profile/" . $name; ?>"><li class="fa fa-folder">View</li></a>

                                        </td>   

                                        <td class="center">
                                            <a class="btn btn-danger btn-danger btn-xs" href="<?php echo base_url() . "index.php/file/delete/" . $id; ?>"><li class="fa fa-trash">Remove</li></a>
                                        </td>

                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <table id="datatable2" class="table table-striped table-bordered scroll ">
                            <thead>
                                <tr>
                                    <th>DATE</th>
                                    <th>NO</th> 
                                    <th>CLIENT</th> 
                                    <th>FILE CONTACT</th> 
                                    <th>NAME</th>
                                    <th>CASE/NO</th>
                                    <th>NOTE</th>
                                    <th>STATUS</th> 
                                    <th>NEXT DUE</th>
                                    <th>C/O</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (is_array($files) && count($files)) {
                                    foreach ($files as $loop) {
                                        $color = "orange";
                                        if ($loop->due < date('Y-m-d') && $loop->progress != 'complete' || $loop->progress != 'closed') {
                                            $color = "red";
                                        } else {
                                            $color = "green";
                                        }
                                        ?>  
                                        <tr class="odd">

                                            <td id="created:<?php echo $loop->fileID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->created; ?></span> 
                                            </td>
                                            <td id="no:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->no; ?></td>
                                            <td id="client:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->client; ?></td>
                                            <td id="contact:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->contact; ?></td>

                                            <td id="name:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->name; ?></td>
                                            <td id="case:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->case; ?></td>
                                            <td id="note:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->note; ?></span> </td>
                                            <td id="progress:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="<?php echo $color; ?>"><?php echo $loop->progress; ?></span> </td>
                                            <td id="due:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="<?php echo $color; ?>"><?php echo $loop->due; ?></span> </td>
                                            <td id="lawyer:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="<?php echo $color; ?>"><?php echo $loop->lawyer; ?></span> </td>


                                        </tr>
                                        <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>


                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="document" aria-labelledby="profile-tab">
                        <table id="datatable" class="table table-striped table-bordered scroll ">
                            <thead>
                                <tr>
                                    <th>CREATED</th>
                                    <th>NAME</th>
                                    <th>FILE</th>
                                    <th>CLIENT</th>
                                    <th>DETAILS</th>
                                    <th>C/O</th> 
                                    <th>NOTE</th>
                                    <th>ACTION</th> 
                                    <th>DOWNLOAD</th>
                                    <th>SIZE(kilobytes/Kbs)</th>


                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($docs as $loop) {
                                    ?>  
                                    <tr class="odd">

                                        <td id="created:<?php echo $loop->documentID; ?>" contenteditable="true">
                                            <span class="green"><?php echo $loop->created; ?></span>                        </td>
                                        <td id="name:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->name; ?></td>
                                        <td id="fileID:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->fileID; ?></td>
                                        <td id="client:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->client; ?></td>
                                        <td id="details:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->details; ?></td>
                                        <td id="lawyer:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->lawyer; ?></td>
                                        <td id="note:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->note; ?></td>

                                        <td class="center">
                                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/document/delete/" . $loop->documentID; ?>"><li class="fa fa-trash">Delete</li></a>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-successr btn-xs" href="<?php echo base_url() . "documents/" . $loop->fileUrl; ?>"><li class="fa fa-download">Download</li></a>
                                        </td>
                                        <td class="center">
                                            <?php echo $loop->sizes; ?>
                                        </td>

                                    </tr>

                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->

<!-- FullCalendar -->
<script src="<?php echo base_url(); ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>build/js/custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker/daterangepicker.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>-->
<script type="text/javascript" src="<?= base_url(); ?>js/jquery.easyui.min.js"></script>

<script src="<?= base_url(); ?>vendors/echarts/dist/echarts.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#userfile").on("change", function ()
        {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader)
                return; // no file selected, or no FileReader support
            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function () { // set image data as background of div
                    $("#imagePreview").css("background-image", "url(" + this.result + ")");
                }
            }
        });
    });
</script>

<script>
    var theme = {
        color: [
            '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
            '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
        ],
        title: {
            itemGap: 8,
            textStyle: {
                fontWeight: 'normal',
                color: '#408829'
            }
        },
        dataRange: {
            color: ['#1f610a', '#97b58d']
        },
        toolbox: {
            color: ['#408829', '#408829', '#408829', '#408829']
        },
        tooltip: {
            backgroundColor: 'rgba(0,0,0,0.5)',
            axisPointer: {
                type: 'line',
                lineStyle: {
                    color: '#408829',
                    type: 'dashed'
                },
                crossStyle: {
                    color: '#408829'
                },
                shadowStyle: {
                    color: 'rgba(200,200,200,0.3)'
                }
            }
        },
        dataZoom: {
            dataBackgroundColor: '#eee',
            fillerColor: 'rgba(64,136,41,0.2)',
            handleColor: '#408829'
        },
        grid: {
            borderWidth: 0
        },
        categoryAxis: {
            axisLine: {
                lineStyle: {
                    color: '#408829'
                }
            },
            splitLine: {
                lineStyle: {
                    color: ['#eee']
                }
            }
        },
        valueAxis: {
            axisLine: {
                lineStyle: {
                    color: '#408829'
                }
            },
            splitArea: {
                show: true,
                areaStyle: {
                    color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                }
            },
            splitLine: {
                lineStyle: {
                    color: ['#eee']
                }
            }
        },
        timeline: {
            lineStyle: {
                color: '#408829'
            },
            controlStyle: {
                normal: {color: '#408829'},
                emphasis: {color: '#408829'}
            }
        },
        k: {
            itemStyle: {
                normal: {
                    color: '#68a54a',
                    color0: '#a9cba2',
                    lineStyle: {
                        width: 1,
                        color: '#408829',
                        color0: '#86b379'
                    }
                }
            }
        },
        map: {
            itemStyle: {
                normal: {
                    areaStyle: {
                        color: '#ddd'
                    },
                    label: {
                        textStyle: {
                            color: '#c12e34'
                        }
                    }
                },
                emphasis: {
                    areaStyle: {
                        color: '#99d2dd'
                    },
                    label: {
                        textStyle: {
                            color: '#c12e34'
                        }
                    }
                }
            }
        },
        force: {
            itemStyle: {
                normal: {
                    linkStyle: {
                        strokeColor: '#408829'
                    }
                }
            }
        },
        chord: {
            padding: 4,
            itemStyle: {
                normal: {
                    lineStyle: {
                        width: 1,
                        color: 'rgba(128, 128, 128, 0.5)'
                    },
                    chordStyle: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        }
                    }
                },
                emphasis: {
                    lineStyle: {
                        width: 1,
                        color: 'rgba(128, 128, 128, 0.5)'
                    },
                    chordStyle: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        }
                    }
                }
            }
        },
        gauge: {
            startAngle: 225,
            endAngle: -45,
            axisLine: {
                show: true,
                lineStyle: {
                    color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                    width: 8
                }
            },
            axisTick: {
                splitNumber: 10,
                length: 12,
                lineStyle: {
                    color: 'auto'
                }
            },
            axisLabel: {
                textStyle: {
                    color: 'auto'
                }
            },
            splitLine: {
                length: 18,
                lineStyle: {
                    color: 'auto'
                }
            },
            pointer: {
                length: '90%',
                color: 'auto'
            },
            title: {
                textStyle: {
                    color: '#333'
                }
            },
            detail: {
                textStyle: {
                    color: 'auto'
                }
            }
        },
        textStyle: {
            fontFamily: 'Arial, Verdana, sans-serif'
        }
    };

    var echartBarLine = echarts.init(document.getElementById('mainb'), theme);

    echartBarLine.setOption({
        title: {
            x: 'center',
            y: 'top',
            padding: [0, 0, 20, 0],
            text: 'Service usage statistics',
            textStyle: {
                fontSize: 15,
                fontWeight: 'normal'
            }
        },
        tooltip: {
            trigger: 'axis'
        },
        toolbox: {
            show: true,
            feature: {
                dataView: {
                    show: true,
                    readOnly: false,
                    title: "Text View",
                    lang: [
                        "Text View",
                        "Close",
                        "Refresh",
                    ],
                },
                restore: {
                    show: true,
                    title: 'Restore'
                },
                saveAsImage: {
                    show: true,
                    title: 'Save'
                }
            }
        },
        calculable: true,
        legend: {
            data: ['Messaging', 'Scheduling', 'Time Sheets'],
            y: 'bottom'
        },
        xAxis: [{
                type: 'category',
                data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            }],
        yAxis: [{
                type: 'value',
                name: 'Count',
                axisLabel: {
                    formatter: '{value} count'
                }
            }, {
                type: 'value',
                name: 'Number',
                axisLabel: {
                    formatter: '{value} No'
                }
            }],
        series: [{
                name: 'Messaging',
                type: 'bar',
                data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
            }, {
                name: 'Scheduling',
                type: 'bar',
                data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
            }, {
                name: 'Time Sheets',
                type: 'line',
                yAxisIndex: 1,
                data: [2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2]
            }]
    });

</script>
<!-- FullCalendar -->
<script>
    $(window).load(function () {


        var date = new Date(),
                d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear(),
                started,
                categoryClass;
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                $('#fc_create').click();

                started = start;
                ended = end;
                var allDay = !start.hasTime() && !end.hasTime();
                $("#date").val(moment(start).format("YYYY-MM-DD"));

                $(".antosubmit").on("click", function () {
                    var title = $("#title").val();
                    if (end) {
                        ended = end;
                    }

                    categoryClass = $("#event_type").val();

                    if (title) {
                        calendar.fullCalendar('renderEvent', {
                            title: title,
                            start: started,
                            end: end,
                            allDay: allDay
                        },
                                true // make the event "stick"
                                );
                    }

                    $('#title').val('');

                    calendar.fullCalendar('unselect');

                    $('.antoclose').click();

                    return false;
                });
            },
            eventClick: function (calEvent, jsEvent, view) {
                $('#fc_edit').click();
                $('#title2').val(calEvent.title);

                categoryClass = $("#event_type").val();

                $(".antosubmit2").on("click", function () {
                    calEvent.title = $("#title2").val();

                    calendar.fullCalendar('updateEvent', calEvent);
                    $('.antoclose2').click();
                });

                calendar.fullCalendar('unselect');
            },
            editable: true,
            events: [<?php

                                function clean($string) {
                                    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

                                    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
                                }

                                if (is_array($sch)) {

                                    foreach ($sch as $loop) {
                                        $mydate = $loop->date;
                                        $prior = $loop->priority;
                                        $days = $loop->period;

                                        $informations = '' . $loop->startTime . ': ' . clean($loop->details);
                                        $informations .= 'A/T:';
                                        $informations .= $loop->name . ' ';
                                        $d = (int) date("d", strtotime($mydate));
                                        $m = (int) date("m", strtotime($mydate)) - 1;
                                        $y = (int) date("Y", strtotime($mydate));

                                        switch ($prior) {
                                            case High:
                                                $className = 'label-important';
                                                break;
                                            case Medium:
                                                $className = 'label-success';
                                                break;
                                            case Low:
                                                $className = 'label-grey';
                                                break;
                                            case File:
                                                $className = 'label-blue';
                                                break;
                                        }
                                        ?>
                        {
                            title: '<?php echo $informations . '-' . $loop->name . '-' . ' ' . $loop->contact . '-' . $loop->email; ?>',
                            start: new Date(<?php echo $y; ?>, <?php echo $m; ?>, <?php echo $d; ?>),
                            className: '<?php echo $className; ?>'

                        },
        <?php
    }
}
?>]
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(function () {
            //acknowledgement message
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function () {
                var field_id = $(this).attr("id");
                var value = $(this).text();
                $.post('<?php echo base_url() . "index.php/client/updater/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {
                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });

        });



    });
</script>
<script type="text/javascript">


    function myformatter(date) {
        var y = date.getFullYear();
        var m = date.getMonth() + 1;
        var d = date.getDate();
        return y + '-' + (m < 10 ? ('0' + m) : m) + '-' + (d < 10 ? ('0' + d) : d);
    }
    function myparser(s) {
        if (!s)
            return new Date();
        var ss = (s.split('-'));
        var y = parseInt(ss[0], 10);
        var m = parseInt(ss[1], 10);
        var d = parseInt(ss[2], 10);
        if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
            return new Date(y, m - 1, d);
        } else {
            return new Date();
        }
    }

</script>


<script src="<?= base_url(); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        TableManageButtons.init();


    });
</script>








