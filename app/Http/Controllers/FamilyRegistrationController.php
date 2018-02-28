<?php

namespace App\Http\Controllers;

use App\Models\FamilyMember;
use App\Models\FamilyRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class FamilyRegistrationController extends Controller
{

    const RELIGION_LIST = [
        '-- PILIH --',
        'ISLAM',
        'KRISTEN',
        'KATOLIK',
        'HINDU',
        'BUDHA'
    ];
    const EDUCATION_LIST = [
        '-- PILIH --',
        'TIDAK / BELUM SEKOLAH',
        'BELUM TAMAT SD / SEDERAJAT',
        'TAMAT SD / SEDERAJAT',
        'SLTP / SEDERAJAT',
        'SLTA / SEDERAJAT',
        'DIPLOMA I / II',
        'AKADEMI / DIPLOMA III / SARJANA MUDA',
        'DIPLOMA IV / STRATA I',
        'STRATA II">STRATA II',
        'STRATA III<">STRATA III'
    ];
    const OCCUPATION_LIST = [
        '-- PILIH --',
        'BELUM / TIDAK BEKERJA',
        'MENGURUS RUMAH TANGGA',
        'PELAJAR / MAHASISWA',
        'PEGAWAI NEGERI SIPIL',
        'TNI',
        'WIRASWASTA',
        'KARYAWAN SWASTA',
        'GURU',
        'SOPIR',
        'PEDAGANG',
        'PENSIONAN',
        'PETANI / PEKEBUN',
        'BURUH HARIAN LEPAS',
        'BURUH TANI / PERKEBUNAN',
        'PEMBANTU RUMAH TANGGA',
        'TUKANG CUKUR',
        'TUKANG LISTRIK',
        'TUKANG BATU',
        'TUKANG KAYU',
        'MEKANIK',
        'PARAJI',
        'IMAM MASJID',
        'WARTAWAN',
        'USTADZ / MUBALIGH',
        'PERANGKAT DESA',
        'KEPALA DESA',
    ];
    const MARITAL_STATUS_LIST = [
        '-- PILIH --',
        'BELUM KAWIN',
        'KAWIN',
        'CERAI HIDUP',
        'CERAI MATI',
    ];
    const RELATION_LIST = [
        '-- PILIH --',
        'KEPALA KELUARGA',
        'SUAMI',
        'ISTRI',
        'MENANTU',
        'CUCU',
        'ORANG TUA',
        'MERTUA',
        'FAMILI LAIN',
        'PEMBANTU',
        'LAINNYA',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = FamilyRegistration::where('status', 0)->get();
        $completedRegistrations = FamilyRegistration::whereIn('status', [1, 2])->get();
        $count = $registrations->count();
        $completeCount = $completedRegistrations->count();

        foreach ($registrations as $registration) {
            $registration->statusString = $registration->getStatusString();
        }

        foreach ($completedRegistrations as $completedRegistration) {
            $completedRegistration->statusString = $completedRegistration->getStatusString();
        }

        return view('registration', [
            'count' => $count,
            'completeCount' => $completeCount,
            'registrations' => $registrations,
            'completed' => $completedRegistrations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addFamilyMemberForm($registrationId)
    {
        $familyRegistration = FamilyRegistration::find($registrationId);
        return view('registration_member_form', [
            'registration_id' => $registrationId
        ]);
    }

    public function addFamilyMember(Request $request, $id)
    {
        $familyRegistration = FamilyRegistration::find($id);
        $refUserId = $familyRegistration->user_id;

        $rules = [
            'nik' => 'unique:family_member|digits:16',
        ];
        $messages = [
            'nik.unique' => 'NIK sudah terdaftar',
            'nik.digits' => 'NIK harus terdiri dati 16 digit'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();;
        }

        $family_member = FamilyMember::create($request->all());
        $family_member->family_registration_id = $id;
        $family_member->save();

        return redirect()->route('family_registration.show', ['id' => $id]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FamilyRegistration $familyRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(FamilyRegistration $familyRegistration)
    {
        return view('registration_detail', [
            'data' => $familyRegistration,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FamilyRegistration $familyRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(FamilyRegistration $familyRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\FamilyRegistration $familyRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamilyRegistration $familyRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FamilyRegistration $familyRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamilyRegistration $familyRegistration)
    {
        //
    }
}
