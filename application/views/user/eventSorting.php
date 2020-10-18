   
   <div class="container-fluid" style="background-color:  #f4bd00; padding-top: 100px;padding-bottom: 20px">
          <br><br>
          <div class="row">
            <div class="col-12">
              <div class="card" style="background-color: #161616;padding-top: 10px; padding-bottom: 10px; padding-left: 10px;box-shadow: 0 0px 0px rgba(0, 0, 0, 0);"><h2 class="text-white"><?php echo $search[0]->name;?>&nbsp;</h2></div>
                </div>
              </div>
            </div>
          </div>


<section id="body" style="background-color: #efefef">
<div class="container">
  <br>
  <div class="card">
          <table class="table text-left" border="0">
          <thead class="thead-dark">
            <tr>
              <th scope="col" colspan="3"><font size="5">Schedule for Upcoming Concert</font></th>
            </tr>
          </thead>
  
          <tbody style="color: black">
            <?php if(is_array($search)){?>
            <?php foreach ($search as $key) { ?>
              <tr onclick="window.location='<?php echo site_url()?>/Search/detailEvent/<?php echo $key->idSchedule;?>'">
                <th scope="row" style="background-color: #f4bd00" width="200px">
                  <!--<?php// $dates =  $key->date;
                  $ubah //= date_format(new dateTime($dates),'d M Y');

                  ?> -->

                  <h3><?php echo  $key->date; //$ubah?></h3>
                  <br>
                  <h4>&nbsp;<i class="fa fa-clock-o"></i>&nbsp;<?php echo $key->startTime;?></h4>
                </th>
                  <td>
                    <h5><?php echo $key->name;?> In <?php echo $key->city;?></h5>
                    <br>
                    <?php echo $key->venue;?>
                    <br>
                    <i style="color: #6c757d"><i class="fa fa-map-marker">&nbsp;</i><?php echo $key->city;?>,&nbsp;<?php echo $key->country;?></i>
                  </td>
                  <td width="100px">
                    <button class="btn btn-outline-info">See Ticket</button>
                  </td>
              </tr>
            <?php }}else{?>
              <tr>
                <th scope="row" colspan="3">
                  <h3>Is Empty</h3>
                </th>
              </tr>
            <?php } ?>
            </tbody>
          </table>
    </div>
    </div>
    <br>