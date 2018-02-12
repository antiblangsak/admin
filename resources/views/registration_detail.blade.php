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
                            </div>
                            <div class="col-lg-6">
                                <h4><b>Rekening Bank Pendaftar</b></h4>
                                @if (count($data->user->bankAccounts) > 0)
                                    <ul>
                                        @foreach($data->user->bankAccounts as $bankAcc)
                                            <li>
                                                <p>
                                                    {{ $bankAcc->bank_name }} Cabang {{ $bankAcc->branch_name }}
                                                    <br>
                                                    {{ $bankAcc->account_number }} a/n. {{ $bankAcc->account_name }}
                                                    <br>
                                                    <a target="_blank" href={{ route('image', ['filename' => $bankAcc->account_photo ]) }}><b>Lihat Foto Rekening</b></a>
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
                        <div>
                            asd
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
