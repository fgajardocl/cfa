
<?php
$terms = get_terms( array(
    'taxonomy' => 'category',
    'hide_empty' => false,
    'parent' => 2
));
$cnt = 0;
?>
<ul>
<?php foreach($terms as $term){?>
<li class="<?php echo $cnt==0 ? 'a':'';?>" term-id="<?php echo $term->term-id;?>" slug="<?php echo $term->slug;?>"><span><?php echo $term->name;?></span></li>
<?php $cnt++; }?>
</ul>