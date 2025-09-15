<div class="row g-3">
    <div class="col-md-12 mt-4 text-center">
        <h2 class="fs-6 fw-bolder">Data Calon Peserta Didik Baru</h2>
        <p class="fw-normal">
            Isikan data-data berikut ini dengan benar sesuai dengan berkas-berkas yang anda miliki.
            Data ini akan masuk ke dalam rekaman database administrasi madrasah MTs Muhammadiyah Jayapura.
        </p>
    </div>

    <!-- Email -->
    <div class="col-md-6">
        <label for="email" class="form-label">Email Aktif <span class="text-danger">*</span></label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nama -->
    <div class="col-md-6">
        <label for="nama" class="form-label">Nama Lengkap Calon Siswa <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
        @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- NIK -->
    <div class="col-md-6">
        <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK) <span class="text-danger">*</span></label>
        <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" required>
        @error('nik')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- NISN -->
    <div class="col-md-6">
        <label for="nisn" class="form-label">Nomor Induk Siswa Nasional <strong class="fst-italic">(Sesuai ijazah) <span class="text-danger">*</span></strong></label>
        <input type="number" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn') }}" required>
        @error('nisn')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tempat Lahir -->
    <div class="col-md-6">
        <label for="tempat_lahir" class="form-label">Tempat Lahir <strong class="fst-italic">(Sesuai ijazah) <span class="text-danger">*</span></strong></label>
        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
        @error('tempat_lahir')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tanggal Lahir -->
    <div class="col-md-6">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
        @error('tanggal_lahir')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Jenis Kelamin -->
    <div class="col-md-6">
        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
            <option disabled selected>Pilih</option>
            <option value="Laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>perempuan</option>
        </select>
        @error('jenis_kelamin')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Jenis Tinggal -->
    <div class="col-md-6">
        <label class="form-label">Jenis Tinggal <span class="text-danger">*</span></label>
        <!-- <select class="form-select @error('jenis_tinggal') is-invalid @enderror" name="jenis_tinggal" required>
            <option disabled selected>Pilih</option>
            <option value="Sendiri" {{ old('jenis_tinggal') == 'Sendiri' ? 'selected' : '' }}>Sendiri</option>
            <option value="Bersama Orang Tua" {{ old('jenis_tinggal') == 'Bersama Orang Tua' ? 'selected' : '' }}>Bersama Orang Tua</option>
            <option value="Bersama Saudara / keponakan" {{ old('jenis_tinggal') == 'Bersama Saudara / keponakan' ? 'selected' : '' }}>Bersama Saudara / keponakan</option>
            <option value="Bersama Tetangga" {{ old('jenis_tinggal') == 'Bersama Tetangga' ? 'selected' : '' }}>Bersama Tetangga</option>
        </select>
        @error('jenis_tinggal')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror -->
        <input
            type="text"
            class="form-control @error('jenis_tinggal') is-invalid @enderror"
            name="jenis_tinggal"
            value="{{ old('jenis_tinggal') }}"
            placeholder="Contoh: Bersama Orang Tua / Sendiri / saudara"
            required>
        @error('jenis_tinggal')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Alamat -->
    <div class="col-md-12">
        <label for="alamat" class="form-label">Alamat Tempat Tinggal <span class="text-danger">*</span></label>
        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="5" required placeholder="alamat lengkap rumah anda, meliputi: Nama Jalan, Nama Kelurahan, Nama Kecamatan, Nama Kabupaten, dan Nama Provinsi">{{ old('alamat') }}</textarea>
        @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>