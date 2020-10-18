<section id="body" style="background-color: #fff; color: black">
        <div class="container-fluid" style="padding-left: 10px; padding-right: 10px; padding-top: 30px;background-color: #efefef">
          <br><br>

<div class="row">
<div class="col-md-8" style="padding-left: 13px; background-color: white">
<br>
<div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-8">
<center><b style="color: black"><p style="font-size: 25px"><?php echo $detail[0]->name ?> : <?php echo $detail[0]->artist ?><br></p></b>
<p style="font-size: 19px"><?php echo $detail[0]->date ?> At <?php echo $detail[0]->startTime ?><br><?php echo $detail[0]->venue ?>,&nbsp;<?php echo $detail[0]->city ?>,&nbsp;<?php echo $detail[0]->country ?></p></center>
<hr>
</div></div>
<?php echo form_open_multipart('Payment/input'); ?>
          <div class="row form-group">
            <div class="col-lg-3"></div>
            <label class="col-lg-3 control-label" style="font-size: 16px">Full Name</label>
            <div class="col-lg-5">
              <input class="form-control" name="id" type="hidden" value="<?php echo $name[0]->idUser?>">
              <input class="form-control" name="idSche" type="hidden" value="<?php echo $detail[0]->idSchedule?>">
              <input class="form-control" name="name" type="text" value="<?php echo $name[0]->name?>">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-lg-3"></div>
            <label class="col-lg-3 control-label" style="font-size: 16px">Address</label>
            <div class="col-lg-5">
              <input class="form-control" type="text" name="add" value="<?php echo $name[0]->address?>">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-lg-3"></div>
            <label class="col-lg-3 control-label" style="font-size: 16px">Phone Number</label>
            <div class="col-lg-5">
              <input class="form-control" name="phone" type="text" value="<?php echo $name[0]->phoneNumber?>">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-lg-3"></div>
            <label class="col-lg-3 control-label" style="font-size: 16px">Email</label>
            <div class="col-lg-5">
              <input class="form-control" name="email" type="text" value="<?php echo $name[0]->email?>">
            </div>
          </div>
          
          <div class="row form-group">
            <div class="col-lg-3"></div>
            <label class="col-md-3 control-label" style="font-size: 16px">Quantity</label>
            <div class="col-md-5">
              <input class="form-control" type="text" name="qty" value="<?php echo $numberTicket[0]?>" readonly>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-3" style="font-size: 16px"><br>Payment Method</div>
            <div class="col-lg-5">
              <img src="<?php echo base_url()?>/assets/imgEvent/card.jpg" width="300">
            </div>
          </div>

          <?php $y = $numberTicket[0]; $jumlah = 0;
                for ($x = 0; $x < $y; $x++) {
                $jumlah += $detail[0]->price;
          } ?>

          <input class="form-control" type="hidden" name="total" value="<?php echo $jumlah;?>">

         <!--  <div class="row form-group">
            <div class="col-lg-3"></div>
            <label class="col-md-3 control-label"></label>
            <div class="col-md-5">
              <input class="form-control" type="text" name="card" placeholder="Credit Card Number">
            </div>
          </div> -->

          <div class="row form-group">
           <div class="col-lg-3"></div>
            <div class="col-md-8">
              <hr>
              <div class="row">
                <div class="col-md-3">
                <input type="submit" class="btn btn-primary" value="Pay Rp. <?php echo number_format($jumlah, 0, ',', '.') ?>">
              </div>
              <div class="col-md-1"> <span class="fa fa-check" style="font-size:35px; margin-left: 10px"></span></div>
              <div class="col-md-8">
              By using this website, by purchasing a ticket or by creating an account you agree to the terms of use and the privacy policy.
            </div>
          </div>
        </div>
      </div>
        <?php echo form_close();?>
      </div>
  <div class="col-md-4">
    <br>
    <p style="font-size: 17px">Order Summary </p>
    <hr width="300px" align="left">
    <div class="row">
      <div class="col-md-4">
       <p style="font-size: 15px"> Price </p>
       <hr width="300px" align="left">
       <p style="font-size: 15px"> Quantity </p>
       <hr width="300px" align="left">
       <p style="font-size: 20px"> TOTAL </p>
       <hr width="300px" align="left">
       <br>

      </div>
      <div class="col-md-4">
      <?php $key = $detail[0]->price;?>
      <p style="font-size: 15px">Rp. <?php echo number_format($key, 0, ',', '.') ?> each</p><br>
      <p style="font-size: 15px; margin-top: -5px">x <?php echo $numberTicket[0]?> Tickets</p><br>
      <p style="font-size: 20px; margin-top: -5px">Rp. <?php echo number_format($jumlah, 0, ',', '.') ?></p>
      <br>

      </div>

    </div>
    <p style="font-size: 15px"> Your Tickets </p>
       <hr width="300px" align="left">
    <b style="color: black"><p style="font-size: 15px"><?php echo $detail[0]->name ?> : <?php echo $detail[0]->artist ?></b><br><br>
    <?php echo $detail[0]->date ?> At <?php echo $detail[0]->startTime ?><br><?php echo $detail[0]->venue ?>,&nbsp;<?php echo $detail[0]->city ?>,&nbsp;<?php echo $detail[0]->country ?></p>
    <br>
    <b style="color: black"><p style="font-size: 17px">Seat Zone : <?php echo $detail[0]->seatZone ?></p></b>
  




</div>
</div>
</section>