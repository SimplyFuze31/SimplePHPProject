<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>

<body>
    <?php


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
            <?php foreach ($transactions as $transaction_info): ?>
                <tr>
                    <td>
                        <?= $transaction_info['date'] ?>
                    </td>
                    <td>
                        <?= $transaction_info['check'] ?>
                    </td>
                    <td>
                        <?= $transaction_info['description'] ?>
                    </td>
                    <td>
                        <?php if ($transaction_info['amount'] < 0): ?>
                        
                        <span style=color:red><?= formatDollarSign($transaction_info['amount']) ?></span>
                    <?php elseif ($transaction_info['amount'] > 0): ?>
                        <span style=color:green><?= formatDollarSign($transaction_info['amount']) ?></span>
                    <?php else : ?>
                        <?= formatDollarSign($transaction_info['amount']) ?>
                    <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td>
                    <?= formatDollarSign($totals['totalincome']) ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td>
                    <?= formatDollarSign($totals['totalexpense']) ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td>
                    <?= formatDollarSign($totals['netTotal']) ?>
                </td>
            </tr>
        </tfoot>
    </table>

</body>

</html>