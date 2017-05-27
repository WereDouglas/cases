<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Task</title>
        <link type="text/css" rel="stylesheet" href="media/layout.css" />    
        <script src="<?= base_url(); ?>js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/easyui.css?date=<?php echo date('Y-m-d') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/icon.css?date=<?php echo date('Y-m-d') ?>">
        <link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" />
    </head>
    <body>
        <?php
        // check the input
        //is_numeric($_GET['id']) or die("invalid URL");
        // $start = urldecode($this->uri->segment(3));
        $start = $this->uri->segment(3);
        $end = $this->uri->segment(4);
        $resource = urldecode($this->uri->segment(5));
        // basic sanity check
        new DateTime($start) or die("invalid date (start)");
        new DateTime($end) or die("invalid date (end)");
        ?>

        <form id="f" style="padding: 10px;">
            <h3>New task for <?php echo $resource; ?></h3>
            <div class="row"> 
            <div class="col-md-6"> 
                <div class="form-group">
                    <label >Details</label>               
                    <textarea type="text" id="name" class="form-control" name="name" value="" ></textarea>               
                </div> 
                <div class="form-group">
                    <label >Start</label>

                    <?php echo $start; ?> to  <?php echo $end; ?>
                    <input type="hidden" id="start" name="start" value="<?php echo $start; ?>" />
                    <input type="hidden" id="end" name="end" value="<?php echo $end; ?>" />
                    <input type="hidden" id="resource" name="resource" value="<?php echo $resource; ?>" />

                </div> </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >File/Case</label>            

                    <input class="easyui-combobox form-control" name="file" id="file"  data-options="
                           url:'<?php echo base_url() ?>index.php/task/files',
                           method:'get',
                           valueField:'name',
                           textField:'name',
                           multiple:false,
                           panelHeight:'auto'
                           ">

                </div> 
                <div class="form-group">
                    <label >Status</label>

                    <select class="optional form-control" data-placeholder="Choose level of authority" name="status" id="status">
                        <option value="Progressing" />Progressing
                        <option value="Complete" />Complete
                    </select>

                </div>
                <div class="form-group">              

                    <input class="btn-default btn"  type="submit"  value="Save" /> <a class="btn-danger btn" href="javascript:close();">Cancel</a>

                </div> 
                <div class="space"></div>

            </div>
        </div>


        <!--            <div class=" item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Details</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            
                            <input type="Text" class="col-md-6 col-sm-6 col-xs-12" id="details" name="details" value="" />
                        </div>
                    </div> -->

    </form>

    <script type="text/javascript">
        function close(result) {
            DayPilot.Modal.close(result);
        }
        $("#f").submit(function (ev) {
            ev.preventDefault();
            var f = $("#f");
            var url = "<?php echo base_url() . "index.php/time/create/"; ?>";
            $.post(url, f.serialize(), function (result) {
                close(eval(result));
            });
        });

        $(document).ready(function () {
            $("#name").focus();
        });

    </script>
</body>
</html>
<script type="text/javascript" src="<?= base_url(); ?>js/jquery.easyui.min.js"></script>
