@extends('master')
@section('title', 'Clients')
@section('heading', 'Manage Clients')
@section('body')
    @session('success')
    <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <i class="ace-icon fa fa-check green"></i>
        {{ $value }}
    </div>
    @endsession
    <div class="row">
        <div class="col-xs-12">
            <!-- div.table-responsive -->

            <!-- div.dataTables_borderWrap -->
            <div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>NID</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $client->full_name }}</td>
                        <td>$45</td>
                        <td class="hidden-480">3,330</td>
                        <td>Feb 12</td>

                        <td class="hidden-480">
                            <span class="label label-sm label-warning">Expiring</span>
                        </td>

                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="blue" href="{{ route('client.show', $client->id) }}">
                                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                </a>

                                <a class="green" href="{{ route('client.edit', $client->id) }}">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" href="#" onclick="if (confirm('Are you sure! Want to delete?')) { $('#delete-client-{{ $client->id }}').submit() }">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                                <form id="delete-client-{{ $client->id }}" action="{{ route('client.destroy', $client->id) }}" method="POST">@csrf @method('delete')</form>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')		<!-- page specific plugin scripts -->
<script src="{{ asset('/') }}assets/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        //initiate dataTables plugin
        var myTable =
            $('#dynamic-table')
                .DataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                        { "bSortable": false },
                        null, null,null, null, null,
                        { "bSortable": false }
                    ],
                    "aaSorting": [],

                    select: {
                        style: 'multi'
                    }
                } );
    </script>
@endsection
