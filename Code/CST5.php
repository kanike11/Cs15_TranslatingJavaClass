<!DOCTYPE html>
<html>
<head>
    <title>Average Calculator</title>
</head>
<body>

<?php
// Check if form is submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numbers = $_POST['numbers'];
    $valid = true;
    $total = 0;

    // Validate and compute total
    foreach ($numbers as $num) {
        if (!is_numeric($num)) {
            $valid = false;
            break;
        }
        $total += $num;
    }

    if ($valid) {
        $average = $total / count($numbers);
        echo "<h2>Result:</h2>";
        echo "You entered: " . implode(", ", $numbers) . "<br>";
        echo "Average: <strong>" . number_format($average, 2) . "</strong><br><br>";
        echo '<a href="?reset=true">Enter new numbers</a>';
    } else {
        echo "<p style='color:red;'>Please enter valid numbers only.</p>";
        showForm($numbers); // show form again with previous values
    }
} elseif (isset($_GET['reset'])) {
    showForm(); // show empty form
} else {
    showForm(); // default display
}

// Function to show the form
function showForm($prefill = []) {
    echo '<h2>Enter 10 numbers to calculate the average:</h2>';
    echo '<form method="POST" action="">';
    for ($i = 0; $i < 10; $i++) {
        $value = isset($prefill[$i]) ? htmlspecialchars($prefill[$i]) : '';
        echo "Number " . ($i + 1) . ": <input type='text' name='numbers[]' value='$value'><br><br>";
    }
    echo '<input type="submit" value="Calculate Average">';
    echo '</form>';
}
?>

</body>
</html>
