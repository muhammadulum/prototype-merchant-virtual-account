<div class="card" style="margin buttom: 120px; width:65%">
    <div class="card-header font-weight-bold bg-primary text-white" >
    Profile
    </div>

<?php foreach($hasil as $q): ?>
    <div class="card-body">
        <div class="col-md-5">


        </div>
        <div class="col-md-7">
        <table class="table">
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td><?php echo $q->nama_siswa ?></td>
            </tr>
            <tr>
                <td>Nis</td>
                <td>:</td>
                <td><?php echo $q->nis ?></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><?php echo $q->tempat_lahir ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><?php echo $q->tgl_lahir ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?php echo $q->jenis_kelamin ?></td>
            </tr>
            <tr>
                <td>Alamat Email</td>
                <td>:</td>
                <td><?php echo $q->email ?></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>:</td>
                <td><?php echo $q->no_hp?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $q->alamat?></td>
            </tr>
        </table>

        </div>

    </div>
<?php endforeach; ?>

</div>