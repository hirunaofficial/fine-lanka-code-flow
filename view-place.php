<?php
include_once('config/config.php');
$id = $_GET['id'];
$select = "SELECT * FROM places WHERE id='$id'";
$row = $conn->query($select)->fetch_assoc();
$title = $conn->query($select)->fetch_assoc()['title'];
include_once('header.php'); ?>

         <main id="content" class="site-main">
            <section class="inner-banner-wrap">
               <div class="inner-baner-container" style="background-image: url(<?php echo $row['img']; ?>);">
                  <div class="container">
                     <div class="inner-banner-content">
                     <h1 class="inner-title">#<?php echo $row['category']; ?></h1>
                     </div>
                  </div>
               </div>
               <div class="inner-shape"></div>
            </section>

            <div class="single-tour-section">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="single-tour-inner">
                           <h2><?php echo $row['title'] ?></h2>
                           <figure class="feature-image">
                              <img src="<?php echo $row['img']; ?>" alt="">
                              <div class="package-meta text-center">
                                 <ul>
                                    <li>
                                       <i class="fas fa-map-marked-alt"></i>
                                       <?php echo($row['district'].' / '.$row['province'].' Province'); ?>
                                    </li>
                                 </ul>
                              </div>
                           </figure>
                           <div class="tab-container">
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">DESCRIPTION</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link d-none" id="program-tab" data-toggle="tab" href="#program" role="tab" aria-controls="program" aria-selected="false">PROGRAM</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">REVIEW</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">Map</a>
                                 </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                 <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                    <div class="overview-content">
                                       <p><?php echo $row['des']; ?></p>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="program" role="tabpanel" aria-labelledby="program-tab">
                                    <div class="itinerary-content">
                                       <h3>Program <span>( 4 days )</span></h3>
                                       <p>Dolores maiores dicta dolore. Natoque placeat libero sunt sagittis debitis? Egestas non non qui quos, semper aperiam lacinia eum nam! Pede beatae. Soluta, convallis irure accusamus voluptatum ornare saepe cupidatat.</p>
                                    </div>
                                    <div class="itinerary-timeline-wrap">
                                       <ul>
                                          <li>
                                             <div class="timeline-content">
                                                <div class="day-count">Day <span>1</span></div>
                                                <h4>Ancient Rome Visit</h4>
                                                <p>Nostra semper ultricies eu leo eros orci porta provident, fugit? Pariatur interdum assumenda, qui aliquip ipsa! Dictum natus potenti pretium.</p>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="timeline-content">
                                                <div class="day-count">Day <span>2</span></div>
                                                <h4>Classic Rome Sightseeing</h4>
                                                <p>Nostra semper ultricies eu leo eros orci porta provident, fugit? Pariatur interdum assumenda, qui aliquip ipsa! Dictum natus potenti pretium.</p>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="timeline-content">
                                                <div class="day-count">Day <span>3</span></div>
                                                <h4>Vatican City Visit</h4>
                                                <p>Nostra semper ultricies eu leo eros orci porta provident, fugit? Pariatur interdum assumenda, qui aliquip ipsa! Dictum natus potenti pretium.</p>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="timeline-content">
                                                <div class="day-count">Day <span>4</span></div>
                                                <h4>Italian Food Tour</h4>
                                                <p>Nostra semper ultricies eu leo eros orci porta provident, fugit? Pariatur interdum assumenda, qui aliquip ipsa! Dictum natus potenti pretium.</p>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="review" role="tabpanel" aria-labelledby="review-tab">

                                    <div class="comment-area">
                                       <?php 
                                       $review_sql = "SELECT * FROM review WHERE place_id = '$id';";
                                       $review_res = $conn->query($review_sql);
                                       $num_reviews = $conn->query($review_sql)->num_rows;
                                       ?>
                                       <h3 class="comment-title" id="review"><?php echo $num_reviews; ?> Reviews</h3>
                                       <div class="comment-area-inner">
                                          <?php 
                                          while($review_row = $review_res->fetch_assoc()){
                                          ?>
                                          <ol>
                                             <li>
                                                <figure class="comment-thumb">
                                                   <img src="data/images/user-img.png" alt="">
                                                </figure>
                                                <div class="comment-content">
                                                   <div class="comment-header">
                                                      <h5 class="author-name"><?php echo $review_row['name'] ?></h5>
                                                      <span class="post-on">on <?php echo explode(' ',$review_row['time'])[0] ?></span>
                                                      <div class="rating-wrap">
                                                      </div>
                                                   </div>
                                                   <p><?php echo $review_row['des'] ?></p>
                                                </div>
                                             </li>
                                          </ol>
                                          <?php } ?>
                                       </div>
                                       <div class="comment-form-wrap">
                                          <h3 class="comment-title">Leave a Review</h3>
                                          <form class="comment-form" method="post" action="add-review.php">
                                             <p>
                                                <input type="text" name="name" placeholder="Name" required>
                                             </p>
                                             
                                             <p>
                                                <textarea rows="6" name="des" required placeholder="Your review"></textarea>
                                             </p>
                                             <p>
                                                <input type="submit" name="submit" value="Submit">
                                             </p>
                                             <input class="d-none" name="id" value="<?php echo $id; ?>">
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="map" role="tabpanel" aria-labelledby="map-tab">
                                    <div class="map-area">
                                       <?php echo $row['map']; ?>
                                    </div>
                                    <a target="_blank" href="https://www.google.com/maps?q=<?php echo $row['title']; ?>" class="button-primary mt-1">Open in Google Maps</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="sidebar">
                           <div  style="visibility: hidden;">
                              <h2>Just <br>
                                 For gap
                              </h2>
                           </div>
                           
                           <div class="widget-bg information-content text-center">
                              <?php
                              $tip = $conn->query("SELECT * FROM tips ORDER BY RAND() LIMIT 1;")->fetch_assoc();
                              ?>
                              <h5>TRAVEL TIPS</h5>
                              <h3><?php echo $tip['title']; ?></h3>
                              <p><?php echo $tip['tip']; ?></p>
                              <a href="tips.php" class="button-primary">More Tips</a>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>            
         </main>
         <hr class="mt-0">
         <div class="text-center">
         <h3>Find more places near you</h3>
         </div>



      <div class="d-lg-flex">
         <?php
                    $sql_province = explode('Province',$province);
                    $sql_province = $sql_province[0];
                    $side_places = $conn->query("SELECT * FROM places WHERE province = '$sql_province' ORDER BY RAND();");
                    $side_counter = 0;
                    while($side_counter < 3){
                       $side_place_row = $side_places->fetch_assoc();
                       if($side_place_row['title'] != $title){
                    ?>
                     <div class="col-lg-4 col-md-6" >
                           <div class="package-wrap">
                              <figure class="feature-image">
                                    <img src="<?php echo $side_place_row['img']; ?>" alt="<?php echo $side_place_row['title']; ?>">
                              </figure>
                              <div class="package-price">
                                 <h6>
                                    <span>#<?php echo $side_place_row['category'] ?></span>
                                 </h6>
                              </div>
                              <div class="package-content-wrap">
                                 <div class="package-meta text-center">
                                    <ul>
                                       <li>
                                          <i class="fas fa-map-marker-alt"></i>
                                          <?php echo $side_place_row['district']; ?> /  <?php echo $side_place_row['province']; ?>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="package-content">
                                    <h3>
                                    <?php echo $side_place_row['title']; ?>
                                    </h3>
                                    <div class="review-area d-none">
                                       <span class="review-text">(25 reviews)</span>
                                       <div class="rating-start" title="Rated 5 out of 5">
                                          <span style="width: 60%"></span>
                                       </div>
                                    </div>
                                    <p><?php echo $side_place_row['des']; ?></p>
                                    <div class="btn-wrap">
                                       <a target="_blank" href="https://www.google.com/maps?q=<?php echo $side_place_row['title']; ?>" class="button-text width-6">Directions<i class="fas fa-map"></i></a>
                                       <a href="view-place.php?id=<?php echo $side_place_row['id']; ?>" class="button-text width-6">View Place<i class="fas fa-eye"></i></a>
                                    </div><?php $side_counter+=1; ?>
                                 </div>
                              </div>
                           </div>
                        </div>
               <?php } } ?>
      </div>
<?php include 'footer.php'; ?>