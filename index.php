<?php Header("Cache-Control: max-age=3000, must-revalidate");
  //connect DB
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



<!-- HTML BEGINS from here -->
<?php include('inc/header.php'); ?>
      <div id="whatever" class="containerMain">
        <!--<h1 id="yoo"> YO </h1>-->
      </br></br></br>

        <?php $myCategory = '0'; ?>                                              <!--  /* Conditional argument */ -->
        <!-- For Loop -->
        <?php foreach($plastics as $plastic) :

          #define product variables
          $category = $plastic['product_category'];
          $productName = $plastic['product_name'];
          $image = $plastic['image_link'];
          $price = $plastic['price'];
          $unit_price = $plastic['unit_price'];
          $p_star = $plastic['plastic_rating'];
          $id = $plastic['ID'];




          #<!-- decide product category -->
          if($myCategory != $category) {                #if its new category, print category
            if ($myCategory != '0') {
              echo '</div>';
            }
            $myCategory = $category;
            echo "<div class ='categoryWrapper'>";
            echo '<h2>' . $myCategory . '</h2>';
          }
         #} ?>


          <!--Print Thumbnail -->
        <div class="cellContainer">
      <form>
        <div class="thumb" style="margin: 5px;">                                                            <!-- Thumb Outline -->
          <img class="photoframe" src="<?php echo $plastic['image_link']; ?>">
            <h4><?php echo $plastic['product_name']; ?></h4>  <br></br>                             <!--  /* Image link */    -->
        <strong>  Price: <?php echo $plastic['price']; ?></strong> <br> Unit Price: <?php echo $plastic['unit_price']; ?></br>            <!--  /* Price */         -->
          Plastic Rating: <?php echo $plastic['plastic_rating']; ?></br> <br></br>                                           <!--  /* Crunch plastic star rating */ -->
          <!-- <p><small>ID: <?php echo $plastic['ID']; ?></small></p> -->                                                                   <!--  /* ID - disabled by default */ -->

            <div class="cart-action">                                                                                       <!--  /* ADD TO CART functionality */ -->
              <!-- <input type="text" class="product-quantity" name="quantity" value="1" size="2" />  --> <!-- quantity -->                  <!--  /* Ammount Input */ -->
             <button class= "btn-success my-2 my-sm-0" type="submit">Add to Cart</button>
            </div>
          </div>
        </div>
      </form>




    <!--  /* Repeat Printing */            -->
    <?php endforeach; ?>
    </div>
    <!-- End of thumbnail display -->


    <?php include('inc/footer.php'); ?>
