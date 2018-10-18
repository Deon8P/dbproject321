<div class="" style="position: fixed; top:10%; left:0.5%;">

    //Search Form submission
    <form action="/products" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input  id="search" name="search" class="form-control text-center mb-3" type="text" placeholder="Description..." style="width: 200%;">
        <button type="submit" class="btn btn-outline-success" style="width: 100%; ">Search</button>

    </form>
    <label class="form-control mt-5" id="item1">No item selected.</label>
    <label class="form-control" id="item2">No item selected</label>


    //Comparison Form submission
    <form action="/products/save/comparison" method="POST" enctype="multipart/form-data" id="form_compare">
        {{ csrf_field() }}

    <input type="text" id="prod1" name="prod1" hidden>
    <input type="text" id="disc1" name="disc1" hidden>
    <input type="text" id="price1" name="price1" hidden>

    <input type="text" id="prod2" name="prod2" hidden>
    <input type="text" id="disc2" name="disc2" hidden>
    <input type="text" id="price2" name="price2" hidden>

    </form>

</div>
