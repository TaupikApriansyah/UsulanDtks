@extends('layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Survei Data</h3>
                    <p class="text-subtitle text-muted">isina naon nya duka te nyaho</p>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No telepon</th>
                                <th>Kota</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Taupik</td>
                                <td>taupik@gmail.com</td>
                                <td>08817831</td>
                                <td>Katapang</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
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
                                <td>Syahdan</td>
                                <td>syahdan@gmail.com</td>
                                <td>0895364519064</td>
                                <td>Kopo</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
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
