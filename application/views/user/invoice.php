	    <div class="container-fluid" style="background-color:  #f4bd00; padding-top: 100px;padding-bottom: 20px">
          <br><br>
          <div class="row">
            <div class="col-12">
              <div class="card" style="background-color: #161616;padding-top: 10px; padding-bottom: 10px; padding-left: 10px;box-shadow: 0 0px 0px rgba(0, 0, 0, 0);"><h2 class="text-white">View Invoice &nbsp;</h2></div>
                </div>
              </div>
            </div>

<section id="body" style="background-color: #efefef">
  <div class="container-fluid" style="padding-top: 20px; padding-bottom: 100px ;color: black;">
    <div class="card">
      <div class="card-body">
      <?php if (is_array($invoice)) {?>
      <div class="row">       
        <div class="col-1">
          <h4>Id Order</h4>
        </div>
         <div class="col-3">
          <h4>Invoice</h4>
         </div>
         <div class="col-2">
          <h4>Event Name</h4>
         </div>
         <div class="col-3">
          <h4>Picture</h4>
        </div>
         <div class="col-1">
          <h4>Action</h4>
         </div>
          <div class="col-2">
          
         </div>
      </div>
      <br>


      <div class="row">
        <?php foreach ($invoice as $key) { ?>
        
        <div class="col-1">
          <p><?php echo $key->idOrder?></p>
        </div>
         <div class="col-3">
            <p><?php echo $key->invoice?></p>
         </div>
        <div class="col-2">
            <p><?php echo $key->name?></p>
         </div>
         <div class="col-3">
            <p><img src="<?php echo base_url()?>assets/imgEvent/<?php echo $key->gambar;?>" width="100" height="100" /></p>
         </div>
         <div class="col-3">
          <a href="javascript:void(0);" data-id="<?php echo $key->invoice ; ?>" data-pict="<?php echo $key->gambar ; ?>" data-toggle="modal" data-target="#edit-data">
          <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-primary"><span class="fa fa-plus"></span>&nbsp;Add Photo</button></a>
         </div>
         <!-- <div class="col-1"> -->
<!--            <p><?php //echo $key->quantity?> Tickets</p>
         </div>
          <div class="col-2">
          <a href="<?php //echo base_url()?>/Order/createPdf/<?php //echo $key->idOrder?>"><button class="btn btn-primary">Download Ticket</button></a>
         </div>
 -->         <?php }} else{ ?>
         <h3>You have not invoice tickets to any events.</h3>
         <?php } ?>
      </div>
      <br><br>
      <br>
    </div>
	</div>
</section>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade-in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Bukti Transaksi</h4>
                </div>
                 <?php echo form_open_multipart('Order/updatePhoto'); ?>
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Photo</label>
                                <div class="col-lg-12">
                                   <input type="hidden" class="form-control" id="id" name="id">
                                    <input type="file" class="form-control" id="pict" name="pict">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit"> Send&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
 
    <script>
        $(document).ready(function() {
            // Untuk sunting
            $('#edit-data').on('show.bs.modal', function (event) {
                var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal          = $(this)
 
                // Isi nilai pada field
                modal.find('#id').attr("value",div.data('id'));
                modal.find('#pict').attr("value",div.data('pict'));
            });
        });
    </script>