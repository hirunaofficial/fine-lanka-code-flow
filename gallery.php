<?php
$title = "Gallery";
include 'header.php'; 
?>

         <main id="content" class="site-main">
            <?php 
            $bg = $conn->query("SELECT img FROM places ORDER BY RAND();")->fetch_assoc();
            ?>
            <section class="inner-banner-wrap">
               <div class="inner-baner-container" style="background-image: url(<?php echo $bg['img'] ?>);">
                  <div class="container">
                     <div class="inner-banner-content">
                        <h1 class="inner-title">ALL DESTINATIONS</h1>
                     </div>
                  </div>
               </div>
               <div class="inner-shape"></div>
            </section>

            <div class="package-inner container">
                     <div class="row">
                        <?php
                        $suggested_sql = "SELECT * FROM places;";
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
                     
                  </div>
            
         </main>
		 
<?php include 'footer.php'; ?>