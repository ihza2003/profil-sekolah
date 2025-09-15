<div class="row g-3">
    <div class="col-md-12 mt-5 text-center">
        <h2 class="fs-6 fw-bolder">Data Identitas Orang Tua / Wali Peserta Didik Baru</h2>
        <p class="fw-normal">Isikan data berikut ini dengan benar. Jika tinggal bersama wali, tambahkan keterangan "(Wali)" di nama orang tua.</p>
    </div>

    {{-- Bagian Data Ayah --}}
    <h5 class="fw-bold mb-3 mt-4">Data Ayah</h5>
    <div class="row">
        <div class="mb-3 col-md-6">
            <label class="form-label">Nomor Kartu Keluarga (jika ada)</label>
            <input type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" value="{{ old('no_kk') }}">
            @error('no_kk') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">NIK Ayah <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nik_ayah') is-invalid @enderror" name="nik_ayah" value="{{ old('nik_ayah') }}" required>
            @error('nik_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Nama Lengkap Ayah <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ old('nama_ayah') }}" required>
            @error('nama_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Tempat Lahir Ayah <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('tempat_lahir_ayah') is-invalid @enderror" name="tempat_lahir_ayah" value="{{ old('tempat_lahir_ayah') }}" required>
            @error('tempat_lahir_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Tanggal Lahir Ayah <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('tgl_lahir_ayah') is-invalid @enderror" name="tgl_lahir_ayah" value="{{ old('tgl_lahir_ayah') }}" required>
            @error('tgl_lahir_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Pendidikan Terakhir Ayah <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('pendidikan_ayah') is-invalid @enderror" name="pendidikan_ayah" value="{{ old('pendidikan_ayah') }}" required>
            @error('pendidikan_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Pekerjaan Ayah <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required>
            @error('pekerjaan_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Penghasilan Bulanan Ayah (jika ada)</label>
            <input type="text" class="form-control @error('penghasilan_ayah') is-invalid @enderror" name="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}">
            @error('penghasilan_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">No. Telp / HP Ayah <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('hp_ayah') is-invalid @enderror" name="hp_ayah" value="{{ old('hp_ayah') }}">
            @error('hp_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Bagian Data Ibu --}}
    <h5 class="fw-bold mb-3 mt-4">Data Ibu</h5>
    <div class="row">
        <div class="mb-3 col-md-6">
            <label class="form-label">NIK Ibu <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nik_ibu') is-invalid @enderror" name="nik_ibu" value="{{ old('nik_ibu') }}" required>
            @error('nik_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Nama Lengkap Ibu <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ old('nama_ibu') }}" required>
            @error('nama_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Tempat Lahir Ibu <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('tempat_lahir_ibu') is-invalid @enderror" name="tempat_lahir_ibu" value="{{ old('tempat_lahir_ibu') }}" required>
            @error('tempat_lahir_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Tanggal Lahir Ibu <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('tgl_lahir_ibu') is-invalid @enderror" name="tgl_lahir_ibu" value="{{ old('tgl_lahir_ibu') }}" required>
            @error('tgl_lahir_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Pendidikan Terakhir Ibu <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('pendidikan_ibu') is-invalid @enderror" name="pendidikan_ibu" value="{{ old('pendidikan_ibu') }}" required>
            @error('pendidikan_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Pekerjaan Ibu <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required>
            @error('pekerjaan_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Penghasilan Bulanan Ibu (jika ada)</label>
            <input type="text" class="form-control @error('penghasilan_ibu') is-invalid @enderror" name="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}">
            @error('penghasilan_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">No. Telp / HP Ibu <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('hp_ibu') is-invalid @enderror" name="hp_ibu" value="{{ old('hp_ibu') }}">
            @error('hp_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Alamat Orang Tua / wali --}}
    <div class="mb-3">
        <label class="form-label">Alamat Rumah Orang Tua / Wali <span class="text-danger">*</span></label>
        <textarea class="form-control @error('alamat_ortu') is-invalid @enderror" name="alamat_ortu" rows="4" placeholder="Tuliskan alamat lengkap rumah anda" required>{{ old('alamat_ortu') }}</textarea>
        @error('alamat_ortu') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Status Keluarga --}}
    <div class="mb-3">
        <label class="form-label">Status Dalam Keluarga <span class="text-danger">*</span></label>
        <div class="form-check">
            <input class="form-check-input @error('status_keluarga') is-invalid @enderror" type="radio" name="status_keluarga" value="Orang Tua Kandung" {{ old('status_keluarga') == 'Orang Tua Kandung' ? 'checked' : '' }} required>
            <label class="form-check-label">Orang Tua Kandung</label>
        </div>
        <div class="form-check">
            <input class="form-check-input @error('status_keluarga') is-invalid @enderror" type="radio" name="status_keluarga" value="Wali" {{ old('status_keluarga') == 'Wali' ? 'checked' : '' }}>
            <label class="form-check-label">Wali</label>
        </div>
        @error('status_keluarga') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>
</div>