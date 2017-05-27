
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<?php echo $this->session->flashdata('msg'); ?>

<div class=" col-md-12 x_panel">
    <div class="alert alert-info" id="status"></div>
    <h2>DOCUMENTS</h2>  
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">ADD</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content col-md-6 col-sm-12">
                <form  enctype="multipart/form-data" class="form-label-left"  action='<?= base_url(); ?>index.php/document/create'  method="post">

                    <h1> <span class="section">DOCUMENT INFORMATION</span></h1>
                                               
                        <div class="form-group">
                            <label >Name</label> 
                            <input id="name" class="form-control"   name="name" placeholder="Name" required="required" type="text">
                        </div>
                        <div class="form-group">
                            <label >Select client</label>                            

                            <input class="easyui-combobox form-control" name="client" id="client" style="width:10%;height:26px" data-options="
                                   url:'<?php echo base_url() ?>index.php/task/client',
                                   method:'get',
                                   valueField:'name',
                                   textField:'name',
                                   multiple:false,
                                   panelHeight:'auto'
                                   ">
                        </div>
                        <div class="form-group">
                            <label >Document owner</label>
                            <input class="easyui-combobox form-control" name="lawyer" id="file" style="width:10%;height:26px" data-options="
                                   url:'<?php echo base_url() ?>index.php/task/staff',
                                   method:'get',
                                   valueField:'name',
                                   textField:'name',
                                   multiple:false,
                                   panelHeight:'auto'
                                   ">
                        </div>
                        <div class="form-group">
                            <label >File/ case</label> 

                            <input class="easyui-combobox form-control span12" name="file" id="file"  data-options="
                                   url:'<?php echo base_url() ?>index.php/task/files',
                                   method:'get',
                                   valueField:'name',
                                   textField:'name',
                                   multiple:false,
                                   panelHeight:'auto'
                                   "> 

                        </div>
                        <div class="form-group">
                            <label >Details</label> 

                            <textarea class="form-control" id="form-field-9" name="details" data-maxlength="50"></textarea>
                        </div>
                        <div class="form-group">
                            <label >Note</label> 
                            <textarea class="form-control" id="form-field-9" name="note" data-maxlength="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label >Browse for document</label>
                            <input type="file" name="userfile" id="userfile" class="btn-default btn-small"/>
                        </div>
                        <div class="form-group">
                            <button id="send" type="submit" class="btn btn-success align-right">Submit</button>

                            <button data-dismiss="modal" class="btn btn-primary align-right">Cancel</button>

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
                        <a target="new" class="btn btn-successr btn-xs" href="<?php echo base_url() . "documents/" . $loop->name; ?>"><li class="fa fa-download">Download</li></a>
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
        $("#status").hide();
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