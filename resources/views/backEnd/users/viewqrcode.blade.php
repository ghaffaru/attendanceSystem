@extends('backLayout.app')
@section('title')
View User Qr Code
@stop

@section('content')
<!-- qr code  -->
<div class=" text-center">
@if(Sentinel::getUser()->QRpassword)
  <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->generate(Sentinel::getUser()->QRpassword)) !!} ">
  <p> This is your qr code , Download it into your mobile</p>
  @endif
  {{-- <button type="submit" id="autogenerate_qr" class="btn btn-default sub6">Change Now</button> --}}
</div>

<!--   end qr code -->

@stop

@section('scripts')
<script>
   //Delete Items
  $('#autogenerate_qr').click(function(){
      if(confirm('Are you sure you want to generate the qr code')){

         $.ajax({
            type: "POST",
            cache: false,
            url : "{{action('QrLoginController@QrAutoGenerate')}}",
            data: {action:'updateqr'},
                success: function(data) {
                  if (data==1) {
                   location.reload();
                 }else{
                  alert( 'Ups error :P ');
                 }
                }
            })

      
    }else{
        return false;
    }
  });
  //end qr autogenerated
</script>
@endsection