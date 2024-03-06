<!DOCTYPE html>
<html>
<head>
    <title>Smart Contract Search</title>
</head>
<body>
    <h1>Search Smart Contract Transactions</h1>

    <form action="/smart-contract-search" method="POST">
        @csrf
        <input type="text" name="contract_address" placeholder="Enter contract address">
        <button type="submit">Search</button>
    </form>

<!-- ... existing HTML ... -->

@if(isset($transactions))
    <h2>Transactions</h2>
    <table>
        <thead>
            <tr>
                <th>Transaction Hash</th>
                <th>Method</th>
                <th>Block</th>
                <th>Age</th>
                <th>From</th>
                <th>To</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction['hash'] }}</td>
                    <td>{{ $transaction['method'] }}</td>
                    <td>{{ $transaction['blockNumber'] }}</td>
                    <td>{{ Carbon\Carbon::createFromTimestamp($transaction['timeStamp'])->diffForHumans() }}</td>
                    <td>{{ $transaction['from'] }}</td>
                    <td>{{ $transaction['to'] }}</td>
                    <td>{{ $transaction['value'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<!-- ... existing HTML ... -->

</body>
</html>
