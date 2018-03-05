@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.3/css/fixedHeader.dataTables.min.css">}

<style>

td.details-control {
    background: url('../images/details_open.png') no-repeat center center;
    cursor: pointer;
    width: 18px;
}
tr.shown td.details-control {
    background: url('../images/details_close.png') no-repeat center center;
}
</Style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 no-padding no-margins">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="pull-left">Usuarios</h3>
                <div class="text-right">
                    <button data-animation="flip" class="btn btn-primary"><i class="fa" class="fa-lock" ></i> </button>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover display" id="users-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Accion</th>
                            <th>Usuario</th>
                            <th>Nombres y Apellidos</th>
                            <th>Celular</th>
                            <th>Departamento</th>
                            <th>Cargo</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection 
 
@section('scripts')
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- App scripts -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>
<script src="https://datatables.yajrabox.com/css/datatables.bootstrap.css"></script>

<script>
    
     $(function() {
$('#users-table').DataTable({
processing: true,
serverSide: true,
ajax: "{!! route('user_list') !!}",
columns: [ 
{"className":      'details-control cechus',
 "orderable":      false,
 "searchable":      false,
 "data":           null,
 "defaultContent": ''
 }, 
{ data: 'username', name: 'username', orderable: true },
{ data: 'first_name', name: 'first_name' },
{ data: 'phone', name: 'phone', orderable: true },
{ data: 'city_id', name: 'city_id' },
{ data: 'position', name: 'position' },
{ data: 'status', name: 'status' }, 
{data: 'action', name: 'action', orderable: false, searchable: false}
]
});
}); 
 function initTable(tableId, data) {
        $('#' + tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' }
            ]
        })
    }

    $('#users-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var tableId = 'posts-' + row.data().id;

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(template(row.data())).show();
            initTable(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }
    });
 </script>
 
@endsection