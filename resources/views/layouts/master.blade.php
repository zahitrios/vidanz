<!DOCTYPE html>
<html lang="en">
  
  <head>
    <title>Vidanz CRM</title>

    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="icon" href="/assets/img/favicon.png" type="image/x-icon">
    
    <link rel="stylesheet" type="text/css" href="/assets/plugins/css/fullcalendar.css">    
    <link rel="stylesheet" type="text/css" href="/assets/admin-tools/admin-forms/css/admin-forms.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/skin/default_skin/css/theme.css">
        <!--[if lt IE 10]>
            <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
            <script src="js/html5shiv.min.js"></script>
        <![endif]-->
    
  </head>


  <body class="dashboard-page sb-l-o">

    <!--    
    <body> Helper Classes:
    '.sb-l-o' - Sets Left Sidebar to "open"
    '.sb-l-m' - Sets Left Sidebar to "minified"
    '.sb-l-c' - Sets Left Sidebar to "closed"
    '.sb-r-o' - Sets Right Sidebar to "open"
    '.sb-r-c' - Sets Right Sidebar to "closed"    
    -->

    <!-- INICIA EL TOOL BOX -->
    <!--
    <div id="skin-toolbox">

        <div class="panel">

            <div class="panel-heading">
                <span class="panel-icon">
                    <i class="fa fa-gear text-primary"></i>
                </span>
                <span class="panel-title"> Theme Options</span>
            </div>
            
            <div class="panel-body pn">
                <ul role="tablist" class="nav nav-list nav-list-sm pl15 pt10">
                    <li class="active"><a href="#toolbox-sidebar" role="tab" data-toggle="tab">Sidebar</a></li>
                    <li><a href="#toolbox-settings" role="tab" data-toggle="tab">Misc</a></li>
                </ul>

                <div class="tab-content p20 ptn pb15">
                    <div id="toolbox-sidebar" role="tabpanel" class="tab-pane active">
                        <form id="toolbox-sidebar-skin">
                            <h4 class="mv20">Sidebar Skins</h4>
                            <div class="skin-toolbox-swatches">
                                <div class="checkbox-custom fill mb5">
                                    <input id="sidebarSkin3" type="radio" name="sidebarSkin" checked="" value="">
                                    <label for="sidebarSkin3">Dark</label>
                                </div>
                                <div class="checkbox-custom fill checkbox-disabled mb5">
                                    <input id="sidebarSkin1" type="radio" name="sidebarSkin" value="sidebar-light">
                                    <label for="sidebarSkin1">Light</label>
                                </div>
                                <div class="checkbox-custom fill checkbox-light mb5">
                                    <input id="sidebarSkin2" type="radio" name="sidebarSkin" value="sidebar-light light">
                                    <label for="sidebarSkin2">Lighter</label>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div id="toolbox-settings" role="tabpanel" class="tab-pane">
                        <form id="toolbox-settings-misc">
                            <h4 class="mv20 mtn">Layout Options</h4>
                            <div class="form-group">
                                <div class="checkbox-custom fill mb5">
                                    <input id="sidebar-option" type="checkbox" checked="">
                                    <label for="sidebar-option">Fixed Sidebar</label>
                                </div>
                            </div>

                            <h4 class="mv20">Layout Options</h4>
                            <div class="form-group">
                                <div class="radio-custom mb5">
                                    <input id="fullwidth-option" type="radio" checked="" name="layout-option">
                                    <label for="fullwidth-option">Fullwidth Layout</label>
                                </div>
                            </div>

                            <div class="form-group mb20 pointer-events-none">
                                <div class="radio-custom radio-disabled mb5">
                                    <input id="boxed-option" type="radio" name="layout-option" disabled="">
                                    <label for="boxed-option">Boxed Layout<b class="text-muted">(Coming Soon)</b></label>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="form-group mn br-t p10"><a id="clearLocalStorage" href="#" class="btn btn-primary btn-block pb10 pt10">Clear LocalStorage</a></div>
            </div>
        </div>
    </div>
    -->
    <!-- FIN DE TOOL BOX -->

    <!-- MAIN-->
    <div id="main">

        <!--      
        "#sidebar_left" Helper Classes:

        * Positioning Classes:
        '.affix' - Sets Sidebar Left to the fixed position
        * Available Skin Classes:
        .sidebar-dark (default no class needed)
        .sidebar-light
        .sidebar-light.light      
        -->

        <!-- INICIA SIDEBAR -->
        <aside id="sidebar_left" class="nano nano-light affix sidebar-dark">
            
            <div class="navbar-branding">
                <a href="/" class="navbar-brand">
                    <img src="/assets/img/logoVidanz.png" class="logoGaltChico" />
                </a>
                <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
            </div>
            
            <div class="sidebar-left-content nano-content">
              <!-- Start: Sidebar Header-->
              <header class="sidebar-header">
                <!-- Sidebar Widget - Author-->
                <div class="sidebar-widget author-widget">
                  <div class="media"><a href="#" class="media-left"><img src="{{ Session::get('avatar') }}" class="img-responsive"></a>
                    <div class="media-body">
                      <div class="media-links"></div>
                      <div class="media-author">{{ Session::get('userName') }}</div>                      
                      <a href="/logout">Logout</a>
                    </div>
                  </div>
                </div>
                <!-- Sidebar Widget - Menu (slidedown)-->
                <div class="sidebar-widget menu-widget">
                  <div class="row text-center mbn">
                    <div class="col-xs-4"><a href="dashboard.html" data-toggle="tooltip" data-placement="top" title="Dashboard" class="text-primary"><span class="glyphicon glyphicon-home"></span></a></div>
                    <div class="col-xs-4"><a href="pages_messages.html" data-toggle="tooltip" data-placement="top" title="Messages" class="text-info"><span class="glyphicon glyphicon-inbox"></span></a></div>
                    <div class="col-xs-4"><a href="pages_profile.html" data-toggle="tooltip" data-placement="top" title="Tasks" class="text-alert"><span class="fa fa-asterisk"></span></a></div>
                  </div>
                  <div class="row text-center mbn">
                    <div class="col-xs-4"><a href="pages_timeline.html" data-toggle="tooltip" data-placement="top" title="Activity" class="text-system"><span class="fa fa-desktop"></span></a></div>
                    <div class="col-xs-4"><a href="pages_profile.html" data-toggle="tooltip" data-placement="top" title="Settings" class="text-danger"><span class="fa fa-gears"></span></a></div>
                    <div class="col-xs-4"><a href="pages_gallery.html" data-toggle="tooltip" data-placement="top" title="Cron Jobs" class="text-warning"><span class="fa fa-flask"></span></a></div>
                  </div>
                </div>
                <!-- Sidebar Widget - Search (hidden)-->
                <div class="sidebar-widget search-widget hidden">
                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input id="sidebar-search" type="text" placeholder="Search..." class="form-control">
                  </div>
                </div>
              </header>


                <!-- INICIA DE MENU LATERAL -->
                <ul class="nav sidebar-menu">
                    <li class="sidebar-label pt30">Menu</li>

                    @foreach(Session::get('menus') as $key => $menu)

                        @if(Route::currentRouteName() == strtolower($key))
                            <li class="active">
                        @else
                            <li>
                        @endif
                    
                            <a href="/{{ strtolower($key) }}">
                                <span class="fa {{$menu["class"]}} "></span>
                                <span class="sidebar-title">{{$menu["label"]}}</span>
                            </a>
                       </li>
                    @endforeach
                                        
                </ul>                
                <!-- FIN DE MENU LATERAL -->

            </div>
        </aside>
        <!-- FIN DE SIDEBAR -->
      

        <!-- INICIA CONTENT-WRAPPER-->
        <section id="content_wrapper">

            <!-- INICIA TOPBAR -->
            
            <header id="topbar" class="badges-mod alt">
                
                <div class="topbar-left">
                    <ol class="breadcrumb">                                          
                      <li><a href="#">MENU</a></li>                      
                      <li><a href="#">MENU</a></li>                      
                      <li><a href="#">MENU</a></li>                      
                    </ol>
                </div>

                <div class="topbar-right">

                    <!-- ICONO DE BUSCAR -->
                    <a href="#" class="topbar-icon">
                        <span class="fa fa-search"></span>
                    </a>
                    <!-- ICONO DE BUSCAR -->

                    <!-- ICONO BOTÓN CAMPANITA -->
                    <div class="topbar-icon-wrap ml40">                      
                        <button data-toggle="dropdown" class="topbar-icon dropdown-toggle">
                            <span class="badge badge-primary">5</span>
                            <span class="fa fa-bell va-m"></span>
                        </button>
                      
                        <div role="menu" class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn">
                            <div class="panel mbn">
                                <div class="panel-menu">
                                    <span class="panel-icon"><i class="fa fa-clock-o"></i></span><span class="panel-title fw600"> Recent Activity</span>
                                    <button type="button" class="btn btn-xs pull-right"><i class="fa fa-refresh"></i></button>
                                </div>
                                <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
                                    <ol class="timeline-list">
                                        <li class="timeline-item">
                                            <div class="timeline-icon bg-alert"><span class="fa fa-tags"></span></div>
                                            <div class="timeline-desc"><b>Michael</b> Added to his store:<a href="#">Ipod</a></div>
                                            <div class="timeline-date">1:25am</div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-icon bg-alert"><span class="fa fa-tags"></span></div>
                                            <div class="timeline-desc"><b>Sara</b> Added his store:<a href="#">Notebook</a></div>
                                            <div class="timeline-date">3:05am</div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-icon bg-success"><span class="fa fa-usd"></span></div>
                                            <div class="timeline-desc"><b>Admin</b> created invoice for:<a href="#">Software</a></div>
                                            <div class="timeline-date">4:15am</div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-icon bg-success"><span class="fa fa-usd"></span></div>
                                            <div class="timeline-desc"><b>Admin</b> created invoice for:<a href="#">Apple</a></div>
                                            <div class="timeline-date">7:45am</div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-icon bg-success"><span class="fa fa-usd"></span></div>
                                            <div class="timeline-desc"><b>Admin</b> created invoice for:<a href="#">Software</a></div>
                                            <div class="timeline-date">4:15am</div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-icon bg-success"><span class="fa fa-usd"></span></div>
                                            <div class="timeline-desc"><b>Admin</b> created invoice for:<a href="#">Apple</a></div>
                                            <div class="timeline-date">7:45am</div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-icon bg-alert"><span class="fa fa-tags"></span></div>
                                            <div class="timeline-desc"><b>Michael</b> Added his store:<a href="#">Ipod</a></div>
                                            <div class="timeline-date">8:25am</div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-icon bg-system"><span class="fa fa-fire"></span></div>
                                            <div class="timeline-desc"><b>Admin</b> created invoice for:<a href="#">Software</a></div>
                                            <div class="timeline-date">4:15am</div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-icon bg-alert"><span class="fa fa-tags"></span></div>
                                            <div class="timeline-desc"><b>Sara</b> Added to his store:<a href="#">Notebook</a></div>
                                            <div class="timeline-date">3:05am</div>
                                        </li>
                                    </ol>
                                </div>
                                <div class="panel-footer text-center p7"><a href="#" class="link-unstyled"> View All</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- ICONO BOTÓN CAMPANITA -->                    
            </header>
            
            <!-- FIN DE TOPBAR -->


            <!-- INICIA CONTENIDO PRINCIPAL -->
            <section id="content" class="table-layout animated fadeIn">
                <div class="tray tray-center">
                    @yield ('content')
                </div>
            </section>
            <!-- FIN DE CONTENIDO PRINCIPAL -->


            <!-- INICIA FOOTER -->
            <!--<footer id="content-footer" class="affix">
                <div class="row">
                    <div class="col-md-6"><span class="footer-legal">&copy; 2016. All Rights Reserved. Ruby Admin</span></div>
                    <div class="col-md-6 text-right"><span class="footer-meta">60GB of 350GB Free</span><a href="#content" class="footer-return-top"><span class="fa fa-angle-up"></span></a></div>
                </div>
            </footer>-->
            <!-- FIN DE FOOTER -->

        </section>
        <!-- FIN DE CONTENT-WRAPPER-->

      


    </div>
    <!-- FIN DE MAIN-->



    <script src="/assets/plugins/core.min.js"></script>
    <script src="/assets/js/utility/utility.js"></script>    
    <script src="/assets/js/main.js"></script>

    <!-- Widget Javascript-->
    <script src="/assets/js/demo/widgets.js"></script>

    <script type="text/javascript">
      jQuery(document).ready(function () {
        "use strict";
        
        
        // Init Theme Core
        Core.init();

        $(document).ready(function () {         
          $(window).trigger('resize');
        });
        
        
        
      });
    </script>
  </body>
</html>