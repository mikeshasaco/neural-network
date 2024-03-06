<!DOCTYPE html>
<html>
<head>
    <title>Token Transactions</title>
</head>
<body>
    <h1>View Token Transactions</h1>
    <form method="get" action="{{ url('/token-transactions') }}">
        <input type="text" name="contract_address" placeholder="Enter Token Contract Address">
        <button type="submit">View Transactions</button>
    </form>

    @if(!empty($transactions))
        <h2>Transactions</h2>
        <table>
            <thead>
                <tr>
                    <th>Txn Hash</th>
                    <th>Block</th>
                    <th>Age</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions['result'] as $transaction)
                    <tr>
                        <td>{{ $transaction['hash'] }}</td>
                        <td>{{ $transaction['blockNumber'] }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimestamp($transaction['timeStamp'])->diffForHumans() }}</td>
                        <td>{{ $transaction['from'] }}</td>
                        <td>{{ $transaction['to'] }}</td>
                        <td>{{ $transaction['value'] / (10 ** $transaction['tokenDecimal']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No transactions found.</p>
    @endif
</body>
</html>
