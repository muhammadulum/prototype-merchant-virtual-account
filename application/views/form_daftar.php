
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<body class="bg-gradient-primary">
  <div class="container">
  <div class="row justify-content-center">
  <div class="col-lg-7">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
              <center>
                <img src="<?= base_url('assets/'); ?>/img/gosanta.png" alt="" width="100%">
            </center>
                <h1 class="h4 text-gray-900 mb-4">Daftar</h1>
                
              </div>
              <form class="user" method="post" action="<?= base_url('welcome/registrasi'); ?>">
                
              <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="nis" name="nis" placeholder="Nis Siswa"
                  value="<?= set_value('nis'); ?>">
                  <?= form_error('nis','<small calass"text-danger plg-3">','</small>'); ?>
                </div>


                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama_siswa" name="nama_siswa" placeholder="Nama Lengkap"
                  value="<?= set_value('nama_siswa'); ?>">
                  <?= form_error('nama_siswa','<small calass"text-danger plg-3">','</small>'); ?>
                </div>



                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"
                  value="<?= set_value('tempat_lahir'); ?>">
                  <?= form_error('tempat_lahir','<small calass"text-danger plg-3">','</small>'); ?>
                </div>


                <div class="form-group">
                  <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" placeholder="tgl_lahir"
                  value="<?= set_value('tgl_lahir'); ?>">
                  <?= form_error('tgl_lahir','<small calass"text-danger plg-3">','</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin"
                  value="<?= set_value('jenis_kelamin'); ?>">
                  <?= form_error('jenis_kelamin','<small calass"text-danger plg-3">','</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address"
                  value="<?= set_value('email'); ?>">
                  <?= form_error('email','<small calass"text-danger plg-3">','</small>'); ?>
                </div>


                <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="No hp"
                  value="<?= set_value('no_hp'); ?>">
                  <?= form_error('no_hp','<small calass"text-danger plg-3">','</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat"
                  value="<?= set_value('alamat'); ?>">
                  <?= form_error('alamat','<small calass"text-danger plg-3">','</small>'); ?>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1','<small calass"text-danger plg-3">','</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                  </div>
                </div>
                <button type href="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
              </form>
              <hr>
      
              <div class="text-center">
                <a class="small" href="<?= base_url('welcome'); ?>">Sudah Punya Akun</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  </body>

 