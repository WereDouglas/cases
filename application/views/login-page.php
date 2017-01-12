
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Awesome Landing Page by Creative Tim</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/landing-page.css" rel="stylesheet"/>

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    </head>
    <body class="landing-page landing-page1">
        <nav class="navbar navbar-transparent navbar-top navbar-fixed" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a href="http://www.creative-tim.com">
                        <div class="logo-container">
                            <div class="logo">
                                <img src="assets/img/banner.png">
                            </div>
                   
                        </div>
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="example" >
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#about">
                               
                                About
                            </a>
                        </li>
                        <li>
                            <a href="#features">
                                Features
                            </a>
                        </li>
        
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <div class="wrapper">
            <div class="parallax filter-gradient" data-color="blue">
                <div class="parallax-background">
                    <img class="parallax-background-image" src="assets/img/template/bg4.jpg">
                </div>
                <div class= "container">
                    <div class="row">
          
                        <div class="col-md-12">
                        
                            <div class="col-md-6 description col-md-offset-3">
              
                                <h4 class="header-text text-center">Login</h4>
                               
                                <form id="station-form" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/home/login'  method="post">
                                    
                                        <?php echo $this->session->flashdata('msg'); ?>
                                        <span class="input-group" >
                                            <input type="text" class="form-control" name="emails" placeholder="Email" required="" />
                                        </span>
                                        <span class="input-group">
                                            <input type="password" class="form-control" name="passwords" placeholder="Password" required="" />
                                            <p class="change_link"> <a class="reset_pass" href="#">Lost your password?</a></p>
                                            <p class="change_link">
                                                <a href="#signup" class="to_register"> Create Account </a>
                                            </p>

                                        </span>
                                        <span class="input-group" style="margin: 0px;">
                                            <button class="btn btn-success pull-right" type="submit">Log in</button><br>
                                        </span>
                  
                                    </form> 
                               
                            </div>
                 
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-gray section-clients" id="about">
                <div class="container text-center">
                    <h4 class="header-text">About Case pro</h4>
                    <p>
                        Practice and case management software provides attorneys with a convenient method of effectively managing client and case information, including contacts, calendaring, documents, and other specifics by facilitating automation in law practices. It can be used to share information with other attorneys in the firm and will help prevent having to enter duplicate data in conjunction with billing programs and data processors. Many programs link with personal digital assistants (PDAs) so that calendars and schedules are always handy. Some case management packages are Web-based, with more on the way, allowing anytime access to all features<br>
                    </p>

                </div>
            </div>
            
            
            <div class="section section-features " id="features">
                <div class="container">
                    <h4 class="header-text text-center">Features</h4>
                    <div class="row col-md-offset-2">
                        <div class="col-md-5">
                            <div class="card card-blue">
                                <div class="icon">
                                    <i class="pe-7s-note2"></i>
                                </div>
                                <div class="text">
                                    <h4>Case & File  Management</h4>
                                    <p>Information on all of your cases and matters is accessible through a centralized database; Manages to-do lists; Fast & flexible searching; Conflicts of interest checking; Checks statue of limitations.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card card-blue">
                                <div class="icon">
                                    <i class="pe-7s-bell"></i>
                                </div>
                                <h4>Time Tracking</h4>
                                <p>Records billable time on an hourly, contingent, transactional, or user defined fee individually or firm-wide; Links to time, billing, and accounting programs.</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card card-blue">
                                <div class="icon">
                                    <i class="pe-7s-graph1"></i>
                                </div>
                                <h4>Document Assembly</h4>
                                <p>Case profession helps organise and arrange files on your local computer and manage your cloud back up storage on google cloud storage.</p>
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="card card-blue">
                                <div class="icon">
                                    <i class="pe-7s-graph1"></i>
                                </div>
                                <h4>Calendaring & Docketing</h4>
                                <p>Allows staff to view tasks, deadlines, appointments, and meetings by day, week, month, or year; Calculates calendar dates; Schedules appointments and meetings</p>
                            </div>
                        </div>
                        
    
                    </div>
                </div>
            </div>
            

        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                About
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Features
                            </a>
                        </li>
 
                    </ul>
                </nav>

                </div>
                <div class="copyright">
                    &copy; 2016 <a href="#">Novariss</a>, made with love
                </div>
            </div>
        </footer>
        </div>

    </body>
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>
<script src="assets/js/awesome-landing-page.js" type="text/javascript"></script>
</html>
