
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

<table class="table zebra-style span12">
    <thead>
        <tr>

            <th>DATE</th>
            <th>BODY</th>
            <th>SUBJECT</th>
            <th>TO</th>
            <th>FROM</th>
            <th>SENT</th>
            <th>TYPE</th>
            <th>CONTACT</th>
            <th>EMAIL</th>
            <th></th>

        </tr>
    </thead>
    <tbody>


        <?php
        if (is_array($messagess) && count($messages)) {
            foreach ($messages as $loop) {
                ?>  

                <tr class="odd">

                    <td id="date:<?php echo $loop->messageID; ?>" contenteditable="true">
                        <span class="green"><?php echo $loop->date; ?></span> 
                    </td>
                    <td id="body:<?php echo $loop->messsageID; ?>" contenteditable="true"><span class="green"><?php echo $loop->body; ?></span></td>
                    <td id="subject:<?php echo $loop->messageID; ?>" contenteditable="true"><span class="red"><?php echo $loop->subject; ?></span></td>
                    <td id="to:<?php echo $loop->messageID; ?>" contenteditable="true"><?php echo $loop->to; ?></td>
                    <td id="from:<?php echo $loop->messageID; ?>" contenteditable="true"><?php echo $loop->from; ?></td>
                    <td id="sent:<?php echo $loop->messageID; ?>" contenteditable="true"><?php echo $loop->sent; ?></td>
                    <td id="type:<?php echo $loop->messageID; ?>" contenteditable="true"><?php echo $loop->type; ?></td>
                    <td id="contact:<?php echo $loop->messageID; ?>" contenteditable="true"><?php echo $loop->contact; ?></td>
                    <td id="email:<?php echo $loop->messageID; ?>" contenteditable="true"><?php echo $loop->email; ?></td>
                   

                    <td>
        <!--                            <a href="#"  value="<?php echo $loop->id; ?>"  id="myLink" onclick="NavigateToSite(this)" class="tooltip-error text-danger" data-rel="tooltip" title="reset">
                            <span class="red">
                                <i class="icon-lock bigger-120 text-danger"></i>
                                Reset
                            </span>
                        </a>-->

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
            $.post('<?php echo base_url() . "index.php/message/updater/"; ?>', field_id + "=" + value, function (data) {
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
