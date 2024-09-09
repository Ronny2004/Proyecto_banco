<?php
// app/Services/InterestService.php
namespace App\Services;

use App\Models\Client;
use App\Models\Loan;
use Carbon\Carbon;

class InterestService
{
    public function calculateClientBalanceInterest(Client $client)
    {
        $interestRate = 0.05; // 5% anual
        $client->balance += $client->balance * $interestRate;
        $client->save();
    }

    public function calculateLoanInterest(Loan $loan)
    {
        $interestRate = $loan->interest_rate / 100; // Interés de préstamo
        $amount = $loan->amount;
        $interest = $amount * $interestRate;
        return $interest;
    }
}
