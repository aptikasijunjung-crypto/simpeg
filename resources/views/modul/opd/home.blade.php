@extends('template')

@section('konten')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
        <h4 class="mb-sm-0">ORGANISASI</h4>
    </div>

    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">List :</h4>
            <div class="flex-shrink-0">
                <button type="button" class="btn btn-soft-info btn-sm material-shadow-none">
                    <i class="ri-add-fill me-1 align-bottom"></i> Generate Report
                </button>
            </div>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="table-responsive table-card">
                @php
                    echo tabelOpd($data);
                @endphp
            </div>
        </div>
    </div>

    @php
        echo lgModal();
        echo xlModal();
        echo flipModal();
    @endphp
@endsection

@section('jquery')
    <script>
        $('button.modal-sub').click(function() {
            $('#lgModal').modal('show');
            id = $(this).attr('id');
            csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            $.post("{{ route('sub') }}", {
                id: id,
                _token: csrfToken
            }, function(data) {
                $('div.lg-modal').html(data);
            });
        });
    </script>
@endsection
