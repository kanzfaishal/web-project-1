<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $idbarang = isset($_POST['idbarang']) && !empty($_POST['idbarang']) && $_POST['idbarang'] != 'auto' ? $_POST['idbarang'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $namabarang = isset($_POST['namabarang']) ? $_POST['namabarang'] : '';
    $deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '';
    $stok = isset($_POST['stok']) ? $_POST['stok'] : '';
    

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO stok VALUES (?, ?, ?, ?)');
    $stmt->execute([$idbarang, $namabarang, $deskripsi, $stok]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Tambahkan Barang</h2>
    <form action="create.php" method="post">
        <label for="idbarang">idbarang</label>
        <label for="namabarang">namabarang</label>
        <input type="text" name="idbarang" value="auto" idbarang="idbarang">
        <input type="text" name="namabarang" idbarang="namabarang">
        <label for="deskripsi">deskripsi</label>
        <label for="stok">Stok</label>
        <input type="text" name="deskripsi" idbarang="deskripsi">
        <input type="text" name="stok" idbarang="stok">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>