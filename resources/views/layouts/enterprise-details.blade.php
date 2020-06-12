<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Enterprise</title>
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

<body style="background-color: #ecf0f5;">

    <div class="wrapper">
      
        <?php 
            $enterprise= \App\Models\LoanApplication::where('id',$id)->orderBy('id','DESC')->first();
            ?>
                 @include('analyitcs.enterprise',['enterprise'=>$enterprise])
 </div>



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