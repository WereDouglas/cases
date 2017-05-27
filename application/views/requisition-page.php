
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/pure-min.css">
<style>
    horizontal .control-label {
        padding-top: 7px;
        margin-bottom: 0;
        text-align: left;
    }
    label {
        padding-top: 8px;
        text-align: left;
    }
    .form-horizontal .control-label {
        padding-top: 8px;
        text-align: left;
    }
    @media print {
        body * {
            visibility: hidden;
        }
        #printableArea, #printableArea * {
            visibility: visible;
        }
        #printableArea{
            position: absolute;
            left: 0;
            top: 0;
        }
    }

</style>
<?php echo $this->session->flashdata('msg'); ?>


<div class=" col-md-12  col-sm-12 x_panel">
    <h2>REQUISITIONS</h2>  
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">ADD</button>
    <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md col-md-12 col-sm-12">
            <div class="modal-content col-md-12 col-sm-12">
                <div class="col-md-12 col-sm-12"> 

                    <h1 class="count orange align-center"><b>REQUISITION</b></h1>                              


                    <form  enctype="multipart/form-data" class="form-horizontal col-md-12 col-sm-12"  action='<?= base_url(); ?>index.php/expense/request'  method="post">

                        <div class="form-group">
                            <label >Date</label>                                                                   
                            <input class="easyui-datebox" name="date" id="date"/>                                    
                        </div>
                        <div class="form-group">  
                            <label>Select client</label>

                            <input class="easyui-combobox form-control" name="client" id="client" style="width:70%;height:26px" data-options="
                                   url:'<?php echo base_url() ?>index.php/task/client',
                                   method:'get',
                                   valueField:'name',
                                   textField:'name',
                                   multiple:false,
                                   panelHeight:'auto'
                                   ">

                        </div>
                        <div class="form-group">     
                            <label>File/Case</label>
                            <input class="easyui-combobox form-control" name="file" id="file" style="width:70%;height:26px" data-options="
                                   url:'<?php echo base_url() ?>index.php/task/files',
                                   method:'get',
                                   valueField:'name',
                                   textField:'name',
                                   multiple:false,
                                   panelHeight:'auto'
                                   ">
                        </div> 
                        <div class="form-group">     
                            <label>Requested by</label>
                            <input class="easyui-combobox form-control" name="laywer" id="lawyer" style="width:70%;height:26px" data-options="
                                   url:'<?php echo base_url() ?>index.php/task/users',
                                   method:'get',
                                   valueField:'name',
                                   textField:'name',
                                   multiple:false,
                                   panelHeight:'auto'
                                   ">
                        </div>

                        <div class="form-group">
                            <label>Reason for request</label>
                            <textarea class="form-control" id="form-field-9" name="reason" data-maxlength="10"></textarea>

                        </div>

                        <div class="form-group">
                            <label >Amount requested</label> 
                            <input id="amount" class="form-control"  name="amount" placeholder="" required="required" type="text">
                        </div>                      
                        <div class="form-group">                           
                            <label >Method of payment</label>                                
                            <select class="form-control" id="method" name="method" >                                                         
                                <option value="Cash" >Cash</option>
                                <option value="Cheque" >Cheque</option>
                            </select> 
                        </div> 

                        <div class="form-group">
                            <label >Outcome</label>
                            <input id="outcome" class="form-control"  name="outcome" placeholder=""  type="text">

                        </div> 

                        <div class="form-group">     
                            <label >To be authorised by</label>
                            <input class="easyui-combobox form-control" name="signed" id="signed" style="width:70%;height:26px" data-options="
                                   url:'<?php echo base_url() ?>index.php/task/users',
                                   method:'get',
                                   valueField:'name',
                                   textField:'name',
                                   multiple:false,
                                   panelHeight:'auto'
                                   ">
                        </div>
                        <div class="form-group">
                            <label >Deadline</label>
                            <input class="easyui-datebox" name="deadline" id="deadline"/> 
                        </div>
                        <button  class="btn btn-primary align-left"  data-dismiss="modal">Cancel</button>
                        <button id="send" type="submit" class="btn btn-success align-right">Submit</button>

                    </form>

                </div> 
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12"> <span class="info-box status col-md-12 col-sm-12 col-xs-12" id="status"></span></div>

    <div class="x_content scroll">

        <table id="datatable" class="table table-striped table-bordered scroll ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>DATE</th>
                    <th>DETAILS</th>

                    <th>AMOUNT</th>
                    <th>SIGNED</th>
                    <th>REASON</th> 
                    <th>RECEIVED BY</th>
                    <th>OUTCOME</th> 
                    <th>CLIENT</th>
                    <th>FILE</th>
                    <th>REQUESTED BY</th>
                    <th>BALANCE</th>
                    <th>APPROVED</th>
                    <th>TO BE APPROVED BY</th>
                    <th>DEADLINE</th>                   
                    <th>APPROVE</th>
                    <th>PAY</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody>
                <?php
                //var_dump($expenses);
                $count = 1;
                foreach ($expenses as $loop) {
                    $approved = $loop->approved;
                    ?>  
                    <tr class="odd">
                        <td><?php echo $count++; ?></td>
                        <td id="date:<?php echo $loop->date; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->date; ?></span>                      
                        </td>

                        <td id="details:<?php echo $loop->expenseID; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->details; ?></span>                      
                        </td>
                        <td >
                            <span class="blue"><?php echo number_format($loop->amount, 2); ?></span>                      
                        </td>
                        <td id="signed:<?php echo $loop->expenseID; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->signed; ?></span>                      
                        </td>
                        <td id="reason:<?php echo $loop->expenseID; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->reason; ?></span>                      
                        </td>
                        <td id="laywer:<?php echo $loop->expenseID; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->lawyer; ?></span>                      
                        </td>
                        <td id="outcome:<?php echo $loop->expenseID; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->outcome; ?></span>                      
                        </td>
                        <td><?php echo $loop->client; ?></td>
                        <td><?php echo $loop->file; ?></td>
                        <td id="laywer:<?php echo $loop->expenseID; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->lawyer; ?></span>                      
                        </td>                        
                        <td><?php echo number_format($loop->balance, 2); ?></td>
                        <td class="center">
                            <?php if ($approved == "false") { ?>
                                <strong> <p  class="text-danger"><?= $approved ?></p></strong>
                            <?php } else { ?>
                                <strong> <p  class=" text-green"><?= $approved ?></p></strong>
                            <?php } ?>

                        </td> 
                        <td id="signed:<?php echo $loop->expenseID; ?>" contenteditable="true"><?php echo $loop->signed; ?></td>

                        <td id="deadline:<?php echo $loop->expenseID; ?>" contenteditable="true"><?php echo $loop->deadline; ?></td>


                        <td class="td-actions">

                            <a href="<?php echo base_url() . "index.php/expense/approve/" . $loop->expenseID . "/" . $loop->approved; ?>" class="tooltip-info qualification" data-rel="tooltip" title="verify">
                                <img  height="30px" width="30px" class="nav-user-photo" src="<?= base_url(); ?>images/Bill-32.png" alt="account" />
                            </a>
                        </td>
                        <td class="td-actions">
                            <?php if ($approved == "true") { ?>
                                <a href="<?php echo base_url() . "index.php/expense/pay/" . $loop->expenseID . "/" . $loop->paid; ?>" class="tooltip-info qualification" data-rel="tooltip" title="verify">
                                    <img  height="30px" width="30px" class="nav-user-photo" src="<?= base_url(); ?>images/cash.png" alt="account" />
                                </a>
                            <?php } ?>
                        </td>
                        <td class="center">
                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/expense/delete/" . $loop->expenseID; ?>"><li class="fa fa-trash">Delete</li></a>
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
                $.post('<?php echo base_url() . "index.php/expense/updater/"; ?>', field_id + "=" + value, function (data) {
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
        var total = 0;
        var vat = 0;
        var sum = 0;
        var fee = 0;
        var disbursement = 0;
        var balance = 0;
        var payment = 0;


        $('#clientname').click(function () {

            $("#clientname").val($("input[name=client]").val());
            $("#dater").val($("input[name=date]").val());
        });
        $('#total').click(function () {
            fee = 0;
            disbursement = 0;

            if ($("#fee").val() !== "") {

                fee = parseFloat($("#fee").val());
            }
            if ($("#disbursement").val() !== "") {

                disbursement = parseFloat($("#disbursement").val());
            }

            total = parseFloat(fee + disbursement);
            $("#total").val(total);

        });
        $('#sum').click(function () {
            sum = 0;
            if ($("vat").val() === "") {
                alert("Please insert percentage V.A.T(%)");
                return;
            }
            if ($("#disbursement").val() === "") {
                disbursement = 0;
                total = parseFloat(fee);
            }
            sum = parseFloat(vat) + parseFloat(total);
            $("#sum").val(sum);


        });
        $('#balance').click(function () {
            payment = parseInt($("#payment").val());
            balance = parseFloat(sum) - parseFloat(payment).toFixed(1);
            $("#balance").val(balance);
            $("#amount").val(payment);
            $("#words").val(toWords(payment));
        });

        $('#vatamount').click(function () {
            vat = 0;
            if ($("vat").val() === "") {
                alert("Please insert percentage V.A.T(%)");
                return;
            }
            if ($("#fee").val() === "") {

                fee = 0;
                vat = 0;
            } else {
                vat = parseFloat((parseFloat($("#vat").val()) / 100) * fee).toFixed(1);
                $("#vatamount").val(vat);

            }

        });


    });
    $(document).on('click', '.printdiv-btn', function (e) {
        e.preventDefault();

        var $this = $(this);
        //  var originalContent = $('body').html();
        var printArea = $this.parents('.printableArea').html();

        $('body').html(printArea);
        window.print();
        $('body').html(printArea);
    });


</script>
<script>
    var th = ['', 'thousand', 'million', 'billion', 'trillion'];
    var dg = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
    var tn = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
    var tw = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

    function toWords(s) {
        s = s.toString();
        s = s.replace(/[\, ]/g, '');
        if (s != parseFloat(s))
            return 'not a number';
        var x = s.indexOf('.');
        if (x == -1)
            x = s.length;
        if (x > 15)
            return 'too big';
        var n = s.split('');
        var str = '';
        var sk = 0;
        for (var i = 0; i < x; i++) {
            if ((x - i) % 3 == 2) {
                if (n[i] == '1') {
                    str += tn[Number(n[i + 1])] + ' ';
                    i++;
                    sk = 1;
                } else if (n[i] != 0) {
                    str += tw[n[i] - 2] + ' ';
                    sk = 1;
                }
            } else if (n[i] != 0) { // 0235
                str += dg[n[i]] + ' ';
                if ((x - i) % 3 == 0)
                    str += 'hundred ';
                sk = 1;
            }
            if ((x - i) % 3 == 1) {
                if (sk)
                    str += th[(x - i - 1) / 3] + ' ';
                sk = 0;
            }
        }

        if (x != s.length) {
            var y = s.length;
            str += 'point ';
            for (var i = x + 1; i < y; i++)
                str += dg[n[i]] + ' ';
        }
        return str.replace(/\s+/g, ' ');
    }
</script>
<script>
    $('.qualification').click(function (e) {
        updateURL = $(this).attr("href");
        e.preventDefault();//in this way you have no redirect
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: updateURL,
            async: false,
            success: function (data) {
                alert('Information updated!')
                location.reload();
            }

        });
        alert('Information updated!')
        location.reload();
        return false;
    });

</script>