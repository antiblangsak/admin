<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyRegistration extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'family_registration';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'kk_photo', 'ktp_photo', 'status'
    ];

    const STATUS_WAITING = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_REJECTED = 2;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function familyMembers() {
        return $this->hasMany('App\Models\FamilyMember');
    }

    public function getStatusString() {
        if ($this->status == FamilyRegistration::STATUS_WAITING) {
            return 'Menunggu verifikasi';
        } else if ($this->status == FamilyRegistration::STATUS_ACTIVE) {
            return 'Aktif';
        } else {
            return 'Ditolak';
        }
    }
}
