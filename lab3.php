<!DOCTYPE html>
<html>
<head>
    <title>Lab 3 - ATM Machine Simulation</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 60px auto;
            background: #ffffff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            transition: 0.3s;
        }

        input:focus, select:focus {
            border-color: #888;
            box-shadow: 0 0 4px rgba(0,0,0,0.1);
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #444;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #222;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            background: #eef1f4;
            border-left: 4px solid #444;
            border-radius: 5px;
            color: #333;
        }
         .arrow-btn {
    position: fixed;
    top: 20px;
    width: 45px;
    height: 45px;
    background: rgba(50, 50, 50, 0.85);
    backdrop-filter: blur(6px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
    z-index: 1000;
}

.arrow-btn.left {
    left: 20px;
}

.arrow-btn.right {
    right: 20px;
}


.arrow {
    color: #fff;
    font-size: 20px;
    transition: transform 0.3s ease;
}


.arrow-btn:hover {
    transform: translateY(-3px) scale(1.05);
    background: rgba(30, 30, 30, 0.95);
}


.arrow-btn.left:hover .arrow {
    transform: translateX(-4px);
}

.arrow-btn.right:hover .arrow {
    transform: translateX(4px);
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-4px); }
    100% { transform: translateY(0px); }
}

.arrow-btn {
    animation: float 3s ease-in-out infinite;
}
    </style>
</head>
<body>
<a href="lab2.php" class="arrow-btn left">
    <span class="arrow">&#10094;</span>
</a>

<a href="index.php" class="arrow-btn right">
    <span class="arrow">&#10095;</span>
</a>
    <h1>ATM Machine Simulation</h1>
<form method="post">
    <label for="account_name">Account Name:</label>
    <input type="text" id="account_name" name="account_name" required>
    <br><br>

    <label for="initial_balance">Initial Balance:</label>
    <input type="number" id="initial_balance" name="initial_balance" step="0.01" required>
    <br><br>

    <label for="action">Action:</label>
    <select id="action" name="action" required>
        <option value="check">Check Balance</option>
        <option value="deposit">Deposit</option>
        <option value="withdraw">Withdraw</option>
    </select>
    <br><br>

    <label for="amount">Amount(for Deposit/Withdraw):</label>
    <input type="number" id="amount" name="amount" step="0.01">
    <br><br>

    <button type="submit">Submit Transaction</button>
</form>

   <?php
class ATM {
    private $accountName;
    private $balance;

    public function __construct($accountName, $initialBalance) {
        $this->accountName = $accountName;
        $this->balance = $initialBalance;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function getAccountName() {
        return $this->accountName;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
           return "";
        }
        return "Invalid deposit amount.";
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            return "Invalid withdrawal amount.";
        }

        if ($amount > $this->balance) {
            return "Insufficient balance.";
        }

        $this->balance -= $amount;
      
    }
}


$message = "";
$atm = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $accountName = $_POST['account_name'];
    $initialBalance = (float) $_POST['initial_balance'];
    $action = $_POST['action'];
    $amount = isset($_POST['amount']) ? (float) $_POST['amount'] : 0;

    $atm = new ATM($accountName, $initialBalance);

    if ($action == "check") {
         $message = "Transaction Result: <br>" .
        $message = "Account: " . $atm->getAccountName() .
        "<br>Action: Balance Check" .
                   "<br>Current Balance: $" . $atm->getBalance();
    }

    elseif ($action == "deposit") {
      $message = "Transaction Result: <br>" .
        $message = "Account: " . $atm->getAccountName() .
        $message = $atm->deposit($amount) .
         "<br>Action: Deposit of $".($amount).
                   "<br>New Balance: $" . $atm->getBalance();
    }

    elseif ($action == "withdraw") {
        $message = "Transaction Result: <br>" .
        $message = "Account: " . $atm->getAccountName() .
        $message = $atm->withdraw($amount) .
          "<br>Action: Withdrawal of $".($amount).
                   "<br>New Balance: $" . $atm->getBalance();
    }
}

?>

<?php if (!empty($message)) echo "<p>$message</p>"; ?>

</body>
</html>