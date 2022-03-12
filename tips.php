<?php 
$title = "Tips";
$loder_switch = 1;
include "header.php";
?>
         <main id="content" class="site-main">

            <section class="inner-banner-wrap">
               <div class="inner-baner-container" style="background-image: url(data/hero/1.jpg);">
                  <div class="container">
                     <div class="inner-banner-content">
                        <h1 class="inner-title">Travel Tips</h1>
                     </div>
                  </div>
               </div>
               <div class="inner-shape"></div>
            </section>

            <div class="testimonial-page-section">
               <div class="container">
                  <div class="row">
                     <?php 
                     include_once('config/config.php');
                     $tip = $conn->query("SELECT * FROM tips;");
                     while($row = $tip->fetch_assoc()){
                     ?>
                     <div class="col-lg-4 col-md-6">
                        <div class="testimonial-item text-center">
                        <h3><?php echo $row['title'] ?></h3>
                           <div class="testimonial-content">
                              <p><?php echo $row['tip'] ?></p>
                              
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </main>
         <?php include "footer.php" ?>