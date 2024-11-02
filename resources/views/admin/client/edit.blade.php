@extends('master')
@section('title', 'Clients')
@section('heading', 'Edit Client')
@section('body')
    <!-- enctype add-->
    <!-- enctype add-->
    <!-- enctype add-->
    <!-- enctype add-->
    <!-- enctype add-->
    @session('success')
    <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <i class="ace-icon fa fa-check green"></i>
        {{ $value }}
    </div>
    @endsession
    <form action="{{ route('client.update', $client->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            {{--        <div class="col-md-12 form-horizontal">
                        <div class="form-group ">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image </label>
                            <div class="col-sm-9">
                                <input type="file" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                    </div>--}}
            <div class="col-md-12 form-horizontal">
                <div class="form-group ">
                    <label class="col-sm-3 bolder control-label no-padding-right" for="full-name"> Full Name </label>

                    <div class="col-sm-9">
                        <input type="text" id="full-name" name="full_name" value="{{ $client->full_name }}" placeholder="Full Name" class="col-xs-10 col-sm-5" />
                    </div>
                </div>
            </div>
            {{--        <div class="col-md-12 form-horizontal">
                        <div class="form-group ">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Father Name </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-horizontal">
                        <div class="form-group ">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mother Name </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                    </div>--}}
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="education_table">
                    <thead>
                    <tr>
                        <th>Degree</th>
                        <th>Board/Institute</th>
                        <th>GPA/CGPA</th>
                        <th>Year</th>
                        <th><button type="button" class="btn btn-success btn-sm add"><i class="fa fa-plus"></i></button></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(request()->old('education'))
                        @foreach(request()->old('education') as $key => $value)
                            <tr>
                                <td>
                                    <input type="text" name="education[{{$key}}][degree]" value="{{ $value['degree'] ?? '' }}" class="form-control degree" />
                                    @error("education.{$key}.degree")
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" name="education[{{$key}}][institute]" value="{{ $value['institute'] ?? '' }}" class="form-control degree" />
                                    @error("education.{$key}.institute")
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>                                <td>
                                    <input type="text" name="education[{{$key}}][result]" value="{{ $value['result'] ?? '' }}" class="form-control degree" />
                                    @error("education.{$key}.result")
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>                                <td>
                                    <input type="text" name="education[{{$key}}][year]" value="{{ $value['year'] ?? '' }}" class="form-control degree" />
                                    @error("education.{$key}.year")
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger remove">-</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        @foreach($client->educations as $education)
                            <tr>
                                <td>
                                    <input type="text" name="education[{{ $loop->iteration }}][degree]" value="{{ $education->degree }}" class="form-control degree" />
                                </td>
                                <td>
                                    <input type="text" name="education[{{ $loop->iteration }}][institute]" value="{{ $education->institute }}" class="form-control institute" />
                                </td>
                                <td>
                                    <input type="text" name="education[{{ $loop->iteration }}][result]" value="{{ $education->result }}" class="form-control result" />
                                </td>
                                <td>
                                    <input type="text" name="education[{{ $loop->iteration }}][year]" value="{{ $education->year }}" class="form-control year" />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger remove">-</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div><!-- /.row -->
        <div class="text-center">
            <button type="submit" class="btn btn-warning">Save</button>
        </div>
    </form>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {

            let count = $('#education_table tbody tr').length;

            function add_input_field(count)
            {
                let html = '';
                html += '<tr>';
                html += `<td><input type="text" name="education[${count}][degree]" class="form-control degree" /></td>`;
                html += `<td><input type="text" name="education[${count}][institute]" class="form-control institute" /></td>`;
                html += `<td><input type="text" name="education[${count}][result]" class="form-control result" /></td>`;
                html += `<td><input type="text" name="education[${count}][year]" class="form-control year" /></td>`;
                html += `<td><button type="button" class="btn btn-sm btn-danger remove">-</button></td></tr>`;

                return html;
            }

            $('#education_table tbody tr:first').find('button').remove();

            $(document).on('click', '.add', function () {
                count++;
                $('#education_table').append(add_input_field(count));
            });

            $(document).on('click', '.remove', function () {
                $(this).closest('tr').remove();
                count--;
            });

        });
    </script>
@endsection
