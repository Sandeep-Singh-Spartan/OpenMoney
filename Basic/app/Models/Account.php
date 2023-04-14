<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $table = 'account';

    protected $primaryKey = 'virtual_accounts_id';

    public $timestamps = true;

    protected $fillable = ['virtual_accounts_id','virtual_account_number','virtual_account_ifsc_code','name','primary_contact','email_id','landline_number','mobile_number','balance','users_id'];

    public function User(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
