@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2>Pendaftaran</h2>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($count === 0)
                            <h4>Tidak terdapat pendaftaran baru</h4>
                        @else
                            <h4>Terdapat {{ $count }} pendaftaran baru</h4>

                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="col-lg-1 text-center">Nomor</th>
                                    <th class="col-lg-4 text-center">Nama Pendaftar</th>
                                    <th class="col-lg-3 text-center">Waktu Pendaftaran</th>
                                    <th class="col-lg-2 text-center">Status</th>
                                    <th class="col-lg-2 text-center"></th>
                                </tr>
                                </thead>
                                @foreach ($registrations as $r)
                                    <tr>
                                        <td class="text-center">
                                            {{ $r->id }}
                                        </td>
                                        <td>
                                            {{ $r->user->name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $r->created_at }}
                                        </td>
                                        <td class="text-center">
                                            {{ $r->statusString }}
                                        </td>
                                        <td class="text-center">
                                            <a href={{ route('family_registration.show', ['id' => $r->id ]) }}>Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        @endif

                        <h4>List Pendaftaran Terproses</h4>

                        @if ($completeCount > 0)
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="col-lg-1 text-center">Nomor</th>
                                    <th class="col-lg-5 text-center">Nama Pendaftar</th>
                                    <th class="col-lg-4 text-center">Status</th>
                                    <th class="col-lg-2 text-center"></th>
                                </tr>
                                </thead>
                                @foreach ($completed as $r)
                                    <tr>
                                        <td class="text-center">
                                            {{ $r->id }}
                                        </td>
                                        <td>
                                            {{ $r->user->name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $r->statusString }}
                                        </td>
                                        <td class="text-center">
                                            Lihat
                                        </td>
                                    </tr>
                                @endforeach
                        @else
                            <p>Tidak ada data</p>
                        @endif

                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
