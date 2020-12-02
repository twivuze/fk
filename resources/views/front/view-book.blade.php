<?php $book= \App\Models\Books::where('id',$id)->where('published',1)->orderBy('id','DESC')->first();
?>

@extends('front.layouts.app',
['title'=>$book?$book->title:'Book',
'description'=>$book?$book->description:'Book',
'icon' =>$book->cover?'/images/'.$book->cover:''
]
)

@section('content')

<script src="https://checkout.flutterwave.com/v3.js"></script>

<?php
if($book){

?>
<br> <br>



<section class="features17 cid-rYUhzEzUWQ bg-white" id="features17-2w">
    <div class="container">
        <div class="row m-5">
            <div class="card p-3 col-sm-4">
                <div class="book read">
                    <div class="cover">
                       <img 
                        src="{{$book->cover?'/images/'.$book->cover:''}}"
                        alt="" />
                        </div>
                </div>
                <div class="profile-work">
                    <p class="text-center m-5">Book Details</p>


                    @if ($book->title)
                    <div class="row">
                        <div class="col-6">
                            <label>Title</label>
                        </div>
                        <div class="col-6">
                            <p>{{$book->title}}</p>
                        </div>
                    </div>
                    @endif
                    @if ($book->author)
                    <div class="row">
                        <div class="col-6">
                            <label>Author</label>
                        </div>
                        <div class="col-6">
                            <p>{{$book->author}}</p>
                        </div>
                    </div>
                    @endif

                    @if ($book->publisher)
                    <div class="row">
                        <div class="col-6">
                            <label>Publisher</label>
                        </div>
                        <div class="col-6">
                            <p>{{$book->publisher}}</p>
                        </div>
                    </div>
                    @endif

                    @if ($book->ISBN)
                    <div class="row">
                        <div class="col-6">
                            <label>ISBN</label>
                        </div>
                        <div class="col-6">
                            <p>{{$book->ISBN}}</p>
                        </div>
                    </div>
                    @endif

                    @if ($book->Length)
                    <div class="row">
                        <div class="col-6">
                            <label>Length</label>
                        </div>
                        <div class="col-6">
                            <p>{{$book->Length}}</p>
                        </div>
                    </div>
                    @endif
                    @if ($book->Subjects)
                    <div class="row">
                        <div class="col-6">
                            <label>Subjects</label>
                        </div>
                        <div class="col-6">
                            <p>{{$book->Subjects}}</p>
                        </div>
                    </div>
                    @endif

                    @if ($book->price)
                    <div class="row">
                        <div class="col-6">
                            <label>Price</label>
                        </div>
                        <div class="col-6">
                            <p>{{$book->currency}} {{$book->price}}</p>
                        </div>
                    </div>
                    @endif

                    @if ($book->ISBN)
                    <div class="row">
                       
                        <div class="col-12">
                        <img src="" id="code" style="width:30%">
                        <script>
                                generateBarCode();

                                function generateBarCode() {
                                    var code=`{{$book->ISBN}}`;
                                    var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + code + '&amp;size=100x100';
                                    document.getElementById("code").setAttribute('src', url);
                                }
                            </script>
                        </div>
                    </div>
                    @endif

                   
                  

                </div>
            </div>

            <div class="col-sm-8" style="margin-top: 30px">
                <div class="row">

                 <br>
                 <br>
                    
                    <div class="col-12">
                    <strong> {{ $book->title }} </strong>
                    </div>
                    <div class="col-12">
                        <span>{{$book->description}}</span>
                    </div>

                    <div class="col-12 mt-4">
                        <?php if( $book->payment_type=='Paid'){ ?>
                       
                        <a href="#"
                        onclick="payNow( {{$book->id}}, {{intval($book->price)}}, '{{$book->currency}}' )"
                         class="btn btn-sm btn-success btn-block display-3"> Purchase {{$book->currency}} {{$book->price}}</a>


                        <?php } ?>
                    </div>
                 
                   

                    <div class="col-12">

<hr>
@include('front.reviews')

                        </div>


                </div>
            </div>



        </div>
    </div>

</section>



<script>
     function payNow(id,cost,currency) {
 var amount=currency=='USD' || currency=='$'? cost*<?php echo env('USD_CURRENCY')?>:cost;
   FlutterwaveCheckout({
       public_key: "<?php echo env('FTW_PUBLIC_TOKEN'); ?>",
       tx_ref: Math.random(),
       amount:amount,
       currency: 'RWF',
       payment_options: "card,mobilemoney",
       customer: {
         email: "frankrubaduka@gmail.com",
         phonenumber:"0788490714",
         name: "Frank Rubaduka",
       },
       callback: function (data) { 
        if(data && data.status.toLowerCase()=='successful'){
            return postPayment(data.status,id,amount,'RWF');
            }else{
                alert('Failed,try again!');
                return window.location.reload();
            }
           
       },
       customizations: {
         title: "Pay now!",
         description: "",
         logo: "https://frankrubaduka.com/images/logo.png",
       },
     }); 
 
  
}
function postAjax(url, data, success) {
    var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('POST', url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);
    return xhr;
}
function postPayment(status,id,cost,currency){

    const formData={
                payment_status:status,
                amount:cost,
                currency:currency,
                payer:"Unkown",
                _token:"<?php echo  csrf_token() ?>",
                 book_id:id
            };
          
            postAjax('/transactions', formData, (data)=>{
           
                 if(data){
                     return window.location.href="/download/"+id;
                 }
             });
}

</script>

<?php 
}else{
?>
<section class="features17 cid-rYUhzEzUWQ bg-white" id="features17-2w">
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">

                <div class="alert alert-warning alert-dismissible fade show mt-5 ml-5 text-center title" role="alert">
                    <strong>No book!</strong>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
}
?>

@include('front.footer')

@endsection


