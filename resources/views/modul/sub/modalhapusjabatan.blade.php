<lord-icon src="https://cdn.lordicon.com/pithnlch.json" trigger="loop" colors="primary:#121331,secondary:#08a88a"
    style="width:120px;height:120px"></lord-icon>
<div class="mt-4">
    <h4 class="mb-3">Anda Yakin Menghapus Data Jabatan ini ?</h4>
    <p class="text-muted mb-4"> Anda akan kehilangan data jabatan ini selamanya</p>
    <form id="proses-hapus" onsubmit="return false">
        <input type="hidden" name="sub_opd_id" value="{{ $data['sub_opd_id'] }}">
        <input type="hidden" name="kode" value="{{ $data['kode'] }}">
        @csrf
        <div class="hstack gap-2 justify-content-center">
            <a href="javascript:void(0);" class="btn btn-link link-success fw-medium material-shadow-none"
                data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
            <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
    </form>
</div>

<script>
    $("form#proses-hapus").submit(function(e) {
        e.preventDefault();
        $.post("{{ route('proses.hapus.jabatan') }}", $(this).serialize(), function(data) {
            $('#dialogModal').modal('hide');
            $("div#tabelPosisi").html(data.tabel);
        }, 'json');
    });
</script>
