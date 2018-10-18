@if($products)

@if(! $products->isEmpty())
    <div class="container row " id="products" name="products" style="overflow-y: scroll; position: absolute; top: 7%; right: 1%; height: 93%">
    @foreach($products as $product)
        <div class="product col-md-4 "  >
          <div class="card mb-3 mt-3 shadow-sm" >

                <label  class="">
                    <img src="{{ $product->prod_imgurl }}" alt="{{ $product->prod_name }}">
                    <input class="ml-5 squaredOne" type="checkbox" onclick="addItem('{{ $product->prod_price }}', '{{ $product->id }}', '{{ $product->prod_name }}')" id="{{ $product->id }}" />
                </label>

            <div class="card-body">
              <p class="card-text">{{ $product->prod_name }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.open('{{ $product->prod_url }}')">View</button>
                </div>
                <small class="text-muted">{{ $product->prod_price }}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      {{ $products->links() }}
    </div>
    @else

    <div class="container" style="position: absolute; top: 30%; right: 2%;">
    <h1 class="text-center text-muted">No items found.</h1>

@endif
@else

    <div class="container" style="position: absolute; top: 30%; right: 2%;">
        <h1 class="text-center text-muted">No items found.</h1>
    </div>

@endif
