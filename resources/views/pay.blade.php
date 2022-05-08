<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Rave payment Gateway</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="{{ route('pay-now') }}" method="POST">
        @csrf
        <label>Email</label>
        <input type="email" name="email" required>
        <br>
        <label>Amount</label>
        <input type="number" name="amount" required>
        <br>
        <input type="submit" name="pay" vlaue="Send Payment">

        </form>
    </body>
</html>