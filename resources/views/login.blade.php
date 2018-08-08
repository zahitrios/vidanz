<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Vidanz CRM</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="icon" href="/assets/img/favicon.png" >

    <link rel="stylesheet" type="text/css" href="/assets/admin-tools/admin-forms/css/admin-forms.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="/assets/skin/default_skin/css/theme.css">

        <!--[if lt IE 10]>
            <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
            <script src="js/html5shiv.min.js"></script>
        <![endif]-->
  </head>
  
  <!-- Start: Main-->
  <div id="main">
    
    <!-- Start: Content-Wrapper-->
    <section id="content_wrapper" class="wrapperLogin">
     
      <!-- Begin: Content-->
      <section id="content" class="table-layout animated fadeIn">
        <!-- begin: .tray-center-->
        <div class="tray tray-center">
          <div>
            <!-- Begin: Content Header-->
            <div class="content-header">              
              <img src="/assets/img/logoVidanz.png" class="logoGaltMediano" />
              <h2 class="white">Bienvenido a Vidanz CRM</h2>
            </div>

            <div class="tab-content mw900 center-block center-children center-block-login">
                
                <!-- MUESTRO LOS ERRORES QUE PUEDA HABER EN LOGIN -->                                
                <div id="alert-demo-1" class="alert alert-info light alert-dismissable" style="display:{{$errorDisplay}};">
                    <span style="display:{{$displayErrorUsuario}};">{{ $errors->first('usuario') }}</span>
                    <span style="display:{{$displayErrorPassword}};">{{ $errors->first('password') }}</span>                  
                    <span style="display:{{$displayErrorGeneral}};">{{ $errors->first('general') }}</span>
                </div>
                
              
        
              <div id="login2" role="tabpanel" class="admin-form theme-primary tab-pane active">
                
                <div class="panel panel-primary">
                
                  {{ Form::open(array('url' => 'login')) }}                  
                    <div class="panel-body p25 pt10">
                      <div class="section row">
                       

                        <div class="col-md-12">
                          <div class="section-divider mv40"><span>Login</span></div>
                          <!-- .tagline-->
                          <div class="section">
                            <label for="usuario" class="field prepend-icon">
                              <input id="usuario" type="text" name="usuario" placeholder="Usuario" class="gui-input">
                              <label for="usuario" class="field-icon"><i class="fa fa-user" style="font: normal normal normal 14px/1 FontAwesome;"></i></label>
                            </label>
                          </div>
                          <div class="section">
                            <label for="password" class="field prepend-icon">
                              <input id="password" type="password" name="password" placeholder="Password" class="gui-input">
                              <label for="password" class="field-icon"><i class="fa fa-lock" style="font: normal normal normal 14px/1 FontAwesome;"></i></label>
                            </label>
                          </div>                          
                            <button type="submit" class="button btn-primary botonAzul"> Aceptar </button>
                        </div>

                      </div>
                    </div>
                    
                  {{ Form::close() }}


                </div>
              </div>
              
              
            </div>
          </div>
        </div>
      </section>
    </section>    
  </div>

  <style>
    /* demo page styles */
    .admin-form .panel.heading-border:before,
    .admin-form .panel .heading-border:before {
      transition: all 0.7s ease;
    }
  </style>
  <!-- core scripts-->
  <script src="plugins/core.min.js"></script>
  <!-- Theme Javascript-->
  <script src="/assets/js/utility/utility.js"></script>
  <script src="/assets/js/demo/demo.js"></script>
  <script src="/assets/js/main.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function () {
      "use strict";
      // Init Theme Core
      Core.init();
      // Init Demo JS
      Demo.init();
      // Demo code - active navigation btns
      $('.animation-nav').click(function () {
        $('.animation-nav').removeClass('btn-primary').addClass('btn-default');
        $(this).addClass('btn-primary');
      });
      // Form switcher nav
      var formSwitches = $('.admin-form-list a');
      formSwitches.on('click', function () {
        formSwitches.removeClass('item-active');
        $(this).addClass('item-active')
        if ($(this).attr('href') === "#contact3") {
          setTimeout(function () {
            initialize();
          }, 100);
        }
      });
    });


    function onLoginGoogle() {
        localStorage.clear();
        window.location = "https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=offline&client_id=417449319852-i66nq6umu3mf9st9akt4mckjo9g190sf.apps.googleusercontent.com&redirect_uri={{$urlApp}}/loginG&state&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile&approval_prompt=auto&include_granted_scopes=true";
    }    
    $(document).ready(function () {

    });

  </script>
</html>