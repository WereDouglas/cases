
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
    <h2>INVOICES</h2>  
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">ADD</button>
    <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md col-md-12 col-sm-12">
            <div class="modal-content col-md-12 col-sm-12" style=" height: 1200px;">             



                <div class="col-md-12 col-sm-12"> 
                    <form  enctype="multipart/form-data" class="form-horizontal col-md-12 col-sm-12"  action='<?= base_url(); ?>index.php/payment/invoice'  method="post">
                        <br>
                        <div class="col-md-6 col-sm-6 item form-group">
                            <label class="control-label col-md-3 col-sm-3">Select client</label>
                            <div class="col-md-8 col-sm-8">
                                <input class="easyui-combobox form-control" name="client" id="client" style="width:70%;height:26px" data-options="
                                       url:'<?php echo base_url() ?>index.php/task/client',
                                       method:'get',
                                       valueField:'name',
                                       textField:'name',
                                       multiple:false,
                                       panelHeight:'auto'
                                       ">
                            </div>
                        </div>
                        <div class=" item form-group col-md-6 col-sm-6">
                            <label class="control-label col-md-3 col-sm-3 ">File/Case</label>
                            <div class="col-md-8 col-sm-8 ">

                                <input class="easyui-combobox form-control" name="file" id="file" style="width:70%;height:26px" data-options="
                                       url:'<?php echo base_url() ?>index.php/task/files',
                                       method:'get',
                                       valueField:'name',
                                       textField:'name',
                                       multiple:false,
                                       panelHeight:'auto'
                                       ">
                            </div>

                        </div> 
                        <div class=" item form-group col-md-6 col-sm-6">
                            <label class="control-label col-md-3 col-sm-3 ">C/O</label>
                            <div class="col-md-8 col-sm-8 ">

                                <input class="easyui-combobox form-control" name="laywer" id="lawyer" style="width:70%;height:26px" data-options="
                                       url:'<?php echo base_url() ?>index.php/task/users',
                                       method:'get',
                                       valueField:'name',
                                       textField:'name',
                                       multiple:false,
                                       panelHeight:'auto'
                                       ">
                            </div>

                        </div>
                        <div class=" item form-group col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3">Date</label>
                                <div class="col-md-8 col-sm-8 ">                                   
                                    <input class="easyui-datebox" name="date" id="date"/>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 border-green" class="printableArea" id="printableArea">
                            <div class=" col-md-12 col-sm-12">                       
                                <?php
                                echo $this->session->userdata('top');
                                ?>

                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-4 col-sm-4 ">
                                    <img  height="50px" width="100px" class="" src="<?= base_url(); ?>uploads/<?php echo $this->session->userdata('orgimage'); ?>" alt="logo" />
                                    <br>

                                    <h1 class="count green"><b>RECEIPT</b></h1>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <?php
                                    echo '<br><br>';
                                    echo "TIN " . $this->session->userdata('tin') . '<br>';
                                    echo "Receipt Number: " . $no = "" . date('m') . (int) date('d') . (int) date('H') . (int) date('i') . (int) date('s') . '<br>';
                                    // echo "Date: " . date('Y-m-d');
                                    ?>
                                    Date: <input id="dater" style="border:0;outline:0; height:32px;  border-bottom: 0px solid grey; width: 100%;"   name="dater" type="text">

                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <b> <h2><?php echo $this->session->userdata('name'); ?></h2></b>
                                    <p style="word-wrap:break-word; overflow-wrap: break-word;word-break: break-word;"><?php echo $this->session->userdata('address'); ?></p>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">                       
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3" for="name">Client</label> 
                                    <div class="col-md-9 col-sm-9">
                                        <input id="clientname" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey; width: 100%;"   name="clientname" placeholder="Client" required="required" type="text">
                                    </div> 
                                </div> 

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3">For services rendered</label>
                                    <div class="col-md-9 col-sm-9">
                                        <textarea class="col-md-9 col-sm-9" id="form-field-9" name="note" data-maxlength="10"></textarea>
                                    </div>
                                </div>
                            </div>                    
                            <div class="col-md-12 col-sm-12"> 
                                <h4>Payment Details</h4>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3" for="name">Fee/Debit Note No.</label> 
                                    <div class="col-md-3 col-sm-3">
                                        <input id="no" style="border:0;outline:0; height:32px;width: 100%;  border-bottom: 1px solid grey;"   name="no" value="<?php
                                        echo $this->session->userdata('code') . "/" . date('m') . (int) date('d') . (int) date('H') . (int) date('i') . (int) date('s');
                                        ?>"   type="text">
                                    </div> 

                                </div> 
                                <table class="pure-table" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>DETAILS</th>
                                            <th>AMOUNT</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>

                                            <td>Professional fees(<sub>vat applicable</sub>)</td>
                                            <td><input id="fee" style="border:none;background-color: transparent;"    name="fee" value=""   type="text">


                                        </tr>

                                        <tr>

                                            <td>Disbursement</td>                                            
                                            <td> <input id="disbursement" style="border:none;background-color: transparent;"    name="disbursement" value=""   type="text">
                                            </td>
                                        </tr>                                  
                                        <tr class="pure-table-odd" >                                      

                                            <td><strong>TOTAL</strong></td>
                                            <td><input id="total" style="border:none;background-color: transparent;"   name="total" value="" type="text">
                                            </td>
                                        </tr>    
                                        <tr >                                      

                                            <td colspan="1"></td>  
                                            <td colspan="1"></td>

                                        </tr> 
                                        <tr class="pure-table-odd">                                      

                                            <td>V.A.T(%)</td>                               
                                            <td> <input id="vat" style="border:none;background-color: transparent;"  name="vat" value=""   type="text"> </td>


                                        </tr>

                                        <tr class="pure-table-odd">                                      

                                            <td>V.A.T</td>                               
                                            <td><input id="vatamount" style="border:none;background-color: transparent;"   name="vatamount" value=""   type="text">
                                            </td>


                                        </tr>
                                        <tr class="pure-table-odd">                                      

                                            <td><span class=" blue"><strong>SUM</strong></span></td>                               
                                            <td><input id="sum" style="border:none;background-color: transparent;"   name="sum" value=""   type="text">
                                            </td>

                                        </tr>
                                        <tr class="pure-table-odd">

                                            <td>Received on behalf of client</td>

                                            <td><input id="payment" style="border:none;background-color: transparent;" name="payment" value=""   type="text">
                                            </td>

                                        </tr>

                                        <tr class="pure-table-odd">

                                            <td>Balance</td>
                                            <td><input id="balance" style="border:none;background-color: transparent;" name="balance" value=""   type="text">
                                            </td>

                                        </tr> 
                                        <tr class="pure-table-odd">

                                            <td>Method</td>
                                            <td>
                                                <div class="control-group">                                                 
                                                    <select class="form-control" id="method" name="method" >                                                         
                                                        <option value="Cash" >Cash</option>
                                                        <option value="Cheque" >Cheque</option>

                                                    </select>
                                                </div>
                                            </td>

                                        </tr> 

                                    </tbody>
                                </table>

                            </div>                                              

                            <div class="item form-group col-md-12 col-sm-12">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3" for="name">Amount</label> 
                                    <div class="col-md-9 col-sm-9 ">
                                        <input id="amount" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;"  name="amount" placeholder="" required="required" type="text">
                                    </div> 
                                </div> 
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3" for="name">The sum of(in words)</label> 
                                    <div class="col-md-9 col-sm-9 ">
                                        <input id="words" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;"   name="words" placeholder=""  type="text">
                                    </div> 
                                </div> 
                                <label class="control-label col-md-12 col-sm-12" for="name">Received with thanks</label> 
                                <div class="col-md-12 col-sm-12">
                                    <input id="reciever" style="border:0;outline:0; height:32px;width: 100%; border-bottom: 1px solid grey;"  name="reciever" value="<?php echo $this->session->userdata('username'); ?>"   type="text">
                                </div> 
                            </div>
                        </div> 
                        <div class="col-md-12 col-sm-12">
                            <input type="button" class="btn btn-default align-right printdiv-btn btn-primary icon-ok" value="print" />
                            <button id="send" type="submit" class="btn btn-success align-right">Submit</button>
                            <button  class="btn btn-primary align-right"  data-dismiss="modal">Cancel</button>
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
                    <th>DATE</th>
                    <th>INVOICE</th>
                   
                    <th>CLIENT</th>
                    <th>FILE</th>
                    <th>DETAILS</th> 
                    <th>AMOUNT PAID</th>
                    <th>V.A.T</th> 
                    <th>FEES</th>
                    <th>DISBURSEMENT</th>
                    <th>TOTAL AMOUNT</th>

                    <th>BALANCE</th>
                    <th>RECEIVED BY</th>
                    <th>APPROVED</th>
                    <th>ACTION</th>
                    <th>VIEW</th>
                </tr>
            </thead>

            <tbody>
                <?php
              // var_dump($pay);
                foreach ($pay as $loop) {
                    ?>  
                    <tr class="odd">
                        <td id="invoice:<?php echo $loop->date; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->date; ?></span>                      
                        </td>

                        <td id="invoice:<?php echo $loop->invoice; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->invoice; ?></span>                      
                        </td>
                         
                        <td><?php echo $loop->client; ?></td>
                        <td><?php echo $loop->file; ?></td>
                        <td id="details:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->details; ?></td>
                        <td><?php echo number_format(($loop->disbursement + $loop->fees + $loop->vat) - $loop->balance,2); ?></td>
                        <td><?php echo number_format(($loop->vat),2); ?></td>
                        <td><?php echo number_format($loop->fees,2); ?></td>
                        <td><?php echo number_format($loop->disbursement,2); ?></td>
                        <td><?php echo number_format(($loop->disbursement + $loop->fees + $loop->vat),2); ?></td>
                        <td><?php echo number_format($loop->balance,2); ?></td>
                        <td id="received:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->received; ?></td>
                        <td id="approved:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->approved; ?></td>

                        <td class="center">
                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/document/delete/" . $loop->documentID; ?>"><li class="fa fa-trash">Delete</li></a>
                        </td>
                        <td class="center">
                            <a class="btn btn-successr btn-xs" href="<?php echo base_url() . "documents/" . $loop->fileUrl; ?>"><li class="fa fa-download">Download</li></a>
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