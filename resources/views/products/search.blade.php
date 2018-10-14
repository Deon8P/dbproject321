<div class="" style="position: fixed; top:10%; left:0.5%;">

    <form action="/" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input  id="search" name="search" class="form-control text-center mb-3" type="text" placeholder="Description..." style="width: 200%;">
        <button type="submit" class="btn btn-outline-success" style="width: 100%; ">Search</button>

    </form>

</div>
