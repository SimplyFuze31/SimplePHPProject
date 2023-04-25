<!DOCTYPE html>
<?php
require_once("../app/app.php");
?>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }
            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }
            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }
            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <?php

        $csv_handler = new Csv(FILES_PATH);
            //open csv file
        $transactions = $csv_handler->open_file();

        $accountant = new Accountant($transactions);

        ?>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction_info ):?>
                <tr> 
                    <td><?php echo $transaction_info[0] ?></td>
                    <td><?php echo $transaction_info[1] ?></td>
                    <td><?php echo $transaction_info[2] ?></td>
                    <td><?php echo $transaction_info[3] ?></td> 
                </tr>
                <?php endforeach;?>                
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?php echo $accountant->prety_dolar_sign($accountant->sum_income());?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?php echo $accountant->prety_dolar_sign($accountant->sum_expense());?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?php echo $accountant->prety_dolar_sign($accountant->total_sum());?></td>
                </tr>
            </tfoot>
        </table>
        
    </body>
</html>
