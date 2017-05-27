
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<?php echo $this->session->flashdata('msg'); ?>

<div class=" col-md-12 x_panel">
    <h2>Clients</h2>     
    <div class="x_content scroll">

        <table id="datatable" class="table table-striped table-bordered scroll ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>REGISTERED</th>
                    <th>NAME</th>
                    <th>EMAIL</th>                   
                    <th>STATUS</th>
                    <th>CONTACT</th>
                    <th>ADDRESS</th>
                    <th>CREATED:</th>
                    <th>VIEW</th>
                    <th>SEND E-MAIL</th>
                    <th>ACTION</th>
                </tr>
            </thead>


            <tbody>
                <?php
                if (is_array($users) && count($users)) {
                    foreach ($users as $loop) {
                        $name = $loop->name;
                        $address = $loop->address;
                        $email = $loop->email;
                        $designation = $loop->designation;
                        $status = $loop->status;
                        $category = $loop->category;
                        $id = $loop->clientID;
                        $contact = $loop->contact;
                        $created = $loop->created;
                        ?>  
                        <tr id="<?php echo $id; ?>" class="edit_tr">
                            <td> 

                                <?php
                                if ($loop->image != "" && @getimagesize('' . base_url() . 'uploads/' . $loop->image)) {
                                    ?>
                                    <img  height="50px" width="50px"  src="<?= base_url(); ?>uploads/<?php echo $loop->image; ?>" alt="logo" />
                                    <?php
                                } else {
                                    ?>
                                    <img  height="50px" width="50px"  src="<?= base_url(); ?>images/temp.png" alt="logo" />
                                    <?php
                                }
                                ?>
                            </td>
                            <td class="edit_td">
                                <?php echo $loop->registration; ?>
                            </td>    
                            <td class="edit_td">
                                <span id="name_<?php echo $id; ?>" class="text"><?php echo $name; ?></span>
                                <input type="text" value="<?php echo $name; ?>" class="editbox" id="name_input_<?php echo $id; ?>"
                            </td>
                            <td class="edit_td">
                                <span id="email_<?php echo $id; ?>" class="text"><?php echo $email; ?></span>
                                <input type="text" value="<?php echo $email; ?>" class="editbox" id="email_input_<?php echo $id; ?>"
                            </td>

                            <td class="edit_td">
                                <span id="status_<?php echo $id; ?>" class="text"><?php echo $status; ?></span>                                                       
                                <select  name="status" class="editbox" id="status_input_<?php echo $id; ?>" >
                                    <option value="<?php echo $status; ?>" /><?php echo $status; ?>
                                    <option value="Partner" />Active
                                    <option value="Associate" />Dull

                                </select>
                            </td>  

                            <td class="edit_td">
                                <span id="contact_<?php echo $id; ?>" class="text"><?php echo $contact; ?></span>
                                <input type="text" value="<?php echo $contact; ?>" class="editbox" id="contact_input_<?php echo $id; ?>"

                            </td>
                            <td class="edit_td">

                                <span id="address_<?php echo $id; ?>" class="text">
                                    <?php
                                    //echo $abstract;
                                    // strip tags to avoid breaking any html
                                    $string = strip_tags($address);

                                    if (strlen($string) > 10) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 10);

                                        // make sure it ends in a word so assassinate doesn't become ass...
                                        $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '... <a href="' . base_url() . "index.php/user/finding/" . $loop->id . '">Read More</a>';
                                    }
                                    echo $string;
                                    ?>
                                </span>
                                <textarea type="text" value="<?php echo $address; ?>" class="editbox" id="address_input_<?php echo $id; ?>"><?php echo $address; ?></textarea>

                            </td>
                            <td class="edit_td">
                                <?php echo $created; ?>
                            </td>                            
                            <td class="edit_td">
                                <a class="btn btn-default btn-xs" href="<?php echo base_url() . "index.php/client/profile/" . $loop->name; ?>"><li class="fa fa-folder">View</li></a>

                            </td>  
                            <td class="edit_td">
                                <a class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm" data-id="<?php echo $email; ?>" ><li class="fa fa-mail-reply">E-mail</li></a>

                            </td>  
                            <td class="center">
                                <a class="btn-danger btn-small icon-remove" href="<?php echo base_url() . "index.php/client/delete/" . $id; ?>">delete</a>
                            </td>

                        </tr>
                        <?php
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
    <div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/client/mail'  method="post">

                    <span class="section">Email Client</span>
                    <div class="col-md-12 col-sm-12 col-xs-12">                       


                        <div class="item form-group col-md-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">TO: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" class="form-control col-md-7 col-xs-12"   name="email" placeholder="email"  type="text">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">                       


                        <div class="item form-group col-md-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">SUBJECT: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="subject" class="form-control col-md-7 col-xs-12"  name="subject" placeholder="subject" required="required" type="text">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 align-left">Message/body</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="span12" id="form-field-9" name="message" ></textarea>
                            </div>
                        </div>                       

                       
                    <div class=" item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Attachment</label>
                        <div class="col-md-6 col-sm-5 col-xs-12">

                            <input class="easyui-combobox form-control" name="attachment" id="attachment" style="width:100%;height:26px" data-options="
                                   url:'<?php echo base_url() ?>index.php/document/docs',
                                   method:'get',
                                   valueField:'fileUrl',
                                   textField:'name',
                                   multiple:false,
                                   panelHeight:'auto'
                                   ">
                        </div>
                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3 align-right">
                                <button  type="submit" class="btn btn-success align-right">Send</button>
                                <button class="btn btn-default align-right" data-dismiss="modal">Cancel</button>
                            </div>
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
<script type="text/javascript">
    $(document).ready(function ()
    {
        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

            var data_id = '';

            if (typeof $(this).data('id') !== 'undefined') {

                data_id = $(this).data('id');
            }

            $('#email').val(data_id);
        })



        $(".editbox").hide();

        $(".edit_tr").click(function ()
        {
            var ID = $(this).attr('id');
            $("#name_" + ID).hide();
            $("#email_" + ID).hide();
            $("#designation_" + ID).hide();
            $("#status_" + ID).hide();
            $("#address_" + ID).hide();
            $("#contact_" + ID).hide();
            $("#category_" + ID).hide();


            $("#contact_input_" + ID).show();
            $("#name_input_" + ID).show();
            $("#designation_input_" + ID).show();
            $("#status_input_" + ID).show();
            $("#email_input_" + ID).show();
            $("#address_input_" + ID).show();
            $("#category_input_" + ID).show();

        }).change(function ()
        {
            var ID = $(this).attr('id');
            var name = $("#name_input_" + ID).val();
            var details = $("#details_input_" + ID).val();
            var contact = $("#contact_input_" + ID).val();
            var email = $("#email_input_" + ID).val();
            var address = $("#address_input_" + ID).val();
            var category = $("#category_input_" + ID).val();
            var designation = $("#designation_input_" + ID).val();
            var status = $("#status_input_" + ID).val();



            var dataString = 'id=' + ID + '&name=' + name + '&address=' + address + '&details=' + details + '&contact=' + contact + '&email=' + email + '&category=' + category + '&status=' + status + '&designation=' + designation;
            $("#name_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />'); // Loading image
            $("#details_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />'); // Loading image
            $("#email_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />');
            $("#contact_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />');
            $("#address_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />');
            if (name.length > 0)
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/client/update"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $("#name_" + ID).html(name);
                        $("#details_" + ID).html(details);
                        $("#contact_" + ID).html(contact);
                        $("#email_" + ID).html(email);
                        $("#address_" + ID).html(address);
                        $("#category_" + ID).html(category);
                        $("#designation_" + ID).html(designation);
                        $("#status_" + ID).html(status);


                    }
                });
            } else
            {
                alert('Enter something.');
            }

        });

        // Edit input box click action
        $(".editbox").mouseup(function ()
        {
            return false
        });

        // Outside click action
        $(document).mouseup(function ()
        {
            $(".editbox").hide();
            $(".text").show();
        });

        $('#loading').hide();
        $("#email2").blur(function () {

            var user = $(this).val();
            if (user != null) {

                $('#loading').show();
                $.post("<?php echo base_url() ?>index.php/organisation/exists", {
                    user: $(this).val()
                }, function (response) {
                    // alert(response);
                    $('#loading').hide();
                    setTimeout(finishAjax('loading', escape(response)), 400);
                });
            }
            function finishAjax(id, response) {
                $('#' + id).html(unescape(response));
                $('#' + id).fadeIn();
            }


        });

    });
</script>
<script>

    function NavigateToSite(ele) {
        var selectedVal = $(ele).attr("value");
        //var selectedVal = document.getElementById("myLink").getAttribute('value');
        //href= "index.php/patient/add_user/'
        $.post("<?php echo base_url() ?>index.php/admin/reset", {
            id: selectedVal
        }, function (response) {
            alert(response);
        });

    }

</script>