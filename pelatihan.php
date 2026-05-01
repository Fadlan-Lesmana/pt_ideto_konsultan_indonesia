<?php include 'header.php'; ?>

    <main>
      <section class="page-padding container align-center animate-fade-in-up">
        <h1 class="main-title">Pendidikan & Pelatihan</h1>
        <p class="main-subtitle">
          Tingkatkan kompetensi SDM perusahaan Anda melalui program pelatihan
          bersertifikasi yang dipandu oleh instruktur ahli.
        </p>
      </section>

      <section class="banner-green">
        <div class="container banner-content">
          <i class="fas fa-award banner-icon"></i>
          <div class="banner-text-group">
            <h3 class="banner-title">Sertifikasi Kompetensi BNSP</h3>
            <p class="banner-desc">
              Sebagian besar program pelatihan kami terintegrasi dengan skema
              sertifikasi BNSP resmi.
            </p>
          </div>
        </div>
      </section>

      <section class="container page-padding">
        <div class="grid-3-col">
          <div class="card card-white shadow-hover align-left">
            <div class="card-icon-wrapper green-light-bg mb-20">
              <i class="fas fa-shield-alt text-green"></i>
            </div>
            <h3 class="card-title-center align-left">
              Pelatihan Pengendalian Pencemaran
            </h3>
            <ul class="check-list mt-20">
              <li>
                <i class="far fa-check-circle"></i> Penanggung Jawab
                Pengendalian Pencemaran Air (PPA)
              </li>
              <li>
                <i class="far fa-check-circle"></i> Penanggung Jawab
                Pengendalian Pencemaran Udara (PPU)
              </li>
              <li>
                <i class="far fa-check-circle"></i> Continuous Emission
                Monitoring System (CEMS)
              </li>
              <li>
                <i class="far fa-check-circle"></i> Teknologi Plasma dan Ozon
                untuk Pengolahan Limbah
              </li>
            </ul>
          </div>

          <div class="card card-white shadow-hover align-left">
            <div class="card-icon-wrapper green-light-bg mb-20">
              <i class="fas fa-cog text-green"></i>
            </div>
            <h3 class="card-title-center align-left">
              Pelatihan Manajemen Lingkungan
            </h3>
            <ul class="check-list mt-20">
              <li>
                <i class="far fa-check-circle"></i> Manajemen Pengelolaan Sampah
              </li>
              <li>
                <i class="far fa-check-circle"></i> Manajemen Pengelolaan Limbah
                B3
              </li>
              <li>
                <i class="far fa-check-circle"></i> Sistem Manajemen Lingkungan
                ISO 14001
              </li>
              <li>
                <i class="far fa-check-circle"></i> Sistem Manajemen
                Laboratorium ISO 17025
              </li>
              <li>
                <i class="far fa-check-circle"></i> Pendampingan dan Persiapan
                PROPER
              </li>
              <li>
                <i class="far fa-check-circle"></i> Operator Instalasi
                Pengolahan Air Limbah (IPAL)
              </li>
              <li>
                <i class="far fa-check-circle"></i> Petugas Pengambil Contoh
                (PPC) Air dan Udara
              </li>
            </ul>
          </div>

          <div class="card card-white shadow-hover align-left">
            <div class="card-icon-wrapper green-light-bg mb-20">
              <i class="fas fa-book-open text-green"></i>
            </div>
            <h3 class="card-title-center align-left">Pelatihan Khusus & K3</h3>
            <ul class="check-list mt-20">
              <li>
                <i class="far fa-check-circle"></i> Operator Pesawat Uap dan
                Bejana Tekan
              </li>
              <li>
                <i class="far fa-check-circle"></i> Dasar-dasar Pengetahuan
                AMDAL
              </li>
              <li>
                <i class="far fa-check-circle"></i> K3 Minyak dan Gas Bumi
                (Migas)
              </li>
              <li><i class="far fa-check-circle"></i> Sertifikasi S1 Migas</li>
              <li>
                <i class="far fa-check-circle"></i> Teknik Penanggulangan
                Kebakaran
              </li>
              <li>
                <i class="far fa-check-circle"></i> Higiene Industri (Industrial
                Hygiene)
              </li>
            </ul>
          </div>
        </div>
      </section>

      <section class="container pb-80">
        <div class="align-center mb-50">
          <h2 class="section-title">Pendaftaran Pelatihan</h2>
          <p class="section-subtitle">
            Daftarkan tim Anda sekarang. Kami juga melayani In-House Training
            sesuai kebutuhan perusahaan.
          </p>
        </div>

        <div class="form-wrapper">
          <div class="card card-white form-card">
            <!-- INI BAGIAN FORMULIR YANG SUDAH DIUPDATE -->
            <form action="proses_daftar.php" method="POST">
              <div class="form-group full-width">
                <label class="form-label">Pilih Program Pelatihan</label>
                <div class="select-wrapper">
                  <select name="program_pelatihan" class="form-input" required>
                    <option value="" disabled selected>Pilih program...</option>
                    <option value="Pengendalian Pencemaran Air (PPA)">Pengendalian Pencemaran Air (PPA)</option>
                    <option value="Pengendalian Pencemaran Udara (PPU)">Pengendalian Pencemaran Udara (PPU)</option>
                    <option value="K3 Migas">K3 Migas</option>
                  </select>
                  <i class="fas fa-chevron-down select-icon"></i>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Nama PIC / Pendaftar</label>
                  <input
                    type="text"
                    name="nama_pic"
                    class="form-input"
                    placeholder="Nama lengkap"
                    required
                  />
                </div>
                <div class="form-group">
                  <label class="form-label">Perusahaan / Instansi</label>
                  <input
                    type="text"
                    name="perusahaan"
                    class="form-input"
                    placeholder="Nama perusahaan"
                    required
                  />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input
                    type="email"
                    name="email"
                    class="form-input"
                    placeholder="email@perusahaan.com"
                    required
                  />
                </div>
                <div class="form-group">
                  <label class="form-label">Nomor Telepon / WA</label>
                  <input
                    type="tel"
                    name="no_telp"
                    class="form-input"
                    placeholder="+62 8xx xxxx xxxx"
                    required
                  />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Jumlah Peserta</label>
                  <input
                    type="number"
                    name="jumlah_peserta"
                    class="form-input"
                    placeholder="Contoh: 3"
                    required
                  />
                </div>
                <div class="form-group">
                  <label class="form-label">Tipe Pelatihan</label>
                  <div class="select-wrapper">
                    <select name="tipe_pelatihan" class="form-input" required>
                      <option value="" disabled selected>Pilih tipe...</option>
                      <option value="Public Training">Public Training</option>
                      <option value="In-House Training">In-House Training</option>
                    </select>
                    <i class="fas fa-chevron-down select-icon"></i>
                  </div>
                </div>
              </div>

              <div class="form-group full-width mt-20">
                <button type="submit" name="daftar" class="btn-submit">
                  Kirim Pendaftaran
                </button>
              </div>
            </form>
            <!-- AKHIR FORMULIR -->
          </div>
        </div>
      </section>
    </main>

<?php include 'footer.php'; ?>