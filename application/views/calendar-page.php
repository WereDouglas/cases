<link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css" />
<link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/ace-responsive.min.css" />
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/ace-skins.min.css" />
<script src="<?= base_url(); ?>js/raven.min.js"></script></head>
<script src="<?= base_url(); ?>js/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?= base_url(); ?>css/dhtmlxscheduler.css" type="text/css" charset="utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/easyui.css?date=<?php echo date('Y-m-d') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/icon.css?date=<?php echo date('Y-m-d') ?>">
<link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" />
<style type="text/css" >
    html, body{
        margin:0;
        padding:0;
        height:100%;
        overflow:hidden;
    }

    .dhx_cal_event div.dhx_footer,
    .dhx_cal_event.past_event div.dhx_footer,
    .dhx_cal_event.event_english div.dhx_footer,
    .dhx_cal_event.event_math div.dhx_footer,
    .dhx_cal_event.event_science div.dhx_footer{
        background-color: transparent !important;
    }
    .dhx_cal_event .dhx_body{
        -webkit-transition: opacity 0.1s;
        transition: opacity 0.1s;
        opacity: 0.7;
    }
    .dhx_cal_event .dhx_title{
        line-height: 12px;
    }
    .dhx_cal_event_line:hover,
    .dhx_cal_event:hover .dhx_body,
    .dhx_cal_event.selected .dhx_body,
    .dhx_cal_event.dhx_cal_select_menu .dhx_body{
        opacity: 1;
    }

    .dhx_cal_event.event_math div, .dhx_cal_event_line.event_math{
        background-color: #d81b1b !important;
        border-color: #d81b1b !important;
    }
    .dhx_cal_event_clear.event_math{
        color:#d81b1b !important;
    }

    .dhx_cal_event.event_science div, .dhx_cal_event_line.event_science{
        background-color: #1ca790 !important;
        border-color: #1ca790 !important;
    }
    .dhx_cal_event_clear.event_science{
        color:#1ca790!important;
    }

    .dhx_cal_event.event_english div, .dhx_cal_event_line.event_english{
        background-color: #c0dcf3 !important;
        border-color: #c0dcf3 !important;
    }
    .dhx_cal_event_clear.event_english{
        color:#c0dcf3 !important;
    }
</style>

<?php //echo var_dump($evs);?>


<script type="text/javascript" charset="utf-8">
    function init() {
        scheduler.config.xml_date = "%Y-%m-%d %H:%i";
        scheduler.config.time_step = 60;
        scheduler.config.multi_day = true;
        scheduler.locale.labels.section_subject = "Subject";
        scheduler.config.first_hour = 6;
        scheduler.config.limit_time_select = true;
        scheduler.config.details_on_dblclick = true;
        scheduler.config.details_on_create = true;

        scheduler.templates.event_class = function (start, end, event) {
            var css = "";

            if (event.subject) // if event has subject property then special class should be assigned
                css += "event_" + event.subject;

            if (event.id == scheduler.getState().select_id) {
                css += " selected";
            }
            return css; // default return

            /*
             Note that it is possible to create more complex checks
             events with the same properties could have different CSS classes depending on the current view:
             
             var mode = scheduler.getState().mode;
             if(mode == "day"){
             // custom logic here
             }
             else {
             // custom logic here
             }
             */
        };

        var subject = [
            {key: '', label: 'Appointment'},
            {key: 'english', label: 'English'},
            {key: 'math', label: 'Math'},
            {key: 'science', label: 'Science'}
        ];

        scheduler.config.lightbox.sections = [
            {name: "description", height: 43, map_to: "text", type: "textarea", focus: true},
            {name: "subject", height: 20, type: "select", options: subject, map_to: "subject"},
            {name: "time", height: 72, type: "time", map_to: "auto"}
        ];
        var day = <?php echo date('d'); ?>;
        var year = <?php echo date('Y'); ?>;
        var month = <?php echo date('m'); ?>;
        //alert(month);
        scheduler.init('scheduler_here', new Date(year, month - 1, day), "week");
//scheduler.init('scheduler_here', new Date(<?php echo date('Y') ?>, <?php echo date('m') ?>,<?php echo date('d') ?>), "week");

        scheduler.parse([
<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

if (is_array($evs)) {
    foreach ($evs as $loop) {

        $start = date('Y-m-d H:m', strtotime($loop->starts));
        $end = date('Y-m-d H:m', strtotime($loop->ends));
        $details = $loop->users . ' :' . clean($loop->details) . 'File: ' . $loop->file;
        if ($loop->priority == "Low") {
            $level = 'English';
        }
        if ($loop->priority == "Medium") {
            $level = 'Science';
        }
        if ($loop->priority == "High") {
            $level = 'Math';
        }
        ?>

                    {start_date: "<?php echo $start; ?>", end_date: "<?php echo $end; ?>", text: "<?php echo $details; ?>", subject: '<?php echo $level; ?>'},
        <?php
    }
}
?>

        ], "json");
    }
</script>

<div class="page-content">
    <div class="table-header">
        ADD EVENT<a href="#modal-form" role="button" class="green" data-toggle="modal"><i class="icon-add bigger-210"></i>Add </a>
    </div>
    <div class=" col-md-10">
        <body onload="init();">

            <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
                <div class="dhx_cal_navline">
                    <div class="dhx_cal_prev_button">&nbsp;</div>
                    <div class="dhx_cal_next_button">&nbsp;</div>
                    <div class="dhx_cal_today_button"></div>
                    <div class="dhx_cal_date"></div>
                    <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
                    <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
                    <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
                </div>
                <div class="dhx_cal_header">
                </div>
                <div class="dhx_cal_data">
                </div>		
            </div>

            <div id="modal-form" class="modal hide" tabindex="-1">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="blue bigger">Please fill the Schedule details</h4>
                </div>
                <form id="station-form" parsley-validate novalidate role="form" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/time/create'  method="post">

                    <div class="modal-body overflow-visible">
                        <div class="row-fluid">
                            <div class=" span6">
                                 <div class="form-group"> 
                                Start time <input class="easyui-datetimebox form-control" name="starts"   data-options="required:true,showSeconds:false" value="<?php echo date('Y-m-d H:i'); ?>" style="width:160px">
                                End time  <input class="easyui-datetimebox form-control" name="ends" data-options="required:true,showSeconds:false" value="<?php echo date('Y-m-d (H+2):i'); ?>" style="width:160px">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Client</label>
                                <input class="easyui-combobox" name="clientID" id="clientID" style="width:100%;height:26px" data-options="
                                       url:'<?php echo base_url() ?>index.php/client/lists',
                                       method:'get',
                                       valueField:'id',
                                       textField:'name',
                                       multiple:false,
                                       panelHeight:'auto'
                                       " >
                            </div>
                             <div class="form-group">
                                <label>Attendant</label>
                                <input class="easyui-combobox" name="userID" id="userID" style="width:100%;height:26px" data-options="
                                       url:'<?php echo base_url() ?>index.php/user/lists',
                                       method:'get',
                                       valueField:'id',
                                       textField:'surname',
                                       multiple:false,
                                       panelHeight:'auto'
                                       " >
                            </div>
                            <div class="form-group">
                                <label>File/Case</label>
                                <input class="easyui-combobox" name="fileID" id="userID" style="width:100%;height:26px" data-options="
                                       url:'<?php echo base_url() ?>index.php/file/lists',
                                       method:'get',
                                       valueField:'id',
                                       textField:'name',
                                       multiple:false,
                                       panelHeight:'auto'
                                       " >
                            </div>
                            </div>
                            <div class=" span6">
                                 <div class="form-group">
                                <label>Service</label>
                                <input class="easyui-combobox" name="service" id="service" style="width:100%;height:26px" data-options="
                                       url:'<?php echo base_url() ?>index.php/service/lists',
                                       method:'get',
                                       valueField:'name',
                                       textField:'name',
                                       multiple:false,
                                       panelHeight:'auto'
                                       " >
                            </div>
                               <div class="form-group">                       
                                <label >Intensity/Priority</label>
                                <select class="form-control" id="priority" name="priority">
                                    <option value="Low">Low</option> 
                                    <option value="Medium">Medium</option>  
                                     <option value="High">High</option>  
                                </select>                       
                            </div><!--/form-group-->
                            <div class="form-group">                        
                                <input type="text" name="no" value="<?php echo $this->session->userdata('code') . '-' . date('H:i:s') . '/W' . (count($evs) + 1); ?>" placeholder="Event No." id="no" required class="form-control"/>

                            </div>
                            <div class="form-group">                        
                                <input type="text" name="cost" placeholder="Cost" id="cost" value="0" class="form-control"/>

                            </div>                           
                           
                            <div class="">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>  <button class="btn btn-success pull-right" type="submit">SUBMIT</button> 

                            </div>
                            </div>
                           
                           
                            <div class="vspace"></div>     
                        </div>
                    </div>
                </form>
            </div><!--PAGE CONTENT ENDS-->



        </body>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript">
            window.jQuery || document.write("<script src='<?= base_url(); ?>assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>js/jquery.easyui.min.js"></script>