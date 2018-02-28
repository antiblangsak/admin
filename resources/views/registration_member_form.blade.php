@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2>Tambah Anggota Keluarga</h2>
                    </div>

                    <div class="panel-body" style="padding-left: 50px; padding-right: 50px;">
                        <div class="panel panel-default">
                            <div class="panel-heading" data-toggle="collapse" data-target="#kk"
                                 style="cursor: pointer;">
                                <h3 class="panel-title"><b>Foto Kartu Keluarga</b> (Klik untuk lihat)</h3>
                            </div>
                            <div id="kk" class="panel-collap collapse">
                                <div class="panel-body">
                                    <img src="{{ route('kk_image_viewer', [$registration_id]) }}" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <h3><b>Data Anggota Keluarga</b></h3>
                        <p>Harap masukkan data anggota keluarga sesuai foto KK di atas.</p>
                        <br>
                        <form method="post"
                              action="{{ action('FamilyRegistrationController@addFamilyMember', ['id' => $registration_id]) }}">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <div class="form-group">
                                <label for="fullname">Nama Lengkap</label>
                                <input type="text" class="form-control" id="fullname" placeholder="Kemas Ramadhan"
                                       name="fullname" style="text-transform:uppercase" required="required"
                                       value="{{ old('fullname') }}">
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                @if ($errors->has('nik'))
                                    <div class="has-error">
                                @endif
                                        <input type="text" class="form-control" id="nik" placeholder="3209875612390003"
                                               name="nik" required="required" value="{{ old('nik') }}">
                                @if ($errors->has('nik'))
                                    </div>
                                @endif
                                @if ($errors->has('nik'))
                                    <div class="has-error">
                                        <div class="help-block">
                                            <strong>{{ $errors->first('nik') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <br>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" required="required"
                                           value="LAKI-LAKI" {{ old('gender') == "LAKI-LAKI" ? 'checked' : '' }}>Laki-laki
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender"
                                           value="PEREMPUAN" {{ old('gender') == "PEREMPUAN" ? 'checked' : '' }}>Perempuan
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="birth_place">Tempat Lahir</label>
                                <input type="text" class="form-control" id="birth_place" placeholder="Yogyakarta"
                                       name="birth_place" style="text-transform:uppercase" required="required"
                                       value="{{ old('birth_place') }}">
                            </div>
                            <div class="form-group">
                                <label for="birth_date">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="birth_date" placeholder="1990-10-10"
                                       name="birth_date" style="text-transform:uppercase" required="required"
                                       value="{{ old('birth_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="religion">Agama</label>
                                <select id="religion" class="form-control" name="religion"
                                        style="text-transform:uppercase" required>
                                    @foreach (\App\Http\Controllers\FamilyRegistrationController::RELIGION_LIST as $religion)
                                        @if ($religion == "-- PILIH --")
                                            <option value="">{{ $religion }}</option>
                                        @else
                                            <option value="{{ $religion }}" {{ (collect(old('religion'))->contains($religion)) ? 'selected':'' }}>{{ $religion }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="education">Pendidikan Terakhir</label>
                                <select id="education" class="form-control" name="education"
                                        style="text-transform:uppercase" required>
                                    @foreach (\App\Http\Controllers\FamilyRegistrationController::EDUCATION_LIST as $education)
                                        @if ($education == "-- PILIH --")
                                            <option value="">{{ $education }}</option>
                                        @else
                                            <option value="{{ $education }}" {{ (collect(old('education'))->contains($education)) ? 'selected':'' }}>{{ $education }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="occupation">Pekerjaan</label>
                                <select id="occupation" class="form-control" name="occupation"
                                        style="text-transform:uppercase" required>
                                    @foreach (\App\Http\Controllers\FamilyRegistrationController::OCCUPATION_LIST as $occupation)
                                        @if ($occupation == "-- PILIH --")
                                            <option value="">{{ $occupation }}</option>
                                        @else
                                            <option value="{{ $occupation }}" {{ (collect(old('occupation'))->contains($occupation)) ? 'selected':'' }}>{{ $occupation }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="marital_status">Status Perkawinan</label>
                                <select id="marital_status" class="form-control" name="marital_status"
                                        style="text-transform:uppercase" required>
                                    @foreach (\App\Http\Controllers\FamilyRegistrationController::MARITAL_STATUS_LIST as $marital_status)
                                        @if ($marital_status == "-- PILIH --")
                                            <option value="">{{ $marital_status }}</option>
                                        @else
                                            <option value="{{ $marital_status }}" {{ (collect(old('marital_status'))->contains($marital_status)) ? 'selected':'' }}>{{ $marital_status }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="relation">Status Hubungan Dalam Keluarga</label>
                                <select id="relation" class="form-control" name="relation"
                                        style="text-transform:uppercase" required>
                                    @foreach (\App\Http\Controllers\FamilyRegistrationController::RELATION_LIST as $relation)
                                        @if ($relation == "-- PILIH --")
                                            <option value="">{{ $relation }}</option>
                                        @else
                                            <option value="{{ $relation }}" {{ (collect(old('relation'))->contains($relation)) ? 'selected':'' }}>{{ $relation }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nationality">Kewarganegaraan</label>
                                <br>
                                <label class="radio-inline">
                                    <input type="radio" name="nationality"
                                           value="WNI" {{ old('nationality') == "WNI" ? 'checked' : '' }}>WNI
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nationality" required="required"
                                           value="WNA" {{ old('nationality') == "WNA" ? 'checked' : '' }}>WNA
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="passport_license">Nomor Paspor</label> (isi dengan "-" jika tidak ada)
                                <input type="text" class="form-control" id="passport_license" placeholder=""
                                       name="passport_license" style="text-transform:uppercase" required="required"
                                       value="{{ old('passport_license') }}">
                            </div>
                            <div class="form-group">
                                <label for="residential_license">Nomor KITAP</label> (isi dengan "-" jika tidak ada)
                                <input type="text" class="form-control" id="residential_license" placeholder=""
                                       name="residential_license" style="text-transform:uppercase" required="required"
                                       value="{{ old('residential_license') }}">
                            </div>
                            <div class="form-group">
                                <label for="father_name">Nama Ayah</label>
                                <input type="text" class="form-control" id="father_name" placeholder="Kemal Ramadhan"
                                       name="father_name" style="text-transform:uppercase" required="required"
                                       value="{{ old('father_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="mother_name">Nama Ibu</label>
                                <input type="text" class="form-control" id="mother_name" placeholder="Nike Ardilla"
                                       name="mother_name" style="text-transform:uppercase" required="required"
                                       value="{{ old('mother_name') }}">
                            </div>
                            <div class="form-group text-center">
                                <a>
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </a>
                                <a href="{{ route('family_registration.show', ['id' => $registration_id ]) }}">
                                    <button type="button" class="btn btn-danger">Kembali</button>
                                </a>
                            </div>
                        </form>
                        {{--<a href="{{ route('family_registration.store') }}"><button type="button" class="btn btn-primary">Tambahkan Anggota Keluarga</button></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection