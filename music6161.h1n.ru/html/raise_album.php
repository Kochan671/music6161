<?
echo "
<div class='block-add'>
<div class='add__title'> Собрать альбом </div>
<form method='post'>
        <div class='form-control' >
		<p>Жанр</p>
           <select name='id_genre'>";
               
                $query_db->select_genre();
               
           echo"</select>
        </div>
		<p></p>
        <div class='form-group'>
            <p style='color:white;'>Артист</p>
           <select name='id_artist'>";
               
			   $query_db->select_artist();
			   
               
           echo" </select>
        </div>
		<p></p>
		<div class='form-group'>
            <p style='color:white;'>Музыка</p>
           <select name='id_song'>";
                
                 $query_db->select_music();
            
           echo" </select>
        </div>
		<p></p>
        <p><input type='submit' name='submit' value='Собрать'></p>
    </form>
</div>
</div>";
if(isset($_POST['submit']))
{
	$db_connect -> createGenreArtisanSong($id_genre,$id_artist,$id_song);
}


?>