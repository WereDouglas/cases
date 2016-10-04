
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<?php echo $this->session->flashdata('msg'); ?>

<div class="col-md-12 x_panel">

    <h2>MANAGE FILES</h2>

    <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/file/generate_post'  method="post">

        <div class="box-body">
            <div class="col-md-2">                
                <input class="form-control col-md-7 col-xs-12" name="name" id="name" placeholder="File name" ></input>
            </div>  
            <div class="col-md-2">                
                <input class="form-control col-md-7 col-xs-12" name="client" id="client" placeholder="Client" ></input>
            </div>  

            <div class="col-md-6">
                <button type="submit"  class="btn  btn-small btn-flat">Search</button> <input type="button" name="exportExcel" class="btn  btn-small btn-flat" id="exportExcel" onclick="ExportToExcel('datatables')" value="Export">

            </div>

        </div><!-- /.box-body -->
    </form>
    <div class="col-md-12 col-sm-12 col-xs-12"> <span class="info-box status col-md-12 col-sm-12 col-xs-12" id="status"></span></div>

    <div class="x_content scroll">

        <table id="datatables" class="table table-striped table-bordered scroll ">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>NO</th> 
                    <th>CLIENT</th> 
                    <th>FILE CONTACT</th> 
                    <th>NAME</th>
                    <th>CASE/NO</th>
                    <th>NOTE</th>
                    <th>STATUS</th> 
                    <th>NEXT DUE</th>
                    <th>C/O</th>
                 
                    <th>CONTACT PERSON</th>
                    <th>CONTACT NUMBER</th>
                    <th>VIEW</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($files) && count($files)) {
                    foreach ($files as $loop) {
                        $color = "orange";
                        if ($loop->due < date('Y-m-d') && $loop->progress != 'complete' || $loop->progress != 'closed') {
                            $color = "red";
                        } else {
                            $color = "green";
                        }
                        ?>  
                        <tr class="odd">

                            <td id="created:<?php echo $loop->fileID; ?>" contenteditable="true">
                                <span class="green"><?php echo $loop->created; ?></span> 
                            </td>
                            <td id="no:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->no; ?></td>
                            <td id="client:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->client; ?></td>
                            <td id="contact:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->contact; ?></td>

                            <td id="name:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->name; ?></td>
                            <td id="case:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->case; ?></td>
                            <td id="note:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->note; ?></span> </td>
                            <td id="progress:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="<?php echo $color; ?>"><?php echo $loop->progress; ?></span> </td>
                            <td id="due:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="<?php echo $color; ?>"><?php echo $loop->due; ?></span> </td>
                            <td id="lawyer:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="<?php echo $color; ?>"><?php echo $loop->lawyer; ?></span> </td>
                           <td id="contact_person:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="<?php echo $color; ?>"><?php echo $loop->contact_person; ?></span> </td>
                           <td id="contact_number:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="<?php echo $color; ?>"><?php echo $loop->contact_number; ?></span> </td>
                          
                            
                            
                            <td class="edit_td">
                                <a class="btn btn-primary btn-xs" href="<?php echo base_url() . "index.php/file/profile/" .$loop->name; ?>"><li class="fa fa-folder">View</li></a>

                            </td>   

                        </tr>
                        <?php
                    }
                }
                ?>

            </tbody>
        </table>



    </div>
</div>



<?php require_once(APPPATH . 'views/footer-page.php'); ?>



<script type="text/javascript">
    function ExportToExcel(datatables) {
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
                $.post('<?php echo base_url() . "index.php/file/updater/"; ?>', field_id + "=" + value, function (data) {
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
