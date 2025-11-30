<?php

function tabelOpd($data)
{
    $t = null;
    $t .= "
    <div class='table-responsive'>
        <table class='table table-striped table-bordered table-centered align-middle table-nowrap mb-0'>
            <thead class='text-muted table-light'>
                <tr>
                    <th class='text-center' width='6%'>No</th>
                    <th>Nama Organisasi</th>                     
                    <th class='text-center' width='6%'>Sub</th>                     
                                         
                </tr>
            </thead>
            <tbody>";
    $no = 1;
    foreach ($data as $i) {
        $t .= "
        <tr>

            <td class='text-center'>" . $no . ".</td>
            <td>" . $i->opd_name . "</td>    
            <td>
            <button class='btn btn-link modal-sub icon-demo-content' id='" . $i->opd_id . "'>
                <i class='bx bx-layer-plus text-success'></i>
            </button>
            </td>
        </tr>
            ";
        $no++;
    }
    $t .= "
            </tbody>
        </table>
    </div>
    ";
    return $t;
}

function tabelSubOpd($data)
{
    $t = null;
    $t .= "
    <div class='table-responsive'>
        <table class='table table-striped table-bordered table-centered align-middle table-nowrap mb-0'>
            <thead class='text-muted table-light'>
                <tr>
                    <th class='text-center' width='6%'>No</th>
                    <th>Nama Organisasi</th>                     
                    <th class='text-center' width='6%'>Manajement</th>                     
                                         
                </tr>
            </thead>
            <tbody>";
    $no = 1;
    foreach ($data as $i) {
        $t .= "
        <tr>

            <td class='text-center'>" . $no . ".</td>
            <td>" . $i->sub_opd_name . "</td>    
            <td class='text-center'>
                <button type='button' class='btnku btn-link link-success modal-sub-jabatan' id='" . $i->sub_opd_id . "'>
                    <i class='bx bx-group'></i>
                </button>
            </td>
            
        </tr>
            ";
        $no++;
    }
    $t .= "
            </tbody>
        </table>
    </div>
    ";
    return $t;
}


function tabelJabatan($data)
{
    $t = null;
    $t .= "
    <div class='table-responsive table-card'>
        <table class='table table-striped table-bordered table-centered align-middle table-nowrap mb-0'>
            <thead class='text-muted table-light'>
                <tr>
                    <th class='text-center' width='6%'>No</th>
                    <th>Nama Jabatan</th>                    
                    <th class='text-center' width='6%'>Edit</th>                    
                    <th class='text-center' width='6%'>Hapus</th>                    
                                         
                </tr>
            </thead>
            <tbody>";
    $no = 1;
    foreach ($data as $i) {
        $t .= "
        <tr>

            <td class='text-center'>" . $no . ".</td>
            <td>" . $i->name . "</td>  
            <td class='text-center'>
                <button type='button' class='btnku btn-link link-success  modal-jabatan' id='" . $i->id . "'>
                    <i class='ri-edit-2-line fs-15'></i>
                </button>
            </td>  
            <td></td>  
            
        </tr>
            ";
        $no++;
    }
    $t .= "
            </tbody>
        </table>
    </div>
    ";
    return $t;
}


function tabelPosisi($data)
{
    $t = null;
    $t .= "
    <div class='table-responsive table-card'>
        <table class='table table-striped table-bordered table-centered align-middle table-nowrap mb-0'>
            <thead class='text-muted table-light'>
                <tr>
                    <th class='text-center' width='6%'>No</th>
                    <th>Jabatan</th>
                    <th>Title</th>
                    <th>Koordinator</th>
                    <th class='text-center' width='6%'>Edit</th>
                    <th class='text-center' width='6%'>Hapus</th>
                                        
                                         
                </tr>
            </thead>
            <tbody>";
    $no = 1;
    foreach ($data as $i) {
        $t .= "
        <tr>

            <td class='text-center'>" . $no . ".</td>
            <td >" . $i->jabatan_name . "</td>
            <td>" . $i->title . "</td>
            <td>" . $i->koordinator . "</td>
            <td class='text-center'>
                <button type='button' class='btnku btn-link modal-pilih-jabatan' id='" . $i->sub_opd_id . "'
                kode='" . $i->id . "'>
                    <i class='ri-edit-box-line text-success'></i>
                </button>
            </td>
            <td class='text-center'>
                <button type='button' class='btnku btn-link link-danger modal-hapus-jabatan' id='" . $i->sub_opd_id . "'
                kode='" . $i->id . "'>
                    <i class='bx bx-trash'></i>
                </button>
            </td>
           
            
            
        </tr>
            ";
        $no++;
    }
    $t .= "
            </tbody>
        </table>
    </div>
    ";



    return $t;
}
