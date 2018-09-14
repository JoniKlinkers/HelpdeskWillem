<?php
	include 'connect.php';
    $sql = "select CategorieId, SubCategorie, CategorieNaam from tblcategorie order by SubCategorie, CategorieNaam";
    $resultaat = $conn->query($sql);

?>

<html>
    <body>
        <div>SubCategorie</div>
        <select name="SubCategorie" >
            <option value = "Select" selected>Select</option>
            <?php   
                while ($row = $resultaat->fetch_assoc()){
                    echo "<option value='".$row['CategorieId']."'>".$row['SubCategorie'].": ".$row['CategorieNaam']."</option>";
                }
            ?>
        </select>
    </body>
</html>