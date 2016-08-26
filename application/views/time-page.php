<!DOCTYPE html>
<html>
    <head>
        <title></title>

        <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>media/layout.css" />

        <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>themes/scheduler_8.css" />    
        <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>themes/bubble_default.css" />    
        <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>themes/navigator_white.css" /> 

        <!-- helper libraries -->
        <script src="<?= base_url(); ?>js/jquery-1.9.1.min.js" type="text/javascript"></script>	
        <!-- daypilot libraries -->
        <script src="<?= base_url(); ?>js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>

        <div class="shadow"></div>
        <div class="hideSkipLink">
        </div>
        <div class="main">
            <div class=" col-md-2 x_panel">
                <div class="space">

<!--                    <a href="<?php echo base_url() . "index.php/time/admin"; ?>" target="frame"><i class="fa fa-calendar"></i> Admin <span class="fa fa-chevron-down"></span></a>|-->

                </div>

                <div  class=" col-md-12 x_panel" >
                    <div id="navigator"></div>
                </div>
            </div>
            <div class="clear">   </div>
            <div  class=" col-md-10 x_panel" >
                <div id="scheduler"></div>
            </div>  

            <script type="text/javascript">
                var nav = new DayPilot.Navigator("navigator");
                nav.onTimeRangeSelected = function (args) {
                    var day = args.day;

                    if (dp.visibleStart() <= day && day < dp.visibleEnd()) {
                        dp.scrollTo(day, "fast");
                    } else {
                        var start = day.firstDayOfMonth();
                        var days = day.daysInMonth();
                        dp.startDate = start;
                        dp.days = days;
                        dp.update();
                        dp.scrollTo(day, "fast");
                        loadEvents();
                    }
                };
                nav.init();


                var dp = new DayPilot.Scheduler("scheduler");

                dp.treeEnabled = true;

                dp.heightSpec = "Max";
                dp.height = 300;

                dp.scale = "Hour";
                dp.startDate = DayPilot.Date.today().firstDayOfMonth();
                dp.days = DayPilot.Date.today().daysInMonth();
                dp.cellWidth = 40;

                dp.eventHeight = 40;
                dp.durationBarVisible = false;

                dp.treePreventParentUsage = true;

                dp.onBeforeEventRender = function (args) {
                };

                var slotPrices = {
                    "06:00": "-",
                    "07:00": "-",
                    "08:00": "-",
                    "09:00": "-",
                    "10:00": "-",
                    "11:00": "- ",
                    "12:00": "-",
                    "13:00": "-",
                    "14:00": "-",
                    "15:00": "-",
                    "16:00": "-",
                    "17:00": "-",
                    "18:00": "-",
                    "19:00": "-",
                    "20:00": "-",
                    "21:00": "-",
                    "22:00": "-",
                };

                dp.onBeforeCellRender = function (args) {

                    if (args.cell.isParent) {
                        return;
                    }

                    if (args.cell.start < new DayPilot.Date()) {  // past
                        return;
                    }

                    if (args.cell.utilization() > 0) {
                        return;
                    }

                    var color = "green";

                    var slotId = args.cell.start.toString("HH:mm");
                    var price = slotPrices[slotId];

                    var min = 5;
                    var max = 15;
                    var opacity = (price - min) / max;
                    var text = " " + price;
                    args.cell.html = "<div style='cursor: default; position: absolute; left: 0px; top:0px; right: 0px; bottom: 0px; padding-left: 3px; text-align: center; background-color: " + color + "; color:white; opacity: " + opacity + ";'>" + text + "</div>";
                };

                dp.timeHeaders = [
                    {groupBy: "Month", format: "MMMM yyyy"},
                    {groupBy: "Day", format: "dddd, MMMM d"},
                    {groupBy: "Hour", format: "h tt"}
                ];

                dp.businessBeginsHour = 6;
                dp.businessEndsHour = 23;
                dp.businessWeekends = true;
                dp.showNonBusiness = false;

                dp.allowEventOverlap = false;

                //dp.cellWidthSpec = "Auto";
                dp.bubble = new DayPilot.Bubble();

                dp.onTimeRangeSelecting = function (args) {
                    if (args.start < new DayPilot.Date()) {
                        args.right.enabled = true;
                        args.right.html = "You can't create a reservation in the past";
                        args.allowed = false;
                    } else if (args.duration.totalHours() > 8) {
                        args.right.enabled = true;
                        args.right.html = "You can only book up to 8 hours";
                        args.allowed = false;
                    }
                };

                // event creating
                // http://api.daypilot.org/daypilot-scheduler-ontimerangeselected/
                dp.onTimeRangeSelected = function (args) {
                    var modal = new DayPilot.Modal();
                    modal.onClosed = function (args) {
                        dp.clearSelection();
                        loadEvents();
                    };
                    modal.showUrl("<?php echo base_url() . "index.php/time/add/"; ?>" + args.start + "/" + args.end + "/" + args.resource);
                };

                dp.init();

                var scrollTo = DayPilot.Date.today();
                if (new DayPilot.Date().getHours() > 12) {
                    scrollTo = scrollTo.addHours(12);
                }
                dp.scrollTo(scrollTo);

                loadResources();
                loadEvents();

                function loadResources() {
                    dp.rows.load("<?php echo base_url() . "index.php/time/resources/"; ?>");

                }

                function loadEvents() {
                    dp.events.load("<?php echo base_url() . "index.php/time/events/"; ?>");  // POST request with "start" and "end" JSON parameters
                }

            </script>
          
        </div>
        <div class="clear">
        </div>
    </body>
</html>

