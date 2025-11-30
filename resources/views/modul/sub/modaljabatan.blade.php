<p class="mb-3 text-end">
    <button type="button" class="btn btn-soft-info btn-sm material-shadow-none modal-pilih-jabatan"
        id="{{ $data->sub_opd_id }}" kode="0">
        <i class="ri-add-fill me-1 align-bottom"></i> Jabatan
    </button>
</p>
<br>
<p class="mt-3 tabel-posisi">
    @php
        echo tabelPosisi($tabel);
    @endphp
</p>

<script>
    $("button.modal-pilih-jabatan").click(function(e) {
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
</script>
