<?php require_once(APPPATH . 'views/header-page.php'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" />
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="">
                <?php echo $this->session->flashdata('msg') . ' ' . $this->session->userdata('code'); ?>
                <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/file/create'  method="post">

                    <span class="section">FILE INFORMATION</span>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Name" required="required" type="text">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Citation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12" name="citation" placeholder="Citation" type="text">
                        </div>
                    </div>  
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Details</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="span12" id="form-field-9" name="details" data-maxlength="10"></textarea>
                        </div>
                    </div>
                    <div class=" item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="optional form-control col-md-7 col-xs-12"  data-placeholder="Select status" name="status" id="status">
                                <option value="" />
                                <option value="Civil" />Active
                                <option value="Criminal" />Dull
                            </select>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Cancel</button>
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url(); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>js/jquery.easyui.min.js"></script>

<?php require_once(APPPATH . 'views/footer-page.php'); ?>
