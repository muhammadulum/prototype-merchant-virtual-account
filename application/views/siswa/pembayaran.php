<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Pembayaran
        </div>
       
    </div>
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
		<td><?php echo anchor('siswa/tambah_ke_keranjang/'.$data->id_tarif,'<div class="btn btn-xs btn-info"><i class="fa fa-check"></i>Pilih</div>') ?>
        </td>
       
	</tr>
    
	 <?php endforeach; ?>
     </tbody>
    </table>

</div>

