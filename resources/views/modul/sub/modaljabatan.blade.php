<p class="mb-3 text-end">
    <button type="button" class="btn btn-soft-info btn-sm material-shadow-none modal-pilih-jabatan"
        id="{{ $data->sub_opd_id }}" kode="0">
        <i class="ri-add-fill me-1 align-bottom"></i> Jabatan
    </button>
</p>
<br>
<h6 class="mb-4">{{ $data->opd_name }} / {{ $data->sub_opd_name }}</h6>
<div class="mt-3 tabel-posisi" id="tabelPosisi">
    @php
        echo tabelPosisi($tabel);
    @endphp
</div>
<br>
<a href="javascript:void(0);" class="btn btn-link link-success fw-medium material-shadow-none" data-bs-dismiss="modal"><i
        class="ri-close-line me-1 align-middle"></i> Close</a>
<script>
    $(document).on("click", "button.modal-pilih-jabatan", function(e) {
        e.preventDefault();
        $('#flipModal').modal('show');
        id = $(this).attr('id');
        kode = $(this).attr('kode');
        csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        $.post("{{ route('modal.pilih.jabatan') }}", {
                id: id,
                kode: kode,
                _token: csrfToken
            },
            function(data) {
                $("div.flip-modal").html(data);
            });

    });

    $(document).on("click", "button.modal-hapus-jabatan", function() {
        $('#dialogModal').modal('show');
        id = $(this).attr('id');
        kode = $(this).attr('kode');
        csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        $.post("{{ route('modal.hapus.jabatan') }}", {
                id: id,
                kode: kode,
                _token: csrfToken
            },
            function(data) {
                $("div.dialog-modal").html(data);
            });
    });
</script>
