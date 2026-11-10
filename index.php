<?php
require_once "config/database.php";
require_once "includes/functions.php";

$base = " "; //because this file in root
$page_title = "Home";
require "includes/header.php";
?>

<section class="hero">
    <div class="hero-text">
        <h1> Welcome to Sushi Resto! </h1>
        <p>
            Savor the delicious taste of authentic Japanese sushi made with premium, fresh ingredients.
            From classic Nigiri to modern Makimono, everything is prepared
            using authentic recipes and a touch of love, Japanese chef-style.
        </p>
        <a href="menu.php" class="btn-primary">Book Menu</a>
    </div>

</section>

<section class="info-section">
    <h2>About Sushi</h2>
    <p>-DESKRIPSI SUSHI-</p>

    <div class="info-grid">

        <?php
        $jenisSushi=[
            ["nama" => "Nigiri", "Deskripsi" => "Nasi kepal dengan topping ikan/seafood di atasnya."],
            ["nama" => "Sashimi", "Deskripsi" => "Irisan ikan segar tanpa nasi,disajikan polos."],
            ["nama" => "Makimono", "Deskripsi" => "Gulungan nasi & isian dibungkus nori (rumput laut)."],
            ["nama" => "Gunkan", "Deskripsi" => "Nasi dibalut nori berbentuk 'kapal perang' dengan topping di atas."],

        ];

        foreach ($jenisSushi as $sushi) {
            echo "<div class='info-card'>";
            echo "<h3>" . htmlspecialchars($sushi['nama']) . "</h3>";
            echo "<p>" . htmlspecialchars($sushi['Deskripsi']) . "</p>";
            echo "</div>";
        }
        ?>

    </div>

</section>

<?php require "includes/footer.php"; ?>