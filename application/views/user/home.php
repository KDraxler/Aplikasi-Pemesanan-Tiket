
			<section class="banner-area relative" id="home" >	
				<div class="overlay overlay-bg"></div>
				<div class="container" >
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-9 col-md-12">
							<h6>Now you can watch</h6>
							<h1 class="text-white">
								Our Next Event			
							</h1>
							<div>
								<?php if(is_array($name)){?>
                  					<?php foreach ($name as $key) {?>
								<h2 class="text-white"><?php echo $key->name ; ?></h2>
								<?php }}else{?>
								<h2 class="text-white"> There's no upcoming events</h2>
								<?php }?>


							</div>
							<div class="countdown">
								<div id="timer" class="text-white">
    									
 					 			</div>
							</div>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->
		<!-- Start price Area -->
			<section class="price-area section-gap" id="price">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-8">
							<div class="title text-center">
								<?php if(is_array($name)){?>
                  					<?php foreach ($name as $key) {?>
                  					<h1 class="mb-10">Ticket for <?php echo $key->name ; ?> </h1>
                  					<p style="color: black">Who are in extremely love with <?php echo $key->artist ; ?>.</p>
									<?php }}else{?>
									<h1 class="mb-10">There is No Upcoming Event's Ticket</h1>
								<?php }?>
							</div>
						</div>
					</div>	
					<?php if(is_array($name)){?>
						<div class="row">
						<?php if(is_array($ticket)){?>
						<?php $no = 1;?>
                  		<?php foreach ($ticket as $key) {?>

						<div class="col-lg-3 col-md-6 single-price">
							<div class="top-part">
								<h1 class="package-no"><?php echo $no++; ?></h1><br>
							<div class="price-title">
								<h2><?php echo $key->seatZone ; ?></h2>
							</div></div>
							<div class="package-list">
								<ul>
									<li><font color="black">Entry Before <?php echo $key->startTime ; ?></font></li>
								</ul>
							</div>
							<div class="bottom-part">
								<h3>Rp. <?php echo $key->price ; ?></h3><br>
								<a href="<?php echo site_url()?>../Search/detailTicket/<?php echo $key->idSchedule;?>/<?php echo $key->idPrice ; ?>" class="btn btn-warning">Buy Now</a>
							</div>
						</div>

						<?php }?>

						</div>			
				</div>	
			</section>
					<?php }else{ ?>
					</div>
							<div class="title text-center"><h3 class="mb-10" style="color: #f4bd00">Ticket is not available</h3></div>

				</div>	
			</section>
							<?php }}?>
						
			<!-- End price Area -->
			
		<?php if (is_array($sche)) { ?>
		<section class="spekers-area pb-100" id="speakers">			
		<br>
			<center><h1>Our Upcoming Events in This Month</h1></center>
		<br>
		
			
				<div class="container-fluid">
					<div class="row no-padding">

						<div class="active-speaker-carusel col-lg-12 no-padding">
							<?php foreach ($sche as $key) {?>
							<div class="single-speaker item">
								<div class="container">
									<div class="row align-items-center">
										<div class="col-md-6 speaker-img no-padding">
											<img src="<?php echo base_url();?>assets/imgEvent/<?php echo $key->picture ?>" height ="430" alt="">
										</div>
										<div class="col-md-6 speaker-info no-padding">
											<h6 class="text-uppercase"><?php echo $key->name; ?> In <?php echo $key->city; ?></h6>
											<h3 class="text-white"><?php echo $key->category; ?></h3><br>
											<font size="4">
											<p>
												This event be held on: <br>
												Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<b>&nbsp;<?php echo $key->date; ?></b><br>
												Start Time&nbsp;: <b><?php echo $key->startTime; ?></b><br>
												End Time&nbsp;&nbsp;&nbsp;: <b><?php echo $key->endTime; ?></b><br>
											</p>
											</font>
											<?php echo $key->venue; ?>,&nbsp;<?php echo $key->city; ?>,&nbsp;<?php echo $key->country; ?>
											<br>
											
											
											<ul>
												<a href="#"><i class="fa fa-facebook fa-2x"></i></a>
												<a href="#"><i class="fa fa-twitter fa-2x"></i></a>
												<a href="#"><i class="fa fa-dribbble fa-2x"></i></a>
												<a href="#"><i class="fa fa-behance fa-2x"></i></a>
											</ul>
											<br>
											<a href="<?php echo site_url()?>/Search/detailEvent/<?php echo $key->idSchedule;?>">
                            				<button class="btn btn-secondary">See Details</button></a>                    						
              								
              									
              										<a href="<?php echo $key->location;?>" target="blank">
                            				<button class="btn btn-secondary">Maps</button></a>
              										
                            				
										</div>
									</div>
								</div>								
							</div>	<?php } ?>									
						</div>

					</div>
				</div>

				<!-- Modal Tambah -->
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="show-data" class="modal fade-in">
      <div class="modal-dialog" style="max-width: 700px; max-height: 500px">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title"><?php echo $search[0]->name ;?></h4>
              </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                    <div class="col-6 scroll" style='overflow:auto;width:400px;height:500px;'>
                      <center><img src="<?php echo base_url()?>/assets/imgEvent/<?php echo $search[0]->pict?>" width="200px"></center><br>
                        <p align="justify" style="color: black">
                        MeetUp is a ticket search engine that makes finding tickets to live entertainment a cinch. With the largest ticket selection of any site on the web, we have <?php echo $search[0]->artist ;?> tickets for every fan at every price point. As most concert fans know, <?php echo $search[0]->artist ;?> puts on one of the best performances of any artist currently touring. Fans of pop music won't want to miss this show.

                        This concert takes place at <?php echo $search[0]->startTime ;?> p.m. It is smart to travel to the venue before this start time, however, in order to avoid missing any of the show. The venue will be open ahead of time so that attendees can find their seats, or if the event is general admission, find a good place to stand or sit.

                        <?php echo $search[0]->artist ;?> performance at <?php echo $search[0]->venue ;?> is sure to be memorable. This venue is known to be one of the best in <?php echo $search[0]->city ;?>, if not all of the <?php echo $search[0]->country ;?>. If you have never been to <?php echo $search[0]->venue ;?>, MeetUp’s "View from Seat Zone" feature offers a preview of what your view will look like prior to making a purchase!

                         <?php echo $search[0]->artist ;?> ticket prices can frequently change based on a number of factors, such as time of day, day of week, location, and more. If you see a price point that you are comfortable with right now, we recommend making a purchase while that ticket is still available.

                        Those seeking a better value should consider upper-level seating sections where tickets may be available at a lower price, while those looking for the best seat in the house should explore the lower levels and floor seating. The MeetUp event page shows all available tickets on the market, and fans can sort by either ticket price or our Deal Score feature to find their perfect seat.</p>
                    </div>
                    <div class="col-6">
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


			</section>
						<?php }else{?>	
					<section class="spekers-area pb-100" id="speakers">	
						<br>
							<center><h1>Our Upcoming Events in This Month</h1></center>
						<br>
							<center><h3>There's no upcoming events</h3></center>
							<?php }?>	
					</section>


			<!-- End speakers Area -->

<script>

// Set the date we're counting down to
var countDownDate = '';
var a = '<?php echo $timer->date?>'+' <?php echo $timer->startTime?>';
if (a == ''){
    countDownDate = new Date().getTime();
}else{
    countDownDate = new Date(a).getTime();
}


// Update the count down every 1 second
var x = setInterval(function() {   
    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
      document.getElementById("timer").innerHTML ="<div class=' start-in' style='border-radius: 50px'>will start in:</div>"+ days + "<span>days  </span>: " + hours + "<span>hour</span>: "
        + minutes + "<span>mins  </span>: " + seconds + "<span>secs  </span>";

    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
          document.getElementById("timer").innerHTML ="<div class='start-in'>will start in:</div>"+ "0" + "<span>days  </span>: " + "0" + "<span>hour</span>: "
        + "0" + "<span>mins  </span>: " + "0" + "<span>secs  </span>";
        location.reload();

        }     
}, 1000);
</script>
<script type="text/javascript">
  <?php if (empty($numberTicket)) {?>
    $('#myModal').modal('show');
<?php } ?>
  
</script>