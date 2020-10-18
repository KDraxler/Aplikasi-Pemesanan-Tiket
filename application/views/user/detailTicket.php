

<div id="myModal" class="modal yuhu" role="dialog">
  <div class="modal-dialog1">
    <?php echo form_open_multipart(''); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">The Number of Tickets You Want to Buy</h4>
      </div>
      <div class="modal-body">
        <center>
        <button name="subject" class="btn btn-lg btn-warning" type="submit" value="1" data>1 Ticket</button>
        <button name="subject" class="btn btn-lg btn-warning" type="submit" value="2">2 Ticket</button>
        <button name="subject" class="btn btn-lg btn-warning" type="submit" value="3">3 Ticket</button>
        <button name="subject" class="btn btn-lg btn-warning" type="submit" value="4">4 Ticket</button>
         <button name="subject" class="btn btn-lg btn-warning" type="submit" value="5">5 Ticket</button>
       </center>
      </div>
    </div>
     <?php echo form_close();?>
  </div>
</div>



<section id="body" style="background-color: #fff; color: black">
        <div class="container-fluid" style="padding-left: 10px; padding-right: 10px; padding-top: 30px;background-color:  #e8be04;">
          <br><br><br>
          <div class="row">
            <div class="col-12">
              <div class="single-footer-widget" style="">
                  <?php if(is_array($search)){?>
          <?php foreach ($search as $key) { ?>
          <div class="row" data-toggle="modal" data-target="#show-data">
            <div class="col-md-7">
                  <h2><?php echo $key->name;?> In <?php echo $key->city;?></h2><br>
                    <b><font color="black"><?php echo $key->venue;?></font></b>
                    <br>
                    <i style="color: #fff ;"><i class="fa fa-map-marker">&nbsp;</i><?php echo $key->city;?>,&nbsp;<?php echo $key->country;?></i>
              </div>
            </div>
             <?php }}else{?>
                  <h3>Is Empty</h3>
            <?php } ?>
                </div>
              </div>
            </div>
          </div>

<div class="row">
<div class="col-md-3 card" style="padding-left: 13px">
<ul class="tab">
  <li><a href="#" class="tablinks" onclick="openCity(event, 'Ticket')">A-Z</a></li>
</ul>

<div id="Ticket" class="tabcontent">
  <?php if (!empty($ticket)) {?>
   <?php if (!empty($numberTicket)) {?>
            <table class="table text-left">
          <tbody style="color: black">
            <h5>The Number of Ticket You Want : <?php echo $numberTicket[0];?></h5>
            <br>
            <?php if(is_array($ticket)){?>
            <?php foreach ($ticket as $key) { ?>
              <tr onclick="window.location='<?php echo site_url()?>/Search/detailTicket/<?php echo $key->idSchedule;?>/<?php echo $key->idPrice;?>'">
                <th scope="row">
                  <h4><?php echo $key->seatZone ; ?></h4>
                  <br>
                  <h5>Remaining Tickets : <?php echo $key->remainTicket ; ?></h5>
                </th>
                  <td width="50px">
                    <button class="btn btn-outline-warning" style="width: 110px">Rp.<?php echo $key->price ; ?></button>
                  </td>
              </tr>
            <?php }}else{?>
              <tr>
                <th scope="row" colspan="3">
                  <h3>Is Empty</h3>
                </th>
              </tr>
            <?php }}else{?>
            <?php } ?>
            </tbody>
          </table>
          <?php }?>

          <?php if (!empty($detail)) {?>
            <h5>The Number of Ticket You Want : <?php echo $numberTicket[0];?></h5>
            <br>
            <?php if(is_array($detail)){?>
            <div class="row">
            <div class="col-7">
            <h3>Rp.<?php echo $detail[0]->price ; ?></h3>
            <p style="color: grey">Includes $19 seller and delivery fees</p>
            </div>
            <div class="col-5">
            <a href="<?php echo site_url()?>/Payment/home/<?php echo $detail[0]->idPrice;?>"><button class="btn btn-outline-warning" style="width: 110px">Checkout</button></a>
            </div>        
            </div>
            <hr>
            <div class="row">
            <div class="col-2" style=""><i class="fa fa-clock-o" style="font-size:35px;color:black;margin-top: -9px"></i>
            <br>
            <i class="fa fa-ticket" style="font-size:35px;color:black;margin-top: 20px"></i>
            <br>
            <i class="fa fa-bank" style="font-size:35px;color:black;margin-top: 20px"></i>
            
            </div>
            <div class="col-10">
            <b><p style="color: black">At <?php echo $detail[0]->startTime ; ?></p>
            <hr />
            <p style="color: black"><?php echo $detail[0]->remainTicket ; ?> Remaining Tickets</p>
            <hr />
            <p style="color: black"><?php echo $detail[0]->seatZone ; ?></p></b>
            <br><br><br><br>
            </div>
            </div>

            <?php }else{?>
                  <h3>Is Empty</h3>
            <?php }}else{?>
            <?php } ?>

</div>
</div>

<div class="col-md-1"></div>
<div class="col-md-8" style="padding-top: 70px; padding-bottom: 20px; ">
 <center><img src="<?php echo base_url()?>assets/imgEvent/<?php echo $search[0]->photo;?>" width = "800" height="370" style="border-radius: 5px;"></center>
</div>

</div>
</section>

<!-- Modal Tambah -->
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="show-data" class="modal fade-in">
      <div class="modal-dialog" style="max-width: 900px; max-height: 500px">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title"><?php echo $search[0]->name ;?></h4>
              </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                    <div class="col-4 scroll" style='overflow:auto;width:400px;height:500px;'>
                      <center><img src="<?php echo base_url()?>/assets/imgEvent/<?php echo $search[0]->pict?>" width="200px"></center><br>
                        <p align="justify" style="color: black">
                        MeetUp is a ticket search engine that makes finding tickets to live entertainment a cinch. With the largest ticket selection of any site on the web, we have <?php echo $search[0]->artist ;?> tickets for every fan at every price point. As most concert fans know, <?php echo $search[0]->artist ;?> puts on one of the best performances of any artist currently touring. Fans of pop music won't want to miss this show.

                        This concert takes place at <?php echo $search[0]->startTime ;?> p.m. It is smart to travel to the venue before this start time, however, in order to avoid missing any of the show. The venue will be open ahead of time so that attendees can find their seats, or if the event is general admission, find a good place to stand or sit.

                        <?php echo $search[0]->artist ;?> performance at <?php echo $search[0]->venue ;?> is sure to be memorable. This venue is known to be one of the best in <?php echo $search[0]->city ;?>, if not all of the <?php echo $search[0]->country ;?>. If you have never been to <?php echo $search[0]->venue ;?>, MeetUp’s "View from Seat Zone" feature offers a preview of what your view will look like prior to making a purchase!

                         <?php echo $search[0]->artist ;?> ticket prices can frequently change based on a number of factors, such as time of day, day of week, location, and more. If you see a price point that you are comfortable with right now, we recommend making a purchase while that ticket is still available.

                        Those seeking a better value should consider upper-level seating sections where tickets may be available at a lower price, while those looking for the best seat in the house should explore the lower levels and floor seating. The MeetUp event page shows all available tickets on the market, and fans can sort by either ticket price or our Deal Score feature to find their perfect seat.</p>
                    </div>
                    <div class="col-2">
                      <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col" colspan="2">Event Details</th>
                              </tr>
                            </thead>
                            <tbody style="color: black">
                              <tr class="no-hover">
                                <th scope="row">Venue</th>
                                <td><h1><?php echo $search[0]->venue ;?>,&nbsp;<?php echo $search[0]->city ;?>,&nbsp;<?php echo $search[0]->country ;?></h1></td>
                              </tr>
                              <tr class="no-hover">
                                <th scope="row">Date</th>
                                <td><?php echo $search[0]->date ;?></td>
                            </tr>
                            <tr class="no-hover">
                                <th scope="row">Time</th>
                                <td><?php echo $search[0]->startTime ;?></td>
                              </tr>
                              <tr class="no-hover">
                                <th scope="row">Performer</th>
                                <td><?php echo $search[0]->artist ;?></td>
                              </tr>
                            </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      <footer class="footer-area section-gap">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-6">
              <div class="single-footer-widget">
                <h6>About Us</h6>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
                </p>
                <p class="footer-text">
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart3" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>                
              </div>
            </div>
            <div class="col-lg-5  col-md-6 col-sm-6">
              <div class="single-footer-widget">
                <h6>Newsletter</h6>
                <p>Stay update with our latest</p>
                <div class="" id="mc_embed_signup">
                  <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                    <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                    <div style="position: absolute; left: -5000px;">
                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                      </div>

                    <div class="info"></div>
                  </form>
                </div>
              </div>
            </div>            
            <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
              <div class="single-footer-widget">
                <h6>Follow Us</h6>
                <p>Let us be social</p>
                <div class="footer-social d-flex align-items-center">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-dribbble"></i></a>
                  <a href="#"><i class="fa fa-behance"></i></a>
                </div>
              </div>
            </div>              
          </div>
        </div>
      </footer> 

      <!-- End footer Area -->  

      <script src="<?php echo base_url();?>assets/assets/js/vendor/jquery-2.2.4.min.js"></script>
      <script src="<?php echo base_url();?>assets/assets/js/vendor/bootstrap.min.js"></script>      
        <script src="<?php echo base_url();?>assets/assets/js/easing.min.js"></script>      
      <script src="<?php echo base_url();?>assets/assets/js/superfish.min.js"></script> 
      <script src="<?php echo base_url();?>assets/assets/js/jquery.ajaxchimp.min.js"></script>
      <script src="<?php echo base_url();?>assets/assets/js/jquery.magnific-popup.min.js"></script> 
      <script src="<?php echo base_url();?>assets/assets/js/owl.carousel.min.js"></script>      
      <script src="<?php echo base_url();?>assets/assets/js/main.js"></script>


<script type="text/javascript">
  <?php if (empty($numberTicket)) {?>
    $('#myModal').modal('show');
<?php } ?>
  
</script>

<script>
        document.getElementsByClassName('tablinks')[0].click()
        function openCity(evt, className) {
            document.getElementById(className).style.display = "block";
            evt.currentTarget.className += " active";
        }
      </script>


 </body>
  </html>

