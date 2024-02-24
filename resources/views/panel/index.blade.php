@extends('layouts.panel')
@section('header')
    <h4>داشبرد</h4>
@endsection
@section('content')
    <div class="row gap-4 justify-content-evenly align-items-center">

        <x-panel.dashboard.users-count/>

        <div class="col-md-3  shadow-lg text-bg-primary p-4 rounded-4 d-flex flex-column justify-content-center gap-3 align-items-center">
            <div class="rounded-circle p-5 text-bg-light position-relative d-flex justify-content-center align-items-center">
                <span class="position-absolute fs-5"></span>
            </div>
            <span class="fs-4"></span>
        </div>

        <div class="col-md-3  shadow-lg text-bg-primary p-4 rounded-4 d-flex flex-column justify-content-center gap-3 align-items-center">
            <div class="rounded-circle p-5 text-bg-light position-relative d-flex justify-content-center align-items-center">
                <span class="position-absolute fs-5"></span>
            </div>
            <span class="fs-4"></span>
        </div>



    </div>
    <hr>
    <div class="d-flex flex-column">
        <h1>پست ها</h1>

        <div class="table-responsive">
            <table class="table text-center table-bordered">
                <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>
@endsection
