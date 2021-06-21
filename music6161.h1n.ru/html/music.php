<?

$id_artist = preg_replace('/artist/', '', $_SESSION['id_artiste']);

$db_connect -> artist_music($id_artist);

?>