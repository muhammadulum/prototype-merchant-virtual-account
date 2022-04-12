<div class="card" style="margin buttom: 120px; width:65%">
    <div class="card-header font-weight-bold bg-primary text-white" >
    Tagihan
    </div>

<?php foreach($hasil as $q): ?>
    <div class="card-body">
        <div class="col-md-5">


        </div>
        <div class="col-md-7">
        <table class="table">
        
            <tr>
                <td>Nis</td>
                <td>:</td>
                <td><?php echo $q->nis ?></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><?php echo $q->tanggal?></td>
            </tr>

            <tr>
                <td>Batas Bayar</td>
                <td>:</td>
                <td><?php echo $q->batas_bayar?></td>
            </tr>
            <tr>
                <td>TRX-ID</td>
                <td>:</td>
                <td><?php echo $q->trx_id ?></td>
            </tr>
            <tr>
                <td>Kode Virtual Account</td>
                <td>:</td>
                <td><?php echo $q->va ?></td>
            </tr>
            <tr>
                <td>Nominal</td>
                <td>:</td>
                <td><?php echo $q->nominal ?></td>
            </tr>

            
        </table>
        <button class="btn btn-primary">Transfer</button>
        <a href="<?= base_url('siswa/print'); ?>" class="btn btn-danger"><i class="fa fa-print"></i> Cetak Tagihan</a>
        </div>

    </div>
<?php endforeach; ?>

</div>