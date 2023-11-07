<?php
$toc_atts = $attributes['title'];

$extraAttributes = array(

);



ob_start();
print_r($attributes);

?>

<div <?php echo get_block_wrapper_attributes($extraAttributes); ?>>
HOLA <?php echo $toc_atts;?>
</div>
<?php

$render = ob_get_clean();


$render = str_replace(array("\r", "\n", "<p></p>"), '', $render);

echo $render;
?>