<?php include 'db.php'; ?>
<?php
$sql = "SELECT * FROM questions ORDER BY id ASC";
$result = $conn->query($sql);
$questions = [];
 
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EQ Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="result.php" method="post" class="container quiz">
        <h2>Answer the following questions:</h2>
        <?php foreach ($questions as $q): ?>
            <div class="question-block">
                <p><strong><?= $q['question'] ?></strong></p>
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <label>
                        <input type="radio" name="q<?= $q['id'] ?>" value="<?= $i ?>" required>
                        <?= $q["option$i"] ?>
                    </label><br>
                <?php endfor; ?>
            </div>
        <?php endforeach; ?>
        <input type="submit" value="Submit" class="submit-btn">
    </form>
</body>
</html>
 
