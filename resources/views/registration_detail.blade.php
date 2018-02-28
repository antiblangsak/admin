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

                                <h4><b>Waktu Pendaftaran</b></h4>
                                <p style="margin-bottom: 20px">{{ $data->created_at }}</p>
                            </div>
                            <div class="col-lg-6">
                                <h4><b>Rekening Bank Pendaftar</b></h4>
                                @if (count($data->user->bankAccounts) > 0)
                                    <ul>
                                        @foreach($data->user->bankAccounts as $bankAcc)
                                            <li>
                                                <p>
                                                    {{ $bankAcc->bank_name }} | <a
                                                            href="{{ route('bank_account_image_viewer', [$bankAcc->id]) }}"
                                                            target="_blank">Lihat foto</a>
                                                    <br>
                                                    Cabang {{ $bankAcc->branch_name }}
                                                    <br>
                                                    {{ $bankAcc->account_number }} a/n. {{ $bankAcc->account_name }}
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
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4><b>Anggota Keluarga</b></h4>
                                @if (count($data->familyMembers) > 0)
                                    <ul>
                                        @foreach ($data->familyMembers as $familyMember)
                                            <li>
                                                <strong>{{ $familyMember->fullname }} / {{ $familyMember->relation }} / </strong>
                                                    <a data-toggle="collapse"  data-target="#member{{ $familyMember->id }}" style="cursor: pointer;">
                                                        Lihat detail
                                                    </a>
                                                <div id="member{{ $familyMember->id }}" class="collapse row">
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Nama</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->fullname }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>NIK</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->nik }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Jenis Kelamin</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->gender }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Tempat Lahir</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->birth_place }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Tanggal Lahir</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->birth_date }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Agama</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->religion }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Pendidikan</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->education }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Pekerjaan</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->occupation }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Status Perkawinan</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->marital_status }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Kewarganegaraan</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->nationality }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Nomor Paspor</strong>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                : {{ $familyMember->passport_license }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Nomor KITAP</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->residential_license }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Nama Ayah</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->father_name }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <strong>Nama Ibu</strong>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                : {{ $familyMember->mother_name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <br>
                                        @endforeach
                                    </ul>
                                @else
                                    Belum ada anggota keluarga
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body text-center">
                        <a href="{{ route('add_family_member_form', ['id' => $data->id, 'ref_user_id' => $data->user->id]) }}">
                            <button type="button" class="btn btn-primary">Tambahkan Anggota Keluarga</button>
                        </a>
                        <a href="{{ route('family_registration.index') }}">
                            <button type="button" class="btn btn-danger">Kembali</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
