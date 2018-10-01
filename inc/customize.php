<?php
/**
 * Theme Options
 */
add_action( 'customize_register', 'wha_customizer_settings' );
function wha_customizer_settings( $wp_customize ) {
    /********************* HEADER ****************************/
    $wp_customize->add_section( 'wha_header' , array(
        'title'      => 'Header',
        'priority'   => 1,
    ) );

    // Logo

    $wp_customize->add_setting( 'wha_logo', array(
        'default' => get_bloginfo('template_directory') . '/app/img/logo.svg',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'wha_logo',
            array(
                'label'      => __( 'Upload a logo', 'theme_name' ),
                'section'    => 'wha_header',
                'settings'   => 'wha_logo',
            )
        )
    );

    $wp_customize->add_setting( 'wha_logo_position' , array(
        'default'     => 'left',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'wha_logo_position', array(
        'label' => 'Logo Position',
        'section' => 'wha_header',
        'settings' => 'wha_logo_position',
        'type' => 'radio',
        'choices' => array(
            'left' => 'Left',
            'right' => 'Right',
            'center' => 'Center',
        ),
    ) );


    /* Off-canvas mode */
    $wp_customize->add_setting( 'wha_offcanvas_mode' , array(
        'default'     => 'none',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'wha_offcanvas_mode', array(
        'label' => 'Off-canvas Mode',
        'section' => 'wha_header',
        'settings' => 'wha_offcanvas_mode',
        'type' => 'radio',
        'choices' => array(
            'slide' => 'Slide',
            'push' => 'Push',
            'reveal' => 'Reveal',
            'none' => 'None'
        ),
    ) );

    // Header Background Color
    $wp_customize->add_setting( 'wha_header_background_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_background_color',
            array(
                'label'      => __( 'Header Background Color', '_wha' ),
                'section'    => 'wha_header',
                'settings'   => 'wha_header_background_color',
            ) )
    );

    // Menu Link Color
    $wp_customize->add_setting( 'wha_menu_link_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wha_menu_link_color',
            array(
                'label'      => __( 'Menu Link Color', '_wha' ),
                'section'    => 'wha_header',
                'settings'   => 'wha_menu_link_color',
            ) )
    );

    /********************* SOCIAL ****************************/
    $wp_customize->add_section( 'wha_social' , array(
        'title'      => 'Social Links',
        'priority'   => 20,
    ) );

    // Facebook icon
    $wp_customize->add_setting( 'wha_social_fb' , array(
        'default'     => '',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( 'wha_social_fb', array(
        'label' => 'Facebook',
        'section' => 'wha_social',
        'settings' => 'wha_social_fb',
        'type' => 'text'
    ) );

    // Google icon
    $wp_customize->add_setting( 'wha_social_google' , array(
        'default'     => '',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( 'wha_social_google', array(
        'label' => 'Google',
        'section' => 'wha_social',
        'settings' => 'wha_social_google',
        'type' => 'text'
    ) );

    // Vimeo icon
    $wp_customize->add_setting( 'wha_social_vimeo' , array(
        'default'     => '',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( 'wha_social_vimeo', array(
        'label' => 'Vimeo',
        'section' => 'wha_social',
        'settings' => 'wha_social_vimeo',
        'type' => 'text'
    ) );

    // Instagram icon
    $wp_customize->add_setting( 'wha_social_instagram' , array(
        'default'     => '',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( 'wha_social_instagram', array(
        'label' => 'Instagram',
        'section' => 'wha_social',
        'settings' => 'wha_social_instagram',
        'type' => 'text'
    ) );

    // Twitter icon
    $wp_customize->add_setting( 'wha_social_twitter' , array(
        'default'     => '',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( 'wha_social_twitter', array(
        'label' => 'Twitter',
        'section' => 'wha_social',
        'settings' => 'wha_social_twitter',
        'type' => 'text'
    ) );

    // Youtube icon
    $wp_customize->add_setting( 'wha_social_youtube' , array(
        'default'     => '',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( 'wha_social_youtube', array(
        'label' => 'Youtube',
        'section' => 'wha_social',
        'settings' => 'wha_social_youtube',
        'type' => 'text'
    ) );
}