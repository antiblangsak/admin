@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2>Detail Pendaftaran</h2>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4><b>Nomor Pendaftaran</b></h4>
                                <p style="margin-bottom: 20px">{{ $data->id }}</p>

                                <h4><b>Nama Pendaftar (Nama Kepala Keluarga)</b></h4>
                                <p style="margin-bottom: 20px">{{ $data->user->name }}</p>

                                <h4><b>Email Pendaftar</b></h4>
                                <p style="margin-bottom: 20px">{{ $data->user->email }}</p>

                                <h4><b>Foto KTP Pendaftar</b></h4>
                                <a href="{{ route('ktp_image_viewer', [$data->id]) }}" target="_blank">Lihat foto</a>

                                <h4><b>Foto Kartu Keluarga</b></h4>
                                <a href="{{ route('kk_image_viewer', [$data->id]) }}" target="_blank">Lihat foto</a>
                            </div>
                            <div class="col-lg-6">
                                <h4><b>Rekening Bank Pendaftar</b></h4>
                                @if (count($data->user->bankAccounts) > 0)
                                    <ul>
                                        @foreach($data->user->bankAccounts as $bankAcc)
                                            <li>
                                                <p>
                                                    {{ $bankAcc->bank_name }}
                                                    <br>
                                                    Cabang {{ $bankAcc->branch_name }}
                                                    <br>
                                                    {{ $bankAcc->account_number }} a/n. {{ $bankAcc->account_name }}
                                                    <br>
                                                    <a href="{{ route('bank_account_image_viewer', [$bankAcc->id]) }}" target="_blank">Lihat foto</a>
                                                </p>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>
                                        Belum ada data
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{ route('family_registration.index') }}"><button type="button" class="btn btn-danger">Kembali</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
