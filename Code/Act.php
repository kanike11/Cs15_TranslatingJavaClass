<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average Calculator</title>
    <style>
        body {
            background-image: url('im.jpeg');
            background-size: cover;
            background-position: top center;
            font-size: 16px;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            background: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        input[type="number"] {
            margin: 5px 0;
            padding: 10px;
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Average Calculator</h1>
        <form action="" method="post">
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <input type="number" name="numbers[]" placeholder="Enter number <?= $i ?>" required>
            <?php endfor; ?>
            <button type="submit">Calculate Average</button>
        </form>

        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numbers = $_POST['numbers'];
    $sum = array_sum($numbers);
    $count = count($numbers);
    $average = $sum / $count;

    $query = http_build_query(['average' => $average, 'numbers' => $numbers]);
    header("Location: ?" . $query);
    exit;
}

if (isset($_GET['average']) && isset($_GET['numbers'])) {
    $average = $_GET['average'];
    $numbers = $_GET['numbers'];

    echo "<div class='result'>";
    echo "<p><strong>Numbers:</strong> " . implode(", ", $numbers) . "</p>";
    echo "<p><strong>Average:</strong> " . number_format($average, 2) . "</p>";
    echo "</div>";
}        


        ?>
    </div>
</body>

</html>
