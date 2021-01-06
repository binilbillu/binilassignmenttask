<div class="container">


<?php
if($this->session->flashdata('errormessage')){
?>
<div class="alert alert-danger" role="alert">
 <?=$this->session->flashdata('errormessage')?>
</div>
<?php } ?>
<?php
if($this->session->flashdata('successmessage')){
?>
<div class="alert alert-success" role="alert">
 <?=$this->session->flashdata('successmessage')?>
</div>
<?php } ?>


  <!-- Content here -->
  <div class="card">
  <div class="card-body">
  <h5 class="card-title">File List</h5>
<div class="col-lg-12 row col-md-12 col-sm-12 col-xs-12">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">File</th>
      <th scope="col">Date (uploaded/Deleted)</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if($results){
    $i=1;
foreach($results as $data) {
   ?>

    <tr>
      <th scope="row"><?=$i?></th>
      <td><?=$data->filerealname?></td>
      <td><?=date('d-M-Y h:i:s a',strtotime($data->created_at))?></td>
      <td><?=($data->file_status=='1')?'Deleted':'Available'?></td>
      <td> 
      <?php
      if($data->file_status=='0')  {?>
      <a href="<?=base_url()?>welcome/filedelete/<?=$data->fileid?>/<?=$data->filename?>" onclick="return confirm('Are you sure you want to delete this file?');">Delete</a>
    <?php } ?>
    </td>
      <?php
     $i++; } }
      ?>
    </tr>
   
  </tbody>
</table>
<p><?php echo $links; ?></p>
</div>

</div>

</div>

</div>

<div class="modal" tabindex="-1" role="dialog" id="fileUploadModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="fileUploadForm" action="<?=base_url()?>welcome/uploadfileprocess" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
    <label for="exampleFormControlFile1">File</label>
    <input type="file" class="form-control-file" required id="uploadFile" name="uploadFile">
  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

      </form>
    </div>
  </div>
</div>

