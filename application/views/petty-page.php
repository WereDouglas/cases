
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
    <h2>PETTY EXPENSES</h2>  
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">ADD</button>
    <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md ">
            <div class="modal-content col-md-12 col-sm-12">
                <div class="col-md-12 col-sm-12"> 
                    <div class="col-md-12 col-sm-12">
                        <h1 class="count orange align-center"><b>PETTY</b></h1>                              
                    </div>

                    <form  enctype="multipart/form-data" class="form-horizontal col-md-12 col-sm-12"  action='<?= base_url(); ?>index.php/petty/create'  method="post">
                        <div class="form-group">
                            <label >Date</label>                                                                 
                            <input class="easyui-datebox form-control" name="date" id="date"/>
                        </div>
                        <div class="form-group">
                            <label >Name</label>                               
                            <input id="name" class="form-control"  name="name" placeholder="" required="required" type="text">
                        </div> 
                        <div class="form-group">
                            <label >Quantity</label>                               
                            <input id="qty" class="form-control"  name="qty" placeholder="" required="required" type="number">
                        </div>
                        <div class="form-group">
                            <label >Unit Cost</label>                               
                            <input id="cost" class="form-control"  name="cost" placeholder="" required="required" type="number">
                        </div>
                        <div class="form-group">
                            <label >Total</label>                               
                            <input id="total" class="form-control"  name="total" placeholder="" required="required" type="number">
                        </div> 
                        <div class="form-group">
                            <label >Reason</label>                           
                            <textarea class="form-control" id="form-field-9" name="reason" data-maxlength="10"></textarea>
                        </div>      
                        <div class="form-group">
                            <label >Amount</label>                               
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
                            <label >Approved</label>
                            <select class="form-control" id="approved" name="approved" >                                                         
                                <option value="Yes" >Yes</option>
                                <option value="No" >No</option>
                            </select>
                        </div>
                        <div class="form-group">     
                            <label >Select wallet</label>
                            <input class="easyui-combobox form-control" name="wallet" id="wallet" style="width:70%;height:26px" data-options="
                                   url:'<?php echo base_url() ?>index.php/wallet/lists',
                                   method:'get',
                                   valueField:'id',
                                   textField:'id',
                                   multiple:false,
                                   panelHeight:'auto'
                                   ">
                        </div>
                        <button  class="btn btn-primary align-left"  data-dismiss="modal">Cancel</button>
                        <button id="send" type="submit" class="btn btn-success align-right">Submit</button>

                    </form>

                </div> 
            </div>
        </div>
    </div>

    <div class="x_content scroll">
        <div class="alert alert-info" id="status"></div>
        <table id="datatable" class="table table-striped table-bordered scroll ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>DATE</th>
                    <th>ID</th>
                    <th>PARTICULARS</th>
                    <th>UNIT</th>
                    <th>QUANTITY</th>
                    <th>TOTAL</th>
                    <th>PAID</th> 
                    <th>CREATED</th>
                    <th>BY</th> 
                    <th>REASON</th>
                    <th>METHOD</th>
                    <th>APPROVED</th>
                    <th>WALLET</th>                    
                    <th>ACTION</th>

                </tr>
            </thead>
            <tbody>
                <?php
                //var_dump($expenses);
                $count = 1;
                foreach ($petty as $loop) {
                    ?>  
                    <tr class="odd">
                        <td><?php echo $count++; ?></td>
                        <td id="date:<?php echo $loop->date; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->date; ?></span>                      
                        </td>
                        <td id="id:<?php echo $loop->id; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->id; ?></span>                      
                        </td>

                        <td id="name:<?php echo $loop->id; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->name; ?></span>                      
                        </td>
                        <td id="unit:<?php echo $loop->id; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->unit; ?></span>                      
                        </td>
                        <td id="qty:<?php echo $loop->id; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->qty; ?></span>                      
                        </td>
                        <td id="total:<?php echo $loop->id; ?>" contenteditable="true">
                            <span class="green"><?php echo number_format($loop->total); ?></span>                      
                        </td>
                        <td id="paid:<?php echo $loop->id; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->paid; ?></span>                      
                        </td>
                        <td id="created:<?php echo $loop->id; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->created; ?></span>                      
                        </td>
                        <td id="user:<?php echo $loop->id; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->user; ?></span>                      
                        </td>
                        <td id="reason:<?php echo $loop->id; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->reason; ?></span>                      
                        </td>                        
                        <td id="method:<?php echo $loop->id; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->method; ?></span>                      
                        </td>
                        <td id="approved:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->approved; ?></td>
                        <td id="wallet:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->wallet; ?></td>

                        <td class="center">
                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/petty/delete/" . $loop->id; ?>"><li class="fa fa-trash">Delete</li></a>
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
        $('#loading_card').hide();
        $("#status").hide();
        $(function () {
            //acknowledgement message
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function () {
                var field_id = $(this).attr("id");
                var value = $(this).text();
                $.post('<?php echo base_url() . "index.php/petty/updater/"; ?>', field_id + "=" + value, function (data) {
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