<?php
  require('config/db.php');

  // get ID
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  // Create Query
  $query = 'SELECT * FROM product WHERE id = '.$id;

  // Get ibase_free_result
  $result = mysqli_query($conn, $query);

  //Fetch Data
  $plastic = mysqli_fetch_assoc($result);
  //var_dump($plastic);

  //Free Result
  mysqli_free_result($result);

  //Close connection
  mysqli_close($conn);
?>





<!-- HTML BEGINS -->

<!DOCTYPE html>
  <html>
    <head>
      <title>Front End Shopper</title>
      <link rel="stylesheet" type="text/css" href="style.css">

      <style>
      .thumb{
        border: 3px solid #73AD21;
        max-width:320px;
        height: 370px;
        text-align: center;
      }
      .photoframe{
        height:200px;
        width:auto;
        text-align: center;
      }
      </style>


    </head>
    <body>
      <div class="container">
        <h1>Products</h1>




        <!-- Thumbnails -->



          <div class="thumb">
          
            <h1><?php echo $plastic['product_name']; ?></h1>

            	 <!--  /* Title */ -->


         <img class="photoframe" src="<?php echo $plastic['image_link']; ?>"> </br>                                           <!--  /* Image link */    -->
            Price: <?php echo $plastic['price']; ?> Unit Price: <?php echo $plastic['unit_price']; ?></br>    <!--  /* Price */         -->
            Plastic Rating: <?php echo $plastic['plastic_rating']; ?></br>                                    <!--  /* Crunch plastic star rating */ -->
            <p><small>ID: <?php echo $plastic['ID']; ?></small></p>
                                                  <!--  /* Crunch ID */     -->
          </div>
          </br>
                                                                                       <!--  /* Repeat Printing */            -->
    </div>

    <!-- End of thumbnails -->



    </body>
</html>
