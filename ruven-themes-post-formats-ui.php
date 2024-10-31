<?php
/*
Plugin Name: Ruven Themes: Post Formats UI
Description: Extends the functionality of Ruven Themes by adding a Post Formats UI
Version: 1.0
Author: Ruven
Author URI: http://ruventhemes.com/
Author Email: info@ruventhemes.com
*/







/* Initialize Post Formats UI
============================================================ */

if(!class_exists('rt_post_formats_ui')):

  class rt_post_formats_ui {



    /* Constructor
    ------------------------------------------------------------ */

  	function __construct()
  	{
    	add_action('init', array(&$this, 'init_cmb'));
      add_filter('cmb_meta_boxes', array(&$this, 'add_meta_boxes'));
      add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));

      // Load plugin text domain (for translation)
      add_action('plugins_loaded', array($this, 'load_textdomain'));
  	}



    /* Load plugin text domain (for translation)
    ------------------------------------------------------------ */

    function load_textdomain()
    {
      load_plugin_textdomain('ruventhemes', false, dirname(plugin_basename(__FILE__)).'/lang');
    }



    /* Register Custom Meta Boxes
    ------------------------------------------------------------ */

    function init_cmb()
    {
      if(!class_exists('cmb_Meta_Box')) {
        require_once(plugin_dir_path(__FILE__).'includes/cmb/init.php');
      }
    }



    /* Admin Enqueue Scripts
    ------------------------------------------------------------ */

    function admin_enqueue_scripts()
    {
      wp_enqueue_script('rtpfui_cmb-toggler', plugin_dir_url(__FILE__).'includes/jquery.cmb-toggler.js', array('jquery'));
    }



    /* Register Custom Meta Boxes
    ------------------------------------------------------------ */

    function add_meta_boxes(array $meta_boxes) {

      $prefix = '_rtpfui_';

      //
      // Post Formats
      //

      // Link Settings
      if(!get_option('rtpfui_disable_metabox_link'))
      {
        $meta_boxes[] = apply_filters('rtpfui_metabox_link', array(
          'id'         => 'rtpfui_link-metabox',
          'title'      => __('Link Settings', 'ruventhemes'),
          'pages'      => array('post', 'portfolio', 'gallery'),
          'context'    => 'normal',
          'priority'   => 'high',
          'show_names' => true,
          'fields'     => array(
            array(
              'name' => __('Link URL', 'ruventhemes'),
              'desc' => __('Insert link URL (e.g. "http://ruventhemes.com")', 'ruventhemes'),
              'id'   => $prefix.'link_url',
              'type' => 'text',
              'std'  => ''
            )
          ),
        ));
      }

      // Quote Settings
      if(!get_option('rtpfui_disable_metabox_quote'))
      {
        $meta_boxes[] = apply_filters('rtpfui_metabox_quote', array(
          'id'         => 'rtpfui_quote-metabox',
          'title'      => __('Quote Settings', 'ruventhemes'),
          'pages'      => array('post', 'portfolio', 'gallery'),
          'context'    => 'normal',
          'priority'   => 'high',
          'show_names' => true,
          'fields'     => array(
            array(
              'name' => __('Quote', 'ruventhemes'),
              'desc' => '',
              'id'   => $prefix.'quote',
              'type' => 'textarea_small',
              'std'  => ''
            ),
            array(
              'name' => __('Source Name', 'ruventhemes'),
              'desc' => '',
              'id'   => $prefix.'quote_source_name',
              'type' => 'text',
              'std'  => ''
            ),
            array(
              'name' => __('Link URL', 'ruventhemes'),
              'desc' => __('Insert link URL (e.g. "http://ruventhemes.com")', 'ruventhemes'),
              'id'   => $prefix.'quote_link_url',
              'type' => 'text',
              'std'  => ''
            ),
          ),
        ));
      }

      // Video Settings
      if(!get_option('rtpfui_disable_metabox_video'))
      {
        $meta_boxes[] = apply_filters('rtpfui_metabox_video', array(
          'id'         => 'rtpfui_video-metabox',
          'title'      => __('Video Settings', 'ruventhemes'),
          'pages'      => array('post', 'portfolio', 'gallery'),
          'context'    => 'normal',
          'priority'   => 'high',
          'show_names' => true,
          'fields'     => array(
            array(
              'name' => __('Embed Code or oEmbed URL', 'ruventhemes'),
              // 'desc' => __('To embed videos from third party websites (e.g. YouTube or Vimeo), paste the embed code in here.', 'ruventhemes'),
              'id'   => $prefix . 'video_oembed',
              'type' => 'textarea_code',
              'std'  => ''
            ),
            array(
              'name' => __('Self Hosted MP4 File', 'ruventhemes'),
              'desc' => __('MP4 files are supported by Chrome, Safari and IE9+.', 'ruventhemes'),
              'id'   => $prefix.'video_mp4_file',
              'type' => 'file',
              'std'  => ''
            ),
            array(
              'name' => __('Self Hosted OGV File', 'ruventhemes'),
              'desc' => __('OGV Files are supported by Firefox and Opera.', 'ruventhemes'),
              'id'   => $prefix.'video_ogv_file',
              'type' => 'file',
              'std'  => ''
            ),
          ),
        ));
      }

      // Audio Settings
      if(!get_option('rtpfui_disable_metabox_audio'))
      {
        $meta_boxes[] = apply_filters('rtpfui_metabox_audio', array(
          'id'         => 'rtpfui_audio-metabox',
          'title'      => __('Audio Settings', 'ruventhemes'),
          'pages'      => array('post', 'portfolio', 'gallery'),
          'context'    => 'normal',
          'priority'   => 'high',
          'show_names' => true,
          'fields'     => array(
            array(
              'name' => __('Embed Code or oEmbed URL', 'ruventhemes'),
              // 'desc' => __('To embed an audio player from a third party website (e.g. SondCloude), paste the embed code in here.', 'ruventhemes'),
              'id'   => $prefix . 'audio_oembed',
              'type' => 'textarea_code',
            ),
            array(
              'name' => __('Self Hosted MP3 File', 'ruventhemes'),
              'desc' => __('MP3 files are supported by Chrome, Safari and IE9+.', 'ruventhemes'),
              'id'   => $prefix.'audio_mp3_file',
              'type' => 'file',
              'std'  => ''
            ),
            array(
              'name' => __('Self Hosted OGG File', 'ruventhemes'),
              'desc' => __('OGG Files are supported by Chrome, Firefox and Opera.', 'ruventhemes'),
              'id'   => $prefix.'audio_ogg_file',
              'type' => 'file',
              'std'  => ''
            ),
          ),
        ));
      }

      return $meta_boxes;
    }



  }







  /* Invoke Post Format UI
  ============================================================ */

  new rt_post_formats_ui();







endif;