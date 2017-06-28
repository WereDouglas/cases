<?php require_once(APPPATH . 'views/css-page.php'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" />    

<?php echo $this->session->flashdata('msg'); ?>

<div class=" col-md-12 x_panel">
    <h2>SERVICES</h2>   
    <div class="x_content scroll">

        <table id="datatable" class="table table-striped table-bordered scroll ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Cost</th> 
                     <th>V.A.T</th> 
                    <th class="hidden-phone"></th>

                </tr>
            </thead>
            <tbody>

                <?php
                if (is_array($s) && count($s)) {
                    $editable = "true";
                    if ($this->session->userdata('companyID') != "") {
                        $editable = "false";
                    }
                    $count = 1;
                    foreach ($s as $loop) {
                        ?>  
                        <tr class="odd">
                            <td >
                                <?php echo $count++; ?>
                            </td>
                            <td id="name:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->name; ?>
                            </td>
                            <td id="category:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->category; ?>
                            </td>
                            <td id="cost:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->cost; ?>
                            </td>
                             <td id="vat:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->vat; ?>
                            </td>

                            <td class="edit_td">
                                <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/role/delete/" . $loop->id; ?>"><li class="fa fa-trash-o">Delete</li></a>

                            </td> 

                        </tr>
                        <?php
                    }
                }
                ?>

            </tbody>

        </table>
    </div><!--/table-responsive-->
</div><!--/porlets-content-->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Role</h4>
            </div>
            <div class="modal-body">             
                <form id="station-form" parsley-validate novalidate role="form" class="form-horizontal" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/role/create'  method="post">

                    <div class="form-group">
                        <label>Permission/role</label>
                        <input type="text" name="name" placeholder="Name" id="name" required class="form-control"/>

                    </div>
                    <div class="form-group">
                        <label>User actions</label>
                        <textarea name="actions"  class="form-control"></textarea>

                    </div>
                    <div class="form-group">
                        <label>User views</label>
                        <textarea name="views"  class="form-control"></textarea>
                    </div>
                    <div class="form-group">

                        <div class="checkbox checkbox_margin">
                            <button class="btn btn-default pull-right" type="submit">SUBMIT</button> <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
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