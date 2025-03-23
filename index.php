<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuck Norris</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
<h1>😂 Chuck Norris Joke Generator</h1>
<nav>
    <ul>
        <li><a href="index.php">Начало</a></li> 
        <li><a href="about.html">За нас</a></li>
    </ul>
</nav>
</header>
<main>
<section>
            <h2>Случайна шега</h2>
            <div id="joke-box">
                <?php
                    $url = "https://api.chucknorris.io/jokes/random";
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $response = curl_exec($ch);
                    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    curl_close($ch);
                    
                    if ($httpCode == 200 && $response) {
                        $data = json_decode($response, true);
                        if (isset($data['value'])) {
                            echo "<p>" . htmlspecialchars($data['value']) . "</p>";
                        } else {
                            echo "<p>😢 Failed to load a joke. Try again!</p>";
                        }
                    } else {
                        echo "<p>⚠️ API request failed. Please try again later.</p>";
                    }
                ?>
            </div>
            <button onclick="window.location.reload();">Получете нова шега</button>
        </section>
</main>
<footer>
        <p>&copy; 2025 Всички права запазени.</p>
    </footer> 
</body>
</html>