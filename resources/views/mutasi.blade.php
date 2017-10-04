@extends('layouts.master')
@section('title','Trans | Dashboard')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Mutation</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List Mutation<small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                                Your mutation's list
                            </p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID Transaction</th>
                                        <th>Nama Rekening Pengirim</th>
                                        <th>Nomor Rekening Pengirim</th>
                                        <th>Bank</th>
                                        <th>Jumlah Transfer</th>
                                        <th>Tanggal Transfer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($data as $key => $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->nama_rek}}</td>
                                            <td>{{$value->no_rek}}</td>
                                            <td>{{$value->bank}}</td>
                                            <td>{{$value->jumlah}}</td>
                                            <td>{{date('d F Y, H:i:s',strtotime($value->created_at))}}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection