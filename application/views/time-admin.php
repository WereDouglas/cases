<!DOCTYPE html>
<html>
<head>
    <title></title>
	<!-- demo stylesheet -->
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />    

	<!-- helper libraries -->
	<script src="<?= base_url(); ?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
	
	<!-- daypilot libraries -->
        <script src="<?= base_url(); ?>js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
        <!--<script src="js/daypilot/common.js" type="text/javascript"></script>
        <script src="js/daypilot/scheduler.js" type="text/javascript"></script>
        <script src="js/daypilot/bubble.js" type="text/javascript"></script>-->

</head>
<body>
        <div id="header">
            <div class="bg-help">
                <div class="inBox">
                    <h1 id="logo"><a href='http://code.daypilot.org/11478/html5-tennis-court-reservation'>HTML5 Tennis Court Reservation</a></h1>
                    <p id="claim"><a href="http://javascript.daypilot.org/">DayPilot for JavaScript</a> - AJAX Calendar/Scheduling Widgets for JavaScript/HTML5/jQuery</p>
                    <hr class="hidden" />
                </div>
            </div>
        </div>
        <div class="shadow"></div>
        <div class="hideSkipLink">
        </div>
        <div class="main">
            
            <div class="space">
                 <li><a href="<?php echo base_url() . "index.php/task/"; ?>" target="frame"><i class="fa fa-calendar"></i> Time sheet <span class="fa fa-chevron-down"></span></a>

            </div>
                
            <div style="float:left; width:150px;" >
                <div id="nav"></div>
            </div>
            <div style="margin-left: 150px;" >
                <div id="dp"></div>
            </div>           

            <script type="text/javascript">
                var nav = new DayPilot.Navigator("nav");
                nav.onTimeRangeSelected = function(args) {
                    var day = args.day;
                    
                    if (dp.visibleStart() <= day && day < dp.visibleEnd()) {
                        dp.scrollTo(day, "fast");
                    }
                    else {
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
               
                
                var dp = new DayPilot.Scheduler("dp");

                dp.treeEnabled = true;
                
                dp.heightSpec = "Max";
                dp.height = 300;
                
                dp.scale = "Hour";
                dp.startDate = DayPilot.Date.today().firstDayOfMonth();
                dp.days = DayPilot.Date.today().daysInMonth();
                dp.cellWidth = 50;
                
                dp.eventHeight = 40;
                dp.durationBarVisible = false;
                
                //dp.rowMarginTop = 15;
                dp.treePreventParentUsage = true;
                
                dp.onBeforeEventRender = function(args) {
                };
                
                var slotPrices = {
                    "06:00": 12,
                    "07:00": 15,
                    "08:00": 15,
                    "09:00": 15,
                    "10:00": 15,
                    "11:00": 12,
                    "12:00": 10,
                    "13:00": 10,
                    "14:00": 12,
                    "15:00": 12,
                    "16:00": 15,
                    "17:00": 15,
                    "18:00": 15,
                    "19:00": 15,
                    "20:00": 15,
                    "21:00": 12,
                    "22:00": 10,
                };
                
                dp.onBeforeCellRender = function(args) {
                    
                    if (args.cell.isParent) {
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
                    var opacity = (price - min)/max;
                    var text = "$" + price;
                    args.cell.html = "<div style='cursor: default; position: absolute; left: 0px; top:0px; right: 0px; bottom: 0px; padding-left: 3px; text-align: center; background-color: " + color + "; color:white; opacity: " + opacity + ";'>" + text + "</div>";
                };

                dp.timeHeaders = [
                    { groupBy: "Month", format: "MMMM yyyy" },
                    { groupBy: "Day", format: "dddd, MMMM d"},
                    { groupBy: "Hour", format: "h tt"}
                ];
                
                dp.businessBeginsHour = 6;
                dp.businessEndsHour = 23;
                dp.businessWeekends = true;
                dp.showNonBusiness = false;
                
                dp.allowEventOverlap = false;

                dp.bubble = new DayPilot.Bubble();

                // http://api.daypilot.org/daypilot-scheduler-oneventmoved/ 
                dp.onEventMoved = function (args) {
                    $.post("backend_move.php", 
                    {
                        id: args.e.id(),
                        newStart: args.newStart.toString(),
                        newEnd: args.newEnd.toString(),
                        newResource: args.newResource
                    }, 
                    function() {
                        dp.message("Moved.");
                    });
                };

                // http://api.daypilot.org/daypilot-scheduler-oneventresized/ 
                dp.onEventResized = function (args) {
                    $.post("backend_resize.php", 
                    {
                        id: args.e.id(),
                        newStart: args.newStart.toString(),
                        newEnd: args.newEnd.toString()
                    }, 
                    function() {
                        dp.message("Resized.");
                    });
                };

                // event creating
                // http://api.daypilot.org/daypilot-scheduler-ontimerangeselected/
                dp.onTimeRangeSelected = function (args) {
                    var name = prompt("New event name:", "Event");
                    dp.clearSelection();
                    if (!name) return;

                    $.post("backend_create.php", 
                        {
                            start: args.start.toString(),
                            end: args.end.toString(),
                            resource: args.resource,
                            name: name
                        }, 
                        function(data) {
                            var e = new DayPilot.Event({
                                start: args.start,
                                end: args.end,
                                id: data.id,
                                resource: args.resource,
                                text: name
                            });
                            dp.events.add(e);

                            dp.message(data.message);
                        });
                };
                
                dp.onEventClicked = function(args) {
                    new DayPilot.Modal({
                        onClosed: function(args) {
                            loadEvents();
                        }
                    }).showUrl("edit.php?id=" + args.e.id());
                };

                dp.init();
                dp.scrollTo(new DayPilot.Date());

                loadResources();
                loadEvents();

                function loadResources() {
                    $.post("backend_resources.php", function(data) {
                        dp.resources = data;
                        dp.update();
                    });
                }
                
                function loadEvents() {
                    dp.events.load("backend_events.php");
                }
                
            </script>

        </div>
        <div class="clear">
        </div>
</body>
</html>

