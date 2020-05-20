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

<div class="jumbotron">
  <div class="container">
    <h1 class="text-center">Add Product</h1>      
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
          <form method="POST" action="{{ url('/save/product') }}" class="form-horizontal">
         
              @csrf
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">Product Name:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" id="pwd" placeholder="Enter product" name="product" required="required">
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



</body>
</html>
