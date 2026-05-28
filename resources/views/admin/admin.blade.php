@extends('layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Admin</h3>
                    <p class="text-subtitle text-muted">Admin untuk Login</p>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="" class="btn btn-outline-primary"><i data-feather="plus"></i></a>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal Daftar</th>
                                <th>Password</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Taupik</td>
                                <td>taupik@gmail.com</td>
                                <td>08817831</td>
                                <td>
                                    123
                                </td>
                                <td>
                                    <a href="" class="btn btn-outline-secondary  rounded-circle">
                                        <i data-feather="eye"></i>
                                    </a>
                                    <a href="" class="btn btn-outline-warning rounded-circle">
                                        <i data-feather="settings"></i>
                                    </a>
                                    <a href="" class="btn btn-outline-danger rounded-circle">
                                        <i data-feather="trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>syahdan</td>
                                <td>syahdan@gmail.com</td>
                                <td>0895364519064</td>
                                <td>
                                    123
                                </td>
                                <td>
                                    <a href="" class="btn btn-outline-secondary rounded-circle">
                                        <i data-feather="eye"></i>
                                    </a>
                                    <a href="" class="btn btn-outline-warning rounded-circle">
                                        <i data-feather="settings"></i>
                                    </a>
                                    <a href="" class="btn btn-outline-danger rounded-circle">
                                        <i data-feather="trash"></i>
                                    </a>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
