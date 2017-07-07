<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container" style="padding: 50px 0px;">
             <div class="well well-sm text-right">
                 <button class="btn btn-info" type="button" data-toggle="modal" data-target="#add-modal">Add</button>
             </div>
             {{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12">
                      <table class="table table-bordered">          
                          <tr>
                              <th>S.No</th>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Total</th>
                              <th>Action</th>
                          </tr>
                          <?php $totals = 0; ?>
                         @foreach($product as $items)
                         <?php $totals += $items->total; ?>
                          <tr>
                              <td>{{ $items->id }}</td>
                              <td>{{ $items->name }}</td>
                              <td>{{ $items->quantity }}</td>
                              <td>&#x20b9; {{ $items->price }}</td>
                              <td>&#x20b9; {{ $items->total }}</td>
                               <td><button type="button" class="edit-modal btn btn-info" data-toggle="modal" data-target="#edit-modal"  data-id="{{$items->id}}" data-name="{{$items->name}}"  data-quantity="{{$items->quantity}}"
                            data-price="{{$items->price}}">Edit</button></td>
                          </tr>
                          @endforeach
                          <tr>
                              <th colspan="4" class="text-right">Subtotal</th>
                              <td colspan="2"><b>&#x20b9; {{ $totals }}</b></td>
                          </tr>
                      </table>
                  </div>
              </div>
        </div>
         <!-- Add Modal -->
        <div id="add-modal" class="modal fade add-modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Product Add</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Name">Proudct Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Proudct Name">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="text" class="form-control" name="quantity" placeholder="Enter Quantity">
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" name="price" placeholder="Enter Price">
                        </div>
                        <button type="button" class="btn btn-info" id="add">Add</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
         <!-- Add Modal -->
        <div id="edit-modal" class="modal fade edit-modal-form" role="dialog">
            <div class="modal-dialog">
            <input type="hidden" class="form-control" id="id">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Product Edit</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Name">Proudct Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Proudct Name">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="text" class="form-control" id="quantity" placeholder="Enter Quantity">
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" id="price" placeholder="Enter Price">
                        </div>
                        <button type="button" class="btn btn-info" id="edit">Edit</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
    </body>
</html>
