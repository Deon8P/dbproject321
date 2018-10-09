<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf_field" content="{{ csrf_field() }}">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Album example for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="css/app.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/index.css" rel="stylesheet">
</head>

<body>

  <header>
    <div class="topnav">
    <a href="/home">Home</a>
    <a class="active" href="/products">Products</a>
    <a href="/logout">Logout</a>
    <a href="#" class="float-right active" color="#71b346">[:: user_username ::]</a>
  </div>
  </header>
  <main role="main" style="position: absolute; top:10%; left:0%; right: 0%;">
    <div class="py-5 bg-dark">
<form action="/" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input  id="search" name="search" class="form-control text-center ml-3 mt-2 mb-3" type="text" placeholder="Description..." style="width: 30%">
      <button type="submit" class="btn form-control">Search</button>
      </form>
        <div class="container">
        @include('products')
      </div>
    </div>
  </main>

  <footer class="text-muted">
    <h2>Congratulations you reached the end of the internet!</h2>
  </footer>

    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script>
        function reload() {
        var xhttp = new XMLHttpRequest();
        
          ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_field"]').attr('content')                
            }
        });
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("products").innerHTML = this.responseText;
          }
        };
        xhttp.open("post", "/", true);
        xhttp.send();
      }
      </script>
      
      <script>
      function sortTable(n) {
          var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
          table = document.getElementById("myTable");
          switching = true;
          // Set the sorting direction to ascending:
          dir = "asc";
          /* Make a loop that will continue until
          no switching has been done: */
          while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
              // Start by saying there should be no switching:
              shouldSwitch = false;
              /* Get the two elements you want to compare,
              one from current row and one from the next: */
              x = rows[i].getElementsByTagName("td")[n];
              y = rows[i + 1].getElementsByTagName("td")[n];
              /* Check if the two rows should switch place,
              based on the direction, asc or desc: */
              if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                  // If so, mark as a switch and break the loop:
                  shouldSwitch = true;
                  break;
                }
              } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                  // If so, mark as a switch and break the loop:
                  shouldSwitch = true;
                  break;
                }
              }
            }
            if (shouldSwitch) {
              /* If a switch has been marked, make the switch
              and mark that a switch has been done: */
              rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
              switching = true;
              // Each time a switch is done, increase this count by 1:
              switchcount ++;
            } else {
              /* If no switching has been done AND the direction is "asc",
              set the direction to "desc" and run the while loop again. */
              if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
              }
            }
          }
        }
        </script>
      
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="../../assets/js/vendor/popper.min.js"></script>
      <script src="../../dist/js/bootstrap.min.js"></script>
      <script src="../../assets/js/vendor/holder.min.js"></script>
    </body>
    </html>
