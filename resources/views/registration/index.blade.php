@extends('layouts.master')


@section('content')
<div class="container" style="position: absolute; top:5%; left: 0; right: 0; bottom: 0%;">
	<div class="text-center" >

		<h1 style="color: #71b346">Registration</h1>

		<form class="form-group" method="POST" action="/register" enctype="multipart/form-data" >
            {{ csrf_field() }}

            <br>

            <div class="form-group pb-3 pt-3 ">
                <label for="username" class="text-muted">Username <br><label style="color: #71b346;">* Must be at least 2 characters long, start with a letter and be alpha-numeric (only numbers and/or letters), max-length: 21. *</label></label>
                <br>
                <input type="text" class="form-control transition-fade form-check-inline" style="width: 50%; text-align: center" id="username" name="username" placeholder="Username" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$">
            </div>

            <br>

			<div class="form-group pb-3">
				<label for="email " class="text-muted">Email address</label>
				<br>
                <input type="email" class="form-control transition-fade form-check-inline" style="width: 50%; text-align: center"  id="email" name="email" placeholder="Email address" required>
            </div>

            <br>

			<div class="form-group pb-3">
				<label for="password " class="text-muted">Password <br><label style="color: #71b346;">* Must be longer than 6 characters and contain at least one upper and lower case letter as well as a number. *</label></label>
				<br>
                <input type="password" class="form-control transition-fade form-check-inline" style="width: 50%; text-align: center"  id="password" name="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
            </div>

            <br>

			<div class="form-group pb-3">
				<label for="password_confirmation " class="text-muted">Password confirmation</label>
				<br>
                <input type="password" class="form-control transition-fade form-check-inline" style="width: 50%; text-align: center"  id="password_confirmation" name="password_confirmation" placeholder="Retype Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
            </div>
            </div>

            <br>

			<div class="form-group pb-3">
				<button type="submit" class="btn btn-secondary btn-lg transition-fade text-light btn-block mt-3"><strong>Register</strong></button>
                <a role="button" class="btn btn-secondary mt-3 btn-outline-secondary float-right" value="Back" href="/login" style="width: 100px; color: #71b346;">Back<a/>
			</div>

		</form>
	</div>
</div>
@endsection
