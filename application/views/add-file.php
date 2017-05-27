<?php require_once(APPPATH . 'views/header-page.php'); ?>
<?php
$no = $this->session->userdata('code') . "/" . date('y') . "/" . date('m') . (int) date('d') . (int) date('H') . (int) date('i') . (int) date('ss');
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="">
                <?php echo $this->session->flashdata('msg') . ' ' . $this->session->userdata('code'); ?>
                <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/file/create'  method="post">

                    <span class="section">FILE INFORMATION</span>

                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group">
                                <label >File<span class="required"></span></label>
                                <input id="case" class="form-control"  name="no" placeholder="<?php echo $no; ?>" value="<?php echo $no; ?>"  type="text">

                            </div>
                            <div class="form-group">
                                <label >Type</label>                              
                                <select class="optional form-control "  data-placeholder="Choose a title" name="type" id="type">
                                    <option value="" />
                                    <option value="General" />General
                                    <option value="Litigation" />Litigation
                                    <option value="Conclusive" />Conclusive
                                    <option value="Non-conclusive" />Non-conclusive

                                </select>
                            </div>
                            <div class="form-group">
                                <label >Law</label>

                                <select class="optional form-control col-md-7 col-xs-12"  data-placeholder="Choose a title" name="law" id="law">
                                    <option value="" />
                                    <option value="Civil" />Civil
                                    <option value="Criminal" />Criminal
                                    <option value="Litigation" />Litigation

                                </select>                           

                            </div>
                            <div class="form-group">
                                <label>Client</label>                               
                                <select class="optional form-control col-md-7 col-xs-12"  data-placeholder="Choose a title" name="client" id="client">
                                    <option value="" />
                                    <?php
                                    foreach ($clients as $client) {
                                        ?>
                                        <option value="<?php echo $client->name; ?>" /><?php echo $client->name; ?>

                                        <?php
                                    }
                                    ?>
                                </select>                             
                            </div>

                            <div class="form-group">
                                <label >Lawyer</label>                                
                                <select class="optional form-control col-md-7 col-xs-12"  data-placeholder="Choose a title" name="lawyer" id="lawyer">
                                    <option value="" />
                                    <?php
                                    foreach ($users as $user) {
                                        ?>
                                        <option value="<?php echo $user->name; ?>" /><?php echo $user->name; ?>

                                        <?php
                                    }
                                    ?>
                                </select>                               
                            </div>
                            <div class="form-group">
                                <label >Case no <span class="required"></span></label>                              
                                <input id="case" class="form-control"  name="case" placeholder="Case no"  type="text">

                            </div>
                            <div class="form-group">
                                <label >Name <span class="required">*</span></label>                                
                                <input id="name" class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Name" required="required" type="text">
                            </div>
                                   <div class="form-group">
                                <label class="control-label"> Contact Person <span class="required"></span> </label>                         </label>

                                <input id="contact_person" class="form-control"  name="contact_person" placeholder="Contact person" required="required" type="text">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name">Contact number(phone) <span class="required">*</span>
                                </label>                             
                                <input id="contact_number" class="form-control"  data-validate-words="2" name="contact_number" placeholder="Contact number" required="required" type="number">

                            </div>

                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                     
                            <div class="form-group">
                                <label >Subject <span class="required">*</span> </label>                              
                                <input id="name" class="form-control" name="subject" placeholder="Subject" type="text">

                            </div>
                            <div class="form-group">
                                <label >Citation/Peugeon No.<span class="required">*</span></label>                               
                                <input id="name" class="form-control" name="citation" placeholder="Citation" type="text">

                            </div> 

                            <div class="form-group">
                                <label>Details</label>                              
                                <textarea class="form-control" id="form-field-9" name="details" data-maxlength="50"></textarea>

                            </div>
                            <div class="form-group">
                                <label>State</label>

                                <select class="optional form-control"  data-placeholder="Select status" name="status" id="status">
                                    <option value="" />
                                    <option value="Active" />Active
                                    <option value="Passive" />Passive
                                </select>

                            </div>
                            <div class="item form-group">
                                <label >Note</label>

                                <textarea class=" form-control" id="form-field-9" name="note" data-maxlength="10"></textarea>

                            </div>
                            <div class="form-group">
                                <label >Progress</label>                               
                                <textarea class="form-control" id="form-field-9" name="progress" id="progress" data-maxlength="20"></textarea>

                            </div>
                            <div class="form-group">
                                <label>Date opened</label>                            
                                <input class="easyui-datebox form-control" name="opened" id="opened"/>                             
                            </div>
                            <div class="form-group">
                                <label >Date due</label>                            
                                <input class="easyui-datebox" name="due" id="due" />                            
                            </div>
                            <button type="reset" class="btn btn-primary align-left">Cancel</button>
                            <button type="submit" class="btn btn-success align-right">Submit</button>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once(APPPATH . 'views/footer-page.php'); ?>
