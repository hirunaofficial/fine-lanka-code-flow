<?php
$title = "Home";
include 'header.php'; 
?>

         <main id="content" class="site-main">
            <section class="home-slider-section">
               <div class="home-slider">
                  <div class="home-banner-items">
                     <div class="banner-inner-wrap" style="background-image: url(data/hero/1.jpg);"></div>
                        <div class="banner-content-wrap">
                           <div class="container">
                              <div class="banner-content text-center">
                                 <h2 class="banner-title">Hello ! SRI LANKA</h2>
                                 <p>An island country lying in the Indian Ocean and separated from peninsular India by the Palk Strait.</p>
                                 <a href="#suggested" class="button-primary">START EXPLORE</a>
                              </div>
                           </div>
                        </div>
                     <div class="overlay"></div>
                  </div>
               </div>
            </section>

            <section class="package-section" style="padding-top: 90px;" id="suggested">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5 class="dash-style">SUGGESTED LOCATIONS</h5>
                           <h2>Take a look</h2>
                           <p>Here are the best places near you.</p>
                        </div>
                     </div>
                  </div>
                  <div class="package-inner">
                     <div class="row">
                        <?php
                        $sql_province = explode('Province',$province);
                        $sql_province = $sql_province[0];
                        $suggested_sql = "SELECT * FROM places WHERE province = '$sql_province' ORDER BY RAND() LIMIT 3;";
                        $suggested_res = $conn->query($suggested_sql);
                        while($suggested_row = $suggested_res->fetch_assoc()){ ?>
                        <div class="col-lg-4 col-md-6">
                           <div class="package-wrap">
                              <figure class="feature-image">
                                    <img src="<?php echo $suggested_row['img']; ?>" alt="<?php echo $suggested_row['title']; ?>">
                              </figure>
                              <div class="package-price">
                                 <h6>
                                    <span>#<?php echo $suggested_row['category'] ?></span>
                                 </h6>
                              </div>
                              <div class="package-content-wrap">
                                 <div class="package-meta text-center">
                                    <ul>
                                       <li>
                                          <i class="fas fa-map-marker-alt"></i>
                                          <?php echo $suggested_row['district']; ?> /  <?php echo $suggested_row['province']; ?>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="package-content">
                                    <h3>
                                    <?php echo $suggested_row['title']; ?>
                                    </h3>
                                    <div class="review-area d-none">
                                       <span class="review-text">(25 reviews)</span>
                                       <div class="rating-start" title="Rated 5 out of 5">
                                          <span style="width: 60%"></span>
                                       </div>
                                    </div>
                                    <p><?php echo $suggested_row['des']; ?></p>
                                    <div class="btn-wrap">
                                       <a target="_blank" href="https://www.google.com/maps?q=<?php echo $suggested_row['title']; ?>" class="button-text width-6">Directions<i class="fas fa-map"></i></a>
                                       <a href="view-place.php?id=<?php echo $suggested_row['id']; ?>" class="button-text width-6">View Place<i class="fas fa-eye"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } ?>
                     </div>
                     <div class="btn-wrap text-center">
                        <a href="places-around-you.php" class="button-primary">VIEW MORE</a>
                     </div>
                     <div class="text-center mt-2">
                        <h5></h5>
                     </div>
                     <div class=" text-center mt-1">
                        <a href="index.php#categories" class="" style="text-decoration: underline;">Find places with yourself</a>
                     </div>
                  </div>
               </div>

            </section>

            <section class="callback-section" id="location">
               <div class="container">
                  <div class="row no-gutters align-items-center">
                     <div class="col-lg-5">
                        <div class="callback-img">
                                 <iframe width="480" height="540" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $city; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                     </div>
                     <div class="col-lg-7">
                        <div class="callback-inner">
                           <div class="section-heading section-heading-white">
                              <h5 class="dash-style">Your Location</h5>
                              <h2>Where are you?</h2> 
                           </div>
                           <div class="callback-counter-wrap">
                              <div class="counter-item">
                                 <div class="counter-icon">
                                   <img src="data/hero/province.png" alt="">
                                 </div>
                                 <div class="counter-content">
                                    <span class="counter-no" style="font-size: large;">
                                       <?php echo $province; ?>
                                    </span>
                                    <span class="counter-text">
                                      Province
                                    </span>
                                 </div>
                              </div>
                              <div class="counter-item">
                                 <div class="counter-icon">
                                   <img src="data/hero/city.png" alt="">
                                 </div>
                                 <div class="counter-content">
                                    <span class="counter-no" style="font-size: large;">
                                       <?php echo $city; ?>
                                    </span>
                                    <span class="counter-text">
                                       City
                                    </span>
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
            </section>

            <section class="activity-section" id="categories">
               <?php
               $explore = $conn->query("SELECT * FROM places WHERE category='exploring';")->num_rows;
               $religious = $conn->query("SELECT * FROM places WHERE category='religious';")->num_rows;
               $hiking = $conn->query("SELECT * FROM places WHERE category='hiking';")->num_rows;
               $surfing = $conn->query("SELECT * FROM places WHERE category='surfing';")->num_rows;
               ?>
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5 class="dash-style">START Exploring</h5>
                           <h2>categories</h2>
                           <p>Clcik on your favourite category to to continue !</p>
                        </div>
                     </div>
                  </div>
                  <div class="activity-inner row">
                     <div class="col-lg-2 col-md-4 col-sm-6 invisible d-none d-lg-flex">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="#">
                                 <img src="assets/images/icon6.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="#">Adventure</a>
                              </h4>
                              <p>15 Destination</p>
                           </div>
                        </div>
                     </div>

                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="category.php?category=exploring">
                              <img style="width: 100px;" src="data/hero/explore.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="category.php?category=exploring">Exploring</a>
                              </h4>
                              <p><?php echo $explore; ?> Destination</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="category.php?category=religious">
                              <img style="width: 100px;" src="data/hero/temple.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="category.php?category=religious">Religious</a>
                              </h4>
                              <p><?php echo $religious; ?> Destination</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="category.php?category=hiking">
                                 <img style="width: 100px;" src="data/hero/hiking.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="category.php?category=hiking">Hiking</a>
                              </h4>
                              <p><?php echo $hiking; ?> Destination</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="category.php?category=surfing">
                                 <img style="width: 100px;" src="data/hero/sunset.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="category.php?category=surfing">Surfing</a>
                              </h4>
                              <p><?php echo $surfing; ?> Destination</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6 invisible d-none">
                        <div class="activity-item">
                           <div class="activity-icon">
                              <a href="#">
                                 <img src="assets/images/icon11.png" alt="">
                              </a>
                           </div>
                           <div class="activity-content">
                              <h4>
                                 <a href="#">Exploring</a>
                              </h4>
                              <p>25 Destination</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

         </main>
		 
<?php include 'footer.php'; ?>
