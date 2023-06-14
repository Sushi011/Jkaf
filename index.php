<?php include('partials-front/menu-index.php') ?>

        <?php 
            if(isset($_SESSION['order']))
            {
                echo $_SESSION['order'];
                unset($_SESSION['order']);
            }
        ?>

      <div class="intro">
      <!--Video Cover-->
      <section class="container">
      <video class="fullscreen" src="jkafvideo.mp4" playsinline autoplay muted loop>
      </video>
      </section>
      </div>

      <div class="welcome">
        <h1>discover jk@f</h1>
        <p>
        We are a group of Interior Designer.
        Since we are in Pandemic situation not just in the Philippines 
        but around the globe we decided to stop accepting any type of 
        designing, renovation and declined all contracts and projects 
        this year to protect our selves including our laborer. 
        To continue and enhance more our talent and skills 
        we decided to divert all our imagination and creativity 
        to something unique, quality products and taking it 
        inside in the gaming world.
      </p>
      </div>

      <!-- CAtegories Section Starts Here -->
    <section class="categories2 welcome" >
        <div class="container2">
            <h1 class="text-center2">Explore Products</h1>

            <?php 
                //Create SQL Query to Display CAtegories from Database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>prod-categories.php?category_id=<?php echo $id; ?>">
                            <div class="box-32 float-container2">
                                <?php 
                                    //Check whether Image is available or not
                                    if($image_name=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>IMAGES/category/<?php echo $image_name; ?>" alt="product" class="img-responsive2 img-curve2">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text2 text-center2 text-white2"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>


            <div class="clearfix2"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


      
     <!--Featured Products section-->
    <div class="featured">
      <h1>Featured products</h1>
      <div>
        <h4>
          <a href="productpage.php">
            <div class="acneb">
              <div class="acnebhov"></div>
            </div>
          <p>Family T-Shirt with free facemask</p>
          <p class="price">₱350.00</p>
          </a>
        </h4>
        <h4>
          <a href="productpage.php">
            <div class="gentleb">
              <div class="gentlebhov"></div>
            </div>
          <p>Razor Jacket / Windbreaker</p>
          <p class="price">₱3,000.00</p>
          </a>
        </h4>
        <h4>
          <a href="productpage.php">
            <div class="thickb">
              <div class="thickbhov"></div>
            </div>
            <p>ROG Pillow</p>
          <p class="price">₱360.00</p>
          </a>
        </h4>
        <h4>
          <a href="productpage.php">
            <div class="colorb">
              <div class="colorbhov"></div>
            </div>   
            <p>Samsung S21 Protector Pad - Silver</p>
            <p class="price">₱160.00</p>
          </a>
        </h4>
        <h4>
          <a href="productpage.php">
            <div class="femb">
              <div class="fembhov"></div>
            </div>
            <p>Samsung S21 Protector Pad - Violet</p>
            <p class="price">₱160.00</p>
          </a>
        <h4>
          <a href="productpage.php">
            <div class="moistb">
              <div class="moistbhov"></div>
            </div>
            <p>ZFold Protector Pad</p>
            <p class="price">₱160.00</p>
          </a>
        </h4>
      </div>
    </div>
<script>
  function closeCardPrompt() {
    var cardPrompt = document.querySelector('.card-prompt');
    cardPrompt.style.display = 'none';
    
}
</script>
      <!--Footer-->
      <?php include('partials-front/footer.php') ?>