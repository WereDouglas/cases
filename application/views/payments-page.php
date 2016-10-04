
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/pure-min.css">
<?php echo $this->session->flashdata('msg'); ?>


<div class=" col-md-12 x_panel">
    <h2>PAYMENTS/RECEIPT</h2>  
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">ADD</button>
    <div class="modal fade bs-example-modal-sm scroll" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md-8">
            <div class="modal-content col-md-12">


                <div class=" item form-group col-md-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select client</label>
                    <div class="col-md-6 col-sm-5 col-xs-12">

                        <input class="easyui-combobox form-control" name="client" id="client" style="width:100%;height:26px" data-options="
                               url:'<?php echo base_url() ?>index.php/task/client',
                               method:'get',
                               valueField:'name',
                               textField:'name',
                               multiple:false,
                               panelHeight:'auto'
                               ">
                    </div>
                </div> 
                <div class="col-md-12"> 
                    <div class=" item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File/Case</label>
                        <div class="col-md-6 col-sm-5 col-xs-12">

                            <input class="easyui-combobox form-control" name="file" id="file" style="width:100%;height:26px" data-options="
                                   url:'<?php echo base_url() ?>index.php/task/files',
                                   method:'get',
                                   valueField:'name',
                                   textField:'name',
                                   multiple:false,
                                   panelHeight:'auto'
                                   ">
                        </div>
                    </div> 
                </div> 

                <form  enctype="multipart/form-data" class="form-horizontal padding-2"  action='<?= base_url(); ?>index.php/payment/save'  method="post">

                    <div class="span12" class="printableArea">
                        <div class=" col-md-12">                       
                            <?php
                            echo $this->session->userdata('top');
                            ?>

                        </div>
                        <div class=" col-md-12">
                            <div class="col-md-4 ">
                                <span> <img  height="50px" width="100px" class="" src="<?= base_url(); ?>uploads/<?php echo $this->session->userdata('orgimage'); ?>" alt="logo" />
                                </span>
                            </div>
                            <div class="col-md-4 ">
                                <?php
                                echo '<br><br>';
                                echo "TIN " . $this->session->userdata('tin') . '<br>';
                                echo "Receipt Number: " . $no = "" . date('m') . (int) date('d') . (int) date('H') . (int) date('i') . (int) date('s') . '<br>';
                                echo "Date: " . date('Y-m-d');
                                ?>
                            </div>
                            <div class="col-md-4 ">
                                <b> <h2><?php echo $this->session->userdata('name'); ?></h2></b>
                                <p style=" word-wrap:  break-word"><?php echo $this->session->userdata('address'); ?></p>
                            </div>
                        </div>
                        <div class=" col-md-12">                       
                            <div class="item form-group">
                                <label class="control-label col-md-3" for="name">Client</label> 
                                <div class="col-md-9 ">
                                    <input id="client" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey; width: 100%;"   name="client" placeholder="Client" required="required" type="text">
                                </div> 
                            </div> 
                            <div class="item form-group">
                                <label class="control-label col-md-3" for="name">Amount</label> 
                                <div class="col-md-9 ">
                                    <input id="name" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;"  name="name" placeholder="" required="required" type="text">
                                </div> 
                            </div> 
                            <div class="item form-group">
                                <label class="control-label col-md-3" for="name">The sum of(in words)</label> 
                                <div class="col-md-9 ">
                                    <input id="words" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;"   name="words" placeholder=""  type="text">
                                </div> 
                            </div> 
                            <div class="item form-group">
                                <label class="control-label col-md-3">For services rendered</label>
                                <div class="col-md-9 ">
                                    <textarea class="col-md-9" id="form-field-9" name="note" data-maxlength="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <h4>Payment Details</h4>


                        <div class=" col-md-12"> 
                            <div class="item form-group">
                                <label class="control-label col-md-3" for="name">Fee/Debit Note No.</label> 
                                <div class="col-md-9 ">
                                    <input id="no" style="border:0;outline:0; height:32px;width: 100%;  border-bottom: 1px solid grey;"   name="no" value="<?php
                                    echo date('m') . (int) date('d') . (int) date('H') . (int) date('i') . (int) date('s');
                                    ?>"   type="text">
                                </div> 
                            </div> 
                            <table class="pure-table col-md-12">
                                <thead>
                                    <tr>

                                        <th>Details</th>
                                        <th></th>
                                        <th>Not vatable</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="pure-table-odd">
                                        <td>Professional fees</td>
                                        <td><input id="fees" style="border:none;background-color: transparent;"    name="fees" value=""   type="text">
                                        </td>
                                        <td><input id="feevatable" style="border:none;background-color: transparent;"   name="feevatable" value=""   type="text">
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>Disbursement</td>
                                        <td><input id="disbursement" style="border:none;background-color: transparent;"   name="disbursement" value=""   type="text">
                                        </td>
                                        <td> <input id="disbursementvat" style="border:none;background-color: transparent;"    name="disbursementvat" value=""   type="text">
                                        </td>

                                    </tr>

                                    <tr class="pure-table-odd">
                                        <td>Recieved on behalf of client</td>
                                        <td> <input id="amount" style="border:none;background-color: transparent;" name="amount" value=""   type="text">
                                        </td>
                                        <td><input id="amountvat" style="border:none;background-color: transparent;" name="amountvat" value=""   type="text">
                                        </td>

                                    </tr>
                                    <tr >                                      
                                        
                                        <td colspan="2">TOTALS</td>                               
                                       

                                    </tr>    
                                     <tr class="pure-table-odd">                                      
                                        
                                        <td>Total amount</td>                               
                                        <td> <input id="balance" style="border:none;background-color: transparent;"   name="amount" value="" type="text">
                                        </td>
                                        <td></td>

                                    </tr>    
                                    <tr class="pure-table-odd">
                                        
                                        <td>Balance</td>
                                        <td><input id="balance" style="border:none;background-color: transparent;" name="balance" value=""   type="text">
                                        </td>
                                        <td></td>

                                    </tr>
                                    
                                    <tr class="pure-table-odd">                                      
                                       
                                        <td>Amount before VAT</td>                               
                                        <td> <input id="balance" style="border:none;background-color: transparent;"   name="amount" value="" type="text">
                                        </td>
                                         <td></td>

                                    </tr>                                    

                                    <tr class="pure-table-odd">                                      
                                        
                                        <td>VAT Amount</td>                               
                                        <td><input id="balance" style="border:none;background-color: transparent;"   name="vat" value=""   type="text">
                                        </td>
                                        <td></td>

                                    </tr>
                                    <tr class="pure-table-odd">                                      
                                        
                                        <td>Total paid</td>                               
                                        <td> <input id="balance" style="border:none;background-color: transparent;"   name="total" value=""   type="text">
                                        </td>
                                        <td></td>
                                    </tr>


                                </tbody>
                            </table>

                        </div>
                        <div class=" col-md-12">                           

                            <div class="item form-group">
                                <label class="control-label col-md-6" for="name">Recieved with thanks</label> 
                                <div class="col-md-6 ">
                                    <input id="balance" style="border:0;outline:0; height:32px;width: 100%; border-bottom: 1px solid grey;"  name="amount" value=""   type="text">
                                </div> 
                            </div>

                        </div>

                   
                    </div>
                    <div class="col-md-12">

                        <div class="form-group">

                            <div class="col-md-6 col-md-offset-3 align-right">
                                <input type="button" class="btn btn-default align-right printdiv-btn btn-primary icon-ok" value="print" />
                                <button id="send" type="submit" class="btn btn-success align-right">Submit</button>
                                <button  class="btn btn-primary align-right"  data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>


                </form>

            </div> 
        </div>
    </div>

    <div class="x_content scroll">

        <table id="datatable" class="table table-striped table-bordered scroll ">
            <thead>
                <tr>
                    <th>CREATED</th>
                    <th>NAME</th>
                    <th>FILE</th>
                    <th>CLIENT</th>
                    <th>DETAILS</th>
                    <th>C/O</th> 
                    <th>NOTE</th>
                    <th>ACTION</th> 
                    <th>DOWNLOAD</th>
                    <th>SIZE(kilobytes/Kbs)</th>


                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($docs as $loop) {
                    ?>  
                    <tr class="odd">

                        <td id="created:<?php echo $loop->documentID; ?>" contenteditable="true">
                            <span class="green"><?php echo $loop->created; ?></span>                        </td>
                        <td id="name:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->name; ?></td>
                        <td id="fileID:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->fileID; ?></td>
                        <td id="client:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->client; ?></td>
                        <td id="details:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->details; ?></td>
                        <td id="lawyer:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->lawyer; ?></td>
                        <td id="note:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->note; ?></td>

                        <td class="center">
                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/document/delete/" . $loop->documentID; ?>"><li class="fa fa-trash">Delete</li></a>
                        </td>
                        <td class="center">
                            <a class="btn btn-successr btn-xs" href="<?php echo base_url() . "documents/" . $loop->fileUrl; ?>"><li class="fa fa-download">Download</li></a>
                        </td>
                        <td class="center">
                            <?php echo $loop->sizes; ?>
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