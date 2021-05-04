<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Ledger\LedgerResource;
use App\Http\Resources\Ledger\LedgerCollection;

class Ledger extends Model
{
    use HasFactory;

    public $oneItem = LedgerResource::class;
    public $allItems = LedgerCollection::class;

    public static function sumOfDebits(){
        return Ledger::sum('credit');
    }

    public static function sumOfCredits(){
        return Ledger::sum('debit');
    }

    public static function calculatedBalance(){
        return Ledger::sum('credit') - Ledger::sum('debit');
    }

    public static function recordDebit($amount, $disbursement, $description){
        $current_balance = self::calculatedBalance();
        $entry = new Ledger();
        $entry->money_from = 'source';
        $entry->money_to = 'customer';
        $entry->disbursement_id = $disbursement!=null ? $disbursement->id : null;
        $entry->reason = $description!=null ? $description : '';
        $entry->debit = $amount;
        $entry->credit = 0;
        $entry->current_balance = ($current_balance - $amount);
        $entry->save();
    }

    public static function recordCredit($amount, $payAttempt, $description){
        $current_balance = self::calculatedBalance();
        $entry = new Ledger();
        $entry->money_from = 'customer';
        $entry->money_to = 'source';
        $entry->pay_id = $payAttempt!=null ? $payAttempt->id : null;
        $entry->reason = $description!=null ? $description : '';
        $entry->credit = $amount;
        $entry->debit = 0;
        $entry->current_balance = ($current_balance + $amount);
        $entry->save();
    }


    

}
