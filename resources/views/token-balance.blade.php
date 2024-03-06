<!-- Basic structure -->
<!DOCTYPE html>
<html>
<head>
    <title>Token Balance</title>
</head>
<body>
    <h1>Token Balance</h1>

    <form action="/token-balance" method="GET">
        <input type="text" name="contract_address" placeholder="Enter Token Contract Address">
        <input type="text" name="user_address" placeholder="Enter User Address">
        <button type="submit">Check Balance</button>
    </form>

    @if(isset($balance))
        <p>Balance: {{ $balance['result'] }}</p>
    @endif
</body>
</html>
