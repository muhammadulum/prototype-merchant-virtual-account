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
            <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
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
</script>
    <script language="JavaScript">
        function checkChoice(whichbox) {
            with(whichbox.form) {
                if (whichbox.checked == false)
                    hiddentotal.value = eval(hiddentotal.value) - eval(whichbox.value);
                else
                    hiddentotal.value = eval(hiddentotal.value) + eval(whichbox.value);
                return (formatCurrency(hiddentotal.value));
            }
        }

        function formatCurrency(num) {
            num = num.toString().replace(/\$|\,/g, '');
            if (isNaN(num)) num = "0";
            cents = Math.floor((num * 100 + 0.5) % 100);
            num = Math.floor((num * 100 + 0.5) / 100).toString();
            if (cents < 10) cents = "0" + cents;
            for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
                num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
            return ("Rp. " + num + "," + cents);



        $('#select',).click(function(){
        var item_id =$(this).data('id');
        var item_item =$(this).data('item');
        var item_nominal =$(this).data('hidentotal');
        $('#id_tarif').val(item_id);
        $('#item').val(item_item);
        $('#nominal').val(item_nominal);
        $('#modal-item').modal(close);

    })
        }
    </script>
</head>

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
    <div class="container">
        <div class="row">
            <div class="col">
                
                <form>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nominal</th>
                                <th scope="col">Pilih</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            
                            foreach ($hasil as $item) : ?>
                                <tr>
                                    <td id="id"><?php echo $item->id_tarif ?></td>
                                    <td id="item"><?php echo $item->nama_item ?></td>
                                    <td><?php echo $item->nominal_tarif ?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?php echo $item->nominal_tarif ?>" onClick="this.form.total.value=checkChoice(this);">
                                            <label class="form-check-label" for="pilih">
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="4">Total :
                                    <input type="text" name="total" value="" readonly>
                                    <input type=hidden id="hiddentotal"name=hiddentotal value=0></td>
                            </tr>
                        </tfoot>

                    </table>
                </form>
            <button class="btn btn-xs btn-info" id="select"
            data-id="<?= $item->id_tarif; ?>"
            data-item="<?= $item->nama_item; ?>"
            data-nominal="hiddentotal">
        <i class="fa fa-check"></i>pilih</button>

            </div>
        </div>
        </div>
    </div>
    </div>
