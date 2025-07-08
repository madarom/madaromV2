<?php
$host = 'yamabiko.proxy.rlwy.net';
$db   = 'railway';
$user = 'root';
$pass = 'xFVOadBOKSAAKcZcUSJPZdbdhBiLUkMG';
$port = 21362;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    echo "✅ Connexion réussie à la base de données.";
} catch (PDOException $e) {
    echo "❌ Erreur de connexion : " . $e->getMessage();
}
