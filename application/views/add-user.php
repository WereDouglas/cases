<?php require_once(APPPATH . 'views/header-page.php'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" />
<div class="row container">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="">
                <?php echo $this->session->flashdata('msg'); ?>
                <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/user/create'  method="post">

                    <span class="section">USER INFORMATION</span>
                    <div class=" item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="optional form-control col-md-7 col-xs-12"  data-placeholder="Choose a title" name="designation" id="designation">
                                <option value="Partner" />Partner
                                <option value="Associate" />Associate
                                <option value="Contract" />Contract
                                <option value="Of counsel" />Of counsel
                                <option value="Clerk" />Clerk
                                <option value="Paralegal" />Paralegal
                                <option value="Administrator" />Administrator
                                <option value="Client" />Client
                            </select>
                        </div>

                    </div>
                    <div class=" item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="optional form-control col-md-7 col-xs-12" data-placeholder="Choose level of authority" name="category" id="category">
                                <option value="Client" />Client
                                <option value="Staff" />Staff

                            </select>
                        </div>

                    </div>
                    <div class="item form-group">                    
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile picture</label>  
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="userfile" id="userfile" class="btn-default btn-small"/>
                            <div id="imagePreview" ></div>      
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s)" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirm Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email2" name="confirm_email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Contact <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="contact" name="contact" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password" >Password<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password" type="password" name="password" data-validate-length="6" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" required="required" name="address" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>


                    <div class=" item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Supervisor</label>
                        <div class="col-md-6 col-sm-5 col-xs-12">

                            <input class="easyui-combobox form-control" name="supervisor" id="supervisor" style="width:100%;height:26px" data-options="
                                   url:'<?php echo base_url() ?>index.php/task/staff',
                                   method:'get',
                                   valueField:'name',
                                   textField:'name',
                                   multiple:false,
                                   panelHeight:'auto'
                                   ">
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
<?php require_once(APPPATH . 'views/footer-page.php'); ?>
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