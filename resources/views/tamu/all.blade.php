@extends('layouts.app')

@section('content')



<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">



            <div class="card">
                <div class="card-header">Daftar Tamu Pustipada</div>
                <div class="card-body">
                    <div class="row input-daterange mb-4">
                        <div class="col-md-4">
                            <input type="text" name="from_date" id="from_date" class="form-control"
                                placeholder="From Date" readonly />
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date"
                                readonly />
                        </div>
                        <div class="col-md-4">
                            <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                            <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                        </div>
                    </div>


                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>NIM / NIP</th>
                                <th>Keperluan</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function() {
    $('.input-daterange').datepicker({
        todayBtn: 'linked',
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    load_data();

    function load_data(from_date = '', to_date = '') {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("daftar_tamu") }}',
                data: {
                    from_date: from_date,
                    to_date: to_date
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'nomor_induk',
                    name: 'nomor_induk'
                },
                {
                    data: 'keperluan',
                    name: 'keperluan'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'waktu',
                    name: 'waktu'
                }
            ]
        });
    }

    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if (from_date != '' && to_date != '') {
            $('#users-table').DataTable().destroy();
            load_data(from_date, to_date);
        } else {
            alert('Both Date is required');
        }
    });

    $('#refresh').click(function() {
        $('#from_date').val('');
        $('#to_date').val('');
        $('#users-table').DataTable().destroy();
        load_data();
    });

});
</script>
@endpush