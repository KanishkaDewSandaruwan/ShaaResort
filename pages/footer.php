 <!--================ start footer Area  =================-->	
 <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About Agency</h6>
                            <p><?php echo $res['about_desc']; ?> </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Navigation Links</h6>
                            <div class="row">
                                <div class="col-4">
                                    <ul class="list_style">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="accomodation.php">Accomodation</a></li>
                                        <li><a href="about.php">About US</a></li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <ul class="list_style">
                                        <li><a href="gallery.php">Gallery</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </div>										
                            </div>							
                        </div>
                    </div>							

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget instafeed">
                            <h6 class="footer_title">InstaFeed</h6>
                            <ul class="list_style instafeed d-flex flex-wrap">
                            <?php
                                $getall = getAllgalleryImages();
                                $count = 0;
                                while ($row = mysqli_fetch_assoc($getall)) {

                                    $gallery_id = $row['gallery_id'];
                                    $img = $row['gallery_image'];
                                    $img_src = "server/uploads/gallery/" . $img;
                                    if($count < 6) : ?>

                                <li><img src="<?php echo $img_src; ?>" width="100px" alt=""></li>
                                <?php endif; $count++; } ?>
                             
                            </ul>
                        </div>
                    </div>						
                </div>
                <div class="border_line"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-sm-12 footer-text m-0">   &copy; Shaa Resort <script>
                    document.write(new Date().getFullYear())
                    </script>. All Right Reserved. <br>
                    Designed By : Ahinsa Sadarenu | SEU/IS/17/MIT/051</p>
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="<?php echo $res['link_facebook']; ?>"><i class="fab fa-facebook"></i></a>
                        <a href="<?php echo $res['link_twiiter']; ?>"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo $res['link_instragram']; ?>"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->