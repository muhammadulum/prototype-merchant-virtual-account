<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Pembayaran
        </div>
       
    </div>



    <form method="POST" action="<?= base_url('siswa/bayar'); ?>">
   
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <td class="text-center">No</td>
            <td class="text-center">Item</td>
            <td class="text-center">Nominal</td>
        </tr>
            <?php  
        for ($i = 0; $i <= 0; $i++) ?>
            <tr>
                <input type="hidden" name="nis" id="nis" class="form-control" value="<?= $this->session->userdata('nis'); ?>">
                <input type="hidden" name="id_tarif" id="id_tarif" class="form-control" value="">    

                <td><?= $i; ?></td>  
                <td><input type="text" name="item" id="item" class="form-control" value="0"readonly></td>  
                <td><input type="text" name="nominal"  id="nominal" class="form-control" value="0"readonly></td>  
            </tr>
       
    </table><br><br>
    <button class="btn btn-success mb-3" type="submit" name="submit" value=""><i class="fa fa-check"></i> Bayar</button>
    <button class="btn btn-primary mb-3" type="button" data-toggle="modal" data-target="#modal-item"><i class="fa fa-plus-circle"></i>Add</button>
    </form>
  
</div>

<!-- Modal -->
<div class="modal fade" id="modal-item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Bulan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
      <thead>
    	<tr>
    		<th>No</th>
    		<th>Bulan</th>
    		<th>Nominal</th>
    		<th>Pilih</th>
        
    	</tr>
        </thead>
		
		<tbody>
		 <?php $no=1; foreach ($hasil as $data): ?>

		<tr>
	
		<tr>
		<td><?=$no++?></td>
		<td><?php echo $data->nama_item ?></td>
		<td><?php echo $data->nominal_tarif?></td>
		<td><button class="btn btn-xs btn-info" id="select"
            data-id="<?= $data->id_tarif; ?>"
            data-item="<?= $data->nama_item; ?>"
            data-nominal="<?= $data->nominal_tarif; ?>">
        <i class="fa fa-check"></i>pilih</button>
        </td>
       
	</tr>
    
	 <?php endforeach; ?>
     </tbody>
    </table>
      </div>
      
      <!-- <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tambahkan</button> 
      </div> -->
    </div>
  </div>
</div>

<!-- Modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(document).on('click','#select',function(){
        var item_id =$(this).data('id');
        var item_item =$(this).data('item');
        var item_nominal =$(this).data('nominal');
        $('#id_tarif').val(item_id);
        $('#item').val(item_item);
        $('#nominal').val(item_nominal);
        $('#modal-item').modal(close);

    })
})
</script>