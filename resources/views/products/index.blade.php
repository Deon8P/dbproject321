@extends('layouts.master')

@section('nav')

<div class="topnav" style="position: fixed; top:0%; left:0%; right: 0%;">
    <a href="/home">Home</a>
    <a class="active" href="/products">Products</a>
    <a href="/logout">Logout</a>
    <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
</div>

@endsection

@section('content')

@include('products.search')

@include('products.products')

@endsection

@section('scripts')

<script>

function addItem(price, id, disc){

        //Checks if the checkbox is ticked or not
        if( document.getElementById(id).checked){



            if(document.getElementById("item1").name != null && document.getElementById("item2").name != null){

                document.getElementById(id).checked = false;

                var errorMessage = "You can only compare two items at a time.";
                $("#error").html(errorMessage);
                $('#errorModal').modal('show');

            }else{

            //Checkes to see if both prices are the same
            if(document.getElementById("item1").textContent != price && document.getElementById("item2").textContent != price){

                if(document.getElementById("item1").name == null ){

                    document.getElementById("item1").name = id;

                    document.getElementById("item1").textContent = price;

                    document.getElementById("prod1").value = id;
                    document.getElementById("disc1").value = disc;
                    document.getElementById("price1").value = price;

                }else{

                    document.getElementById("item2").name = id;

                    document.getElementById("item2").textContent = price;

                    document.getElementById("prod2").value = id;
                    document.getElementById("disc2").value = disc;
                    document.getElementById("price2").value = price;

                }

            }else{

                document.getElementById(id).checked = false;

                var errorMessage = "These two items have the same price";
                $("#error").html(errorMessage);
                $('#errorModal').modal('show');
            }
        }


    }else{

        if(document.getElementById("item2").textContent != "No item selected." && document.getElementById("item2").textContent == price){

            document.getElementById("item2").name = null;

                document.getElementById("prod2").value = null;
                    document.getElementById("disc2").value = null;
                    document.getElementById("price2").value = null;

            document.getElementById("item2").textContent = "No item selected.";

        }else{

            document.getElementById("item1").name = null;

            document.getElementById("prod1").value = null;
            document.getElementById("disc1").value = null;
            document.getElementById("price1").value = null;

            document.getElementById("item1").textContent = "No item selected.";
        }

    }

    if(document.getElementById("item1").name != null && document.getElementById("item2").name != null)
    {
        document.getElementById("form_compare").submit();
        //saveComparison();
    }

}

</script>

<script>
        function saveComparison() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                console.log("Comparison saved.");
            };
            xhttp.open("POST", "/products/save/comparison", true);

            var prod1 =  document.getElementById("prod1").value;
            var disc1 = document.getElementById("disc1").value;
            var price1 = document.getElementById("price1").value;

            var prod2 =  document.getElementById("prod2").value;
            var disc2 = document.getElementById("disc2").value;
            var price2 = document.getElementById("price2").value;


            var data = JSON.stringify({"prod1": prod1,
                                        "disc1": disc1,
                                        "price1": price1,
                                        "prod2": prod2,
                                        "disc2": disc2,
                                        "price2": price2
                                    });

            xhttp.send(data);
          }
        }
</script>

@endsection
