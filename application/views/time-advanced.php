
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<?php echo $this->session->flashdata('msg'); ?>

<div class="col-md-12 x_panel">

    <h2>MANAGE TIME SHEETS</h2>

    <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/time/generate_post'  method="post">

        <div class="box-body">
            <div class="col-md-2">                
                <input class="form-control col-md-7 col-xs-12" name="user" id="user" placeholder="User name" ></input>
            </div>  
            <div class="col-md-2">                
                <input class="form-control col-md-7 col-xs-12" name="file" id="file" placeholder="File name" ></input>
            </div>
            <div class="col-md-2">                
                <input class="easyui-datebox col-md-6" name="date" id="date" data-options="formatter:myformatter,parser:myparser" ></input>
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
                    <th>USER</th>
                    <th>NAME</th> 
                    <th>START</th>                   
                    <th>END</th>

                    <th>FILE</th>
                    <th>STATUS</th> 
                    <th>HOURS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sum= 0;
                if (is_array($events) && count($events)) {
                    foreach ($events as $loop) {
                       
                        $sum = $sum + $loop->hours;
                        
                        ?>  
                        <tr class="odd">

                            <td id="date:<?php echo $loop->id; ?>" contenteditable="true">
                                <span class="green"><?php echo $loop->date; ?></span> 
                            </td>
                            <td id="user:<?php echo $loop->id; ?>" contenteditable="true"><span class="blue"><?php echo $loop->user; ?></span> </td>

                            <td id="name:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->name; ?></td>
                            <td id="start:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->start; ?></td>
                            <td id="end:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->end; ?></td>
                            <td id="file:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->file; ?> </td>
                            <td id="status:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->status; ?> </td>
                            <td id="hours:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->hours; ?></td>


                        </tr>
                        <?php
                    }
                }
                ?>
                <tr class="even">

                    <td></td>
                    <td></td>
                    <td></td> 
                    <td></td> 
                    <td></td>
                    <td></td>  
                    <td></td>    
                    <td></td>

                </tr>
                 <tr class="even">

                    <td></td>
                    <td></td>
                    <td></td> 
                    <td>TOTAL TASKS</td> 
                    <td><?php echo count($events);?></td>
                    <td></td>  
                    <td>TOTAL HRS</td>    
                    <td><?php echo $sum ;?></td>

                </tr>

            </tbody>
        </table>



    </div>
</div>



<?php require_once(APPPATH . 'views/footer-page.php'); ?>

<script>
    $(document).ready(function () {
        $(function () {
            //acknowledgement message
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function () {
                var field_id = $(this).attr("id");
                var value = $(this).text();
                $.post('<?php echo base_url() . "index.php/time/updater/"; ?>', field_id + "=" + value, function (data) {
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

<script>
    $(document).ready(function () {
        $('#loading').hide();
//Script for getting the dynamic values from database using jQuery and AJAX
        $("#generate").on("click", function (e) {
            var gen = $("[name='gen']:checked").val();

            var starts = $('input[name$="starts"]').val();
            var ends = $('input[name$="ends"]').val();

            $.post("<?php echo base_url() ?>index.php/transaction/generate", {gen: gen, start: starts, end: ends}
            , function (response) {

                $('#loading').hide();
                setTimeout(finishAjax('loading', escape(response)), 200);

            }); //end change
        })
        function finishAjax(id, response) {
            $('#' + id).html(unescape(response));
            $('#' + id).fadeIn();
        }
    });

</script>


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
