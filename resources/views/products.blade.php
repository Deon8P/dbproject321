<div class="row" id="products" name="products">
        @foreach($products as $product)
        <div class="product col-md-4">
          <div class="card mb-4 shadow-sm" >
            <img src="{{$product->prod_imgurl}}" alt="{{$product->prod_name}}">
            <div class="card-body">
              <p class="card-text">{{$product->prod_name}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.open('{{$product->prod_url}}')">View</button>
                </div>
                <small class="text-muted">{{ $product->prod_price }}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>