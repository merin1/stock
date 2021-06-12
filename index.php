<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Stock</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <style type="text/css">
      body{
        background-color: #Edf2ff;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <br />
    
      <div style="background-color: #Edf2ff">
      <h2>Stocks</h2>
      <div style="font-size: 55px;text-align: center;">The easiest way to buy and sell stocks</div><br />
      <div style="font-size:30px;text-align: center; ">Stock analysis and screening tool for investors in India</div>
      <br/>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon">Search</span>
          <input type="text" name="search_text" id="search_text" placeholder="Search by Stock Details" class="form-control" />
        </div>
      </div>
      <br />
      <div id="result"></div>
    </div>
    <div style="clear:both"></div>
    </div>
  </body>
</html>


<script>
$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    var formid=document.getElementById("search_text").value; 
    // alert(formid);
    $.ajax({
      url:"fetch.php",
      method:"post",
      data:{formid:formid},
      success:function(data)
      {
        // alert(data);
        $('#result').html(data);
      }
    });
  }
  
  $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      // $('#result').hide();
      load_data();      
    }
  });
});
</script>



