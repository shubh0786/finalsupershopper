<?php
  require 'config/config.php';
  require 'config/db.php';

  // Create Query
  $query = 'SELECT * FROM product';

  // Get ibase_free_result
  $result = mysqli_query($conn, $query);

  //Fetch Data
  $plastics = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //var_dump($plastic);

  //Free Result
  mysqli_free_result($result);

  //Close connection
  mysqli_close($conn);
?>



<?php include('inc/header.php'); ?>

<!-- HTML BEGINS from
<body> -->

      <div id="whatever">
        <div class="container">

        <h2>Products</h2>




        <!-- Thumbnails -->




        <?php foreach($plastics as $plastic) : ?>

          <div class="thumb">
            <h6><?php echo $plastic['product_name']; ?></h6>
                                                            <!--  /* Title */ -->
            <img class="photoframe" src="<?php echo $plastic['image_link']; ?>" class="float-center" alt="Paris" width="304" height="236"> </br>                                           <!--  /* Image link */    -->
            Price: <?php echo $plastic['price']; ?> Unit Price: <?php echo $plastic['unit_price']; ?></br>    <!--  /* Price */         -->
            Plastic Rating: <?php echo $plastic['plastic_rating']; ?></br>                                    <!--  /* Crunch plastic star rating */ -->
            <!-- <p><small>ID: <?php echo $plastic['ID']; ?></small></p> -->
            <div product_category="center">
            <div class="cart-action">
              <input type="text" class="product-quantity" name="quantity" value="1" size="2" />   <!--  /* Ammount Input */ -->
              <input type="submit" value="Add to Cart" class="btnAddAction" /></div>              <!--  /* Add to cart button */ -->
          </div>
</div>


    <!--  /* Repeat Printing */            -->
    <?php endforeach; ?>
    </div>
    <!-- End of thumbnails -->
    <!-- </body -->
    <?php include('inc/footer.php'); ?>
