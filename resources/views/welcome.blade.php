
@extends('frontLayout.app')
@section('title')
Home Page
@stop

@section('style')
    <style>
        .content {
            margin-top: 200px;
        }
    </style>
@stop
@section('content')

    <div class="content">
    {{-- <div class="title m-b-md">
        Laravel  Qr Code Starter page
        
    </div> --}}
            <div class="title m-b-md">
                Attendance Management
            </div>

            <div class="row">

            <div class="col-md-6">
                <a href="/arrival"><button class="btn btn-primary btn-block">Arrival</button></a>
            </div>

            <div class="col-md-6">
            <a href="/departure"><button class="btn btn-danger btn-block">Departure</button></a>
            </div>

    </div>
@if (Sentinel::check() )
     Your name : {{Sentinel::getUser()->first_name}} <br>
     Last name : {{Sentinel::getUser()->last_name}} <br>
     E-mail : {{Sentinel::getUser()->email}} <br>
    @endif

{{-- <div class="links">
    <a href="https://github.com/roladn">GitHub</a>
    <a href="https://rolandalla.com/">My Website</a>
    <a href="https://www.facebook.com/rolandalla91">Facebook</a>
    <a href="https://www.youtube.com/channel/UCgW6jORopjpon_42vzi7YkQ">Youtube</a>
</div> --}}
</div>
@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection
