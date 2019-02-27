<?php
  require 'config/config.php';
  require 'config/db.php';

  // Create Query
  $query = 'SELECT * FROM product';

  // Get ibase_free_result
  $result = mysqli_query($conn, $query);

  //Fetch Data
  $plastics = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //var_dump($plastics);

  //Free Result
  mysqli_free_result($result);

  //Close connection
  mysqli_close($conn);
?>



<?php include('inc/header.php'); ?>

<!-- HTML BEGINS from
<body> -->

      <div id="whatever" class="container">
        <!-- <h1>Products</h1> -->




        <!-- Thumbnails -->




        <?php $myCategory = '0'; ?>                <!--  /* Conditional argument */ -->

        <!-- For Loop -->
        <?php foreach($plastics as $plastic) : ?>

          <?php if($myCategory != $plastic['product_category']) {
            $myCategory = $plastic['product_category'];
            echo '</br></br><h1>' . $myCategory . '</h1> </br>';
          } ?>

          <div class="thumb">
                                                                                                                      <!-- Print Info -->

            <h3><?php echo $plastic['product_name']; ?></h3>                                                          <!--  /* Title */ -->
            <img class="photoframe" src="<?php echo $plastic['image_link']; ?>"> </br>                                <!--  /* Image link */    -->
            Price: <?php echo $plastic['price']; ?> Unit Price: <?php echo $plastic['unit_price']; ?></br>            <!--  /* Price */         -->
            Plastic Rating: <?php echo $plastic['plastic_rating']; ?></br>                                            <!--  /* Crunch plastic star rating */ -->
            <!-- <p><small>ID: <?php echo $plastic['ID']; ?></small></p> -->                                          <!--  /* ID - disabled by default */ -->

            <div class="cart-action">                                                                                       <!--  /* ADD TO CART functionality */ -->
              <!-- <input type="text" class="product-quantity" name="quantity" value="1" size="2" />  -->                   <!--  /* Ammount Input */ -->
              <input type="submit" value="Add to Cart" class="btnAddAction" /></div>                                        <!--  /* Add to cart button */ -->
          </div>




    <!--  /* Repeat Printing */            -->
    <?php endforeach; ?>
    </div>
    <!-- End of thumbnails -->
    <!-- </body -->
    <?php include('inc/footer.php'); ?>
