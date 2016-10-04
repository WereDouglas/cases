
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<?php echo $this->session->flashdata('msg'); ?>

<div class=" col-md-12 x_panel">
    <h2>FILES </h2>   
    <div class="x_content scroll">

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
</div>



<?php require_once(APPPATH . 'views/footer-page.php'); ?>

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