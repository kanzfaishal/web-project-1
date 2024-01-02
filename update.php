<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact idbarang exists, for example update.php?idbarang=1 will get the contact with the idbarang of 1
if (isset($_GET['idbarang'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $idbarang = isset($_POST['idbarang']) ? $_POST['idbarang'] : NULL;
        $namabarang = isset($_POST['namabarang']) ? $_POST['namabarang'] : '';
        $deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '';
        $stok = isset($_POST['stok']) ? $_POST['stok'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE stok SET idbarang = ?, namabarang = ?, deskripsi = ?, stok = ?, WHERE idbarang = ?');
        $stmt->execute([$idbarang, $namabarang, $deskripsi, $stok, $_GET['idbarang']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM stok WHERE idbarang = ?');
    $stmt->execute([$_GET['idbarang']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that idbarang!');
    }
} else {
    exit('No idbarang specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update Contact #<?=$contact['idbarang']?></h2>
    <form action="update.php?idbarang=<?=$contact['idbarang']?>" method="post">
        <label for="idbarang">idbarang</label>
        <label for="namabarang">namabarang</label>
        <input type="text" name="idbarang" value="<?=$contact['idbarang']?>" idbarang="idbarang">
        <input type="text" name="namabarang" value="<?=$contact['namabarang']?>" idbarang="namabarang">
        <label for="deskripsi">deskripsi</label>
        <label for="stok">No. Telp</label>
        <input type="text" name="deskripsi" value="<?=$contact['deskripsi']?>" idbarang="deskripsi">
        <input type="text" name="stok" value="<?=$contact['stok']?>" idbarang="stok">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>