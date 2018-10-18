@extends('layouts.master')

@section('nav')

<div class="topnav" style="position: fixed; top:0%; left:0%; right: 0%;">
    <a class="active" href="/home">Home</a>
    <a href="/products">Products</a>
    <a href="/logout">Logout</a>
    <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
</div>

@endsection

@section('content')


@if($history)
<div class="text-center" style="position: absolute; top:10%; left: 0; right: 0;">
<h1 class="text-center mt-3" style="color: #71b346">Comparison History</h1>
<input id="myCreated" class="form-control mr-sm-2 ml-3 mb-3 mt-5" style="text-align: center; width: 20%" type="text" onkeyup="searchCreated()" placeholder="Search the discription">
<table id="myTable" class="table table-hover">
    <thead>

    <tr class="">
        <th onclick="sortTable(0)" style="cursor: pointer">Product 1</th>
        <th onclick="sortTable(1)" style="cursor: pointer">Product 2</th>
        <th onclick="sortTable(4)" style="cursor: pointer">Price 1</th>
        <th onclick="sortTable(5)" style="cursor: pointer">Price 2</th>
        <th onclick="sortTable(6)" style="cursor: pointer">Searched on</th>
    </tr>
    <tbody>
@foreach ($history as $entry)
<tr>
<td>{{ $entry->prod_disc_1 }}</td>
<td>{{ $entry->prod_disc_2 }}</td>
<td>{{ $entry->prod_price_1 }}</td>
<td>{{ $entry->prod_price_2 }}</td>
<td>{{ $entry->created_at }}</td>
</tr>
@endforeach
</tbody>
</div>
</table>
@else
<h1 class="text-center" style="color: #c5c5c5">You currently have no history, <br><a href="/products">perhaps compare some products?</a></h1>
@endif

@endsection

@section('scripts')

<script>
        function searchCreated() {
          // Declare variables
          var input, filter, table, tr, td, i;
          input = document.getElementById("myCreated");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
    </script>

@endsection
