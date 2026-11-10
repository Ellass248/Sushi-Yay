<?php
require_once "config/database.php";
require_once "includes/functions.php";

$base = "";
$page_title = " Menu ";

//ambil parameter kategori dari URL , contoh : ke menu.php kita klik kategori
$selectedCategory = isset($_GET['kategori'])? (int)$_GET['kategori']:null;

//Array hasil query kategori
// Ambil semua materi dari Database Kategori
$categories = getCategories($conn);
$menuItems = getMenuItems($conn, $selectedCategory);

?>

<section calss="menu-page">
    <aside class="menu-sidebar">
        <h3>Category</h3>
        <ul>
            <li> <a href="menu.php" class="<?= !$selectedCategory? 'active' : '' ?>"> Menu </a>
            </li>

            <?php
            /**foreach harus memekai endforeach agar tidak terjadi bug*/
            foreach ($categories as $cat):
            $isActive = ($selectedCategory == $cat['id'])? 'active':'';
            ?>

                <li>
                    <a href="menu.php?kategori=<?=$cat['id']?>"class="<?= $isActive ?>" >
                        <?= htmlspecialchars($cat['nama_kategori'])?>
                    <a/>
                </li>
            <?php endforeach; ?>
        </ul>
    </aside>

</section>

<div class="menu-content">
        <h2>
            <?php
            if ($selectedCategory) {
                foreach ($categories as $cat) {
                    if ($cat['id'] == $selectedCategory) {
                        echo htmlspecialchars($cat['nama_kategori']);
                    }
                }
            } else {
                echo "Semua Menu";
            }
            ?>
        </h2>
        <div class="menu-grid">
            <?php if (count($menuItems) === 0): ?>
                <p>Belum ada menu di kategori ini.</p>
            <?php else: ?>
                <?php
                // MATERI: foreach dipakai lagi untuk menampilkan card menu
                foreach ($menuItems as $item):
                ?>
                    <div class="menu-card">
                        <img src="assets/img/<?= htmlspecialchars($item['gambar']) ?>"
                             onerror="this.src='assets/img/default-sushi.jpg'"
                             alt="<?= htmlspecialchars($item['nama_menu']) ?>">
                        <h4><?= htmlspecialchars($item['nama_menu']) ?></h4>
                        <p><?= htmlspecialchars($item['deskripsi']) ?></p>
                        <span class="harga"><?= formatRupiah($item['harga']) ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php require "includes/footer.php"; ?>