<?php include 'db.php';
 
$totalScore = 0;
$count = 0;
 
$sql = "SELECT * FROM questions";
$result = $conn->query($sql);
$questions = [];
 
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}
 
foreach ($questions as $q) {
    $answer = $_POST["q" . $q['id']] ?? 0;
    $totalScore += (int)$answer;
    $count++;
}
 
$maxScore = $count * 4;
$percent = ($totalScore / $maxScore) * 100;
 
if ($percent >= 80) {
    $feedback = "🌟 Excellent! You have high emotional intelligence.";
} elseif ($percent >= 60) {
    $feedback = "😊 Good! You're emotionally aware but there's room to grow.";
} elseif ($percent >= 40) {
    $feedback = "😐 Fair. Try to better understand and manage your emotions.";
} else {
    $feedback = "😟 Low. Work on empathy and self-regulation for improvement.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function copyResult() {
            const text = `My EQ Score: <?= round($percent) ?>%. <?= $feedback ?> Try the test: [Your Website URL Here]`;
            navigator.clipboard.writeText(text).then(() => {
                alert("Result copied to clipboard! 📋");
            });
        }
    </script>
</head>
<body>
    <div class="container center">
        <h1>Your EQ Score: <?= round($percent) ?>%</h1>
        <p><?= $feedback ?></p>
 
        <a href="quiz.php" class="start-btn">🔁 Retake Test</a>
        <a href="index.php" class="start-btn">🏠 Home</a>
 
        <!-- Share Buttons -->
        <button onclick="copyResult()" class="start-btn">📋 Copy Result</button>
        <a href="https://wa.me/?text=I just took an EQ Test! My Score: <?= round($percent) ?>%. <?= urlencode($feedback) ?> Take it too: [rsoa151.planetearth.school/eq/result.php]" target="_blank" class="start-btn">📱 Share on WhatsApp</a>
    </div>
</body>
</html>
 
