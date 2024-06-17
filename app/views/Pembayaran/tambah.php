<script>
function sum() {
    var txtFirstNumberValue = document.getElementById('txt1').value;
    var txtSecondNumberValue = document.getElementById('txt2').value;
    var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
    if (!isNaN(result)) {
        document.getElementById('txt3').value = result;
    }
}

function validateForm() {
    var namaPembayar = document.forms["zakatForm"]["nama_pembayar"].value;
    var noHpPembayar = document.forms["zakatForm"]["no_hp_pembayar"].value;
    var alamatPembayar = document.forms["zakatForm"]["alamat_pembayar"].value;
    var idMasjid = document.forms["zakatForm"]["id_masjid"].value;
    var idZakat = document.forms["zakatForm"]["id_zakat"].value;
    var jumlahTanggungan = document.forms["zakatForm"]["jumlah_tanggungan"].value;
    var pembayaranBeras = document.forms["zakatForm"]["pembayaran_beras"].value;
    var pembayaranUang = document.forms["zakatForm"]["pembayaran_uang"].value;
    var uangDibayarkan = document.forms["zakatForm"]["txt1"].value;
    var infak = document.forms["zakatForm"]["infak"].value;
    var tanggalPenyerahan = document.forms["zakatForm"]["tgl_penyerahan"].value;

    var errors = [];

    if (namaPembayar == "") errors.push("Kolom Nama Pembayar tidak boleh kosong!");
    if (noHpPembayar == "") errors.push("Kolom No. HP Pembayar tidak boleh kosong!");
    if (alamatPembayar == "") errors.push("Kolom Alamat tidak boleh kosong!");
    if (idMasjid == "") errors.push("Kolom Masjid tidak boleh kosong!");
    if (idZakat == "") errors.push("Kolom Jenis Zakat tidak boleh kosong!");
    if (jumlahTanggungan == "") errors.push("Kolom Jumlah Tanggungan tidak boleh kosong!");
    if (pembayaranBeras == "0" && pembayaranUang == "") errors.push("Salah satu kolom Pembayaran (Beras atau Uang) harus diisi!");
    if (uangDibayarkan == "") errors.push("Kolom Uang Yang Dibayarkan tidak boleh kosong!");
    if (infak == "") errors.push("Kolom Infak tidak boleh kosong!");
    if (tanggalPenyerahan == "") errors.push("Kolom Tanggal Penyerahan tidak boleh kosong!");

    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }

    return true;
}
</script>

<!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="breadcome-heading">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="<?=BASEURL;?>/home_index">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Pembayaran Zakat</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->

            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 des-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="<?=BASEURL;?>/home_index">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Pembayaran Zakat</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            
            <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
            <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-reset mg-t-30">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Form Tambah Pembayaran Zakat</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">
                                        <form name="zakatForm" action="<?= BASEURL; ?>/Pembayaran/aksi_tambah" method="POST" onsubmit="return validateForm()">
                                            <h3><center>Data Pembayar</center></h3>

                                            <div class="form-group row">
                                                <label for="nama_pembayar" class="col-sm-3 col-form-label">Nama Pembayar</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_pembayar" class="form-control" id="nama_pembayar" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="no_hp_pembayar" class="col-sm-3 col-form-label">No. HP Pembayar</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="no_hp_pembayar" class="form-control" id="no_hp_pembayar" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="alamat_pembayar" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="alamat_pembayar" class="form-control" id="alamat_pembayar" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="id_masjid" class="col-sm-3 col-form-label">Masjid</label>
                                                <div class="col-sm-9">
                                                    <select name="id_masjid" class="form-control" id="id_masjid" required>
                                                        <?php foreach ($data['Masjid'] as $dt): ?>
                                                            <option value="<?= $dt['id_masjid']; ?>"><?= $dt['nama_masjid']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <hr>
                                            <h3><center>Data Zakat</center></h3>

                                            <div class="form-group row">
                                                <label for="id_zakat" class="col-sm-3 col-form-label">Jenis Zakat</label>
                                                <div class="col-sm-9">
                                                    <select name="id_zakat" class="form-control" id="id_zakat" required>
                                                        <?php foreach ($data['Zakat'] as $pnr): ?>
                                                            <option value="<?= $pnr['id_zakat']; ?>"><?= $pnr['jenis_zakat']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="jumlah_tanggungan" class="col-sm-3 col-form-label">Jumlah Tanggungan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="jumlah_tanggungan" class="form-control" id="jumlah_tanggungan" placeholder="Jumlah anggota keluarga yang dibayarkan">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="pembayaran_beras" class="col-sm-3 col-form-label">Pembayaran Beras</label>
                                                <div class="col-sm-9">
                                                    <select name="pembayaran_beras" class="form-control" id="pembayaran_beras">
                                                        <option value="0">--Pilih Jenis--</option>
                                                        <option value="2.5">2,5 kg</option>
                                                        <option value="2.7">2,7 kg</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="form-group row">
                                                <label for="pembayaran_uang" class="col-sm-3 col-form-label">Pembayaran Uang</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="pembayaran_uang" class="form-control" id="txt2" onkeyup="sum();" placeholder="Total yang harus dibayarkan. Contoh: 48000">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txt1" class="col-sm-3 col-form-label">Uang Yang Dibayarkan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="txt1" onkeyup="sum();" placeholder="Total yang dibayarkan Mustahik. Contoh: 50000">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="infak" class="col-sm-3 col-form-label">Infak</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="infak" class="form-control" id="txt3" onkeyup="sum();" placeholder="Sisa pembayaran apabila Mustahik ingin berinfak.">
                                                </div>
                                            </div>


          <div class="form-group-inner">
              <div class="row">
                  <div class="col-lg-3">
                      <label class="login2 pull-right pull-right-pro">Nama Amil</label>
                  </div>
                  <div class="col-lg-9">
                      <div class="form-select-list">
                      <?php foreach ($data['Amil'] as $aml):?>
                      <?php endforeach ?>
                      <input type="hidden" name='id_amil' class="form-control" value="<?= $aml['id_amil'];?>" readonly>
                          <input type="text" name='nama_amil' class="form-control" value="<?= $_SESSION['username'];?>" readonly>
                      </div>
                  </div>
              </div>
          </div>

          <div class="form-group-inner">
              <div class="row">
                  <div class="col-lg-3">
                      <label class="login2 pull-right pull-right-pro">Tanggal Penyerahan</label>
                  </div>
                  <div class="col-lg-9">
                      <div class="form-select-list">
                          <input type="date" id="last-name" name="tgl_penyerahan" required="required" class="form-control">
                      </div>
                  </div>
              </div>
          </div>
          
          <div class="form-group-inner">
              <div class="login-btn-inner">
                  <div class="row">
                      <div class="col-lg-3"></div>
                      <div class="col-lg-9">
                          <div class="login-horizental cancel-wp pull-left">
                              <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
                              <button class="btn btn-warning" type="reset">Reset</button>
                              <a href="<?= BASEURL; ?>/Pembayaran/"  button type="button" class="btn btn-primary">Kembali</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Static Table End -->
        </div>
    </div>