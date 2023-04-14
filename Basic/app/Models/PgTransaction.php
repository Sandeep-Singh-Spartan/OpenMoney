<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PgTransaction extends Model{
    use HasFactory;
    protected $table = 'pgTransaction';
    protected $primaryKey = 'pg_transaction_id';

    public $timestamps = true;

    protected $fillable = ['pg_transaction_id','amount','currency','mtx','attempts','sub_accounts_id','entity','status','customer_contact_number','customer_email_id','customer_id','customer_entity','token','transaction_status'];

}
