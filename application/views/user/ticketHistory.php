	 
   <div class="container-fluid" style="background-color:  #f4bd00; padding-top: 100px;padding-bottom: 20px">
          <br><br>
          <div class="row">
            <div class="col-12">
              <div class="card" style="background-color: #161616;padding-top: 10px; padding-bottom: 10px; padding-left: 10px;box-shadow: 0 0px 0px rgba(0, 0, 0, 0);"><h2 class="text-white">View Order Tickets &nbsp;</h2></div>
                </div>
              </div>
            </div>

<section id="body" style="background-color: #efefef">
  <div class="container-fluid" style="padding-top: 20px; padding-bottom: 100px ;color: black;">
    <div class="card">
      <div class="card-body">
      <?php if (is_array($ticket)) {?>
      <div class="row">       
        <div class="col-1">
          <h4>Id Order</h4>
        </div>
         <div class="col-3">
          <h4>Date - Start Time</h4>
         </div>
         <div class="col-5">
          <h4>Event Name</h4>
         </div>
         <div class="col-1">
          <h4>Ticket</h4>
         </div>
          <div class="col-2">
          
         </div>
      </div>
      <br>


      <div class="row">
        <?php foreach ($ticket as $key) { ?>
        
        <div class="col-1">
          <p><?php echo $key->idOrder?></p>
        </div>
         <div class="col-3">
        <?php $dates =  $key->date;
                  $ubah = date_format(new dateTime($dates),'d M Y');?>
          <p><?php echo $ubah?>&nbsp;- &nbsp;<?php echo $key->startTime?></p>
         </div>
         <div class="col-5">
          <p><?php echo $key->name?> in <?php echo $key->venue?>,&nbsp;<?php echo $key->venue?></p>
         </div>
         <div class="col-1">
           <p><?php echo $key->quantity?> Tickets</p>
         </div>
          <div class="col-2">
          <a href="<?php echo base_url()?>/Order/createPdf/<?php echo $key->idOrder?>"><button class="btn btn-primary">Download Ticket</button></a>
         </div>
         <?php }} else{ ?>
         <h3>You have not purchased tickets to any events.</h3>
         <?php } ?>
      </div>
      <br><br>
      <br>
    </div>
    
	</div>
</section>