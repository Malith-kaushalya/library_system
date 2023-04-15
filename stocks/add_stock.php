<html>
    <head>
        <meta charset="UTF-8" content="width=device-width, initial-scale=1">
        <title>New Books</title>
        <link href="../css/styles_all.css" rel="stylesheet" type="text/css"/>
        <link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-3.4.0.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </head>    
    <body>
        <?php
            include '../main/sidebar.php';
            include '../main/header.php';
        ?>
        <div style="margin-left: 17%; margin-right: 2%;" class="well well-sm">
        <h3 style="margin-left: 2%;">New Books</h3><br>
        <div class="table-responsive">
            <table class="table table-bordered" id="crud_table">
                <tr>
                    <th width="30%">Item Name</th>
                    <th width="10%">Item Code</th>
                    <th width="30%">Category</th>
                    <th width="10%">Quantity</th>
                    <th width="10%">ISBN</th>
                    <th width="5%"><!-- For Remove Button --></th>
                </tr>
                <tr>
                    <td contenteditable="true" class="item_name"></td>
                    <td contenteditable="true" class="item_code"></td>
                    <td contenteditable="true" class="item_category"></td>
                    <td contenteditable="true" class="item_quantity"></td>
                    <td contenteditable="true" class="item_isbn"></td>
                    <td></td>
                </tr>
            </table>
            <div align="right">
                <button type="button" name="add" id="add" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i> Add New</button>
            </div>
            <div align="center">
             <button type="button" name="save" id="save" class="btn btn-info">SUBMIT</button>
            </div>
            <br />
            <div id="inserted_item_data"></div>
        </div>
        </div>
    </body>
</html>

<script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td contenteditable='true' class='item_name'></td>";
   html_code += "<td contenteditable='true' class='item_code'></td>";
   html_code += "<td contenteditable='true' class='item_category'></td>";
   html_code += "<td contenteditable='true' class='item_quantity' ></td>";
   html_code += "<td contenteditable='true' class='item_isbn' ></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'><i class='fa fa-minus-circle'></i> Remove</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var item_name     = [];
  var item_code     = [];
  var item_category  = [];
  var item_quantity = [];
  var item_isbn     = [];
  $('.item_name').each(function(){
   item_name.push($(this).text());
  });
  $('.item_code').each(function(){
   item_code.push($(this).text());
  });
  $('.item_category').each(function(){
   item_category.push($(this).text());
  });
  $('.item_quantity').each(function(){
   item_quantity.push($(this).text());
  });
   $('.item_isbn').each(function(){
   item_isbn.push($(this).text());
  });
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:{item_name:item_name, item_code:item_code, item_category:item_category, item_quantity:item_quantity, item_isbn:item_isbn},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
 });
 
 function fetch_item_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  });
 }
 fetch_item_data();
 
});
</script>