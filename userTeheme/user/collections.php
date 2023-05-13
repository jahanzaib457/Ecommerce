<?php
include_once '../header.php';

?>
  <!-- inner page section -->
  <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">

            <?php
            $cat = $_GET["name"];
            $select = "Select * from table_product where product_Category = $cat";
            $execute = mysqli_query($conn, $select);
            $row = mysqli_num_rows($execute);
            if($row > 0){
               while($data = mysqli_fetch_assoc($execute)){
                  ?>

               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add to cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="<?php echo $data['product_Image']; ?>">
                     </div>
                     <div class="detail-box">
                        <h5>
                           <?php echo $data['product_Name']; ?>
                        </h5>
                        <h6>
                        Rs.<?php echo $data['product_Price']; ?>
                        </h6>
                     </div>
                  </div>
               </div>

                  <?php
               }
            }

            
            
            ?>

               
            
            </div>
            <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
      </section>
      <!-- end product section -->

      <?php
      include_once '../footer.php';
      ?>