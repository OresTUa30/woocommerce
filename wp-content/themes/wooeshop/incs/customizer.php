<?php

add_action('customize_register', function (WP_Customize_Manager $wp_customize) {

    $wp_customize->add_section('wooeshop_theme_options', [
        'title'    => __('Theme options', 'wooeshop'),
        'priority' => 10
    ]);

    //phone
    $wp_customize->add_setting('wooeshop_phone');
    $wp_customize->add_control('wooeshop_phone', [
        'label'   => __('Phone in header'),
        'section' => 'wooeshop_theme_options'
    ]);

     //youtube
     $wp_customize->add_setting('wooeshop_youtube');
     $wp_customize->add_control('wooeshop_youtube', [
         'label'   => __('Youtube link'),
         'section' => 'wooeshop_theme_options'
     ]);

      //facebook
    $wp_customize->add_setting('wooeshop_facebook');
    $wp_customize->add_control('wooeshop_facebook', [
        'label'   => __('Facebook link'),
        'section' => 'wooeshop_theme_options'
    ]);

     //instagram
     $wp_customize->add_setting('wooeshop_instagram');
     $wp_customize->add_control('wooeshop_instagram', [
         'label'   => __('Instagram link'),
         'section' => 'wooeshop_theme_options'
     ]);
});
