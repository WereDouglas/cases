<?php require_once(APPPATH . 'views/inner-css.php'); ?>
<?php echo $this->session->flashdata('msg'); ?>
<style>
    horizontal .control-label {
        padding-top: 7px;
        margin-bottom: 0;
        text-align: left;
    }
    label {
        padding-top: 8px;
        text-align: left;
    }
    .form-horizontal .control-label {
        padding-top: 8px;
        text-align: left;
    }
    @media print {
        body * {
            visibility: hidden;
        }
        #printableArea, #printableArea * {
            visibility: visible;
        }
        #printableArea{
            position: absolute;
            left: 0;
            top: 0;
        }
    }

</style>
<?php echo $this->session->flashdata('msg'); ?>

<div class="row-fluid">
    <table id="sample-table-2" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><a href="#modal-form" role="button" class="green" data-toggle="modal"><i class="icon-pencil bigger-130"></i>Add </a></th>

                <th>DATE</th>
                <th>PARTICULARS</th>
                <th>AMOUNT</th>
                <th>REFERENCE</th>
                <th>METHOD</th> 
                <th>USER</th> 
                <th>ACTION</th>

            </tr>
        </thead>
        <tbody>
            <?php
            //var_dump($expenses);
            $count = 1;
            foreach ($wallets as $loop) {
                ?>  
                <tr class="odd edit_tr" id="<?php echo $loop->id; ?>">
                    <td><?php echo $count++; ?></td>

                    <td id="date:<?php echo $loop->id; ?>" contenteditable="true">
                        <?php echo $loop->date; ?>                     
                    </td>

                    <td id="particulars:<?php echo $loop->id; ?>" contenteditable="true">
                        <?php echo $loop->particulars; ?>                     
                    </td>
                    <td id="amount:<?php echo $loop->id; ?>" contenteditable="true">
                        <?php echo number_format($loop->amount); ?>                     
                    </td>
                    <td id="reference:<?php echo $loop->id; ?>" contenteditable="true">
                        <?php echo $loop->reference; ?>                     
                    </td>
                    <td id="method:<?php echo $loop->id; ?>" contenteditable="true">
                        <?php echo $loop->method; ?>
                        <select  name="type" class="editbox" id="method_input_<?php echo $loop->id; ?>" >
                            <option value="<?php echo $loop->method; ?>" title="<?php echo $loop->method; ?>"><?php echo $loop->method; ?></option>
                            <option value="Cash" />Cash
                            <option value="Cheque" />Cheque

                        </select>
                    </td>
                    <td >
                        <?php echo $loop->user; ?>                   
                    </td>

                    <td class="center">
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/wallet/delete/" . $loop->id; ?>"><li class="fa fa-trash">Delete</li></a>
                    </td>


                </tr>

                <?php
            }
            ?>

        </tbody>
    </table>
</div>
</div>
<div id="modal-form" class="modal hide" tabindex="-1">
    <div class="modal-dialog">

        <div class="modal-content ">
            <div class="col-md-12  panel"> 
                <div class=" clearfix"> </div>
                <div class="panel-header">
                    <h1 ><b>ADD WALLET</b></h1>
                </div>
                <form  enctype="multipart/form-data" class=" vertical"  action='<?= base_url(); ?>index.php/wallet/create'  method="post">

                    <div class="form-group">
                        <label >Date</label>                                                                 
                        <input class="easyui-datebox form-control" name="date" id="date"/>                              

                    </div>
                    <div class="form-group">
                        <label >Details/Particulars</label>                                
                        <textarea class="form-control" id="particulars" name="particulars" data-maxlength="10"></textarea>                               
                    </div>
                    <div class="form-group">
                        <label >Amount</label> 
                        <input id="amount"  class="form-control" name="amount" placeholder="" required="required" type="number">

                    </div>
                    <div class="form-group">
                        <label >Reference</label>
                        <input id="reference" class="form-control"  name="reference" placeholder="" type="text">
                    </div>
                    <div class="form-group">
                        <label >Method </label>                              
                        <select class="form-control" id="method" name="method" >                                                         
                            <option value="Cash" >Cash</option>
                            <option value="Cheque" >Cheque</option>
                        </select>
                    </div>                 
                    <button id="send" type="submit" class="btn btn-success align-right">Submit</button>
                    <button  class="btn btn-primary align-left"  data-dismiss="modal">Cancel</button>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- jQuery -->

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
                $.post('<?php echo base_url() . "index.php/wallet/update/"; ?>', field_id + "=" + value, function (data) {
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
<script>

    function NavigateToSite(ele) {
        var selectedVal = $(ele).attr("value");
        //var selectedVal = document.getElementById("myLink").getAttribute('value');
        //href= "index.php/patient/add_user/'
        $.post("<?php echo base_url() ?>index.php/user/reset", {
            userID: selectedVal
        }, function (response) {
            alert(response);
        });

    }
    function SelectedRole(ele) {


        $('#loading_card').show();


        var role = $("input[name=role]").val();

        if (role.length > 0) {

            $.post("<?php echo base_url() ?>index.php/role/details", {role: role}
            , function (response) {
                //#emailInfo is a span which will show you message

                $('#loading_card').hide();
                setTimeout(finishAjax('loading_card', escape(response)), 200);

            }).fail(function (e) {
                console.log(e);
            }); //end change
        } else {
            alert("Please insert missing information");
            $('#loading_card').hide();
        }

        function finishAjax(id, response) {
            $('#' + id).html(unescape(response));
            $('#' + id).fadeIn();
        }
    }


</script>
<script type="text/javascript">
    $(document).ready(function ()
    {
        $(".editbox").hide();

        $(".edit_tr").click(function ()
        {
            var ID = $(this).attr('id');

            $("#role" + ID).hide();
            $("#role_input_" + ID).show();


        }).change(function ()
        {
            var ID = $(this).attr('id');
            var role = $("#role_input_" + ID).val();


            var dataString = 'id=' + ID + '&role=' + role;

            $("#role_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif" />'); // Loading image

            if (role.length > 0)
            {

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/user/updating/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {

                        $("#role_" + ID).html(role);


                    }
                });
            } else
            {
                alert('Enter something.');
            }
            location.reload();
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

    });
</script>
