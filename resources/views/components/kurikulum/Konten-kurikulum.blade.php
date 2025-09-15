<section class="container my-5">
    <div class="accordion rounded-4 shadow" id="accordionKurikulum">
        @foreach($kurikulums as $kurikulum)
        <div class="accordion-item shadow-sm mb-3 ">
            <h2 class="accordion-header" id="headingKurikulum{{ $kurikulum->id }}">
                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }} fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseKurikulum{{ $kurikulum->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                    aria-controls="collapseKurikulum{{ $kurikulum->id }}">
                    {{ $kurikulum->nama_kurikulum }}
                </button>
            </h2>
            <div id="collapseKurikulum{{ $kurikulum->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                aria-labelledby="headingKurikulum{{ $kurikulum->id }}">
                <!-- data-bs-parent="#accordionKurikulum" (tambahkan ini di collapseKurikulum{{ $kurikulum->id }} jika setiap klik acording lain yang sebelumnya akan tertutup)  -->
                <div class="accordion-body">
                    {{-- Accordion untuk kelas --}}
                    <div class="accordion" id="accordionKelas{{ $kurikulum->id }}">
                        @foreach($kurikulum->kelas as $kelas)
                        <div class="accordion-item mb-2">
                            <h2 class="accordion-header" id="headingKelas{{ $kelas->id }}">
                                <button class="accordion-button collapsed small fw-bolder" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseKelas{{ $kurikulum->id }}-{{ $kelas->id }}"
                                    aria-expanded="false"
                                    aria-controls="collapseKelas{{ $kurikulum->id }}-{{ $kelas->id }}">
                                    {{ $kelas->nama }} (Kelas {{ $kelas->tingkat }})
                                </button>
                            </h2>
                            <div id="collapseKelas{{ $kurikulum->id }}-{{ $kelas->id }}"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingKelas{{ $kelas->id }}"
                                data-bs-parent="#accordionKelas{{ $kurikulum->id }}">
                                <div class="accordion-body p-3">
                                    <ul class="list-group list-group-flush">
                                        @foreach($kurikulum->mapel as $mapel)
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $mapel->nama }}
                                            <span
                                                class="badge rounded-pill {{ $mapel->type == 'Agama' ? 'bg-warning text-dark' : ($mapel->type == 'Umum' ? 'bg-success' : 'bg-danger') }}">
                                                {{ $mapel->type }}
                                            </span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>