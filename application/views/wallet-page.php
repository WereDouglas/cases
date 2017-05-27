
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/pure-min.css">
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


<div class=" col-md-12  col-sm-12 x_panel">
    <div class="alert alert-info" id="status"></div>
    WALLETS
    <button type="button" class=" links" data-toggle="modal" data-target=".bs-example-modal-sm">ADD</button>


    <div class="x_content scroll">

        <table id="datatable" class="table table-striped table-bordered scroll ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
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
                        <td id="date:<?php echo $loop->id; ?>" contenteditable="false">
                            <?php echo $loop->id; ?>                     
                        </td>
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
                        <td id="user:<?php echo $loop->id; ?>" contenteditable="true">
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
<div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
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
<script src="<?= base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?= base_url(); ?>js/jquery.easyui.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        TableManageButtons.init();


    });
</script>
<script type="text/javascript">
    function ExportToExcel(datatable) {
        var htmltable = document.getElementById('datatables');
        var html = htmltable.outerHTML;
        window.open('data:application/vnd.ms-excel,' + ';filename=exportData.xlsx;' + encodeURIComponent(html));
        var result = "data:application/vnd.ms-excel,";
        this.href = result;
        this.download = "my-custom-filename.xls";
        return true;
    }

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
                $.post('<?php echo base_url() . "index.php/wallet/updater/"; ?>', field_id + "=" + value, function (data) {
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
    $(document).on('click', '.printdiv-btn', function (e) {
        e.preventDefault();

        var $this = $(this);
        //  var originalContent = $('body').html();
        var printArea = $this.parents('.printableArea').html();

        $('body').html(printArea);
        window.print();
        $('body').html(printArea);
    });
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

            $("#method" + ID).hide();
            $("#method_input_" + ID).show();


        }).change(function ()
        {
            var ID = $(this).attr('id');
            var method = $("#method_input_" + ID).val();


            var dataString = 'id=' + ID + '&method=' + method;

            $("#method_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif" />'); // Loading image

            if (method.length > 0)
            {

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/wallet/updating/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {

                        $("#method_" + ID).html(method);


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
