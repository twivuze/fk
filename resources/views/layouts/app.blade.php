<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>All Trust Consult</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    <script src="https://cdn.tiny.cloud/1/dc3qfuqt55rrl2yp1i22827v9l0hh91figeq4aiya3dnbr9c/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

    <link rel="stylesheet" href="css/style.css">

  <script>tinymce.init({selector:'#textarea'}); tinymce.init({selector:'#textarea2'});</script>

    @yield('css')
</head>

<body class="skin-green sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <b>All Trust Consult</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                
                <b style="color:#fff;position:relative;top:15px">{{Auth::user()->type}}</b>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="/images/logo.png"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="/images/logo.png" style="width:80px;height:80px"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                    {{Auth::user()->type}}
                                        
                                        <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2020 <a href="#">All Trust Consult</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                All Trust Consult
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

<script src="/js/dropzone.js"></script>

<script type="text/javascript">
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
                window.location.reload();
            },
            error: function(file, response)
            {
               return false;
            }
};


</script>

<script language="javascript">
    var popupWindow = null;

    function centeredPopup(url, winName, w, h, scroll) {
        LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
        TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
        settings =
            'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll +
            ',resizable,status=yes,toolbar=no, menubar=no, location=no, addressbar=no, '
        popupWindow = window.open(url, winName, settings);


        return popupWindow.focus();;
    }


$("#change_response_code").html("");
let _enterprise=null;
let funds=0;
let totalFunds=0;
let choosenType=null;

function fundType(val) {
    choosenType=val;
    $("#change_response_code").html("");
    $("#current_code").val("");
    
    $(".InternalFunder").hide();
    $(".showBox").show();

}
//gracePeriod
function transferType(val) {
    $("#change_response_code").html("");
    $("#current_code").val("");
    
        choosenType=val;
    $(".Transfer").hide();
    $(".showBox").show();
   

}


function gracePeriod(val) {
    if(val=='Yes'){
        $(".grace_period").show();   
    }else{
        $(".grace_period").hide();    
    }

}

function remainFund(val){

    if(val){
        let remain=funds-val;
       
        if(remain < 0){
            remain=funds;
            $(".funds").val(funds);
        }
        $(".remainfunds").html(`<h3 style="margin-left:15px"> Remaining Fund(s): ${_enterprise.currency?_enterprise.currency:'Rwf'} `+(remain)+'</h3>');
    }else{
        $(".remainfunds").html(`<h3 style="margin-left:15px"> Remaining Fund(s): ${_enterprise.currency?_enterprise.currency:'Rwf'} `+funds+'</h3>');
    }
    

}
function findEnterprise(value,div) {
        $("#change_response_code").html("");
        $("#currency").val("");
        $("#enterprise_id").val("");
        $("."+div).hide();
        let current_code = value;
        
        $("#change_response_code").html("Wait while processing ...");
	
	    if(current_code === ''){
	        $("#change_response_code").html("<span style = 'color: red'>Current Code is required</span>");
	        return;
		}
	
	    $.ajax({
			url : '/find-enterprise',
			method : 'GET',
			data : {
                current_code : current_code,
                choosenType:choosenType
			},
			success : function (response) {
				if(response.status==true){
                    $("."+div).show();
                    $(".funds").val(0);
                    $("#currency").val(response.enterprise.currency?response.enterprise.currency:'Rwf');
                   $("#enterprise_id").val(response.enterprise.id);
                   $("#code").val(response.enterprise.code);
                   $("#enterprise").val(response.enterprise.business_name?response.enterprise.business_name:name);
                   if(div=='InternalFunder'){
                    // fundType('Loan');
                   }
                   _enterprise=response.enterprise;
                   funds=0;
                   if(choosenType=='Loan'){
                    funds= response.enterprise.lender_initial_target-response.amountLend-response.amountInternalFunds;
                    totalFunds=parseFloat(response.amountLend)+parseFloat(response.amountInternalFunds);
                   }else{
                     funds= response.enterprise.donor_initial_target-response.amountDonate-response.amountInternalFunds;
                     totalFunds=parseFloat(response.amountDonate)+parseFloat(response.amountInternalFunds);
                   }
                   $(".funds").val(funds);
                   $(".btn-primary").removeClass('hidden');
                   $(".funds").removeClass('hidden');
                   if(funds <= 0){
                   
                    $(".funds").addClass('hidden');
                    $(".btn-primary").addClass('hidden');
                   }
                   $(".remainfunds").html(`<h3 style="margin-left:15px">   Remaining Fund(s): ${response.enterprise.currency?response.enterprise.currency:'Rwf'} ${funds}</h3>, <h3 style="margin-left:15px">   Total Fund(s): ${response.enterprise.currency?response.enterprise.currency:'Rwf'} ${totalFunds}/${choosenType=='Loan'?response.enterprise.lender_initial_target:response.enterprise.donor_initial_target}</h3>`);

                   $("#change_response_code").html("");
                    $("#change_response_code").html(`
                    <table class="table">
                    <tr>
                    <th>Enterprise</th>
                    <th>Loan initial target</th>
                    <th>Donor initial target</th>
                    <th>Loan received</th>
                    <th>Donation received</th>
                    <th>Action</th>
                    </tr>
                    <tr>
                    <th>${response.enterprise.business_name?response.enterprise.business_name:name}</th>
                    <th>${response.enterprise.currency?response.enterprise.currency:'Rwf'} ${response.enterprise.lender_initial_target}</th>
                    <th>${response.enterprise.currency?response.enterprise.currency:'Rwf'}  ${response.enterprise.donor_initial_target}</th>
                    <th>${response.enterprise.currency?response.enterprise.currency:'Rwf'}  ${response.amountLend}</th>
                    <th>${response.enterprise.currency?response.enterprise.currency:'Rwf'}  ${response.amountDonate}</th>
                    <th>   <a href="/loanApplications/${response.enterprise.id}/edit" target="_blank" class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-eye-open"></i> Edit
                    </a></th>
                    </tr>
                    </table>
                    `);
					
				}else{
                    $("."+div).hide();
					$("#change_response_code").html("<span style = 'color: red'>"+response.message+"</span>");
				}
				

            }, error : function (e, d) {
				$("#change_response_code").html(JSON.stringify(e));
            }
		})
    };

    function viewEnterprise(value,div) {
        $("#change_response_code").html("");
        $("#currency").val("");
        $("#enterprise_id").val("");
        $("."+div).hide();
        let current_code = value;
        
        $("#change_response_code").html("Wait while processing ...");
        //remainfunds
        $(".remainfunds").html("");
	    if(current_code === ''){
	        $("#change_response_code").html("<span style = 'color: red'>Current Code is required</span>");
	        return;
		}
	
	    $.ajax({
			url : '/find-enterprise',
			method : 'GET',
			data : {
                current_code : current_code,
                choosenType:choosenType
			},
			success : function (response) {
				if(response.status==true){
                    $("."+div).show();
                    $(".funds").val(0);
                    $("#currency").val(response.enterprise.currency?response.enterprise.currency:'Rwf');
                   $("#enterprise_id").val(response.enterprise.id);
                   $("#code").val(response.enterprise.code);
                   $("#enterprise").val(response.enterprise.business_name?response.enterprise.business_name:name);
                   if(div=='InternalFunder'){
                    // fundType('Loan');
                   }
                   _enterprise=response.enterprise;
                   funds=0;
                   if(choosenType=='Loan'){
                    funds= response.enterprise.lender_initial_target-response.amountLend-response.amountInternalFunds;
                    totalFunds=parseFloat(response.amountLend)+parseFloat(response.amountInternalFunds)-parseFloat(response.amountTransfered);;
                   }else{
                     funds= response.enterprise.donor_initial_target-response.amountDonate-response.amountInternalFunds;
                     totalFunds=parseFloat(response.amountDonate)+parseFloat(response.amountInternalFunds)-parseFloat(response.amountTransfered);
                   }
                   $(".funds").val(totalFunds);
                   $(".btn-primary").removeClass('hidden');
                   $(".funds").removeClass('hidden');
                   if(totalFunds <= 0){
                   
                    // $(".funds").addClass('hidden');
                    $(".btn-primary").addClass('hidden');
                   }
                   $(".remainfunds").html(`<h3 style="margin-left:15px">   Remaining Fund(s): ${response.enterprise.currency?response.enterprise.currency:'Rwf'} ${funds}</h3>, <h3 style="margin-left:15px">   Total Fund(s): ${response.enterprise.currency?response.enterprise.currency:'Rwf'} ${totalFunds}/${choosenType=='Loan'?response.enterprise.lender_initial_target:response.enterprise.donor_initial_target}</h3>`);

                   $("#change_response_code").html("");
                    $("#change_response_code").html(`
                    <table class="table">
                    <tr>
                    <th>Enterprise</th>
                    <th>Loan initial target</th>
                    <th>Donor initial target</th>
                    <th>Loan received</th>
                    <th>Donation received</th>
                    <th>Action</th>
                    </tr>
                    <tr>
                    <th>${response.enterprise.business_name?response.enterprise.business_name:name}</th>
                    <th>${response.enterprise.currency?response.enterprise.currency:'Rwf'} ${response.enterprise.lender_initial_target}</th>
                    <th>${response.enterprise.currency?response.enterprise.currency:'Rwf'}  ${response.enterprise.donor_initial_target}</th>
                    <th>${response.enterprise.currency?response.enterprise.currency:'Rwf'}  ${response.amountLend}</th>
                    <th>${response.enterprise.currency?response.enterprise.currency:'Rwf'}  ${response.amountDonate}</th>
                    <th>   <a href="/loanApplications/${response.enterprise.id}/edit" target="_blank" class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-eye-open"></i> Edit
                    </a></th>
                    </tr>
                    </table>
                    `);
					
				}else{
                    $("."+div).hide();
					$("#change_response_code").html("<span style = 'color: red'>"+response.message+"</span>");
				}
				

            }, error : function (e, d) {
				$("#change_response_code").html(JSON.stringify(e));
            }
		})
    };
    $(document).ready(function() {
    
    $('[data-toggle=offcanvas]').click(function() {
      $('.row-offcanvas').toggleClass('active');
    });
    
  });
</script>

    @stack('scripts')
</body>
</html>