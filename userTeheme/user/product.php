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

            <center>
               <div class="container d-flex flex-row-reverse">
                  <form action="" method="get" >
                     <div class="row">
                     <div class="row-md-3">
                        <select name="filter" class="form-control">
                           <option value="">Search By</option>
                           <option value="n">Name</option>
                           <option value="c">Category</option>
                           <option value="l">Low to high</option>
                           <option value="h">High to low</option>
                        </select>
                     </div>
                     <div class="row-md-3">
                        <input type="text" name="search" class="form-control">
                     </div>
                     <div class="row-md-6">
                        <button type="submit" name="btn" class="btn btn-danger">
                           <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                     </div>
                     </div>
                  </form>
               </div>
            </center>

            <div class="row">
            <?php

            if(isset($_GET["btn"])){
               $filter = $_GET["filter"];
               $search = $_GET["search"];

               if($filter == "n"){
                  $select = "Select * from table_product where product_Name like '%" . $search ."%'";
               }
               else if ($filter == "c"){
                  $fetch_categories = "Select * from table_categories where name like '%" . $search ."%'";
                  $runCat = mysqli_query($conn, $fetch_categories);
                  $num = mysqli_num_rows($runCat);

                  $array = mysqli_fetch_array($runCat);
                  $cat_id = $array[0];

                  $select = "Select * from table_product where product_Category = '$cat_id'";
               }
               else if ($filter == "l"){
                  $select = "Select * from table_product order by product_Price asc";
               }
               else if ($filter == "h"){
                  $select = "Select * from table_product order by product_Price desc";
               }

            }else{
               $select = "Select * from table_product";
            }

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