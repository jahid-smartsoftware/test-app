@extends('master')
@section('title', 'Clients')
@section('heading', 'Client Details')
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="profile-user-info profile-user-info-striped">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Full Name </div>

                    <div class="profile-info-value">
                        <span class="editable" id="username">{{ $client->full_name }}</span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Location </div>

                    <div class="profile-info-value">
                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                        <span class="editable" id="country">Netherlands</span>
                        <span class="editable" id="city">Amsterdam</span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Age </div>

                    <div class="profile-info-value">
                        <span class="editable" id="age">38</span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Joined </div>

                    <div class="profile-info-value">
                        <span class="editable" id="signup">2010/06/20</span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Last Online </div>

                    <div class="profile-info-value">
                        <span class="editable" id="login">3 hours ago</span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> About Me </div>

                    <div class="profile-info-value">
                        <span class="editable" id="about">Editable as WYSIWYG</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                <tr>
                    <th colspan="5"><p class="text-center">Education</p></th>
                </tr>
                <tr>
                    <th>Sl.</th>
                    <th>Degree</th>
                    <th>Institute</th>
                    <th>Result</th>
                    <th>Year</th>
                </tr>
                </thead>

                <tbody>
                @foreach($client->educations as $education)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $education->degree }}</td>
                    <td>{{ $education->institute }}</td>
                    <td>{{ $education->result }}</td>
                    <td>{{ $education->year }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
