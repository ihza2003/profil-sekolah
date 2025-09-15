<div class="row g-3">
    <div class="col-md-12 mt-5 text-center">
        <h2 class="fs-6 fw-bolder">Upload Dokumen Pendukung</h2>
        <small class="fw-normal">Silakan upload dokumen dengan jelas. Ukuran file minimal 1 MB, maksimum 10 MB, dalam format PDF/JPG/PNG.</small>
    </div>

    {{-- Pas Foto --}}
    <div class="mb-4">
        <label class="form-label fw-semibold">Pas Foto Ukuran 3x4 <span class="text-danger">*</span></label>
        <small class="d-block text-muted">Background biru, kemeja putih, kerudung putih (putri), peci hitam (putra). Maks 10 MB. Format: JPG/PNG/JPEG.</small>
        <input class="form-control @error('foto_3x4') is-invalid @enderror" type="file" name="foto_3x4" accept=".jpg,.jpeg,.png" required>
        @error('foto_3x4') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- SKL --}}
    <div class="mb-4">
        <label class="form-label fw-semibold">Scan Surat Keterangan Lulus (SKL) <span class="text-muted">(jika ada)</span></label>
        <small class="d-block text-muted">Maks 10 MB. Format: PDF/JPG/PNG.</small>
        <input class="form-control @error('skl') is-invalid @enderror" type="file" name="skl" accept=".pdf,.jpg,.jpeg,.png">
        @error('skl') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Ijazah --}}
    <div class="mb-4">
        <label class="form-label fw-semibold">Scan Ijazah SD/MI <span class="text-muted">(jika ada)</span></label>
        <small class="d-block text-muted">Maks 10 MB. Format: PDF/JPG/PNG.</small>
        <input class="form-control @error('ijazah') is-invalid @enderror" type="file" name="ijazah" accept=".pdf,.jpg,.jpeg,.png">
        @error('ijazah') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Kartu Keluarga --}}
    <div class="mb-4">
        <label class="form-label fw-semibold">Scan Kartu Keluarga <span class="text-danger">*</span></label>
        <small class="d-block text-muted">Maks 10 MB. Format: PDF/JPG/PNG.</small>
        <input class="form-control @error('kk') is-invalid @enderror" type="file" name="kk" accept=".pdf,.jpg,.jpeg,.png" required>
        @error('kk') <div class=" invalid-feedback">{{ $message }}
        </div> @enderror
    </div>

    {{-- KIA --}}
    <div class="mb-4">
        <label class="form-label fw-semibold">Scan Kartu Identitas Anak (KIA) <span class="text-muted">(jika ada)</span></label>
        <small class="d-block text-muted">Maks 1 MB. Format: PDF/JPG/PNG.</small>
        <input class="form-control @error('kia') is-invalid @enderror" type="file" name="kia" accept=".pdf,.jpg,.jpeg,.png">
        @error('kia') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- KIP --}}
    <div class="mb-4">
        <label class="form-label fw-semibold">Scan Kartu Indonesia Pintar (KIP) <span class="text-muted">(jika ada)</span></label>
        <small class="d-block text-muted">Maks 10 MB. Format: PDF/JPG/PNG.</small>
        <input class="form-control @error('kip') is-invalid @enderror" type="file" name="kip" accept=".pdf,.jpg,.jpeg,.png">
        @error('kip') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- KIS --}}
    <div class="mb-4">
        <label class="form-label fw-semibold">Scan Kartu Indonesia Sehat (KIS) <span class="text-muted">(jika ada)</span></label>
        <small class="d-block text-muted">Maks 10 MB. Format: PDF/JPG/PNG.</small>
        <input class="form-control @error('kis') is-invalid @enderror" type="file" name="kis" accept=".pdf,.jpg,.jpeg,.png">
        @error('kis') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>