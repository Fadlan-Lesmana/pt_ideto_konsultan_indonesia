<?php include 'header.php'; ?>

    <main class="pb-80">
      <section class="page-padding container align-center animate-fade-in-up">
        <h1 class="main-title">Hubungi Kami</h1>
        <p class="main-subtitle">
          Kami siap membantu menjawab pertanyaan dan mendiskusikan kebutuhan
          perusahaan Anda.
        </p>
      </section>

      <section class="container mb-50">
        <div class="grid-4-col">
          <div class="card card-white shadow-hover align-center">
            <div class="card-icon-wrapper center-icon green-light-bg mb-20">
              <i class="fas fa-map-marker-alt text-green"></i>
            </div>
            <h3 class="card-title-center">Alamat Kantor</h3>
            <p class="card-text-center text-gray fs-small">
              Ruko GIS Blok E1 No 20, Jl Raya Pahlawan Gunungsindur, Kec.
              Gunungsindur, Kab. Bogor, Jawa Barat 16340
            </p>
          </div>

          <div class="card card-white shadow-hover align-center">
            <div class="card-icon-wrapper center-icon green-light-bg mb-20">
              <i class="fas fa-phone-alt text-green"></i>
            </div>
            <h3 class="card-title-center">Telepon</h3>
            <p class="card-text-center text-gray fs-small">+6221-75673754</p>
          </div>

          <div class="card card-white shadow-hover align-center">
            <div class="card-icon-wrapper center-icon green-light-bg mb-20">
              <i class="far fa-envelope text-green"></i>
            </div>
            <h3 class="card-title-center">Email</h3>
            <p class="card-text-center text-gray fs-small">
              admin@idetokonsultan.co.id
            </p>
          </div>

          <div class="card card-white shadow-hover align-center">
            <div class="card-icon-wrapper center-icon green-light-bg mb-20">
              <i class="far fa-user text-green"></i>
            </div>
            <h3 class="card-title-center">Contact Person</h3>
            <p class="card-text-center text-gray fs-small">
              Irwan Mulyadi<br />(+62822-9880-4710)<br /><br />Senin - Jumat:
              08.00 - 17.00 WIB
            </p>
          </div>
        </div>
      </section>

      <section class="container mt-40">
        <div class="grid-2-col gap-50 align-start">
          <div class="map-section">
            <h2 class="section-title mb-20">Lokasi Kantor</h2>
            <div class="map-wrapper">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.8382991471244!2d106.6862986!3d-6.390837699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e67a23a9b821%3A0x20b81316d44ca294!2sPT.%20IDETO%20KONSULTAN!5e1!3m2!1sid!2sid!4v1777479948689!5m2!1sid!2sid"
                width="100%"
                height="100%"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>

          <div class="contact-form-section">
            <div class="card card-white">
              <h2 class="section-title mb-20">Kirim Pesan</h2>

              <form id="whatsapp-form">
                <div class="form-group full-width">
                  <label class="form-label">Nama Lengkap</label>
                  <input
                    type="text"
                    id="wa-nama"
                    class="form-input"
                    placeholder="Masukkan nama Anda"
                    required
                  />
                </div>

                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label">Email</label>
                    <input
                      type="email"
                      id="wa-email"
                      class="form-input"
                      placeholder="email@domain.com"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label class="form-label">Nomor Telepon</label>
                    <input
                      type="tel"
                      id="wa-telp"
                      class="form-input"
                      placeholder="+62 8xx xxxx xxxx"
                      required
                    />
                  </div>
                </div>

                <div class="form-group full-width">
                  <label class="form-label">Subjek</label>
                  <input
                    type="text"
                    id="wa-subjek"
                    class="form-input"
                    placeholder="Subjek pesan"
                    required
                  />
                </div>

                <div class="form-group full-width">
                  <label class="form-label">Pesan</label>
                  <textarea
                    id="wa-pesan"
                    class="form-input form-textarea"
                    placeholder="Tulis pesan Anda di sini..."
                    rows="5"
                    required
                  ></textarea>
                </div>

                <div class="form-group full-width mt-10">
                  <button type="submit" class="btn-submit">
                    <i class="fab fa-whatsapp"></i> Kirim Pesan via WhatsApp
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include 'footer.php'; ?>