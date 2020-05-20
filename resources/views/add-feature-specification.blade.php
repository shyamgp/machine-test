<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
        var token = '{!! csrf_token() !!}'

    </script>
<div class="jumbotron">
  <div class="container">
    <h1 class="text-center">Add Product Specification</h1>      
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
            @if(Session::has('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
          <form method="POST" action="{{ url('/save/specification') }}" class="form-horizontal">
         
              @csrf
              <div class="col-md-6">
                <div class="form-group">
                <label  for="sel1">Product</label>
                <select class="form-control product" id="sel1" name="product">
                  <option>Select Product</option>
                  @foreach($product as $prod)
                    <option value="{{$prod->id}}">{{$prod->product_name}}</option>
                  @endforeach
                  
                </select>
              </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">Attribute</label>
              <div class="col-sm-10">
              <select class="form-control attribute" id="sel1" name="attribute">          
                <option>Select Attribute</option>
                  
                  
                </select>
              </div>
            </div>
              </div>
            
              <div class="col-md-12">
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">Features:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" id="pwd" placeholder="Enter product Attribute" name="features" required="required">
              </div>
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">Specification:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" id="pwd" placeholder="Enter product Attribute" name="specification" required="required">
              </div>
            </div>
            </div>
              <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Submit</button>
                </div>
              </div>
          </form>

  </div>
  
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $("select.product").change(function(e){

                e.preventDefault();
                var selectedCategory = $(this).children("option:selected").val();
                $('.attribute').empty();
                $.ajax({
                    method: 'POST',
                    url: APP_URL + '/' + 'show/attribute',
                    data: {"_token":token,'product_id':selectedCategory},
                    success: function (response) {
                        console.log(response);
                       
                        var template = '';
                        $.each(response,function (index,value) {
                            template += '<option value="'+value.id+'"> '+value.attribute_name+'</option>';

                        });

                        $('.attribute').append(template);
                    }

                })
            });

</script>
</body>
</html>
