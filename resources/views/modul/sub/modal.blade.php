<p class="mt-3 text-end">
    <button type="button" class="btn btn-soft-info btn-sm material-shadow-none">
        <i class="ri-add-fill me-1 align-bottom"></i> Sub Organisasi
    </button>
</p>
@php
    echo tabelSubOpd($data);
@endphp


<script>
    $("button.modal-sub-jabatan").click(function(e) {
        e.preventDefault();
        $('#xlModal').modal('show');
        id = $(this).attr('id');
        csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        $.post("{{ route('modal.sub.jabatan') }}", {
                id: id,
                _token: csrfToken
            },
            function(data) {
                $("div.xl-modal").html(data);
            });

    });
</script>
