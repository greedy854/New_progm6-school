<?php

$data = file_get_contents('php://input');
//echo $data;

$json = json_decode($data);

echo $json->maxPrice;
echo $json->article;

?>

<html>
<?php 
    $data = file_get_contents('php://input');
    //echo $data;
    
    $json = json_decode($data);
    ?>
<section>
    <h1>You searched</h1>
    <p>maxPrice: <span><?php echo $json->maxPrice; ?></span></p>
    <p>article: <span><?php echo $json->article; ?></span></p>
</section>
</html>