<!-- Bootstrap -->
<?php //var_dump($sch); ?>
<link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- FullCalendar -->
<link href="<?php echo base_url(); ?>vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

<!-- Custom styling plus plugins -->
<link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/easyui.css?date=<?php echo date('Y-m-d') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/icon.css?date=<?php echo date('Y-m-d') ?>">
<div class="row container">
    <?php echo $this->session->flashdata('msg'); ?>
    <div id="mainb" style="height:300px;" class= "col-md-12 col-sm-12 col-xs-12"></div>
   
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- page content -->

        <div class="page-title">
            <div class="title_left">
                <h3>Calendar <small>Click to add/edit events</small></h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="x_content">

            <div id='calendar'></div>
        </div>


        <!-- /page content -->
    </div>

</div>
<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
            </div>
            <div class="modal-body">
                <div id="testmodal" style="padding: 5px 20px;">
                    <form  enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/task/create'  method="post">
                        <div class="span12">
                            <div class="row-fluid">
                                <label for="timepicker1">Date</label>
                            </div>
                            <div class="control-group">
                                <input name="date" id="date" type="text" />
<!--                                <input class="easyui-datebox form" name="date" id="starts" width="100px" data-options="formatter:myformatter,parser:myparser" ></input>-->

                            </div>
                            <div class="row-fluid">
                                <label for="form-field-select-4">Choose Attendees</label>
                                <input class="easyui-combobox" name="attend[]" style="width:100%;height:26px" data-options="
                                       url:'<?php echo base_url() ?>index.php/task/users',
                                       method:'get',
                                       valueField:'userID',
                                       textField:'name',

                                       multiple:true,
                                       panelHeight:'auto'
                                       ">
                            </div>
                            <div class="row-fluid">
                                <label for="form-field-select-4">Choose File</label>

                                <input class="easyui-combobox" name="file" style="width:100%;height:26px" data-options="
                                       url:'<?php echo base_url() ?>index.php/task/files',
                                       method:'get',
                                       valueField:'name',
                                       textField:'name',
                                       multiple:false,
                                       panelHeight:'auto'
                                       ">
                            </div>


                            <div class="row-fluid">
                                <label for="timepicker1">Start Time</label>
                            </div>

                            <div class="control-group">
                                <input class="easyui-timespinner" name="startTime" value="01:20" style="width:100%;height:26px">
                            </div>

                            <div class="row-fluid">
                                <label for="timepicker1">End Time</label>
                            </div>

                            <div class="control-group">
                                <input class="easyui-timespinner" name="endTime" value="14:45" style="width:100%;height:26px">
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="form-field-1">Number of days</label>
                                <div class="control-group">
                                    <input class="form-control" type="text" name="period" value="1"  />
                                </div>

                                <div class="form-group"> 
                                    <label class="control-label" for="form-field-1">Details</label>
                                    <div class="control-group">
                                        <textarea  class="form-control" name="details" class="" placeholder="details" ></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>Priority</label>
                                    <select class="form-control" id="priority" name="priority" >                                                         
                                        <option value="High" >High</option>
                                        <option value="Medium" >Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                
                            <label>
                                <input name="trig" type="checkbox" />
                                <span class="lbl"> Notify parties ?</span>
                            </label>
                             <label>
                                <input name="court" type="checkbox" />
                                <span class="lbl"> Due for court(Cause list) ?</span>
                            </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit changes</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
            </div>
            <div class="modal-body">

                <div id="testmodal2" style="padding: 5px 20px;">
                    <form id="antoform2" class="form-horizontal calender" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title2" name="title2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary antosubmit2">Submit</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

<script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>vendors/nprogress/nprogress.js"></script>
<!-- FullCalendar -->
<script src="<?php echo base_url(); ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>build/js/custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker/daterangepicker.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>-->
<script type="text/javascript" src="<?= base_url(); ?>js/jquery.easyui.min.js"></script>


<script src="<?= base_url(); ?>vendors/echarts/dist/echarts.min.js"></script>
<script>
    var theme = {
        color: [
            '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
            '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
        ],
        title: {
            itemGap: 8,
            textStyle: {
                fontWeight: 'normal',
                color: '#408829'
            }
        },
        dataRange: {
            color: ['#1f610a', '#97b58d']
        },
        toolbox: {
            color: ['#408829', '#408829', '#408829', '#408829']
        },
        tooltip: {
            backgroundColor: 'rgba(0,0,0,0.5)',
            axisPointer: {
                type: 'line',
                lineStyle: {
                    color: '#408829',
                    type: 'dashed'
                },
                crossStyle: {
                    color: '#408829'
                },
                shadowStyle: {
                    color: 'rgba(200,200,200,0.3)'
                }
            }
        },
        dataZoom: {
            dataBackgroundColor: '#eee',
            fillerColor: 'rgba(64,136,41,0.2)',
            handleColor: '#408829'
        },
        grid: {
            borderWidth: 0
        },
        categoryAxis: {
            axisLine: {
                lineStyle: {
                    color: '#408829'
                }
            },
            splitLine: {
                lineStyle: {
                    color: ['#eee']
                }
            }
        },
        valueAxis: {
            axisLine: {
                lineStyle: {
                    color: '#408829'
                }
            },
            splitArea: {
                show: true,
                areaStyle: {
                    color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                }
            },
            splitLine: {
                lineStyle: {
                    color: ['#eee']
                }
            }
        },
        timeline: {
            lineStyle: {
                color: '#408829'
            },
            controlStyle: {
                normal: {color: '#408829'},
                emphasis: {color: '#408829'}
            }
        },
        k: {
            itemStyle: {
                normal: {
                    color: '#68a54a',
                    color0: '#a9cba2',
                    lineStyle: {
                        width: 1,
                        color: '#408829',
                        color0: '#86b379'
                    }
                }
            }
        },
        map: {
            itemStyle: {
                normal: {
                    areaStyle: {
                        color: '#ddd'
                    },
                    label: {
                        textStyle: {
                            color: '#c12e34'
                        }
                    }
                },
                emphasis: {
                    areaStyle: {
                        color: '#99d2dd'
                    },
                    label: {
                        textStyle: {
                            color: '#c12e34'
                        }
                    }
                }
            }
        },
        force: {
            itemStyle: {
                normal: {
                    linkStyle: {
                        strokeColor: '#408829'
                    }
                }
            }
        },
        chord: {
            padding: 4,
            itemStyle: {
                normal: {
                    lineStyle: {
                        width: 1,
                        color: 'rgba(128, 128, 128, 0.5)'
                    },
                    chordStyle: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        }
                    }
                },
                emphasis: {
                    lineStyle: {
                        width: 1,
                        color: 'rgba(128, 128, 128, 0.5)'
                    },
                    chordStyle: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        }
                    }
                }
            }
        },
        gauge: {
            startAngle: 225,
            endAngle: -45,
            axisLine: {
                show: true,
                lineStyle: {
                    color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                    width: 8
                }
            },
            axisTick: {
                splitNumber: 10,
                length: 12,
                lineStyle: {
                    color: 'auto'
                }
            },
            axisLabel: {
                textStyle: {
                    color: 'auto'
                }
            },
            splitLine: {
                length: 18,
                lineStyle: {
                    color: 'auto'
                }
            },
            pointer: {
                length: '90%',
                color: 'auto'
            },
            title: {
                textStyle: {
                    color: '#333'
                }
            },
            detail: {
                textStyle: {
                    color: 'auto'
                }
            }
        },
        textStyle: {
            fontFamily: 'Arial, Verdana, sans-serif'
        }
    };

    var echartBarLine = echarts.init(document.getElementById('mainb'), theme);

    echartBarLine.setOption({
        title: {
            x: 'center',
            y: 'top',
            padding: [0, 0, 20, 0],
            text: 'Service usage statistics',
            textStyle: {
                fontSize: 15,
                fontWeight: 'normal'
            }
        },
        tooltip: {
            trigger: 'axis'
        },
        toolbox: {
            show: true,
            feature: {
                dataView: {
                    show: true,
                    readOnly: false,
                    title: "Text View",
                    lang: [
                        "Text View",
                        "Close",
                        "Refresh",
                    ],
                },
                restore: {
                    show: true,
                    title: 'Restore'
                },
                saveAsImage: {
                    show: true,
                    title: 'Save'
                }
            }
        },
        calculable: true,
        legend: {
            data: ['Messaging', 'Scheduling', 'Time Sheets'],
            y: 'bottom'
        },
        xAxis: [{
                type: 'category',
                data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            }],
        yAxis: [{
                type: 'value',
                name: 'Count',
                axisLabel: {
                    formatter: '{value} count'
                }
            }, {
                type: 'value',
                name: 'Number',
                axisLabel: {
                    formatter: '{value} No'
                }
            }],
        series: [{
                name: 'Messaging',
                type: 'bar',
                data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
            }, {
                name: 'Scheduling',
                type: 'bar',
                data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
            }, {
                name: 'Time Sheets',
                type: 'line',
                yAxisIndex: 1,
                data: [2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2]
            }]
    });
    
</script>


<!-- FullCalendar -->
<script>
    $(window).load(function () {
        var date = new Date(),
                d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear(),
                started,
                categoryClass;

        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                $('#fc_create').click();

                started = start;
                ended = end;
                var allDay = !start.hasTime() && !end.hasTime();
                $("#date").val(moment(start).format("YYYY-MM-DD"));

                $(".antosubmit").on("click", function () {
                    var title = $("#title").val();
                    if (end) {
                        ended = end;
                    }

                    categoryClass = $("#event_type").val();

                    if (title) {
                        calendar.fullCalendar('renderEvent', {
                            title: title,
                            start: started,
                            end: end,
                            allDay: allDay
                        },
                                true // make the event "stick"
                                );
                    }

                    $('#title').val('');

                    calendar.fullCalendar('unselect');

                    $('.antoclose').click();

                    return false;
                });
            },
            eventClick: function (calEvent, jsEvent, view) {
                $('#fc_edit').click();
                $('#title2').val(calEvent.title);

                categoryClass = $("#event_type").val();

                $(".antosubmit2").on("click", function () {
                    calEvent.title = $("#title2").val();

                    calendar.fullCalendar('updateEvent', calEvent);
                    $('.antoclose2').click();
                });

                calendar.fullCalendar('unselect');
            },
            editable: true,
            events: [<?php

    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    if (is_array($sch)) {

        foreach ($sch as $loop) {
            $mydate = $loop->date;
            $prior = $loop->priority;
            $days = $loop->period;

            $informations = '' . $loop->startTime . ': ' . clean($loop->details);
            $informations .= 'A/T:';
            $informations .= $loop->name . ' ';
            $d = (int) date("d", strtotime($mydate));
            $m = (int) date("m", strtotime($mydate)) - 1;
            $y = (int) date("Y", strtotime($mydate));

            switch ($prior) {
                case High:
                    $className = 'label-important';
                    break;
                case Medium:
                    $className = 'label-success';
                    break;
                case Low:
                    $className = 'label-grey';
                    break;
                case File:
                    $className = 'label-blue';
                    break;
            }
            ?>
                        {
                            title: '<?php echo $informations . '-' . $loop->name . '-' . ' ' . $loop->contact . '-' . $loop->email; ?>',
                            start: new Date(<?php echo $y; ?>, <?php echo $m; ?>, <?php echo $d; ?>),
                            className: '<?php echo $className; ?>'

                        },
        <?php
    }
}
?>]
        });
    });
</script>
<script>
    $(document).ready(function () {

        $('.date-picker').datepicker().next().on(ace.click_event, function () {
            $(this).prev().focus();
        });
        $('#id-date-range-picker-1').daterangepicker().prev().on(ace.click_event, function () {
            $(this).next().focus();
        });

        $('#timepicker1').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false
        })
        $('#colorpicker1').colorpicker();
        $('#simple-colorpicker-1').ace_colorpicker();

    });
</script>
<script type="text/javascript">


    function myformatter(date) {
        var y = date.getFullYear();
        var m = date.getMonth() + 1;
        var d = date.getDate();
        return y + '-' + (m < 10 ? ('0' + m) : m) + '-' + (d < 10 ? ('0' + d) : d);
    }
    function myparser(s) {
        if (!s)
            return new Date();
        var ss = (s.split('-'));
        var y = parseInt(ss[0], 10);
        var m = parseInt(ss[1], 10);
        var d = parseInt(ss[2], 10);
        if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
            return new Date(y, m - 1, d);
        } else {
            return new Date();
        }
    }

</script>

 
  





