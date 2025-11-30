<form id="pilih" onsubmit="return false;" class="row g-3">
    @csrf
    <input type="hidden" name="kode" value="{{ $kode }}">
    <input type="hidden" name="sub_opd_id" value="{{ $data->sub_opd_id }}">
    <input type="hidden" name="opd_id" value="{{ $data->opd_id }}">
    <input type="hidden" id="jabatan_id" name="jabatan_id" value="{{ $kode == 0 ? '' : $detail->jabatan_id }}">
    <div class="col-md-12">
        <label for="fullnameInput" class="form-label">Jabatan</label>
        <input type="text" class="form-control" id="jabatan_name" name="jabatan_name" placeholder="Pilih Jabatan"
            value="{{ $kode == 0 ? '' : $detail->jabatan_name }}">
    </div>
    <div class="col-md-12">
        <label for="fullnameInput" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title Jabatan"
            value="{{ $kode == 0 ? '' : $detail->title }}">
    </div>
    <div class="col-md-12">
        <label for="fullnameInput" class="form-label">Koordinator</label>
        <input type="text" class="form-control" id="koordinator_name" name="koordinator_name"
            placeholder="Koordinator atau Atasan Langsung" value="{{ $kode == 0 ? '' : $detail->koordinator }}">
        <input type="hidden" name="koordinator_id" id="koordinator_id"
            value="{{ $kode == 0 ? '' : $detail->koordinator_id }}">
    </div>

    <div class="hstack gap-2 justify-content-center mt-3">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</a>
    </div>

</form>


<script>
    $('input#jabatan_name').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('auto.jabatan') }}",
                dataType: "json",
                type: 'get',
                data: {
                    term: request.term


                },
                success: function(data) {
                    response(data);
                }

            });
        },
        minLength: 2,
        select: function(event, ui) {
            $("input#jabatan_name").val(ui.item.label);
            $("input#jabatan_id").val(ui.item.value);

            return false;

        }
    });

    $('input#koordinator_name').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('auto.koordinator') }}",
                dataType: "json",
                type: 'get',
                data: {
                    term: request.term


                },
                success: function(data) {
                    response(data);
                }

            });
        },
        minLength: 2,
        select: function(event, ui) {
            $("input#koordinator_name").val(ui.item.label);
            $("input#koordinator_id").val(ui.item.value);
            return false;
        }
    }).autocomplete("instance")._renderItem = function(ul, item) {
        return $("<li>")
            .append("<div>" + item.label + "<br><b>" + item.sub_opd_name + "</b></div>")
            .appendTo(ul);
    };;


    $("form#pilih").submit(function(e) {
        e.preventDefault();
        $.post("{{ route('proses.pilih.jabatan') }}", $(this).serialize(), function(data) {
            if (data.id == 0) {
                komentar(0, "Error", data.komen);
            } else {
                komentar(1, 'Success', data.komen);
                $('#flipModal').modal('hide');
                $("div#tabelPosisi").html(data.tabel);
            }

        }, 'json');

    });
</script>
