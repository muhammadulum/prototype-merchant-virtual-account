
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                   <h3 class="text-gray-800">Pembayaran</h3>
                    </div>
                    <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card  shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            
                                            

           <table class="table table-border table-hovered ">
    	    <tr>
    		<th>No</th>
    		<th>Item</th>
    		<th>Nominal</th>
         <th>Bayar</th>
         <th>Pilih</th>
			<th>
			</th>

    	    </tr>
            
	
    </table>
    <a href="" class="btn btn-primary"> Bayar</a>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalnominal">Add</button>

   
  </div>
  </div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalnominal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Bulan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <script language="JavaScript">
function checkChoice(whichbox){
 with (whichbox.form){
  if (whichbox.checked == false)
   hiddentotal.value = eval(hiddentotal.value) - eval(whichbox.value);
  else
   hiddentotal.value = eval(hiddentotal.value) + eval(whichbox.value);
   return(formatCurrency(hiddentotal.value));
 }
}
function formatCurrency(num){
 num = num.toString().replace(/\$|\,/g,'');
 if(isNaN(num)) num = "0";
  cents = Math.floor((num*100+0.5)%100);
  num = Math.floor((num*100+0.5)/100).toString();
 if(cents < 10) cents = "0" + cents;
  for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
  num = num.substring(0,num.length-(4*i+3))+'.'+num.substring(num.length-(4*i+3));
  return ("Rp. " + num + "," + cents);
}
</script>
<body>

<center>
<form name=myform  method="post">
<table width="335" border="0">
  <tr>
    <td colspan="6" align="center"><strong>Daftar Item</strong></td>
    </tr>
  <tr>
    <td> </td>
    <td align="right"> </td>
    <td align="center"> </td>
  </tr>
  <tr>
    <td width="156">1</td>
    <td width="29">Januari</td>
    <td width="99" align="right">5.000</td>
    <td width="33" align="center"><input type=checkbox name=nasi value="5000" onClick="this.form.total.value=checkChoice(this);"></td>
  </tr>
  <tr>
    <td>2</td>
    <td>February.</td>
    <td align="right">10.000</td>
    <td align="center"><input type=checkbox name=ikan value="60000" onClick="this.form.total.value=checkChoice(this);"></td>
  </tr>
  <tr>
    <td>3</td>
    <td>Maret</td>
    <td align="right">5.000</td>
    <td align="center"><input type=checkbox name=cumi value="45000" onClick="this.form.total.value=checkChoice(this);"></td>
  </tr>
  <tr>
    <td>4</td>
    <td>April</td>
    <td align="right">5.000</td>
    <td align="center"><input type=checkbox name=kangkung value="15000" onClick="this.form.total.value=checkChoice(this);"></td>
  </tr>
  <tr>
    <td>5</td>
    <td>Mei</td>
    <td align="right">5.000</td>
    <td align="center"><input type=checkbox name=tahu value="5000" onClick="this.form.total.value=checkChoice(this);"></td>
  </tr>
  <tr>
    <td>6</td>
    <td>Juni</td>
    <td align="right">6.000</td>
    <td align="center"><input type=checkbox name=ayam value="12000" onClick="this.form.total.value=checkChoice(this);"></td>
  </tr>
  <tr>

    <td colspan="4"> </td>
  </tr>
  <tr>

  </tr>
  <tr>
    <td>7</td>
    <td>Juli</td>
    <td align="right">7.000</td>
    <td align="center"><input type=checkbox name=tehmanis value="4000" onClick="this.form.total.value=checkChoice(this);"></td>
  </tr>
  <tr>
    <td>8</td>
    <td>Agustus</td>
    <td align="right">8.000</td>
    <td align="center"><input type=checkbox name=jusmangga value="8000" onClick="this.form.total.value=checkChoice(this);"></td>
  </tr>
  <tr>
    <td>9</td>
    <td>September</td>
    <td align="right">9.000</td>
    <td align="center"><input type=checkbox name=jusalpukat value="8000" onClick="this.form.total.value=checkChoice(this);"></td>
  </tr>
  <tr>
    <td>10</td>
    <td>Oktober</td>
    <td align="right">10.000</td>
    <td align="center"><input type=checkbox name=lemontea value="5000" onClick="this.form.total.value=checkChoice(this);"></td>
  </tr>
  <tr>
    <td>11</td>
    <td>November</td>
    <td align="right">11.000</td>
    <td align="center"><input type=checkbox name=milkshake value="9000" onClick="this.form.total.value=checkChoice(this);"></td>
  </tr>
  <tr>
    <td>12</td>
    <td>Desember</td>
    <td align="right">12.000</td>
    <td align="center"><input type=checkbox name=milkshake value="9000" onClick="this.form.total.value=checkChoice(this);"></td>
  </tr>
  <tr>
    <td colspan="4" align="right">Total :
      <input type="text" name="total" value=""  readonly>
      <input type=hidden name=hiddentotal value=0></td>
  </tr>
</table>
</form>
 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?= base_url('siswa/bayar'); ?>"class="btn btn-primary">Pilih</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->


</div>
<div class="col-auto">
         
 </div>
 </div>
 </div>
 </div>
 </div>

                  
 <!-- Content Column -->
 </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

 