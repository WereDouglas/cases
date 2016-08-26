
<?php require_once(APPPATH . 'views/header-page.php'); ?>   
<style>
    table.zebra-style {
        font-family:"Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
        text-align:left;
        border:1px solid #ccc;
        margin-bottom:25px;
        width:100%
    }
    table.zebra-style th {
        color: #444;
        font-size: 13px;
        font-weight: normal;
        padding: 10px 8px;
    }
    table.zebra-style td {
        color: #777;
        padding: 8px;
        font-size:13px;
    }
    table.zebra-style tr.odd {
        background:#f2f2f2;
    }
    body {
        background:#fafafa;
    }
    .container {
        width: 100%;
        border: 1px solid #C4CDE0;
        border-radius: 2px;
        margin: 0 auto;
        height: 1300px;
        background:#fff;
        padding-left:10px;
    }
    #status { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:90%; }
</style>

<?php echo $this->session->flashdata('msg'); ?>
   <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/task/generate_post'  method="post">

            <div class="box-body">
                <div class="col-md-2">
                    <label>Start date</label>
                    <input class="easyui-datebox" name="starts" id="starts" data-options="formatter:myformatter,parser:myparser" ></input>
                </div>
                <div class="col-md-2">
                    <label>End date</label>
                    <input class="easyui-datebox" name="ends" id="ends" data-options="formatter:myformatter,parser:myparser" ></input>
                </div>


                <div class="col-md-6">
                    <button type="submit"  class="btn  btn-small btn-flat">View</button>

                    <button type="reset"  class="btn btn-small btn-flat">Reset</button>
                </div>
                <span class="info-box status" id="status"></span>
           
            </div><!-- /.box-body -->
        </form>

<table class="table zebra-style span12">
    <thead>
        <tr>

            <th>DATE</th>
            <th>START</th>
            <th>END</th>
            <th>DETAILS</th>
            <th>PRIORITY</th>
            <th></th>

        </tr>
    </thead>
    <tbody>


        <?php
        if (is_array($tasks) && count($tasks)) {
            foreach ($tasks as $loop) {
                ?>  

                <tr class="odd">

                    <td id="date:<?php echo $loop->taskID; ?>" contenteditable="true">
                       <span class="green"><?php echo $loop->date; ?></span> 
                    </td>
                    <td id="startTime:<?php echo $loop->taskID; ?>" contenteditable="true"><span class="green"><?php echo $loop->startTime; ?></span></td>
                    <td id="endTime:<?php echo $loop->taskID; ?>" contenteditable="true"><span class="red"><?php echo $loop->endTime; ?></span></td>
                    <td id="details:<?php echo $loop->taskID; ?>" contenteditable="true"><?php echo $loop->details; ?></td>
                    <td id="priority:<?php echo $loop->taskID; ?>" contenteditable="true">
                        <?php echo $loop->priority; ?></span>
                    </td>

                    <td>
                   <a class="btn-danger btn-small icon-remove" href="<?php echo base_url() . "index.php/task/delete/" .$loop->taskID; ?>">delete</a>
                      

                    </td>
                </tr>

                <?php
            }
        }
        ?>

    </tbody>
</table>



<?php require_once(APPPATH . 'views/footer-page.php'); ?>


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
<script>
    $(function () {
        //acknowledgement message
        var message_status = $("#status");
        $("td[contenteditable=true]").blur(function () {
            var field_id = $(this).attr("id");
            var value = $(this).text();
            $.post('<?php echo base_url() . "index.php/task/updater/"; ?>', field_id + "=" + value, function (data) {
                if (data != '')
                {
                    message_status.show();
                    message_status.text(data);
                    //hide the message
                    setTimeout(function () {
                        message_status.hide()
                    }, 1000);
                }
            });
        });



        jQuery('.s_download').click(function () {
            var semail = jQuery("#itzurkarthi_email").val();
            if (semail == '')
            {
                alert('Enter Email');
                return false;
            }
            var str = "sub_email=" + semail
            jQuery.ajax({
                type: "POST",
                url: "download.php",
                data: str,
                cache: false,
                success: function (htmld) {
                    jQuery('#down_update').html(htmld);
                }
            });
        });

    });
</script>
