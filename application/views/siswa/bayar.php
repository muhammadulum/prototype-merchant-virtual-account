<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Pembayaran
        </div>
       
    </div>



    <form method="POST" action="<?= base_url('siswa/bayar'); ?>">

    <div class="form-group">
    <label>Nis</label>
    <input type="text" name="nis" id="nis" class="form-control" value="<?= $this->session->userdata('nis'); ?>" readonly>
    </div>

    <div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" id="nis" class="form-control" value="<?= $this->session->userdata('nama_siswa'); ?>" readonly>
    </div>

    <div class="form-group">
    <label>Metode Pembayaran</label>
    <select class="form-control">
    <option>Bank Permata</option>
    </select>
    </div>
   
    <div class="form-group">
    <label>Total Bayar</label>
    <?php $grand_total=0;
                    if ($keranjang=$this->cart->contents()) {
                        # code...
                        foreach ($keranjang as $item){
                            $grand_total=$grand_total+$item['subtotal'];

                        }
                    }?>
    <input type="text" name="nominal" id="nominal" class="form-control" value="<?php echo $grand_total; ?>" readonly>
    </div>

    <div class="form-group">
    <label>Item</label>
    <?php $no=1;
    foreach($this->cart->contents() as $items): ?>
    <input type="text" name="nama" id="nis" class="form-control" value="<?php echo $items['name'] ?>" readonly>
    <?php endforeach; ?>
    </div>

    <div class="form-group">
    <label></label>
    <?php $no=1;
    foreach($this->cart->contents() as $items): ?>
    <input type="hidden" name="id_tarif[]" id="id_tarif" class="form-control" value="<?php echo $items['id'] ?>" readonly>
    <?php endforeach; ?>
    </div>
   
    <button class="btn btn-success mb-3" type="submit" name="submit" value=""><i class="fa fa-check"></i> Bayar</button>
    </form>
  
</div>