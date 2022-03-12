<?php
$title = "Place Around You";
include 'header.php'; 
?>
<?php 
$sql_province = explode('Province',$province);
$sql_province = $sql_province[0];
$cat_places = $conn->query("SELECT * FROM places WHERE province='$sql_province';");
$img_main = $conn->query("SELECT * FROM places WHERE province='$sql_province' ORDER BY RAND() ;")->fetch_assoc()['img'];
?>
         <main id="content" class="site-main">

            <section class="inner-banner-wrap">
               <div class="inner-baner-container" style="background-image: url(<?php echo $img_main; ?>);">
                  <div class="container">
                     <div class="inner-banner-content">
                        <h1 class="inner-title"><?php echo $province; ?></h1>
                     </div>
                  </div>
               </div>
               <div class="inner-shape"></div>
            </section>

            <div class="package-section">
               <div class="container">
                  <div class="package-inner">
                     <div class="row">
                        <?php 
                        while($row = $cat_places->fetch_assoc()){
                        ?>
                        <div class="col-lg-4 col-md-6">
                           <div class="package-wrap">
                              <figure class="feature-image">
                                    <img src="<?php echo $row['img'] ?>" alt="">
                              </figure>
                              <div class="package-content-wrap">
                                 <div class="package-meta text-center">
                                    <ul>
                                       <li>
                                          <i class="fas fa-map-marker-alt"></i>
                                          <?php echo($row['district'].' / '.$row['province']); ?>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="package-content">
                                    <h3>
                                       <?php echo $row['title']; ?>
                                    </h3>
                                    <p><?php echo $row['des'] ?></p>
                                    <div class="btn-wrap">
                                    <a target="_blank" href="https://www.google.com/maps?q=<?php echo $row['title']; ?>" class="button-text width-6">Directions<i class="fas fa-map"></i></a>
                                       <a href="view-place.php?id=<?php echo $row['id']; ?>" class="button-text width-6">View More<i class="fas fa-eye"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </div>

            <section class="activity-section">
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
                           <h5 class="dash-style">Find out more</h5>
                           <h2>categories</h2>
                           <p>Find more places at your own favourites !</p>
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