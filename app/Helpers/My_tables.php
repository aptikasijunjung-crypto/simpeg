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
                <button type='button' class='btn btn-link icon-demo-content modal-sub-jabatan' id='" . $i->sub_opd_id . "'>
                    <i class='bx bx-group text-info'></i>
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
            <td>
                <button type='button' class='btn btn-link icon-demo-content modal-jabatan' id='" . $i->id . "'>
                    <i class='bx bx-edit text-success'></i>
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
