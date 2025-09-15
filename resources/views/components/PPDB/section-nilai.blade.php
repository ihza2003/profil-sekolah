<div class="row g-3">
    <div class="col-md-12 mt-5 text-center">
        <h2 class="fs-6 fw-bolder">Data Nilai Rata-Rata Raport Tiap Semester & Nilai Rata-Rata Ujian Sekolah/Madrasah</h2>
    </div>

    {{-- Kelas 4 --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Nilai Rata-Rata Raport Semester 1 (Kelas 4) <span class="text-danger">*</span></label>
        <input type="number" step="0.01" name="nilai_kls4_smt1" class="form-control @error('nilai_kls4_smt1') is-invalid @enderror" value="{{ old('nilai_kls4_smt1') }}" required>
        @error('nilai_kls4_smt1') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Nilai Rata-Rata Raport Semester 2 (Kelas 4) <span class="text-danger">*</span></label>
        <input type="number" step="0.01" name="nilai_kls4_smt2" class="form-control @error('nilai_kls4_smt2') is-invalid @enderror" value="{{ old('nilai_kls4_smt2') }}" required>
        @error('nilai_kls4_smt2') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Kelas 5 --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Nilai Rata-Rata Raport Semester 1 (Kelas 5) <span class="text-danger">*</span></label>
        <input type="number" step="0.01" name="nilai_kls5_smt1" class="form-control @error('nilai_kls5_smt1') is-invalid @enderror" value="{{ old('nilai_kls5_smt1') }}" required>
        @error('nilai_kls5_smt1') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Nilai Rata-Rata Raport Semester 2 (Kelas 5) <span class="text-danger">*</span></label>
        <input type="number" step="0.01" name="nilai_kls5_smt2" class="form-control @error('nilai_kls5_smt2') is-invalid @enderror" value="{{ old('nilai_kls5_smt2') }}" required>
        @error('nilai_kls5_smt2') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Kelas 6 --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Nilai Rata-Rata Raport Semester 1 (Kelas 6) <span class="text-danger">*</span></label>
        <input type="number" step="0.01" name="nilai_kls6_smt1" class="form-control @error('nilai_kls6_smt1') is-invalid @enderror" value="{{ old('nilai_kls6_smt1') }}" required>
        @error('nilai_kls6_smt1') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Nilai Rata-Rata Raport Semester 2 (Kelas 6) <span class="text-danger">*</span></label>
        <input type="number" step="0.01" name="nilai_kls6_smt2" class="form-control @error('nilai_kls6_smt2') is-invalid @enderror" value="{{ old('nilai_kls6_smt2') }}" required>
        @error('nilai_kls6_smt2') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Nilai Ujian --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Nilai Rata-Rata Ujian Sekolah <span class="text-danger">*</span></label>
        <input type="number" step="0.01" name="nilai_ujian_sekolah" class="form-control @error('nilai_ujian_sekolah') is-invalid @enderror" value="{{ old('nilai_ujian_sekolah') }}" required>
        @error('nilai_ujian_sekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>