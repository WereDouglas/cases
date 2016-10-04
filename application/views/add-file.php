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
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="case" class="form-control col-md-7 col-xs-12"  name="no" placeholder="<?php echo $no; ?>" value="<?php echo $no; ?>"  type="text">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class=" item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="optional form-control col-md-7 col-xs-12"  data-placeholder="Choose a title" name="type" id="type">
                                    <option value="" />
                                    <option value="General" />General
                                    <option value="Litigation" />Litigation
                                    <option value="Conclusive" />Conclusive
                                    <option value="Non-conclusive" />Non-conclusive

                                </select>
                            </div>

                        </div>
                        <div class=" item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Law</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="optional form-control col-md-7 col-xs-12"  data-placeholder="Choose a title" name="law" id="law">
                                    <option value="" />
                                    <option value="Civil" />Civil
                                    <option value="Criminal" />Criminal
                                    <option value="Litigation" />Litigation

                                </select>
                            </div>

                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Client</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
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
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lawyer</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
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
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Case no <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="case" class="form-control col-md-7 col-xs-12"  name="case" placeholder="Case no"  type="text">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Name" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contact Person <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="contact_person" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="contact_person" placeholder="Contact person" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contact number(phone) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="contact_number" class="form-control col-md-7 col-xs-12"  data-validate-words="2" name="contact_number" placeholder="Contact number" required="required" type="number">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Subject <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" name="subject" placeholder="Subject" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Citation/Peugeon No.<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" name="citation" placeholder="Citation" type="text">
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 align-left">Details</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="span12" id="form-field-9" name="details" data-maxlength="50"></textarea>
                            </div>
                        </div>
                        <div class=" item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">State</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="optional form-control col-md-7 col-xs-12"  data-placeholder="Select status" name="status" id="status">
                                    <option value="" />
                                    <option value="Active" />Active
                                    <option value="Passive" />Passive
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 align-left">Note</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="span12" id="form-field-9" name="note" data-maxlength="10"></textarea>
                            </div>
                        </div>
                        <div class=" item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 align-left">Progress</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 align-left">
                                <textarea class="span12" id="form-field-9" name="progress" id="progress" data-maxlength="20"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 align-left">Date opened</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 align-left">
                                <input class="easyui-datebox" name="opened" id="opened"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 align-left">Date due</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 align-left">
                                <input class="easyui-datebox" name="due" id="due" ></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3 align-right">
                                <button id="send" type="submit" class="btn btn-success align-right">Submit</button>
                                <button type="submit" class="btn btn-primary align-right">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once(APPPATH . 'views/footer-page.php'); ?>
