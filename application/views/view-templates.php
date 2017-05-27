
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<?php echo $this->session->flashdata('msg'); ?>

<div class=" col-md-12 x_panel">
    <div class="alert alert-info" id="status"></div>
    <span>DOCUMENT TEMPLATES</span>  
    <button type="button" class="links align-right" data-toggle="modal" data-target=".bs-example-modal-sm">ADD</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content col-md-6 col-sm-12">
                <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/template/create'  method="post">

                    <h1> <span class="section">DOCUMENT INFORMATION</span></h1>
                    <div class="col-md-12 col-sm-12">   
                        <div class="form-group">
                            <label >Name</label>
                            <input id="name" class="form-control"   name="name" placeholder="Name" required="required" type="text">
                            <span id="loading_name"  name ="loading_name"><img src="<?= base_url(); ?>images/loading.gif" alt="loading......" /></span>

                        </div>
                        <div class="form-group">
                            <label >Title</label>
                            <input id="title" class="form-control"   name="title" placeholder="Title"  type="text">

                        </div>
                        <div class="form-group">   
                            <label >Select country</label> 

                            <input class="easyui-combobox form-control" name="country" id="country" style="width:10%;height:26px" data-options="
                                   url:'<?php echo base_url() ?>index.php/template/countries',
                                   method:'get',
                                   valueField:'name',
                                   textField:'name',
                                   multiple:false,
                                   panelHeight:'auto'
                                   ">
                        </div>
                        <div class="form-group"> 
                            <label >Details/Description</label>
                            <textarea class="form-control" id="form-field-9" name="description" data-maxlength="50"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Starts</label>                               
                            <input class="easyui-datebox form-control" name="start" id="start"/>                                
                        </div>
                        <div class="form-group">
                            <label>expires</label>                               
                            <input class="easyui-datebox form-control" name="end" id="end"/>                                
                        </div>
                        <div class="form-group">
                            <label >Browse for document</label>                                
                            <input type="file" name="userfile" id="userfile" class="btn-default btn-small"/>
                        </div>
                        <div class="form-group">  
                            <button data-dismiss="modal" class="btn btn-primary align-left">Cancel</button>
                            <button id="send" type="submit" class="btn btn-success align-right">Submit</button>
                        </div>                      

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="x_content scroll">

    <table id="datatable" class="table table-striped table-bordered scroll ">
        <thead>
            <tr>              
                <th>NAME</th>
                <th>TITLE</th>
                <th>COUNTRY</th>
               
                <th>PERIOD OF VALIDITY</th>
                <th>DETAILS/DESCRIPTION</th>               
                <th>SIZE(kilobytes/Kbs)</th>
                <th>CREATED</th>
                <th>ACTION</th>
                <th>Download</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($docs as $loop) {
                ?>  
                <tr class="odd">

                    <td id="name:<?php echo $loop->id; ?>" contenteditable="true">
                        <?php echo $loop->name; ?>                    </td>
                    <td id="title:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->title; ?></td>
                    <td id="country:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->country; ?></td>
                    <td id="period:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->period; ?></td>
                    <td id="description:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->description; ?></td>
                    <td id="size:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->size; ?></td>
                    <td id="created:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->created; ?></td>

                    <td class="center">
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/document/delete/" . $loop->name; ?>"><li class="fa fa-trash">Delete</li></a>
                    </td>
                    <td class="center">
                        <a class="btn btn-successr btn-xs" href="<?php echo base_url() . "documents/" . $loop->file; ?>"><li class="fa fa-download">Download</li></a>
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
        $(function () {
            //acknowledgement message
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function () {
                var field_id = $(this).attr("id");
                var value = $(this).text();
                $.post('<?php echo base_url() . "index.php/template/updater/"; ?>', field_id + "=" + value, function (data) {
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
    $(document).ready(function () {
        
        $('#status').hide();
        $('#loading_name').hide();
        $("#name").blur(function () {

            var name = $(this).val();
            if (name != null) {

                $('#loading_name').show();
                $.post("<?php echo base_url() ?>index.php/template/name", {
                    name: $(this).val()
                }, function (response) {
                    // alert(response);
                    $('#loading_name').hide();
                    setTimeout(finishAjax('loading_name', escape(response)), 400);
                });
            }
            function finishAjax(id, response) {
                $('#' + id).html(unescape(response));
                $('#' + id).fadeIn();
            }


        });




    });


</script>