        <div class="container-fluid" style="background-color:  #f4bd00; padding-top: 50px; padding-bottom: 150px;">
          <br><br><br>
          <div class="row">
          <div class="col-1"></div>
            <div class="col-10">

              <div class="search-bg"> 
                    <?php echo form_open_multipart('Search/searchAll','class="search-form"'); ?>
                    <span class="fa fa-2x fa-search" style="color: black; padding-left: 13px; padding-top: 15px"></span>
                    <div class="search-input-wrapper">
                      <input type="text" id="search-input" class="search-input form-control" name="keyword"  placeholder="Search for An Event" aria-label="Search Search for An Event">
                      </div>
                      <button class="search-submit-large" type="submit">Search</i></button>
                    
                  </div>
                   
                  <?php echo form_close();?>
                </div>
              </div>
            </div>
          </div>
    
    <section id="body" style="background-color: #efefef">
        <div class="container-fluid" style="padding-left: 150px; padding-right: 150px; padding-top: 30px">
          
          <?php if(is_array($search)){?>
          <?php if(!empty($search[0]->artist) and empty($keyword) ){ ?>
          <div class="card" style="background-color: #161616;padding-top: 10px; padding-bottom: 10px; padding-left: 10px "><h2 class="text-white"><?php echo $detail?>&nbsp;<span class="title"><?php echo $search[0]->artist;?></span></h2></div>

            <?php }else if (!empty($search[0]->category) and empty($keyword)){ ?>
         <div class="card" style="background-color: #161616;padding-top: 10px; padding-bottom: 10px; padding-left: 10px"><h2 class="text-white"><?php echo $detail?>&nbsp;<span class="title"><?php echo $search[0]->category;?></span></h2></div>

            <?php }else{ ?>
          <div class="card" style="background-color: #161616;padding-top: 19px; padding-bottom: 18px; padding-left: 10px"><h2 class="text-white"><?php echo $detail;?></h2></div>

          <?php } ?>
          <br>
          <div class="card" style="padding-bottom: 30px">
					<div class="row">
            <?php foreach ($search as $key) { ?>
						<div class="col-md-4 text-center" style="color: black; padding-top:15px">
              <div class="container">
                <a href="<?php echo site_url()?>/Search/result/<?php echo $key->id;?>">
								<img src="<?php echo base_url()?>assets/imgEvent/<?php echo $key->pict;?>" width="300" height="300" style="border-radius: 15px;">
								<div class="overlay">
    								<div class="text"><?php echo $key->name;?>&nbsp;Tickets</div></a>
                </div>
              </a>
            </div>
          </div>
						<?php } ?>
					
					<!-- </div> -->
			</div>
      <?php }else{ ?>
      <h2 class="text-center">There's No Event</h2>
      <?php } ?>
    </div>
    <br>
  </div>
</section>
			<!-- /DEMOS -->






