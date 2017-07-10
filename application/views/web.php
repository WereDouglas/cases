<!doctype html>
<?php
$jan = 0;
$feb = 0;
$mar = 0;
$apr = 0;
$may = 0;
$jun = 0;
$jul = 0;
$aug = 0;
$sept = 0;
$oct = 0;
$nov = 0;
$dec = 0;

$jan2 = 0;
$feb2 = 0;
$mar2 = 0;
$apr2 = 0;
$may2 = 0;
$jun2 = 0;
$jul2 = 0;
$aug2 = 0;
$sept2 = 0;
$oct2 = 0;
$nov2 = 0;
$dec2 = 0;

$jan3 = 0;
$feb3 = 0;
$mar3 = 0;
$apr3 = 0;
$may3 = 0;
$jun3 = 0;
$jul3 = 0;
$aug3 = 0;
$sept3 = 0;
$oct3 = 0;
$nov3 = 0;
$dec3 = 0;

if (is_array($payments_year) && count($payments_year)) {
    foreach ($payments_year as $loop) {

        if (date("m", strtotime($loop->date)) == "1") {
            $jan = $jan + 1;
        }
        if (date("m", strtotime($loop->date)) == "2") {
            $feb = $feb + 1;
        }
        if (date("m", strtotime($loop->date)) == "3") {
            $mar = $mar + 1;
        }
        if (date("m", strtotime($loop->date)) == "4") {
            $apr = $apr + 1;
        }
        if (date("m", strtotime($loop->date)) == "5") {
            $may = $may + 1;
        }
        if (date("m", strtotime($loop->date)) == "6") {
            $jun = $jun + 1;
        }
        if (date("m", strtotime($loop->date)) == "7") {
            $jul = $jul + 1;
        }
        if (date("m", strtotime($loop->date)) == "8") {
            $aug = $aug + 1;
        }
        if (date("m", strtotime($loop->date)) == "9") {
            $sep = $sep + 1;
        }
        if (date("m", strtotime($loop->date)) == "10") {
            $oct = $oct + 1;
        }
        if (date("m", strtotime($loop->date)) == "11") {
            $nov = $jan + 1;
        }
        if (date("m", strtotime($loop->date)) == "12") {
            $dec = $dec + 1;
        }
    }
    // echo $march.'<br>';
    //  echo $jan.'<br>';
}


if (is_array($clients) && count($clients)) {
    foreach ($clients as $loop) {

        if (date("m", strtotime($loop->created)) == "1") {
            $jan2 = $jan2 + 1;
        }
        if (date("m", strtotime($loop->created)) == "2") {
            $feb2 = $feb2 + 1;
        }
        if (date("m", strtotime($loop->created)) == "3") {
            $mar2 = $mar2 + 1;
        }
        if (date("m", strtotime($loop->created)) == "4") {
            $apr2 = $apr2 + 1;
        }
        if (date("m", strtotime($loop->created)) == "5") {
            $may2 = $may2 + 1;
        }
        if (date("m", strtotime($loop->created)) == "6") {
            $jun2 = $jun2 + 1;
        }
        if (date("m", strtotime($loop->created)) == "7") {
            $jul2 = $jul2 + 1;
        }
        if (date("m", strtotime($loop->created)) == "8") {
            $aug2 = $aug2 + 1;
        }
        if (date("m", strtotime($loop->created)) == "9") {
            $sep2 = $sep2 + 1;
        }
        if (date("m", strtotime($loop->created)) == "10") {
            $oct2 = $oct2 + 1;
        }
        if (date("m", strtotime($loop->created)) == "11") {
            $nov2 = $jan2 + 1;
        }
        if (date("m", strtotime($loop->created)) == "12") {
            $dec2 = $dec2 + 1;
        }
    }
    // echo $march.'<br>';
    //  echo $jan.'<br>';
}
if (is_array($files) && count($files)) {
    foreach ($files as $loop) {

        if (date("m", strtotime($loop->created)) == "1") {
            $jan3 = $jan3 + 1;
        }
        if (date("m", strtotime($loop->created)) == "2") {
            $feb3 = $feb3 + 1;
        }
        if (date("m", strtotime($loop->created)) == "3") {
            $mar3 = $mar3 + 1;
        }
        if (date("m", strtotime($loop->created)) == "4") {
            $apr3 = $apr3 + 1;
        }
        if (date("m", strtotime($loop->created)) == "5") {
            $may3 = $may3 + 1;
        }
        if (date("m", strtotime($loop->created)) == "6") {
            $jun3 = $jun3 + 1;
        }
        if (date("m", strtotime($loop->created)) == "7") {
            $jul3 = $jul3 + 1;
        }
        if (date("m", strtotime($loop->created)) == "8") {
            $aug3 = $aug3 + 1;
        }
        if (date("m", strtotime($loop->created)) == "9") {
            $sep3 = $sep3 + 1;
        }
        if (date("m", strtotime($loop->created)) == "10") {
            $oct3 = $oct3 + 1;
        }
        if (date("m", strtotime($loop->created)) == "11") {
            $nov3 = $jan3 + 1;
        }
        if (date("m", strtotime($loop->created)) == "12") {
            $dec3 = $dec3 + 1;
        }
    }
    // echo $march.'<br>';
    //  echo $jan.'<br>';
}
?>  

<html>
    <head>
        <meta charset="utf-8">
        <title>Case Professional</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="Case professional">
        <meta name="keywords" content="key1,key2">

        <link rel="stylesheet" href="nivo-slider/default/default.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="nivo-slider/default/nivo-slider.css" type="text/css" media="screen" />

        <link href="<?= base_url(); ?>web/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>web/css/custom.css" rel="stylesheet">
        <script src="<?= base_url(); ?>web/js/respond.js"></script>
        <link rel=icon href="<?= base_url(); ?>images/favicon.ico">
        <link rel="shortcut icon" href="<?= base_url(); ?>images/favicon.ico">
    </head>

    <body>
        <header class="row">
            <div class="container">
                <h1>Case professional</h1> <img height="50px" width="50px" src="<?= base_url(); ?>images/cp_logo.png" alt="" />
                <?php echo $this->session->flashdata('msg'); ?>
                <nav class="navbar pull-right">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#home">Home</a></li>
                            <li><a href="#clients">Clients</a></li>
                            <li><a href="#team">Team</a></li>
                            <li><a href="#contact">Contact</a></li>

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><p class="navbar-text">Already have an account?</p></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                                <ul id="login-dp" class="dropdown-menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php echo $this->session->flashdata('msg'); ?>                                              
                                                <form id="station-form" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/home/login'  method="post">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputEmail2">Contact</label>
                                                        <input  class="form-control" name="emails" id="emails" placeholder="Contact" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                        <input type="password" class="form-control" name="passwords"  id="passwords" placeholder="Password" required>
                                                        <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> keep me logged-in
                                                        </label>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="bottom text-center">
                                                New here ? <a href="<?php echo base_url(); ?>index.php/home/registration"><b>Join Us</b></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        </ul>
                    </div>
                </nav> <!--nav-->
            </div> <!-- end container -->
        </header>


        <!--################################################-->
        <div id="heroArea" class="clearfix">
            <div class="container">
                <div id="myCarousel" class="carousel slide  col-md-6 col-sm-6 col-xs-12 pull-lef">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                        <li data-target="#myCarousel" data-slide-to="5"></li>
                    </ol>
                    <section class="carousel-inner">
                        <div class="active item"><img src="<?= base_url(); ?>/web/images/casepro_home.JPG" alt="" />
                            <div class="carousel-caption">
                                <p>Practice and case management software</p>
                            </div>
                        </div>
                        <div class="item"><img src="<?= base_url(); ?>/web/images/desktop.JPG" alt="" />
                            <div class="carousel-caption">
                                <p>
                                    Client and case  management</p>
                            </div>
                        </div>                        
                        <div class="item"><img src="<?= base_url(); ?>/web/images/desktopclient.JPG" alt="" />
                            <div class="carousel-caption">
                                <p>Time sheets and calendars</p>
                            </div>
                        </div>
                        <div class="item">
                            <a href=""><img src="<?= base_url(); ?>web/images/Capture2.JPG" alt="" /></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="<?= base_url(); ?>web/images/Capture3.JPG" alt="" /></a>
                        </div>
                    </section>
                    <a href="#myCarousel" class="left carousel-control glyphicon glyphicon-chevron-left" data-slide="prev"  ></a>
                    <a href="#myCarousel" class="right carousel-control glyphicon glyphicon-chevron-right" data-slide="next" ></a>
                </div>
                <h3>CASE PROFESSIONAL</h3>
                <h4>About</h4>
                <p>Practice and case management software provides attorneys with a convenient method of effectively managing client and case information, including contacts, calendaring, documents, and other specifics by facilitating automation in law practices. It can be used to share information with other attorneys in the firm and will help prevent having to enter duplicate data in conjunction with billing programs and data processors. Many programs link with personal digital assistants (PDAs) so that calendars and schedules are always handy. Some case management packages are Web-based, with more on the way, allowing anytime access to all features<br>
                </p>
                <a href="<?php echo base_url(); ?>index.php/home/registration" class="btn">try it now</a>
            </div>
        </div>
        <!--################################################-->
        <section class="container" id="four_cols">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <img src="<?= base_url(); ?>web/_images/b_icon.png" alt="" />
                <h2>Case & File  Management</h2>
                <p>Information on all of your cases and matters is accessible through a centralized database; Manages to-do lists; Fast & flexible searching; Conflicts of interest checking; Checks statue of limitations.</p>

                <a href="#" class="btn btn-default">Read more</a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <img src="<?= base_url(); ?>web/_images/b_icon_13.png" alt="" />
                <h2>Billing,Finance & Expense Management</h2>
                <p>Records billable time on an hourly, contingent, transactional, or user defined fee individually or firm-wide; Links to time, billing, and accounting programs.</p>

                <a href="#" class="btn btn-default">Read more</a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <img src="<?= base_url(); ?>web/_images/b_icon_15.png" alt="" />
                <h2>Calendaring & Docketing</h2>
                <p>Allows staff to view tasks, deadlines, appointments, and meetings by day, week, month, or year; Calculates calendar dates; Schedules appointments and meetings</p>

                <a href="#" class="btn btn-default">Read more</a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <img src="<?= base_url(); ?>web/_images/b_icon_17.png" alt="" />
                <h2>Document Assembly</h2>
                <p>Case profession helps organise and arrange files on your local computer and manage your cloud back up storage on google cloud storage.</p>

                <a href="#" class="btn btn-default">Read more</a>
            </div>

        </section>
        <section id="usage" class="container">
            <h3>Usage statistics</h3>
            <div id="mainb" style="height:250px;" class= "col-md-12"></div>
        </section>
        <!--################################################-->
        <section id="team" class="container">
            <h3>Team</h3>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="wrapper"><img src="<?= base_url(); ?>web/images/douglaswere.jpg" alt="" />
                    <h4>Were Douglas</h4>
                    <p>CTO & software developer</p>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="wrapper"><img height="173" width="143" src="<?= base_url(); ?>web/images/Margaret Nanyombi.png" alt="" />
                    <h4>Margaret Nanyombi</h4>
                    <p>Systems & Business  Analyst</p>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="wrapper"><img height="173" width="173" src="<?= base_url(); ?>web/images/DSC_2234.jpg" alt="" />
                    <h4>Paul Mwaga </h4>
                    <p>QA Manager </p>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="wrapper"><img height="173" width="153" src="<?= base_url(); ?>web/images/developper.jpg" alt="" />
                    <h4>John doe</h4>
                    <p>Developer</p>

                </div>
            </div>


        </section>
        <!--################################################-->
        <section id="clients" class="container clearfix">
            <h3>Our clients</h3>
            <hr />
            <?php
            //var_dump($expenses);
            $count = 1;
            foreach ($orgs as $loop) {
                ?> 
                <div class="col-md-2 col-sm-4 col-xs-12">
                    <img class="client_img" src="data:image/jpeg;base64,<?php echo $loop->image; ?>" alt="<?php echo $loop->name; ?>" />';


                </div>
                <?php
            }
            ?>

        </section>
        <!--################################################-->
        <footer class="row">
            <div class="container">
                <div  class="col-md-3 col-sm-6 col-xs-12">
                    <h3>Features</h3>

                    <div class=" col-md-12 label label-default">Messaging</div>
                    <div class="col-md-12 label label-primary">Reminders</div>
                    <div class=" col-md-12 label label-success">Analytics</div>
                    <div class="col-md-12 label label-info">Time sheets</div>
                    <div class="col-md-12 label label-warning">Mobile App</div>
                    <div class="col-md-12 label label-danger"><a href="<?php echo base_url() . "file/Case%20professional.msi"; ?>"><i class="fa fa-laptop" style="color:#ffff"></i> Windows Desktop application</a></div>
                </div>
                <div  class="col-md-3 col-sm-6 col-xs-12">
                    <h3>Latest Templates</h3>
                    <?php
                    foreach ($docs as $loop) {
                        ?>  

                        <div class="one_tweet">
                            <p><?php echo $loop->name; ?>  </p>
                            <a href="<?php echo base_url() . "documents/" . $loop->file; ?>">DOWNLOAD</a>
                            <div class="date"><?php echo $loop->created; ?></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div  class="col-md-3 col-sm-6 col-xs-12" id="contact">
                    <h3>Contact us</h3>
                    <ul >                           
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url(); ?>web/_images/biliki-12grids_03.png" alt="" /><b>Mail us </b> </a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <form id="station-form" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/message/contact'  method="post">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail2">Your email</label>
                                                    <input type="email"  class="form-control" name="sender" id="sender" placeholder="Your email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword2">Message</label>
                                                    <textarea  class="form-control" name="message" placeholder="Message"  required></textarea>

                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">SEND</button>
                                                </div>

                                            </form>
                                        </div>                                            
                                    </div>
                                </li>

                            </ul>


                    </ul>
                    <p> <img src="<?= base_url(); ?>web/_images/biliki-12grids_03.png" alt="" /> admin@caseprofessional.org</p>
                    <p> <img src="<?= base_url(); ?>web/_images/biliki-12grids_06.png" alt="" /> Kampala,Uganda</p>
                    <p> <img src="<?= base_url(); ?>web/_images/biliki-12grids_10.png" alt="" /> +256-782-481-746</p>
                    <p> <img src="<?= base_url(); ?>web/_images/biliki-12grids_10.png" alt="" /> +256-752-336-721</p>

                    <p class="social_icons">
                        <a href=""><img src="<?= base_url(); ?>web/_images/f_twitter.jpg" alt=""></a>
                        <a href=""><img src="<?= base_url(); ?>web/_images/f_facebook.jpg" alt=""></a>
                        <a href=""><img src="<?= base_url(); ?>web/_images/f_gplus.jpg" alt=""></a></p>
                </div>
                <div  class="col-md-3 col-sm-6 col-xs-12">
                    <h3>Newsletter</h3>
                    <p>We will provide you with the latest updates to law library information</p>
                    <form id="station-form" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/message/mail'  method="post">
                        <input type="email" placeholder="your email" name="email" required="true" />
                        <input type="submit" class="btn"  value="join" />
                    </form>
                </div>
                <span class="clearfix"></span>
                <hr/>
                <div>
                    <span class="container">
                        Copyright 2016 by
                        <b>Vugaco</b>, all rights reserved
                        <span class="pull-right">Design by :
                            <a href="http://www.novariss.com">novariss.com</a></span>
                    </span></div>
            </div></footer>
        <!--################################################-->



        <!-- javascript -->
        <script src="<?= base_url(); ?>web/js/jquery-1.7.1.min.js"></script>
        <script src="<?= base_url(); ?>web/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $('#myCarousel').carousel({interval: 5000, cycle: true});
        </script>
    </body>
</html>
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
                    data: ['Messaging And events', 'Clients', 'Files'],
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
                        name: 'Messaging And Events',
                        type: 'bar',
                        data: [<?php echo $jan; ?>, <?php echo $feb; ?>, <?php echo $mar; ?>, <?php echo $apr; ?>, <?php echo $may; ?>,<?php echo $jun; ?>,<?php echo $jul; ?>, <?php echo $aug; ?>,<?php echo $sept; ?>, <?php echo $oct; ?>,<?php echo $nov; ?>, <?php echo $dec; ?>]
                    }, {
                        name: 'Clients',
                        type: 'bar',
                        data: [<?php echo $jan2; ?>, <?php echo $feb2; ?>, <?php echo $mar2; ?>, <?php echo $apr2; ?>, <?php echo $may2; ?>,<?php echo $jun2; ?>,<?php echo $jul2; ?>, <?php echo $aug2; ?>,<?php echo $sept2; ?>, <?php echo $oct2; ?>,<?php echo $nov2; ?>, <?php echo $dec2; ?>]
                    }, {
                        name: 'Files and cases',
                        type: 'line',
                        yAxisIndex: 1,
                        data: [<?php echo $jan3; ?>, <?php echo $feb3; ?>, <?php echo $mar3; ?>, <?php echo $apr3; ?>, <?php echo $may3; ?>,<?php echo $jun3; ?>,<?php echo $jul3; ?>, <?php echo $aug3; ?>,<?php echo $sept3; ?>, <?php echo $oct3; ?>,<?php echo $nov3; ?>, <?php echo $dec3; ?>]
                    }]
            });
</script>