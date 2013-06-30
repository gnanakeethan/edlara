<!DOCTYPE html>
<html>
    <head>
        <title>EdLara - SignUp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @stylesheets('bootstrap')
        @stylesheets('grans')      
    </head>
    <body>
        <div class="container-fluid" id='top-heading'>
            <div class="row-fluid" >
                <div id="clouds">
                    <div class="cloud x1"></div>
                    <div class="cloud x2"></div>
                    <div class="cloud x3"></div>
                    <div class="cloud x4"></div>
                    <div class="cloud x5"></div>
                </div>
                <span class="brand-name" id='top-header'>EdLara</span>
            </div>
        </div>
        <div class="navbar">
            <div class="navbar-inner"  id="main-nav">
                <div class="container-fluid">
                    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>

                    <!-- Everything you want hidden at 940px or less, place within here -->

                    <div class="nav-collapse collapse">
                        <!-- .nav, .navbar-search, .navbar-form, etc -->

                        <ul class="nav">
                            <li class="active">
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Getting Started</a>
                            </li>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Contact Us</a>
                            </li>
                            <li>
                                <a href="#">Tutorials</a>
                            </li>
                        </ul>
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Exams<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">How to do the Online Exams</a>
                                    </li>
                                    <li>
                                        <a href="#">Benefits of doing e-Exams</a>
                                    </li>
                                    <li>
                                        <a href="#">Something else here</a>
                                    </li>
                                    <li  class="divider"></li>
                                    <li>
                                        <a href="#">Separated link</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                        if ( ! Sentry::check()){
                                            echo "Login";
                                        }
                                        else{
                                            echo "Account";
                                        }
                                    ?>
                                    <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        if ( ! Sentry::check()){
                                            echo " <li class='loginbox'>";                                        
                                            echo Form::open(array('url' => 'login', 'method' => 'post'));

                                            //Echo FORM Label for Email address
                                            echo Form::label('email', 'E-Mail Address', array('class' => 'lbl-email-addr-login'));

                                            //Echo FORM Element for Email address
                                            echo Form::text('email', "", array('class' => 'email-addr-login', 'placeholder' => 'johndoe@example.com', 'autocomplete' => 'off'));

                                            //Echo FORM Label for Password address
                                            echo Form::label('password', 'Password', array('class' => 'lbl-pwd-login'));

                                            //Echo FORM Element for Password
                                            echo Form::password('password', "", array('class' => 'pwd-login', 'placeholder' => 'Password', 'autocomplete' => 'off'));

                                            echo "<br>";

                                            //Echo FORM Element for Submit
                                            echo Form::submit('Login', array('class' => 'btn btn-large btn-info btn-login'));

                                            echo Form::token();
                                            echo Form::close();
                                            echo "</li> <li><a href=\"/register\">Don't Have a Account!!!</a></li>";
                                        }
                                        else{
                                            echo "<li><a href='/logout'>Logout</a></li>";
                                        }
                                        ?>      
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class='container-fluid' >
            <div class='row-fluid' id="main-container">

                    <div class="registration-box offset1 span6" id="registration-box">
                        <div class="container-fluid">
                            
                    <?php
                        echo Form::open(['url'=> 'register','method'=>'post','id'=>'registration-form']);

                        // First Name and Last Name
                        echo "<div class=\"row-fluid\"><div class='span6'>";
                        echo Form::label('fname',"First Name *",array('class'=>'fname-reg-box-label'));
                        echo Form::text('fname',"",array('class'=>'fname-reg-box','placeholder'=>'John'));
                        echo "</div>";
                        echo "<div class='span6 pull-right'>";
                        echo Form::label('lname',"Last Name *",array('class'=>'lname-reg-box-label'));
                        echo Form::text('lname',"",array('class'=>'lname-reg-box','placeholder'=>'Doe'));
                        echo "</div></div>";

                        // Email Address
                        echo "<div class='row-fluid'><div class='span6'>";
                        echo Form::label('email',"Email Address *",array('class'=>'email-reg-box-label'));
                        echo Form::email('email',"",array('class'=>'email-reg-box','placeholder'=>'johndoe@example.com','required'));
                        echo "</div><div id=\"usercheck\"></div>";
                        echo "<div class='span6 pull-right'>";
                        echo Form::label('password',"Password *",array('class'=>'pwd-reg-box-label'));
                        echo Form::password('password','',array('class'=>'password-reg-box'));
                        echo '</div></div>';
                        
                        echo "<br><br>";

                        // Account Type.
                        echo "<div class=\"row-fluid\"><div class='offset1 span6'>";
                        echo Form::label('actype',"Acccount Type",array('class'=>'actype-reg-box-label pull-left','required'));
                        echo "</div>";
                        echo "<div class='span4'>";
                        echo Form::select('actype', array('S' => 'Student', 'T' => 'Teacher'), 'S',array('class'=>'actype-reg-box','name'=>'actype'));
                        echo "</div></div><br>* Required<br><br>";

                        echo Form::captcha();

                        echo "<div id='policy'>By Clicking Register . You Agree to our <a href=\"about/tos\"> Terms of Service </a> and <a href=\"about/privacy-policy\">Privacy Policy.</a></div>";
                        echo Form::submit('Register', array('value'=>'Register','class' => 'btn btn-info btn-register pull-right'));
                        
                        // Token
                        echo Form::token();   

                        // Close Form
                        echo Form::close();
                    ?>
                    </div>
                    </div>
                </div>            
            </div>
        {{-- Bootstrap JS Compiled --}}
        @javascripts('bootstrap')
        @javascripts('grans')
        <script type="text/javascript">
            $("#registration-form").validate({
                rules: {
                    fname: {
                        required: true,
                        minlength:3
                    },
                    lname: {
                        required: true,
                        minlength:3
                    },
                    username: {
                        required: true,
                        minlength:4
                    },
                    email: {
                        required: true,
                        minlength: 5
                    },
                    password:{
                        required: true,
                        minlength: 8,
                    },
                    captcha:{
                        required: true,
                        minlength:5,
                        maxlength:5
                    }
                }
                
                             
            });             
      
        </script>

    </body>
</html>                