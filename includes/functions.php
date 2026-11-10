<?php
/**
 * ==========================================================
 * FUNCTIONS.PHP - Kumpulan fungsi yang dipakai berulang kali
 * ==========================================================
 */

session_start(); // wajib dipanggil sebelum ada output apapun, dipakai untuk login session

/**
 * Ambil semua kategori dari database
 * MATERI: fungsi ini me-return ARRAY ASOSIATIF (hasil query)
 */
function getCategories($conn) {
    $stmt = $conn->query("SELECT * FROM categories ORDER BY id ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // hasil: array of array
}

/**
 * Ambil menu berdasarkan category_id (opsional)
 */
function getMenuItems($conn, $category_id = null) {
    if ($category_id) {
        // Prepared statement -> mencegah SQL Injection
        $stmt = $conn->prepare("SELECT * FROM menu_items WHERE category_id = :cid ORDER BY id ASC");
        $stmt->execute(['cid' => $category_id]);
    } else {
        $stmt = $conn->query("SELECT * FROM menu_items ORDER BY category_id ASC");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Format angka menjadi Rupiah
 * MATERI: number_format() adalah fungsi bawaan PHP
 */
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

/**
 * Cek apakah user sudah login
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

/**
 * Cek apakah user adalah admin
 */
function isAdmin() {
    return isLoggedIn() && $_SESSION['role'] === 'admin';
}