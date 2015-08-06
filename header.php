<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <?php ocp_display_favicon(); ?>

        <title><?php wp_title('|'); ?></title>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class($class); ?><?php ocp_body_bg(); ?>>
        <div class="wrapper">
			<?php do_action('ocp_header'); ?>