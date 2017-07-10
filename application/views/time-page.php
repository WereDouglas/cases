
<!doctype html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Tree mode</title>


    <script src='<?= base_url(); ?>js/dhtmlxscheduler.js' type="text/javascript" charset="utf-8"></script>
    <script src='<?= base_url(); ?>js/dhtmlxscheduler_timeline.js' type="text/javascript" charset="utf-8"></script>
    <script src='<?= base_url(); ?>js/dhtmlxscheduler_treetimeline.js' type="text/javascript" charset="utf-8"></script>

    <link rel='stylesheet' type='text/css' href='<?= base_url(); ?>css/dhtmlxscheduler.css'>



    <style type="text/css" >
        html, body{
            margin:0;
            padding:0;
            height:100%;
            overflow:hidden;
        }
    </style>

    <script type="text/javascript" charset="utf-8">
        function init() {

            scheduler.locale.labels.timeline_tab = "Timeline";
            scheduler.locale.labels.section_custom = "Section";
            scheduler.config.details_on_create = true;
            scheduler.config.details_on_dblclick = true;
            scheduler.config.xml_date = "%Y-%m-%d %H:%i";

            //===============
            //Configuration
            //===============
            var sections = [
<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

if (is_array($users)) {
    foreach ($users as $loop) {
        ?>
                    {key:"<?php echo $loop->id ?>", label:"<?php echo $loop->surname . ' ' . $loop->lastname; ?>"},
        <?php
    }
}
?>
           
            ];
                    scheduler.createTimelineView({
                        name: "timeline",
                        x_unit: "minute",
                        x_date: "%H:%i",
                        x_step: 30,
                        x_size: 24,
                        x_start: 16,
                        x_length: 48,
                        y_unit: sections,
                        y_property: "section_id",
                        render: "bar"
                    });

            //===============
            //Data loading
            //===============
            scheduler.config.lightbox.sections = [
                {name: "description", height: 130, map_to: "text", type: "textarea", focus: true},
                {name: "custom", height: 23, type: "select", options: sections, map_to: "section_id"},
                {name: "time", height: 72, type: "time", map_to: "auto"}
            ];
            var day = <?php echo date('d'); ?>;
            var year = <?php echo date('Y'); ?>;
            var month = <?php echo date('m'); ?>;
            scheduler.init('scheduler_here', new Date(year, month - 1, day), "timeline");
            scheduler.parse([

<?php
if (is_array($evs)) {
    foreach ($evs as $loop) {

        $start = date('Y-m-d H:m', strtotime($loop->starts));
        $end = date('Y-m-d H:m', strtotime($loop->ends));
        $details = $loop->users . ' :' . clean($loop->details) . 'File: ' . $loop->file;
         if ($loop->priority == "Low") {
            $color = 'blue';
        }
        if ($loop->priority == "Medium") {
            $color = 'orange';
        }
        if ($loop->priority == "High") {
             $color = 'red';
        }
       
        ?>
                    {start_date: "<?php echo $start; ?>", end_date: "<?php echo $end; ?>", text: "<?php echo $details; ?>", section_id: "<?php echo $loop->userID; ?>",color:"<?php echo $color; ?>"},
        <?php
    }
}
?>            {start_date: "2017-06-30 12:00", end_date: "2017-06-30 18:00", text: "Task D-12458", section_id: 4}
            ], "json");
        }
    </script>


    <script src="<?= base_url(); ?>js/raven.min.js"></script>
</head>
<body onload="init();">
    <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
        <div class="dhx_cal_navline">
            <div class="dhx_cal_prev_button">&nbsp;</div>
            <div class="dhx_cal_next_button">&nbsp;</div>
            <div class="dhx_cal_today_button"></div>
            <div class="dhx_cal_date"></div>
            <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
            <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
            <div class="dhx_cal_tab" name="timeline_tab" style="right:280px;"></div>
            <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
        </div>
        <div class="dhx_cal_header">
        </div>
        <div class="dhx_cal_data">
        </div>		
    </div>
</body>