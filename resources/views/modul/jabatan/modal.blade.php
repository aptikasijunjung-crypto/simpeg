<form id="proses" onsubmit="return false;">
    @csrf
    <input type="hidden" name="id" value="{{ $id }}">
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="nameInput" class="form-label">Jabatan</label>
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Jabatan"
                value="{{ empty($id) ? '' : $detail->name }}">
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
    </div>
</form>

<script>
    $('form#proses').submit(function(e) {
        $.LoadingOverlay('show');
        e.preventDefault();
        $.post("{{ route('jabatan.store') }}", $(this).serialize(), function(data) {
            if (data.id == 0) {
                komentar(0, 'Error', data.komen);
            } else {
                komentar(1, 'Success', data.komen);
                $('#lgModal').modal('hide');
                $("div.card-body").html(data.tabel);
            }
            $.LoadingOverlay('hide');
        }, 'json');

    });
</script>
