<?php declare(strict_types=1);



function getTransactionFiles(string $dirpath): array
{
    $files = [];
    foreach (scandir($dirpath) as $file) {
        if (!is_dir($file)) {
            $files[] = $dirpath . $file;
        }
    }
    return $files;
}

function getTransactions(string $transaction_file): array
{
    
        $file = fopen($transaction_file, 'r');
        $transactions = [];
        fgetcsv($file);

        while (($line = fgetcsv($file)) !== false) {

            $transactions[] = parseTransaction($line);
        }
    return $transactions;
}

function parseTransaction(array $transaction_row){

    [$date,$check,$desription,$amount] = $transaction_row;

    $amount = str_replace(['$',','],'',$amount);

    return[
        'date' => $date,
        'check' => $check,
        'description' => $desription,
        'amount' => $amount
    ];
}

function calculateTotals(array $transactions) : array{

    $totals = ['netTotal' => 0, 'totalexpense' => 0 , 'totalincome' => 0];

    foreach($transactions as $transaction){

        $totals['netTotal'] += $transaction['amount']; 

        if($transaction['amount'] <= 0 ){
            $totals['totalexpense'] += $transaction['amount'];
        }else{
            $totals['totalincome'] += $transaction['amount'];
        }

    }

    return $totals;
}