
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<?php echo $this->session->flashdata('msg'); ?>

<div class="col-md-12 x_panel">

    <h2>Colleagues and charges</h2>
    <input type="button" name="exportExcel" class="btn  btn-small btn-flat" id="exportExcel" onclick="ExportToExcel('datatables')" value="Export">


    <div class="col-md-12 col-sm-12 col-xs-12"> <span class="info-box status col-md-12 col-sm-12 col-xs-12" id="status"></span></div>

    <div class="x_content scroll">

        <table id="datatables" class="table table-striped table-bordered scroll ">
            <thead>
                <tr>
                    <th></th>
                    <th>NAME</th>
                    <th>EMAIL</th> 
                    <th>DESIGNATION</th>                   
                    <th>STATUS</th>
                    <th>CONTACT</th>
                    <th>CHARGE/HR</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($users) && count($users)) {
                    foreach ($users as $loop) {
                        ?>  
                        <tr class="odd">
                            <td> 
                                <?php
                                if ($loop->image != "") {
                                    ?>
                                    <img  height="50px" width="50px"  src="<?= base_url(); ?>uploads/<?php echo $loop->userID . ".jpg"; ?>" alt="logo" />
                                    <?php
                                } else {
                                    ?>
                                    <img  height="50px" width="50px"  src="<?= base_url(); ?>images/user_place.png" alt="logo" />
                                    <?php
                                }
                                ?>
                            </td>

                            <td id="name:<?php echo $loop->userID; ?>" contenteditable="true">
                                <span class="green"><?php echo $loop->name; ?></span> 
                            </td>
                            <td id="email:<?php echo $loop->userID; ?>" contenteditable="true"><span class="green"><?php echo $loop->email; ?></span></td>
                            <td id="designation:<?php echo $loop->userID; ?>" contenteditable="true"><span class="red"><?php echo $loop->designation; ?></span></td>
                            <td id="status:<?php echo $loop->userID; ?>" contenteditable="true"><span class="red"><?php echo $loop->status; ?></span></td>

                            <td id="contact:<?php echo $loop->userID; ?>" contenteditable="true"><?php echo $loop->contact; ?></td>
                            <td id="charge:<?php echo $loop->userID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->charge; ?></span> </td>
                            <td class="edit_td">
                                <a class="btn btn-primary btn-xs" href="<?php echo base_url() . "index.php/user/profile/" . $name; ?>"><li class="fa fa-folder">View</li></a>

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

<script>
    $(document).ready(function () {
        $(function () {
            //acknowledgement message
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function () {
                var field_id = $(this).attr("id");
                var value = $(this).text();
                $.post('<?php echo base_url() . "index.php/user/updater/"; ?>', field_id + "=" + value, function (data) {
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
