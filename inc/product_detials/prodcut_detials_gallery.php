<div class="gallery">
    <?php
    if (!empty($gallery)) :
        foreach ($gallery as $img) : ?>
            <img src="<?php echo $img['path'] ?>">
    <?php endforeach;else:?>
        <img src="https://via.placeholder.com/300">
        <img src="https://via.placeholder.com/300">
        <img src="https://via.placeholder.com/300">
        <img src="https://via.placeholder.com/300">
        <img src="https://via.placeholder.com/300">
    <?php endif;?>
</div>