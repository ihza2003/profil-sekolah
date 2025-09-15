<div class="row g-3">

    <div class="col-md-12 mt-5 text-center">
        <h2 class="fs-6 fw-bolder">DATA PERIODIK PESERTA DIDIK BARU</h2>
        <p class="fw-normal">Isilah data yang diminta dengan sebenar-benarnya.</p>
    </div>

    <!-- Hobby -->
    <div class="col-md-6">
        <label for="hobby" class="form-label">Hobby <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('hobby') is-invalid @enderror" id="hobby" name="hobby" value="{{ old('hobby') }}" required>
        @error('hobby') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Cita Cita -->
    <div class="col-md-6">
        <label for="cita" class="form-label">Cita Cita <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('cita') is-invalid @enderror" id="cita" name="cita" value="{{ old('cita') }}" required>
        @error('cita') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Anak keberapa -->
    <div class="col-md-6">
        <label for="anak_keberapa" class="form-label">Anak ke Berapa? <span class="text-danger">*</span></label>
        <input type="number" class="form-control @error('anak_keberapa') is-invalid @enderror" id="anak_keberapa" name="anak_keberapa" value="{{ old('anak_keberapa') }}" required>
        @error('anak_keberapa') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Dari berapa saudara -->
    <div class="col-md-6">
        <label for="berapa_saudara" class="form-label">Dari Berapa Saudara? <span class="text-danger">*</span></label>
        <input type="number" class="form-control @error('berapa_saudara') is-invalid @enderror" id="berapa_saudara" name="berapa_saudara" value="{{ old('berapa_saudara') }}" required>
        @error('berapa_saudara') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Tinggi Badan -->
    <div class="col-md-6">
        <label for="tinggi_badan" class="form-label">Tinggi Badan (cm) <span class="text-danger">*</span></label>
        <input type="number" class="form-control @error('tinggi_badan') is-invalid @enderror" id="tinggi_badan" name="tinggi_badan" value="{{ old('tinggi_badan') }}" required>
        @error('tinggi_badan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Berat Badan -->
    <div class="col-md-6">
        <label for="berat_badan" class="form-label">Berat Badan (Kg) <span class="text-danger">*</span></label>
        <input type="number" class="form-control @error('berat_badan') is-invalid @enderror" id="berat_badan" name="berat_badan" value="{{ old('berat_badan') }}" required>
        @error('berat_badan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Kebutuhan Khusus -->
    <div class="col-md-6">
        <label class="form-label">Apakah anda tergolong anak berkebutuhan khusus? <span class="text-danger">*</span></label>
        <select class="form-select @error('kebutuhan_khusus') is-invalid @enderror" name="kebutuhan_khusus" required>
            <option disabled selected>Pilih</option>
            <option value="ya" {{ old('kebutuhan_khusus') == 'ya' ? 'selected' : '' }}>Ya</option>
            <option value="tidak" {{ old('kebutuhan_khusus') == 'tidak' ? 'selected' : '' }}>Tidak</option>
        </select>
        @error('kebutuhan_khusus') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Jarak Sekolah -->
    <div class="col-md-6">
        <label for="jarak_sekolah" class="form-label">Jarak Rumah Ke MTs Muhammadiyah Jayapura (km) <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('jarak_sekolah') is-invalid @enderror" id="jarak_sekolah" name="jarak_sekolah" value="{{ old('jarak_sekolah') }}" placeholder="Contohnya: 1-3, 5-10" required>
        @error('jarak_sekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Asal Sekolah -->
    <div class="col-md-6">
        <label for="asal_sekolah" class="form-label">Asal Sekolah Sebelumnya <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}" required>
        @error('asal_sekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- NPSN -->
    <div class="col-md-6">
        <label for="NPSN_AsalSekolah" class="form-label">NPSN Asal Sekolah <span class="text-danger">*</span></label>
        <input type="number" class="form-control @error('NPSN_AsalSekolah') is-invalid @enderror" id="NPSN_AsalSekolah" name="NPSN_AsalSekolah" value="{{ old('NPSN_AsalSekolah') }}" required>
        @error('NPSN_AsalSekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Alamat Asal Sekolah -->
    <div class="col-md-12">
        <label for="alamat_asal_sekolah" class="form-label">Alamat Asal Sekolah Sebelumnya <span class="text-danger">*</span></label>
        <textarea class="form-control @error('alamat_asal_sekolah') is-invalid @enderror" id="alamat_asal_sekolah" name="alamat_asal_sekolah" rows="3" required>{{ old('alamat_asal_sekolah') }}</textarea>
        @error('alamat_asal_sekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- SKHUN -->
    <div class="col-md-6">
        <label for="SKHUN" class="form-label">Nomor Seri Ijazah & SKHUN (*jika ada)</label>
        <input type="number" class="form-control @error('SKHUN') is-invalid @enderror" id="SKHUN" name="SKHUN" value="{{ old('SKHUN') }}">
        @error('SKHUN') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- No UN -->
    <div class="col-md-6">
        <label for="no_un" class="form-label">Nomor Peserta Ujian Nasional (*jika ada)</label>
        <input type="number" class="form-control @error('no_un') is-invalid @enderror" id="no_un" name="no_un" value="{{ old('no_un') }}">
        @error('no_un') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- Tahun Kelulusan -->
    <div class="col-md-6">
        <label for="tahun_kelulusan" class="form-label">Tahun Kelulusan SD / MI <span class="text-danger">*</span></label>
        <input type="number" class="form-control @error('tahun_kelulusan') is-invalid @enderror" id="tahun_kelulusan" name="tahun_kelulusan" value="{{ old('tahun_kelulusan') }}" required>
        @error('tahun_kelulusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <!-- HP Siswa -->
    <div class="col-md-6">
        <label for="hp_siswa" class="form-label">No. Telp / HP (*jika ada)</label>
        <input type="number" class="form-control @error('hp_siswa') is-invalid @enderror" id="hp_siswa" name="hp_siswa" value="{{ old('hp_siswa') }}">
        @error('hp_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

</div>