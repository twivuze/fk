<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Repayment Invoice</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="/assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="/assets/web/assets/mobirise-icons2/mobirise2.css">
    <link rel="stylesheet" href="/assets/facebook-plugin/style.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/assets/tether/tether.min.css">
    <link rel="stylesheet" href="/assets/dropdown/css/style.css">
    <link rel="stylesheet" href="/assets/animatecss/animate.min.css">
    <link rel="stylesheet" href="/assets/theme/css/style.css">
    <link rel="stylesheet" href="/assets/gallery/style.css">
    <link rel="stylesheet" href="/assets/socicon/css/styles.css">
    <link rel="preload" as="style" href="/assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="/assets/mobirise/css/mbr-additional.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php 

 $repayment = App\Models\Repayment::where('repay_code',$code)
->where('status','successful')->where('did_repay',true)->first();
$repaymentExist = App\Models\Repayment::where('repay_code',$code)->first();
?>

<body class="hold-transition login-page">
    <section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

        <div class="container mt-5">
            <div class="media-container-row">
                <div class="title col-12 col-md-6">
                    <div class="login-box container">
                        <div class="login-logo text-center">
                            <a href="/">
                                <img src="/assets/images/a-122x30.png" alt="All Trust Consult" title=""
                                    style="width:200px;height:auto">
                            </a>
                        </div>

                        <!-- /.login-logo -->
                        <?php 
                        if($repaymentExist){
                        if(!$repayment){ ?>
                        <div class="login-box-body">
                            <hr>
                            <p class="login-box-msg">
                            <h1>Enterprise: {{ $repaymentExist->repayer }}</h1>
                            <h2>Repayment Invoice of {{ $repaymentExist->currency }} {{ $repaymentExist->total_amount }}</h2></p>
                            <p class="login-box-msg"></p>

                            <form method="post" action="{{ url('/repayments') }}">
                                @csrf
                                <input type="hidden" name="id"  value="{{ $repaymentExist->id }}">
                                <input type="hidden" name="total_amount"  value="{{ $repaymentExist->total_amount }}">
                           

                                <div class="form-group has-feedback {{ $errors->has('amount') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" name="amount" disabled="true" value="{{ $repaymentExist->total_amount }}"
                                        placeholder="Amount">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="row">

                                    <div class="form-group col-12">
                                        <button type="submit" style="margin-left:-1px"
                                            class="mr-3 btn btn-primary btn-block btn-flat">Repay</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>


                        </div>
                        <?php }else{ ?>
                           
                    <div class="alert alert-info alert-dismissible fade show mt-5 ml-5 text-center title"
                        role="alert">
                        <p>
                        Invoice Repaid
                        </p>
                    </div>
                    
                        <?php }
                        }else{
                        ?>
  <div class="alert alert-warning alert-dismissible fade show mt-5 ml-5 text-center title"
                        role="alert">
                        <p>
                        Invoice Not Found
                        </p>
                    </div>
                        <?php } ?>
                        <!-- /.login-box-body -->
                    </div>


                </div>
            </div>
        </div>
    </section>

    <!-- /.login-box -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });

    </script>
</body>

</html>
