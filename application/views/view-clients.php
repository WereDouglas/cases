<?php require_once(APPPATH . 'views/inner-css.php'); ?>

<div class="col-md-12">
    <div class="alert alert-info" id="status"></div>
    <div class="row-fluid">
        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>

                    <th><a href="#modal-form" role="button" class="green" data-toggle="modal"><i class="icon-pencil bigger-130"></i>Add </a></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>                                   
                    <th>Status</th>                                    
                    <th>Address</th>
                    <th>Number</th>                                    
                    <th class="hidden-phone">Created</th>
                    <th class="hidden-phone">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (is_array($users) && count($users)) {
                    foreach ($users as $loop) {
                        $id = $loop->id;
                        $status = $loop->status;
                        ?>  
                        <tr class="odd edit_tr" id="<?php echo $id; ?>">

                            <td> 
                                <?php
                                if ($loop->image != "") {

                                    echo '<img height="50px" width="50px" src="data:image/jpeg;base64,' . $loop->image . '" />';
                                } else {
                                    ?>
                                    <img  height="50px" width="50px"  src="<?= base_url(); ?>images/user_place.png"  />
                                    <?php
                                }
                                ?>
                            </td>
                            <td id="name:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->name; ?>
                            </td>

                            <td id="email:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->email; ?>
                            </td>
                            <td id="contact:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->contact; ?>
                            </td>
                            <td class="edit_td">
                                <span id="status_<?php echo $id; ?>" class="text"><?php echo $status; ?></span>                                      
                                <select  name="status" class="editbox" id="status_input_<?php echo $id; ?>" >
                                    <option value="<?php echo $status; ?>" title="<?php echo $status; ?>"><?php echo $status; ?></option>

                                    <option value="Active" />Active
                                    <option value="Terminated" />Terminated

                                </select>
                            </td>  


                            <td id="address:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->address; ?>
                            </td>
                            <td id="no:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->no; ?></td>
                            <td id="created:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->created; ?></td>



                            <td class="td-actions">
                                <div class="hidden-phone visible-desktop action-buttons">


                                    <a class="green" href="<?php echo base_url() . "index.php/client/profile/" . $loop->id; ?>">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="<?php echo base_url() . "index.php/client/delete/" . $loop->id; ?>">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>

            </tbody>
        </table>
    </div>

</div><!--/col-md-12--> 


<!-- Modal -->

<div id="modal-form" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Please fill the client details</h4>
    </div>
    <form id="station-form" parsley-validate novalidate role="form" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/client/create'  method="post">

        <div class="modal-body overflow-visible">
            <div class="row-fluid">
                <div class=" span6"> <div class="form-group">                    
                        <label >Profile picture</label>                        
                        <input type="file" name="userfile" id="userfile" class="btn-default btn-small form-control"/>
                        <div id="imagePreview" ></div>                      
                    </div>  
                    <div class="form-group">                        
                        <input type="text" name="no" value="<?php echo $this->session->userdata('code') . '-' . date('d-m-Y') . '/W' . (count($users) + 1); ?>" placeholder="Registration No." id="no" required class="form-control"/>

                    </div>
                    <div class="form-group">                        
                        <input type="text" name="name" placeholder="Full Name" id="name" required class="form-control"/>

                    </div>
                    <div class="form-group">                        
                        <input type="number" name="contact" placeholder="256" id="contact"  class="form-control"/>

                    </div>
                    <div class="control-group">                        
                        <input type="email" name="email" placeholder="E-mail" id="email"  class="form-control"/>

                    </div>
                    <div class="form-group">                        
                        <input type="text" name="nationality" placeholder="Nationality" id="nationality" class="form-control"/>

                    </div></div>
                <div class=" span6">  <div class="form-group">                        
                        <input type="text" name="address" placeholder="Address" id="address" class="form-control"/>

                    </div>
                    <div class="form-group">
                        <label>Care of</label>
                        <input class="easyui-combobox" name="userID" id="userID" style="width:100%;height:26px" data-options="
                               url:'<?php echo base_url() ?>index.php/user/lists',
                               method:'get',
                               valueField:'id',
                               textField:'surname',
                               multiple:false,
                               panelHeight:'auto'
                               " >
                    </div>
                    <div class="form-group">                       
                        <label >Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Active">Active</option> 
                            <option value="Terminated">Terminated</option>                                  
                        </select>                       
                    </div><!--/form-group-->
                    <div class="form-group">                       
                        <label >Type</label>
                        <select class="form-control" id="type" name="type">
                            <option value="Person">Person</option> 
                            <option value="Company">Company</option>
                            <option value="Group">Group</option>  
                            <option value="Organisation">Organisation</option>  
                            <option value="Other">Other</option>  
                        </select>                       
                    </div><!--/form-group-->
                    <div class="">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>  <button class="btn btn-success pull-right" type="submit">SUBMIT</button> 

                    </div></div>


                <div class="vspace"></div>     
            </div>
        </div>
    </form>
</div><!--PAGE CONTENT ENDS-->
<?php require_once(APPPATH . 'views/inner-js.php'); ?>
<script>
    $(document).ready(function () {
        $('#loading_card').hide();
        $("#status").hide();
        $(function () {
            //acknowledgement message
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function () {
                var field_id = $(this).attr("id");
                var value = $(this).text();
                $.post('<?php echo base_url() . "index.php/client/update/"; ?>', field_id + "=" + value, function (data) {
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
<script type="text/javascript" src="<?= base_url(); ?>js/jquery.easyui.min.js"></script>

