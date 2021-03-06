<!-- Bootstrap -->
<?php //var_dump($sch); ?>
<link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- FullCalendar -->
<link href="<?php echo base_url(); ?>vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

<!-- Custom styling plus plugins -->
<link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/easyui.css?date=<?php echo date('Y-m-d') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/icon.css?date=<?php echo date('Y-m-d') ?>">
<style type="text/css" media="screen">

    table{
        border-collapse:collapse;
        border:0px solid #FF0000;
    }

    table td{
        border:0px solid #FF0000;
    }

    table tr{
        border:0px solid #FF0000;
    }
</style>
<div class="row container">
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <span class="info-box status col-md-12 col-sm-12 col-xs-12" id="status"></span>
            </div>


            <table >

                <tbody>
                    <?php
                    if (is_array($org) && count($org)) {
                        foreach ($org as $loop) {
                            ?>
                            <tr class="odd">
                                <td> 
                                    <div class="profile_img">
                                        <div id="crop-avatar">
                                            <!-- Current avatar -->

                                            <?php
                                            if ($loop->image != "") {
                                                ?>
                                                <img height="20px" width="50px" class="img-responsive avatar-view" src="<?= base_url(); ?>uploads/<?php echo $loop->image ?>" alt="Avatar" title="Change the avatar">

                                                <?php
                                            } else {
                                                ?>

                                                <img height="20px" width="50px" class="img-responsive avatar-view" src="<?= base_url(); ?>images/user_place.png" alt="Avatar" title="Change the avatar">
                                                <?php
                                            }
                                            ?>


                                        </div>
                                    </div>
                                </td>
                                <td> <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/organisation/update_image'  method="post">                                       

                                        <input type="file" name="userfile" id="userfile" />
                                        <div id="imagePreview" ></div>
                                        <input type="hidden" name="orgID" id="orgID" value="<?php echo $loop->orgID; ?>" />                                                   
                                        <input type="hidden" name="namer" id="namer" value="<?php echo $loop->name; ?>" />
                                        <button id="send" type="submit" >Update picture</button>


                                    </form></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>

                                <td>NAME:</td>
                                <td id="name:<?php echo $loop->orgID; ?>" contenteditable="true">
                                    <span class="green"><?php echo $loop->name; ?></span> 
                                </td>
                                <td></td>


                            </tr>
                            <tr>

                                <td>EMAIL:</td>
                                <td id="email:<?php echo $loop->orgID; ?>" contenteditable="true"><span class="green"><?php echo $loop->email; ?></span></td>

                                <td></td>


                            </tr>
                            <tr>

                                <td>LICENSE:</td>
                                <td id="license:<?php echo $loop->orgID; ?>" contenteditable="true"><span class="red"><?php echo $loop->license; ?></span></td>

                                <td></td>


                            </tr>
                            <tr>

                                <td>CODE:</td>
                                <td id="code:<?php echo $loop->orgID; ?>" contenteditable="true"><span class="red"><?php echo $loop->code; ?></span></td>

                                <td></td>


                            </tr>
                            <tr>

                                <td>ADDRESS:</td>
                                <td id="address:<?php echo $loop->orgID; ?>" contenteditable="true"><?php echo $loop->address; ?></td>

                                <td></td>


                            </tr>
                            <tr>

                                <td>CURRENCY:</td>
                                <td id="currency:<?php echo $loop->orgID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->currency; ?></span> </td>

                                <td></td>
                            </tr>
                            <tr>
                                <td>COUNTRY:</td>
                                <td id="country:<?php echo $loop->orgID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->country; ?></span> </td>
                                <td></td>
                            </tr>
                            <tr>

                                <td>REGION:</td>
                                <td id="region:<?php echo $loop->orgID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->region; ?></span> </td>

                                <td></td>
                            </tr>
                            <tr>

                                <td>CITY:</td>
                                <td id="city:<?php echo $loop->orgID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->city; ?></span> </td>


                                <td></td>


                            </tr>
                            <tr>

                                <td>TIN No:</td>
                                <td id="tin:<?php echo $loop->orgID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->tin; ?></span> </td>

                                <td></td>


                            </tr>

                            <tr>
                                <td>VAT No:</td>
                                <td id="vat:<?php echo $loop->orgID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->vat; ?></span> </td>

                                <td></td>
                            </tr>
                            <tr>

                                <td>TOP HEADER(receipt)</td>
                                <td colspan="2" id="top:<?php echo $loop->orgID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->top; ?></span> </td>
                            </tr>
                            <tr>
                                <td>DATA SYNC:</td>
                                <td id="data_sync:<?php echo $loop->orgID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->data_sync; ?></span> </td>

                                <td></td>
                            </tr>

                            <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>
</div>
<script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->

<!-- FullCalendar -->
<script src="<?php echo base_url(); ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>build/js/custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker/daterangepicker.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>-->
<script type="text/javascript" src="<?= base_url(); ?>js/jquery.easyui.min.js"></script>

<script src="<?= base_url(); ?>vendors/echarts/dist/echarts.min.js"></script>
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


    function myformatter(date) {
        var y = date.getFullYear();
        var m = date.getMonth() + 1;
        var d = date.getDate();
        return y + '-' + (m < 10 ? ('0' + m) : m) + '-' + (d < 10 ? ('0' + d) : d);
    }
    function myparser(s) {
        if (!s)
            return new Date();
        var ss = (s.split('-'));
        var y = parseInt(ss[0], 10);
        var m = parseInt(ss[1], 10);
        var d = parseInt(ss[2], 10);
        if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
            return new Date(y, m - 1, d);
        } else {
            return new Date();
        }
    }

</script>


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

        $(function () {
            //acknowledgement message
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function () {
                var field_id = $(this).attr("id");
                var value = $(this).text();
                $.post('<?php echo base_url() . "index.php/organisation/updater/"; ?>', field_id + "=" + value, function (data) {
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








