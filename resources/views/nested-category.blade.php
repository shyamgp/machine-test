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
<script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
        var token = '{!! csrf_token() !!}'

    </script>
<body>

<div class="jumbotron">
  <div class="container">
    <h1 class="text-center">Nested Category</h1>      
    
    <div class="col-md-4">
    <div class="form-group">
      <label  for="sel1">Category </label>
      <select class="form-control category" id="sel1" name="category">
        <option>Select Category</option>
        @if($category->count()>0)
        @foreach($category as $cat)
          <option value="{{$cat->id}}">{{$cat->category_name}}</option>
        @endforeach
      
        @endif
      </select>
    </div>
    </div>

    <div class="col-md-4">
    <div class="form-group">
      <label  for="sel1">Sub Category</label>
      <select class="form-control sub_category" id="sel1" name="subcategory_id">
        <option>Select Sub Category</option>
        
        
      </select>
    </div>
    </div>


    <div class="col-md-4">
    <div class="form-group">
      <label  for="sel1">Child Category</label>
      <select class="form-control child_category" id="sel1" name="subcategory_id">
        <option>Select Child Category</option>
        
        
      </select>
    </div>
    </div>
  </div>
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  
            $("select.category").change(function(e){

                e.preventDefault();
                var selectedCategory = $(this).children("option:selected").val();
                $('.sub_category').empty();
                $.ajax({
                    method: 'POST',
                    url: APP_URL + '/' + 'show/subcategory',
                    data: {"_token":token,'category':selectedCategory},
                    success: function (response) {
                        console.log(response);
                       
                        var template = '';
                        $.each(response,function (index,value) {
                            template += '<option value="'+value.id+'"> '+value.sub_category_name+'</option>';

                        });

                        $('.sub_category').append(template);
                    }

                })
            });


            $("select.sub_category").change(function(e){

                e.preventDefault();
                var selectedCategory = $(this).children("option:selected").val();
                $('.child_category').empty();
                $.ajax({
                    method: 'POST',
                    url: APP_URL + '/' + 'show/childcategory',
                    data: {"_token":token,'subcategory':selectedCategory},
                    success: function (response) {
                        console.log(response);
                       
                        var template = '';
                        $.each(response,function (index,value) {
                            template += '<option value="'+value.id+'"> '+value.child_category_name+'</option>';

                        });

                        $('.child_category').append(template);
                    }

                })
            });
</script>

</body>
</html>
