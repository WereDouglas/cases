
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<?php echo $this->session->flashdata('msg'); ?>

<div class="col-md-12 x_panel">

    <h2>Transaction</h2>

    <div class="x_content scroll">

        <table id="datatable" class="table table-striped table-bordered scroll ">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>CLIENT</th>                   
                    <th>CATEGORY</th>
                    <th>TYPE</th>
                    <th>DETAILS</th>
                    <th>TOTAL</th>                   
                    <th>CREATED:</th>                  
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($payments) && count($payments)) {
                    foreach ($payments as $loop) {
                        $client = $loop->client;
                        $created = $loop->created;
                        $amount = $loop->amount;
                        $balance = $loop->balance;
                        $total = $loop->total;
                        $type = $loop->type;
                        $method = $loop->method;
                        $details = $loop->details;
                        $status = $loop->status;
                        $category = $loop->category;
                        $id = $loop->transID;
                        $no = $loop->no;
                        ?>  
                        <tr id="<?php echo $id; ?>" class="edit_tr">

                            <td class="edit_td">
                                <span id="created_<?php echo $id; ?>" class="text"><?php echo $created; ?></span>
                                <input type="text" value="<?php echo $created; ?>" class="editbox" id="created_input_<?php echo $id; ?>"
                            </td>
                            <td class="edit_td">
                                <span id="client_<?php echo $id; ?>" class="text"><?php echo $client; ?></span>
                                <input type="text" value="<?php echo $client; ?>" class="editbox" id="client_input_<?php echo $id; ?>"
                            </td>                           


                            <td class="edit_td">
                                <span id="category_<?php echo $id; ?>" class="text"><?php echo $category; ?></span>                                                       
                                <select  name="category" class="editbox" id="category_input_<?php echo $id; ?>" >
                                    <option value="<?php echo $category; ?>" /><?php echo $category; ?>
                                    <option value="RECEIPT"/>RECEIPT
                                    <option value="VOUCHER"/>VOUCHER
                                    <option value="FEE NOTE"/>FEE NOTE
                                    <option value="BILL"/>BILL   
                                </select>
                            </td>
                            <td class="edit_td">
                                <span id="type_<?php echo $id; ?>" class="text"><?php echo $type; ?></span>                                                       
                                <select  name="type" class="editbox" id="type_input_<?php echo $id; ?>" >
                                    <option value="<?php echo $type; ?>" /><?php echo $type; ?>
                                    <option value="Debit"/>Debit
                                    <option value="Credit"/>Credit

                                </select>
                            </td>
                            <td class="edit_td">
                                <span id="details_<?php echo $id; ?>" class="text"><?php echo $details; ?></span>
                                <input type="text" value="<?php echo $details; ?>" class="editbox" id="details_input_<?php echo $id; ?>"
                            </td>
                            <td class="edit_td">
                                <span id="total_<?php echo $id; ?>" class="text"><?php echo $total; ?></span>
                                <input type="text" value="<?php echo $total; ?>" class="editbox" id="total_input_<?php echo $id; ?>"
                            </td>

                            <td class="edit_td">
                                <?php echo $created; ?>
                            </td>
                            <td class="center">
                                <a class="btn-danger btn-small icon-remove" href="<?php echo base_url() . "index.php/transaction/delete/" . $id; ?>">delete</a>
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
    $(document).ready(function ()
    {
        $(".editbox").hide();

        $(".edit_tr").click(function ()
        {
            var ID = $(this).attr('id');
            $("#client_" + ID).hide();
            $("#amount_" + ID).hide();
            $("#balance_" + ID).hide();
            $("#method_" + ID).hide();
            $("#status_" + ID).hide();
            $("#created_" + ID).hide();
            $("#no_" + ID).hide();
            $("#category_" + ID).hide();
            $("#total_" + ID).hide();
            $("#status_" + ID).hide();
            $("#type_" + ID).hide();


            $("#no_input_" + ID).show();
            $("#client_input_" + ID).show();
            $("#method_input_" + ID).show();
            $("#status_input_" + ID).show();
            $("#amount_input_" + ID).show();
            $("#created_input_" + ID).show();
            $("#category_input_" + ID).show();
            $("#total_input_" + ID).show();
            $("#status_input_" + ID).show();
            $("#balance_input_" + ID).show();
            $("#type_input_" + ID).show();

        }).change(function ()
        {
            var ID = $(this).attr('id');
            var client = $("#client_input_" + ID).val();
            var details = $("#details_input_" + ID).val();
            var no = $("#no_input_" + ID).val();
            var amount = $("#amount_input_" + ID).val();
            var created = $("#created_input_" + ID).val();
            var category = $("#category_input_" + ID).val();
            var method = $("#method_input_" + ID).val();
            var status = $("#status_input_" + ID).val();
            var total = $("#total_input_" + ID).val();
            var balance = $("#balance_input_" + ID).val();
            var type = $("#type_input_" + ID).val();

            var dataString = 'id=' + ID + '&name=' + client + '&total=' + total + '&type=' + type + '&created=' + created + '&details=' + details + '&no=' + no + '&amount=' + amount + '&category=' + category + '&balance=' + balance + '&status=' + status + '&method=' + method;
            $("#client_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />'); // Loading image
            $("#details_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />'); // Loading image
            $("#amount_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />');
            $("#no_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />');
            $("#created_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif"  />');
            if (category.length > 0)
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/transaction/update/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $("#client_" + ID).html(client);
                        $("#details_" + ID).html(details);
                        $("#no_" + ID).html(no);
                        $("#amount_" + ID).html(amount);
                        $("#created_" + ID).html(created);
                        $("#category_" + ID).html(category);
                        $("#method_" + ID).html(method);
                        $("#status_" + ID).html(status);
                        $("#balance_" + ID).html(balance);
                        $("#total_" + ID).html(total);
                        $("#type_" + ID).html(type);


                    }
                });
            } else
            {
                alert('Enter something.');
            }

        });

        // Edit input box click action
        $(".editbox").mouseup(function ()
        {
            return false
        });

        // Outside click action
        $(document).mouseup(function ()
        {
            $(".editbox").hide();
            $(".text").show();
        });

        $('#loading').hide();
        $("#amount2").blur(function () {

            var user = $(this).val();
            if (user != null) {

                $('#loading').show();
                $.post("<?php echo base_url() ?>index.php/organisation/exists", {
                    user: $(this).val()
                }, function (response) {
                    // alert(response);
                    $('#loading').hide();
                    setTimeout(finishAjax('loading', escape(response)), 400);
                });
            }
            function finishAjax(id, response) {
                $('#' + id).html(unescape(response));
                $('#' + id).fadeIn();
            }


        });

    });
</script>
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