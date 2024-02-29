@extends('root')
@section('title')
    پنل مدیریت -
    @yield('subtitle')
@endsection
@section('body')

        <div class="card rounded-0 vh-100 border-0">

            <div class="card-header ">
                <x-panel.navbar/>
            </div>

            <div class="card-body p-0 overflow-auto">

                <div class="card d-flex flex-row border-0 h-100">

                    <x-panel.sidebar/>

                    <div class="card-body p-0  overflow-x-hidden">

                        <div class="card rounded-0 border-0 h-100">

                            <div class="card-header d-flex justify-content-between align-items-center ">
                                @yield('header')
                            </div>

                            <div class="card-body overflow-auto">

                                @yield('content')

                                <div class="card @yield('card-classes') mh-100" @yield('card-attributes')>
                                    <div class="card-header fs-4">
                                        @yield('card-header')
                                    </div>
                                    <div class="card-body overflow-auto">

                                        @yield('card-body')

                                        <div class="table-responsive @yield('table')">
                                            <table class="table text-center  table-hover">
                                                <thead>
                                                <tr class="align-middle ">
                                                   @yield('table-head')
                                                </tr>
                                                </thead>
                                                <tbody class="table-group-divider">
                                                    @yield('table-body')
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="card-footer  @yield('card-footer-classes')" @yield('card-footer-attributes')>
                                        @yield('card-footer')
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

@endsection
