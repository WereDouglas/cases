
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<?php echo $this->session->flashdata('msg'); ?>

<div class="col-md-12 x_panel">

    <h2>Transactions</h2>

    <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/transaction/generate_post'  method="post">

        <div class="box-body">
            <div class="col-md-2">
                <label>Start</label>
                <input class="easyui-datebox col-md-6" name="starts" id="starts" data-options="formatter:myformatter,parser:myparser" ></input>
            </div>
            <div class="col-md-2">
                <label>End</label>
                <input class="easyui-datebox col-md-6" name="ends" id="ends" data-options="formatter:myformatter,parser:myparser" ></input>
            </div>
            <div class="col-md-6">
                <button type="submit"  class="btn  btn-small btn-flat">Generate</button>

                <button type="reset"  class="btn btn-small btn-flat">Reset</button>
                <input type="button" name="exportExcel" class="btn  btn-small btn-flat" id="exportExcel" onclick="ExportToExcel('datatables')" value="Export">

            </div>           
            <span id="loading" class="col-lg-12"  name ="loading"><img src="<?= base_url(); ?>images/loading.gif" alt="loading.........." /></span><br>

        </div><!-- /.box-body -->
    </form>
    <span class="info-box status col-lg-12" id="status"></span>
    <div class="x_content scroll">

        <table id="datatables" class="table table-striped table-bordered scroll ">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>CLIENT</th>                   
                    <th>CATEGORY</th>
                    <th>TYPE</th>
                    <th>DETAILS</th>
                    <th>TOTAL</th>                   
                    <th>CREATED:</th>                  
                    <th>METHOD</th>
                    <th>STATUS</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($payments) && count($payments)) {
                    foreach ($payments as $loop) {
                        ?>  
                        <tr class="odd">
                            <td id="created:<?php echo $loop->transID; ?>" contenteditable="true">
                                <span class="green"><?php echo $loop->created; ?></span> 
                            </td>
                            <td id="client:<?php echo $loop->transID; ?>" contenteditable="true"><span class="green"><?php echo $loop->client; ?></span></td>
                            <td id="category:<?php echo $loop->transID; ?>" contenteditable="true"><span class="red"><?php echo $loop->category; ?></span></td>
                            <td id="type:<?php echo $loop->transID; ?>" contenteditable="true"><span class="red"><?php echo $loop->type; ?></span></td>

                            <td id="details:<?php echo $loop->transID; ?>" contenteditable="true"><?php echo $loop->details; ?></td>
                            <td id="total:<?php echo $loop->transID; ?>" contenteditable="true"><span class="green"><?php echo $loop->total; ?></span> </td>
                            <td id="created:<?php echo $loop->transID; ?>" contenteditable="true"><span class="green"><?php echo $loop->created; ?></span> </td>
                            <td id="method:<?php echo $loop->transID; ?>" contenteditable="true"><span class="green"><?php echo $loop->method; ?></span> </td>
                            <td id="status:<?php echo $loop->transID; ?>" contenteditable="true"><span class="green"><?php echo $loop->status; ?></span> </td>


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

<script>
    $(document).ready(function () {
        $(function () {
            //acknowledgement message
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function () {
                var field_id = $(this).attr("id");
                var value = $(this).text();
                $.post('<?php echo base_url() . "index.php/transaction/updater/"; ?>', field_id + "=" + value, function (data) {
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
