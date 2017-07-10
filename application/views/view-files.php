<?php require_once(APPPATH . 'views/inner-css.php'); ?>
<?php echo $this->session->flashdata('msg'); ?>

<div class=" col-md-12">
    <div class="alert alert-info" id="status"></div>
    <div class="row-fluid">
        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th><a href="#modal-form" role="button" class="green" data-toggle="modal"><i class="icon-pencil bigger-130"></i>Add </a></th>
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
                    $id = $loop->id;
                    $subject = $loop->subject;
                    $citation = $loop->citation;
                    $details = $loop->note;
                    $status = $loop->status;
                    $type = $loop->type;
                    $client = $loop->client;
                    $user = $loop->user;
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
                                <option value="Active" />Active
                                <option value="Terminated" />Terminated
                            </select>
                        </td>

                        <td class="edit_td"> 
                            <?php
                            echo '<img height="20px" width="20px" src="data:image/jpeg;base64,' . $loop->client_image . '" />';
                            ?>
                            <?php echo $loop->client; ?> </td> 
                        <td >
                            <?php
                            echo '<img height="20px" width="20px" src="data:image/jpeg;base64,' . $loop->user_image . '" />';
                            ?>

                            <?php echo $loop->user; ?>
                        </td>  
                        <td class="edit_td">
                            <?php echo $loop->due; ?>
                        </td> 
                        <td class="edit_td">
                            <?php echo $loop->contact; ?>
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
</div>
<!-- Modal -->

<div id="modal-form" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Please fill the client details</h4>
    </div>
    <form id="station-form" parsley-validate novalidate role="form" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/file/create'  method="post">

        <div class="modal-body overflow-visible">
            <div class="row-fluid">
                <div class=" span6">
                    <div class="form-group">
                        <label>Client</label>
                        <input class="easyui-combobox" name="clientID" id="clientID" style="width:100%;height:26px" data-options="
                               url:'<?php echo base_url() ?>index.php/client/lists',
                               method:'get',
                               valueField:'id',
                               textField:'name',
                               multiple:false,
                               panelHeight:'auto'
                               " >
                    </div>
                    <div class="form-group">
                        <label>C/O</label>
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
                        <label >Type</label>
                        <select class="form-control" id="type" name="type">
                            <option value="General">General</option> 
                            <option value="Litigation">Litigation</option> 
                            <option value="Conclusive">Conclusive</option>
                            <option value="Non-conclusive">Non-conclusive</option> 
                            <option value="General">ADR</option> 
                        </select>                       
                    </div><!--/form-group-->
                    <div class="form-group">                       
                        <label >Law/Sector</label>
                        <select class="form-control" id="law" name="law">
                            <option value="Civil">Civil</option> 
                            <option value="Criminal">Criminal</option> 
                            <option value="Litigation">Litigation</option>
                            <option value="Family">Family</option> 
                            <option value="Land">Land</option> 
                            <option value="Debt">Debt</option>
                            <option value="Other">Other</option> 
                        </select>                       
                    </div><!--/form-group-->
                    <div class="form-group">                        
                        <input type="text" name="no" value="<?php echo $this->session->userdata('code') . '-' . date('d-m-Y') . '/W' . (count($files) + 1); ?>" placeholder="Registration No." id="no" required class="form-control"/>

                    </div>
                    <div class="form-group">                        
                        <input type="text" name="name" placeholder="File name" id="name" required class="form-control"/>

                    </div>
                    <div class="form-group">                        
                        <input type="number" name="contact" placeholder="256" id="contact"  class="form-control"/>

                    </div>
                    <div class="control-group">                        
                        <input type="text" name="subject" placeholder="Subject" id="subject"  class="form-control"/>

                    </div>
                    <div class="form-group">                        
                        <input type="text" name="citation" placeholder="Citation /Peugeon No." id="citation" class="form-control"/>

                    </div></div>
                <div class=" span6"> 

                    <div class="form-group">                       
                        <label >Active/Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Yes">yes</option> 
                            <option value="No">No</option>                           
                        </select>                       
                    </div><!--/form-group-->
                    <div class="control-group">                        
                        <input type="text" name="note" placeholder="Notes" id="note"  class="form-control"/>

                    </div>

                    <div class="form-group">                       
                        <label >Progress on file/case</label>
                        <select class="form-control" id="progress" name="progress">
                            <option value="Concept">Concept</option> 
                            <option value="WIP(Initial stage)">WIP(Initial stage)</option>
                            <option value="Suspended">Suspended</option>  
                            <option value="Abandoned">Abandoned</option>  
                            <option value="Active">Active</option> 
                            <option value="Inactive">Inactive</option> 
                            <option value="Unsupported">Unsupported</option> 
                            <option value="Moved">Moved</option> 
                        </select>                       
                    </div><!--/form-group-->

                    <div class="form-group"> 
                        Date opened <input class="easyui-datebox form-control" name="opened"   data-options="required:true" value="<?php echo date('Y-m-d'); ?>" style="width:160px">
                    </div>
                    <div class="form-group"> 
                        Date due  <input class="easyui-datebox form-control" name="due" data-options="required:true" value="<?php echo date('Y-m-d'); ?>" style="width:160px">
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>  <button class="btn btn-success pull-right" type="submit">SUBMIT</button> 

                    </div>
                </div>


                <div class="vspace"></div>     
            </div>
        </div>
    </form>
</div><!--PAGE CONTENT ENDS-->
<?php require_once(APPPATH . 'views/inner-js.php'); ?>
<script type="text/javascript">
    $(document).ready(function ()
    {
        $(".editbox").hide();

        $(".edit_tr").click(function ()
        {
            var ID = $(this).attr('id');
            $("#name_" + ID).hide();
            $("#client_" + ID).hide();
            $("#lawyer_" + ID).hide();
            $("#status_" + ID).hide();
            $("#details_" + ID).hide();
            $("#type_" + ID).hide();
            $("#subject_" + ID).hide();
            $("#citation_" + ID).hide();
            $("#law_" + ID).hide();
            $("#no_" + ID).hide();


            $("#type_input_" + ID).show();
            $("#name_input_" + ID).show();
            $("#lawyer_input_" + ID).show();
            $("#status_input_" + ID).show();
            $("#client_input_" + ID).show();
            $("#details_input_" + ID).show();
            $("#subject_input_" + ID).show();
            $("#citation_input_" + ID).show();
            $("#law_input_" + ID).show();
            $("#no_input_" + ID).show();

        }).change(function ()
        {
            var ID = $(this).attr('id');
            var name = $("#name_input_" + ID).val();
            var details = $("#details_input_" + ID).val();
            var type = $("#type_input_" + ID).val();
            var client = $("#client_input_" + ID).val();
            var details = $("#details_input_" + ID).val();
            var subject = $("#subject_input_" + ID).val();
            var lawyer = $("#lawyer_input_" + ID).val();
            var status = $("#status_input_" + ID).val();
            var citation = $("#citation_input_" + ID).val();
            var law = $("#law_input_" + ID).val();
            var no = $("#no_input_" + ID).val();


            var dataString = 'id=' + ID + '&name=' + name + '&details=' + details + '&details=' + details + '&type=' + type + '&client=' + client + '&subject=' + subject + '&status=' + status + '&lawyer=' + lawyer + '&citation=' + citation + '&law=' + law + '&no=' + no;
            $("#name_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />'); // Loading image
            $("#details_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />'); // Loading image
            $("#client_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />');
            $("#type_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />');
            $("#details_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />');
            if (name.length > 0)
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/file/update/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $("#name_" + ID).html(name);
                        $("#details_" + ID).html(details);
                        $("#type_" + ID).html(type);
                        $("#client_" + ID).html(client);
                        $("#details_" + ID).html(details);
                        $("#subject_" + ID).html(subject);
                        $("#lawyer_" + ID).html(lawyer);
                        $("#status_" + ID).html(status);
                        $("#citation_" + ID).html(citation);
                        $("#law_" + ID).html(law);
                        $("#no_" + ID).html(no);


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
        $("#client2").blur(function () {

            var user = $(this).val();
            if (user != null) {

                $('#loading').show();
                $.post("<?php echo base_url() ?>index.php/file/exists", {
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
    $(document).ready(function () {
        $('#loading_card').hide();
        $("#status").hide();
        $(function () {
            //acknowledgement message
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function () {
                var field_id = $(this).attr("id");
                var value = $(this).text();
                $.post('<?php echo base_url() . "index.php/file/update/"; ?>', field_id + "=" + value, function (data) {
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
