<?php
$title = get_bloginfo('name');
$desc = get_bloginfo('description');
?>
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title;?></title>
    
    <!-- for Google -->
    <meta name="description" 		content="<?php echo $desc;?>" />
    <meta name="keywords" 			content="" />

    <!-- for Facebook -->          
    <meta property="og:title" 		content="<?php echo $title;?>" />
    <meta property="og:url" 		content="<?php echo get_site_url();?>/" />
    <meta property="og:type" 		content="website" />
    <meta property="og:description" content="<?php echo $desc;?>" />
    <meta property="og:image" 		content="<?php the_field('imagen_share', 'option'); ?>" />

    <!-- for Twitter -->          
    <meta name="twitter:card" 			content="summary" />
    <meta name="twitter:title" 			content="<?php echo $title;?>" />
    <meta name="twitter:description" 	content="<?php echo $desc;?>" />
    
    <link rel="icon" type="image/png" sizes="64x64" href="<?php the_field('favicon', 'option'); ?>" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/dpk10.css?v=<?php echo rand(1,999999);?>">

    <script>var RECAPTCHA_APP_KEY = '<?php echo RECAPTCHA_APP_KEY;?>';</script>
    <script>var PATH = '<?php echo get_template_directory_uri();?>';</script>
    
    <?php the_field('analytics_head', 'option'); ?>

</head>

<body data-dpk="wrapper">
    <?php the_field('analytics_body', 'option'); ?>

    <?php get_template_part('assets/include/menu-desktop')?>

    