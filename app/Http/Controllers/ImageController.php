<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\FamilyRegistration;

class ImageController extends Controller
{
    public function showKtpImage($id) {
        $familyRegistration = FamilyRegistration::find($id);
        $img = \Image::make(base64_decode($familyRegistration->ktp_photo));
        return $img->response();

    }

    public function showKkImage($id) {
        $familyRegistration = FamilyRegistration::find($id);
        $img = \Image::make(base64_decode($familyRegistration->kk_photo));
        return $img->response();
    }

    public function showBankAccountImage($id) {
        $bankAcc = BankAccount::find($id);
        $img = \Image::make(base64_decode($bankAcc->account_photo));
        return $img->response();
    }
}
