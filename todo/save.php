<?php
require_once('db_conn.php');

if (isset($_SESSION['id'])) {
    echo'<p class="mt-1"><a href="assets/php/logout.php">Выйти</a> &middot; <a href="#" id="saveEnum"></a></p>';

	$user_id= $_SESSION['id'];
	$sql = "SELECT * FROM save WHERE id_users = '".$user_id."'";
	$stmt= $conn->prepare($sql);
	$stmt->execute();
	$result= $stmt->fetchAll();
	$nRows = $conn->query($sql)->rowCount(); 
	if ($result && $nRows> 0) {
	    echo '<div class="modal" tabindex="-1" role="dialog" id="saveModal">';
		for ($i = 0; $i < ($nRows); $i++) {
		    echo '<li>'.$result[$i]['save'].'</li>';
		} 
		echo '</div>';
	}
}
exit();
?>
