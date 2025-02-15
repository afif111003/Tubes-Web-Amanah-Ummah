<!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>Kontak</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->

<!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">  
                <div class="row">
                    <div class="col-lg-8">
                    <h3>Kritik dan Saran</h3><br>
                        <form class="form-contact contact_form" action="<?= BASEURL; ?>/Web/aksi_tambah_contact" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control valid" name="nama_saran" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nama Anda'" placeholder="Masukkan Nama Anda">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subjek_saran" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Subjek Saran'" placeholder="Masukkan Subjek Saran" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="saran" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Saran Anda'" placeholder=" Masukkan Saran Anda" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Kantor : Jl.Ketintang No.156 Surabaya.</h3>
                                <p>Samping Kampus Unesa</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+62 892378901</h3>
                                <p>Ustadz.Syakir</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>TelkomUniversity@gmail.com</h3>
                                <p>email resmi basnaz Amanah Ummah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->