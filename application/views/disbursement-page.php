
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
    <h2>DISBURSEMENTS</h2>  
   
    <div class="x_content scroll">

        <table id="datatable" class="table table-striped table-bordered scroll ">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>INVOICE</th>
                   
                    <th>CLIENT</th>
                    <th>FILE</th>
                    <th>DETAILS</th>                   
                    <th>DISBURSEMENT</th>                  
                    <th>BALANCE ON TRANSACTION</th>
                    <th>RECEIVED BY</th>
                    <th>APPROVED</th>
                    
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
                        
                        <td><?php echo number_format($loop->disbursement,2); ?></td>
                        <td><?php echo number_format($loop->balance,2); ?></td>
                        <td id="received:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->received; ?></td>
                        <td id="approved:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->approved; ?></td>

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