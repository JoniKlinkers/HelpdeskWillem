<?php
	include 'connect.php';
    $sql = "select CategorieId, SubCategorie, CategorieNaam from tblcategorie order by CategorieNaam";
    $resultaat = $conn->query($sql);

?>

<html>
    <body>
        <div>SubCategorie</div>
        <select name="SubCategorie" >
            <option value = "Select" selected>Select</option>
            <?php   
                while ($row = $resultaat->fetch_assoc()){
                    echo "<option value='".$row['CategorieId']."'>".$row['CategorieNaam'].": ".$row['SubCategorie']."</option>";
                }
            ?>
        </select>
    </body>
</html>
