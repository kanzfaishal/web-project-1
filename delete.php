<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact idbarang exists
if (isset($_GET['idbarang'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM stok WHERE idbarang = ?');
    $stmt->execute([$_GET['idbarang']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that idbarang!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM stok WHERE idbarang = ?');
            $stmt->execute([$_GET['idbarang']]);
            $msg = 'You have deleted the contact!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No idbarang specified!');
}
?>


<?=template_header('Delete')?>

<div class="content delete">
	<h2>Hapus Barang<?=$contact['idbarang']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>yakin ingin menghapus?<?=$contact['idbarang']?>?</p>
    <div class="yesno">
        <a href="delete.php?idbarang=<?=$contact['idbarang']?>&confirm=yes">Ya</a>
        <a href="delete.php?idbarang=<?=$contact['idbarang']?>&confirm=no">tidak</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>