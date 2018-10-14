@extends('layouts.master')

@section('content')
<div  class="container" style="position: absolute; top:0%; left: 0; right: 0; bottom: 0%;">
<div class="text-center form-group container mt-2 mb-5">
        <div class="form-group container">
            <h3 style="color: #71b346"><strong>Welcome To</strong></h3>
        </div>
<img src="images/Logo.png" style="width:300px;height:300px;">

</div>

<div class="container text-center mt-5">

    @include('layouts.errors')

    @include('session.details')

</div>

</div>
@endsection
