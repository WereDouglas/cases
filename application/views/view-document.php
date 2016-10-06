
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<?php echo $this->session->flashdata('msg'); ?>

<div class=" col-md-12 x_panel">
    <h2>DOCUMENTS</h2>  
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">ADD</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content col-md-6 col-sm-12">
                <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/document/create'  method="post">

                    <h1> <span class="section">DOCUMENT INFORMATION</span></h1>
                    <div class="col-md-12 col-sm-12">                               
                        <table class="pure-table" style="width:100%;">


                            <tbody>


                                <tr>
                                    <td >Name</td> 
                                    <td >
                                        <div class="col-md-6 col-sm-6 col-xs-12">

                                            <input id="name" class="form-control col-sm-3 col-xs-12"   name="name" placeholder="Name" required="required" type="text">
                                        </div>
                                    </td> 
                                    <td >

                                    </td> 


                                </tr>
                                <tr>
                                    <td >Select client</td> 
                                    <td >
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="easyui-combobox form-control" name="client" id="client" style="width:10%;height:26px" data-options="
                                                   url:'<?php echo base_url() ?>index.php/task/client',
                                                   method:'get',
                                                   valueField:'name',
                                                   textField:'name',
                                                   multiple:false,
                                                   panelHeight:'auto'
                                                   ">
                                        </div>
                                    </td> 
                                    <td >

                                    </td> 


                                </tr>
                                <tr>
                                    <td >Document owner</td> 
                                    <td > 
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="easyui-combobox form-control" name="lawyer" id="file" style="width:10%;height:26px" data-options="
                                                   url:'<?php echo base_url() ?>index.php/task/staff',
                                                   method:'get',
                                                   valueField:'name',
                                                   textField:'name',
                                                   multiple:false,
                                                   panelHeight:'auto'
                                                   ">
                                        </div>
                                    </td> 
                                    <td >

                                    </td> 


                                </tr>
                                <tr>
                                    <td >File/ case</td> 
                                    <td > <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="easyui-combobox form-control span12" name="file" id="file"  data-options="
                                                   url:'<?php echo base_url() ?>index.php/task/files',
                                                   method:'get',
                                                   valueField:'name',
                                                   textField:'name',
                                                   multiple:false,
                                                   panelHeight:'auto'
                                                   "> 

                                        </div>
                                    </td> 
                                    <td >

                                    </td> 


                                </tr>
                                <tr>
                                    <td >Details</td> 
                                    <td > <textarea class="span12" id="form-field-9" name="details" data-maxlength="50"></textarea>
                                    </td> 
                                    <td >

                                    </td> 


                                </tr>
                                <tr>
                                    <td >Note</td> 
                                    <td ><textarea class="span12" id="form-field-9" name="note" data-maxlength="10"></textarea>
                                    </td> 
                                    <td >

                                    </td> 


                                </tr>
                                <tr>
                                    <td >Browse for document</td> 
                                    <td >  <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="file" name="userfile" id="userfile" class="btn-default btn-small"/>

                                        </div> </td> 
                                    <td >

                                    </td> 


                                </tr>
                                <tr>

                                    <td > <button id="send" type="submit" class="btn btn-success align-right">Submit</button>
                                    </td> 
                                    <td >
                                        <button data-dismiss="modal" class="btn btn-primary align-right">Cancel</button>

                                    </td> 
                                    <td ></td> 


                                </tr>




                            </tbody>
                        </table>

                    </div>

                    <div class="form-group col-md-12">

                        <div class="col-md-6 col-sm-6 col-xs-6">                       

                            <div class="col-md-12 col-sm-12 col-xs-12">


                            </div>
                        </div> 


                    </div>


            </div>



            </form>
        </div>
    </div>
</div>

<div class="x_content scroll">

    <table id="datatable" class="table table-striped table-bordered scroll ">
        <thead>
            <tr>
                <th>CREATED</th>
                <th>NAME</th>
                <th>FILE</th>
                <th>CLIENT</th>
                <th>DETAILS</th>
                <th>C/O</th> 
                <th>NOTE</th>
                <th>ACTION</th> 
                <th>DOWNLOAD</th>
                <th>SIZE(kilobytes/Kbs)</th>


            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($docs as $loop) {
                ?>  
                <tr class="odd">

                    <td id="created:<?php echo $loop->documentID; ?>" contenteditable="true">
                        <span class="green"><?php echo $loop->created; ?></span>                        </td>
                    <td id="name:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->name; ?></td>
                    <td id="fileID:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->fileID; ?></td>
                    <td id="client:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->client; ?></td>
                    <td id="details:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->details; ?></td>
                    <td id="lawyer:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->lawyer; ?></td>
                    <td id="note:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->note; ?></td>

                    <td class="center">
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/document/delete/" . $loop->documentID; ?>"><li class="fa fa-trash">Delete</li></a>
                    </td>
                    <td class="center">
                        <a class="btn btn-successr btn-xs" href="<?php echo base_url() . "documents/" . $loop->fileUrl; ?>"><li class="fa fa-download">Download</li></a>
                    </td>
                    <td class="center">
                        <?php echo $loop->sizes; ?>
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
                $.post('<?php echo base_url() . "index.php/document/updater/"; ?>', field_id + "=" + value, function (data) {
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