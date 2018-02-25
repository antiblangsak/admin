<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\FamilyRegistration;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function showKtpImage($id) {
        $familyRegistration = FamilyRegistration::find($id);

        $img = \Image::make(base64_decode($familyRegistration->ktp_photo));
        $filename = $familyRegistration->id . '.png';

        $storagePath = 'public/registration/' . $filename;
        \Storage::put($storagePath, $img->encode('png', 100)->__toString());

        return $img->response();

    }

    public function showKkImage($id) {
        $familyRegistration = FamilyRegistration::find($id);

        $img = \Image::make(base64_decode($familyRegistration->kk_photo));
        $filename = $familyRegistration->id . '.png';

        $storagePath = 'public/registration/' . $filename;
        \Storage::put($storagePath, $img->encode('png', 100)->__toString());

        return $img->response();

    }

    public function showBankAccountImage($id) {
        $bankAcc = BankAccount::find($id);

        $img = \Image::make(base64_decode($bankAcc->account_photo));
        $filename = $bankAcc->id . '.png';

        $storagePath = 'public/bank_account/' . $filename;
        \Storage::put($storagePath, $img->encode('png', 100)->__toString());

        return $img->response();

    }
}
