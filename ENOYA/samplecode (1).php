
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Salary Calculator</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background:#f4f6f9;
            margin:0;
            padding:30px;
        }

        .container{
            width:800px;
            margin:auto;
            background:#fff;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.2);
        }

        h2{
            text-align:center;
            color:#0d47a1;
        }

        label{
            font-weight:bold;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:5px;
            box-sizing:border-box;
        }

        button{
            width:100%;
            padding:12px;
            background:#0d47a1;
            color:white;
            border:none;
            border-radius:5px;
            font-size:16px;
            cursor:pointer;
        }

        button:hover{
            background:#1565c0;
        }

        table{
            width:100%;
            margin-top:20px;
            border-collapse:collapse;
        }

        table, th, td{
            border:1px solid #ccc;
        }

        th{
            background:#0d47a1;
            color:white;
            padding:10px;
        }

        td{
            padding:10px;
        }
    </style>
</head>
<body>

<div class="container">

<h2>Student Payment</h2>

<form method="POST">

    <label>Student Name</label>
    <input type="text" name="name" required>

    <label>Total Tuition Fee</label>
    <input type="number" name="tuition" required>

    <label>Discount</label>
    <select name="discount" id="">
        <option value="">SELECT DISCOUNT</option>
        <option value="0.1">10%</option>
        <option value="0.2">20%</option>
        <option value="0.5">50%</option>
        <option value="0.10">100%</option>
    </select>

    <label>Months to Pay</label>
    <input type="number" name="monthPay" required>

    <button type="submit" name="compute">
        Calculate Salary
    </button>

</form>
<?php
    if (isset($_POST['compute'])) {
        $name = $_POST['name'];
        $tuition = $_POST['tuition'];
        $discount = $_POST['discount'];
        $monthPay = $_POST['monthPay'];

        $discountAmount = $tuition * $discount;
        $balance = $tuition - $discountAmount;
        $monthly = $balance / $monthPay;

        if ($monthly >= 10000) {
            $Status = "High Monthly Payment";
        } elseif ($monthly >= 5000) {
            $Status = "Moderate Monthly Payment";
        } else {
           $Status = "Affordable Monthly Payment";
        }

    
?>

<table>

<tr>
    <th colspan="2">Payment Receipt</th>
</tr>

<tr>
    <td>Student Name</td>
    <td><?php echo isset($name) ? $name : 'N/A'; ?></td>
</tr>

<tr>
    <td>Total Tuition Fee</td>
    <td><?php echo isset($tuition) ? '₱' . number_format($tuition, 2) : 'N/A'; ?></td>
</tr>

<tr>
    <td>Discount</td>
    <td><?php echo isset($discount) ? ($discount * 100) . '%' : 'N/A'; ?></td>
</tr>

<tr>
    <td>Discount Amount</td>
    <td><?php echo isset($discountAmount) ? '₱' . number_format($discountAmount, 2) : 'N/A'; ?></td>
</tr>

<tr>
    <td>Balance</td>
    <td><?php echo isset($balance) ? '₱' . number_format($balance, 2) : 'N/A'; ?></td>
</tr>

<tr>
    <td>Monthly Payment</td>
    <td><?php echo isset($monthly) ? '₱' . number_format($monthly, 2) : 'N/A'; ?></td>
</tr>

<tr>
    <td>PaymentStatus</td>
    <td><?php echo isset($Status) ? $Status : 'N/A'; ?></td>
</tr>

<?php
    }
?>


</div>

</body>
</html>