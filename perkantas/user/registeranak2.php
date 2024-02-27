<?php

define("USER_ACCESS", true);

require_once 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login - Griya Pulih Asih</title>

  <!-- ICON -->
  <link href="assets/logo.png" rel="icon" />

  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/acc3ee9eed.js" crossorigin="anonymous"></script>

  <!-- SWEET ALERT 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!-- DATEPICKER -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<style>
  * {
    transition: .2s ease-in-out;
  }

  body {
    background-color: #FFCC70;
    width: 100vw;
    height: 100vh;
    overflow-x: hidden;
  }

  .container-fluid {
    /* width: 100vw;
    height: 100vh;
    align-items: center;
    justify-content: center;
    display: flex; */
    max-width: 80%;

  }

  .form {
    background-color: rgba(255, 255, 255, 0.3);
    padding: 30px;
    border-radius: 0.5rem;
  }

  .input-container {
    position: relative;
  }

  .input-container input,
  .form button {
    outline: none;
    border: 0px solid #e5e7eb;
    margin: 8px 0;
    font-size: 15px;
  }

  #eye-pass-open:hover,
  #eye-conf-open:hover {
    color: #FF9B50;
    cursor: pointer;
  }

  #eye-pass-closed:hover,
  #eye-conf-closed:hover {
    color: #FF9B50;
    cursor: pointer;
  }

  .submit {
    /* display: block;
    padding-top: 0.6rem;
    padding-bottom: 0.6rem; */
    background-color: #FF9B50;
    color: rgb(89, 59, 29);
    font-size: 0.875rem;
    line-height: 1.25rem;
    font-weight: 500;
    width: 100%;
    border-radius: 0.5rem;
    border-color: transparent;
    text-transform: uppercase;
  }

  .submit:enabled:hover {
    background-color: rgba(130, 92, 55, 1);
    color: white;
  }

  .fa-arrow-left {
    font-size: 3rem;
    cursor: pointer;
  }

  .container-fluid {
    padding-top: 5vh !important;
    padding-bottom: 5vh !important;
  }

  .btn-submit:hover {
    background-color: #FF9B50 !important;
  }

  .form-label,
  h6,
  .form-check-label {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 25px;
  }

  h3 {
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 40px;
    text-align: center;
  }

  #submit {
    width: 40vw !important;
    height: 10vh;
    font-size: 20px;
    background-color: #FFFADD;
  }
</style>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="register1.php">
          <i class="fa-solid fa-arrow-left" style="color: #ff9b60;"></i>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <h3 class="text-center">Form Pendaftaran Anak</h3>
        <br>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <form method="post" class="form needs-validation" novalidate>
          <div class="form-outline mb-4">
            <label class="form-label" for="userEmail">Email <span class="required text-danger">*</span></label>
            <input name="userEmail" type="email" id="userEmail" class="form-control form-control-lg" placeholder="Example@gmail.com" required />
          </div>

          <div class="form-outline mb-4">
            <label class="form-label" for="password">Password <span class="required text-danger">*</span></label>
            <div class="input-group mb-3">
              <input name="password" type="password" id="password" class="form-control form-control-lg" placeholder="Minimal 8 karakter" required />
              <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-eye" id="eye-pass-open"></i><i class="fa-solid fa-eye-slash" id="eye-pass-closed"></i></span>
            </div>
            <small class="text-danger text-bold small-pass"></small>
          </div>

          <div class="form-outline mb-4">
            <label class="form-label" for="password">Confirm Password <span class="required text-danger">*</span></label>
            <div class="input-group mb-3">
              <input name="confirm_password" type="password" id="confirm_password" class="form-control form-control-lg" placeholder="Masukkan kembali password anda" required /><span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-eye" id="eye-conf-open"></i><i class="fa-solid fa-eye-slash" id="eye-conf-closed"></i></span>
            </div>
            <small class="text-danger text-bold small-conf"></small>
          </div>

          <div class="form-outline mb-4">
            <label class="form-label" for="userNama">Nama <span class="required text-danger">*</span></label>
            <input type="text" name="nameAnak" id="nameAnak" class="form-control form-control-lg" placeholder="Ex. John Doe" required />
          </div>

          <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
            <h6 class="mb-0 me-4">Jenis Kelamin : <span class="required text-danger">*</span></h6>
            <div class="form-check form-check-inline mb-0 me-4">
              <input class="form-check-input" type="radio" name="userKelaminAnak" id="femaleGender" value="female" required />
              <label class="form-check-label" for="femaleGender">Perempuan</label>
            </div>

            <div class="form-check form-check-inline mb-0 me-4">
              <input class="form-check-input" type="radio" name="userKelaminAnak" id="maleGender" value="male" required />
              <label class="form-check-label" for="maleGender">Laki-laki</label>
            </div>
          </div>

          <div class="form-outline mb-4">
            <label class="form-label">Alamat<span class="required text-danger">*</span></label>
            <input name="userAlamatAnak" type="text" id="address" class="form-control form-control-lg" placeholder="Ex. Jalan nanas nomor 2 Surabaya" required />
          </div>

          <div class="form-outline mb-4">
            <label class="form-label">Nomor HP<span class="required text-danger">*</span></label>
            <input name="userTeleponAnak" type="text" id="phone" class="form-control form-control-lg" placeholder="08xxx" required />
            <small class="text-danger text-bold small-phone"></small>
          </div>

          <div class="form-outline mb-4">
            <label class="form-label">Tanggal Lahir<span class="required text-danger">*</span></label>
            <!-- <input name="userLahirAnak" type="date" id="tempat_tanggal_lahir" class="form-control form-control-lg" required /> -->
            <input data-datepicker="" class="form-control form-control-lg datepicker" id="tempat_tanggal_lahir" name="userLahirAnak" type="text" placeholder="HH/BB/TTTT" required>
          </div>

          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <label class="form-label">Anak ke:<span class="required text-danger">*</span></label>
                <input name="userAnakKeAnak" type="text" id="anak" class="form-control form-control-lg" required />
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <label class="form-label">Dari berapa bersaudara:<span class="required text-danger">*</span></label>
                <input name="userSaudaraAnak" type="text" id="saudara" class="form-control form-control-lg" required />
              </div>
            </div>
          </div>

          <div class="form-outline mb-4">
            <label class="form-label">Kewarganegaraan<span class="required text-danger">*</span></label>
            <input name="userWarganegaraAnak" type="text" id="nationality" class="form-control form-control-lg" placeholder="Ex. Indonesia" required />
          </div>

          <div class="form-outline mb-4">
            <label class="form-label">Agama<span class="required text-danger">*</span></label>
            <!-- <input name="userAgamaAnak" type="text" id="religion" class="form-control form-control-lg" required /> -->
            <select name="userAgamaAnak" class="form-select form-select-lg" id="religion" required>
              <option value="" selected disabled>Pilih agama</option>
              <option value="Tidak ada">Tidak ada</option>
              <option value="Kristen">Kristen</option>
              <option value="Katolik">Katolik</option>
              <option value="Buddha">Buddha</option>
              <option value="Konghucu">Konghucu</option>
              <option value="Islam">Islam</option>
              <option value="Hindu">Hindu</option>
            </select>
          </div>

          <div class="form-outline mb-4">
            <label class="form-label">Kelas<span class="required text-danger">*</span></label>
            <input name="kelas" type="text" id="school_class" class="form-control form-control-lg" placeholder="Ex. SD Kelas 4" required />
          </div>

          <div class="form-outline mb-4">
            <label class="form-label">Nama Sekolah<span class="required text-danger">*</span></label>
            <input name="nama_sekolah" type="text" id="school_name" class="form-control form-control-lg" placeholder="Ex. SD Kristen Petra 2" required />
          </div>
          <br>
          <h3>Data Orang Tua / Wali</h3>

          <div class="form-outline mb-4">
            <label class="form-label">Hubungan dengan anak<span class="required text-danger">*</span></label>
            <!-- <input name="hubungan" type="text" id="jenisKeluarga" class="form-control form-control-lg" required /> -->
            <select name="jenisKeluarga" class="form-select form-select-lg" id="jenisKeluarga" required>
              <option value="" selected disabled>Pilih hubungan dengan anak</option>
              <option value="Ayah">Ayah</option>
              <option value="Ibu">Ibu</option>
              <option value="Kakak/Adik">Kakak/Adik</option>
              <option value="Wali">Wali</option>
            </select>
          </div>

          <div class="form-outline mb-4">
            <label class="form-label">Nama Wali<span class="required text-danger">*</span></label>
            <input name="namaKeluarga" type="text" id="namaKeluarga" class="form-control form-control-lg" placeholder="Ex. John Doe" required />
          </div>
          <!-- <div class="form-outline mb-4">
            <label class="form-label">Umur Wali<span class="required text-danger">*</span></label>
            <input name="umurKeluarga" type="text" id="umurKeluarga" class="form-control form-control-lg" required />
          </div> -->

          <div class="form-outline mb-4">
            <label class="form-label">Tanggal Lahir Wali<span class="required text-danger">*</span></label>
            <input name="tanggalLahirKeluarga" type="date" id="tanggalLahirKeluarga" class="form-control form-control-lg" required />
          </div>

          <div class="form-outline mb-4">
            <label class="form-label">Agama Wali<span class="required text-danger">*</span></label>
            <!-- <input name="agamaKeluarga" type="text" id="agamaKeluarga" class="form-control form-control-lg" required /> -->
            <select name="agamaKeluarga" class="form-select form-select-lg" id="agamaKeluarga" required>
              <option value="" selected disabled>Pilih agama</option>
              <option value="Tidak ada">Tidak ada</option>
              <option value="Kristen">Kristen</option>
              <option value="Katolik">Katolik</option>
              <option value="Buddha">Buddha</option>
              <option value="Konghucu">Konghucu</option>
              <option value="Islam">Islam</option>
              <option value="Hindu">Hindu</option>
            </select>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label">Pekerjaan Wali<span class="required text-danger">*</span></label>
            <input name="pekerjaanKeluarga" type="text" id="pekerjaanKeluarga" class="form-control form-control-lg" placeholder="Ex. Ibu Rumah Tangga" />
          </div>
          <div class="form-outline mb-4">
            <label class="form-label">Pendidiikan Terakhir Wali<span class="required text-danger">*</span></label>
            <!-- <input name="pendidikanKeluarga" type="text" id="pendidikanKeluarga" class="form-control form-control-lg" required /> -->
            <select name="pendidikanKeluarga" class="form-select form-select-lg" id="pendidikanKeluarga" required>
              <option value="" selected disabled>Pilih pendidikan terakhir</option>
              <option value="Tidak sekolah">Tidak sekolah</option>
              <option value="SD">SD</option>
              <option value="SMP">SMP</option>
              <option value="SMA">SMA</option>
              <option value="D1">D1</option>
              <option value="D2">D2</option>
              <option value="D3">D3</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
              <option value="S3">S3</option>
            </select>
          </div>

          <div class="d-flex justify-content-center pt-3">
            <button id="submit" type="button" class="btn btn-submit btn-lg ms-2">SUBMIT</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('.datepicker').datepicker({
        closeText: "Tutup",
        prevText: "Mundur",
        nextText: "Maju",
        currentText: "Hari ini",
        monthNames: ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
          "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember"
        ],
        monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun",
          "Jul", "Agt", "Sep", "Okt", "Nov", "Des"
        ],
        dayNames: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
        dayNamesMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
        dateFormat: "dd/mm/yy",
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: false,
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        minDate: "-17Y",
        maxDate: 0,
      });
      $('#eye-pass-closed').hide();
      $('#eye-conf-closed').hide();
    });

    var isPass = 0
    var isConf = 0
    var isPhone = 0

    $('#eye-pass-open').on('click', function(e) {
      e.preventDefault;
      $('#password').attr('type', 'text');
      $('#eye-pass-closed').show();
      $('#eye-pass-open').hide();
    });

    $('#eye-pass-closed').on('click', function(e) {
      e.preventDefault;
      $('#password').attr('type', 'password');
      $('#eye-pass-open').show();
      $('#eye-pass-closed').hide();
    });

    $('#eye-conf-open').on('click', function(e) {
      e.preventDefault;
      $('#confirm_password').attr('type', 'text');
      $('#eye-conf-closed').show();
      $('#eye-conf-open').hide();
    });

    $('#eye-conf-closed').on('click', function(e) {
      e.preventDefault;
      $('#confirm_password').attr('type', 'password');
      $('#eye-conf-open').show();
      $('#eye-conf-closed').hide();
    });

    $('#confirm_password').on('keyup', function(e) {
      if ($('#confirm_password').val() != $('#password').val()) {
        $('.small-conf').text('Password tidak sama.');
        // $('#submit').attr('disabled', true);
        isConf = 0
      } else {
        $('.small-conf').text('');
        // $('#submit').attr('disabled', false);
        isConf = 1

      }
      if (isPhone == 1 && isConf == 1 && isPass == 1) {
        $('#submit').attr('disabled', false);
      } else {
        $('#submit').attr('disabled', true);
      }
    });

    $('#password').on('keyup', function(e) {
      if ($('#password').val().length < 8) {
        $('.small-pass').text('Password minimal 8 karakter.');
        // $('#submit').attr('disabled', true);
        isPass = 0
      } else {
        $('.small-pass').text('');
        // $('#submit').attr('disabled', false);
        isPass = 1
      }
      if ($('#confirm_password').val() != $('#password').val()) {
        $('.small-conf').text('Password tidak sama.');
        // $('#submit').attr('disabled', true);
        isConf = 0
      } else {
        $('.small-conf').text('');
        // $('#submit').attr('disabled', false);
        isConf = 1

      }
      if (isPhone == 1 && isConf == 1 && isPass == 1) {
        $('#submit').attr('disabled', false);
      } else {
        $('#submit').attr('disabled', true);
      }
    });

    $('#phone').on('keyup', function(e) {
      const phoneNumber = $(this).val();
      const phonePattern = /^[0][8][0-9]{8,11}$/;

      if (!phonePattern.test(phoneNumber)) {
        $('.small-phone').text('Nomor telepon tidak valid');
        // $('#submit').attr('disabled', true);
        isPhone = 0
      } else {
        $('.small-phone').text('');
        // $('#submit').attr('disabled', false);
        isPhone = 1
      }
      if (isPhone == 1 && isConf == 1 && isPass == 1) {
        $('#submit').attr('disabled', false);
      } else {
        $('#submit').attr('disabled', true);
      }
    });

    $('#submit').on('click', function(e) {
      var form = $('.form')[0];
      e.preventDefault();
      e.stopPropagation();
      if (form.checkValidity() === false) {
        Swal.fire({
          title: "Data belum lengkap!",
          text: "Silahkan mengisi data yang masih kosong.",
          icon: "error",
          confirmButtonColor: "#dc3545",
          showConfirmButton: false,
          timer: 1000,
        }).then((value) => {
          form.classList.add('was-validated');
        });
      } else {
        Swal.fire({
          title: 'Apakah anda yakin?',
          showCancelButton: true,
          confirmButtonText: 'Ya',
          cancelButtonText: 'Tidak',
          icon: 'warning',
          reverseButtons: true,
          confirmButtonColor: '#0D8564',
          cancelButtonColor: '#DC3545',
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              title: "Harap tunggu...",
              allowOutsideClick: false,
              showConfirmButton: false,
              didOpen: () => {
                Swal.showLoading();
              }
            });
            const form = new FormData($('form').get(0));
            const formEntries = Object.fromEntries(form.entries());
            console.log(formEntries);

            $.ajax({
              type: 'POST',
              data: formEntries,
              url: 'api/regist_anak2.php',
              success: function(res) {
                Swal.close();
                console.log(res);
                // data = JSON.parse(res);
                // alert(res);
                // console.log(data)
                if (res == 1) {
                  Swal.fire({
                    title: 'Pembuatan akun berhasil.',
                    icon: 'success',
                    text: "Akun berhasil didaftarkan. Silahkan menuju halaman login.",
                    allowOutsideClick: false,
                    confirmButtonText: 'OK',
                    willClose: () => {
                      window.location.href = 'login.php';
                    }
                  });
                } else if (res == 5) {
                  Swal.fire({
                    title: 'Email sudah terdaftar!',
                    icon: 'error',
                    text: "Akun dengan email tersebut sudah pernah terdaftar",
                    confirmButtonText: 'Close',
                    willClose: () => {
                      window.location.href = 'login.php';
                    }
                  });
                } else {
                  Swal.fire({
                    title: 'Pembuatan akun gagal.',
                    icon: 'error',
                    text: "Akun tidak berhasil didaftarkan. Periksa kembali kelengkapan data anda.",
                    confirmButtonText: 'Close',
                    willClose: () => {}
                  });
                }
              },
              error: function() {
                Swal.fire({
                  title: 'Error',
                  text: 'Silahkan coba lagi!',
                  icon: 'error',
                  confirmButtonText: 'Close',
                  willClose: () => {}
                });
              }
            });
          }
        });
      }
    });
  </script>

</html>


<script>
  $('.form').find('input, textarea').on('keyup blur focus', function(e) {
    var $this = $(this),
      label = $this.prev('label');

    if (e.type === 'keyup') {
      if ($this.val() === '') {
        label.removeClass('active highlight');
      } else {
        label.addClass('active highlight');
      }
    } else if (e.type === 'blur') {
      if ($this.val() === '') {
        label.removeClass('active highlight');
      } else {
        label.removeClass('highlight');
      }
    } else if (e.type === 'focus') {

      if ($this.val() === '') {
        label.removeClass('highlight');
      } else if ($this.val() !== '') {
        label.addClass('highlight');
      }
    }
  });

  $('.tab a').on('click', function(e) {

    e.preventDefault();

    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');

    target = $(this).attr('href');

    $('.tab-content > div').not(target).hide();

    $(target).fadeIn(600);

  });
</script>
</body>

</html>