<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
  
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://www.omginet.com/pictorr/public/assets/plugins/select2/select2.css" />
</head>
<body>

<div class="container">
  <h2>Product</h2>
                                                                                        
  <div class="table-responsive">          
  <table class="table table-bordered table-striped table-hover js-basic-example data-table" id="myDataTable">
    <thead>
      <tr>
        <th>S No.</th>
        <th>Product Name</th>
        <th>Attribute</th>
        <th>Features</th>
        <th>Specification</th>
       
      </tr>
    </thead>
    <tbody>
      @foreach($products as $key =>$product)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$product->product_name}}</td>

        
        <td>
          @foreach($product->attribute as $attr)
            {{$attr->attribute_name}},
        @endforeach
        </td>
        <td>
         @foreach($product->attribute as $attr)
            @foreach($attr->specification as $spec)
              {{$spec->features}},
            @endforeach
        @endforeach
        </td>
        <td>
          @foreach($product->attribute as $attr)
            @foreach($attr->specification as $spec)
              {{$spec->features}},
            @endforeach
        @endforeach</td>
        
      </tr>
      @endforeach
      
    </tbody>
  </table>
  </div>
</div>

<script type="text/javascript">
  
           $(document).ready(function() {
    $('#myDataTable').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );

    $('dropdown_selector').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var value = $option.val();//to get content of "value" attrib
    var text = $option.text();//to get <option>Text</option> content
});
} );


            
</script>
</body>
</html>
