<?php
class OrigamiConfig
{
  public function __construct()
  {
    add_action('admin_menu', function () {
      add_menu_page(
        __('Origami主题', 'origami'),
        __('Origami主题', 'origami'),
        'edit_themes',
        'origami_config',
        [&$this, 'ori_menu_fun']
      );
      add_submenu_page(
        'origami_config',
        __('Origami主题 - 样式', 'origami'),
        __('样式', 'origami'),
        'edit_themes',
        'origami_styles',
        [&$this, 'ori_menu_fun1']
      );
      add_submenu_page(
        'origami_config',
        __('Origami主题 - 功能', 'origami'),
        __('功能', 'origami'),
        'edit_themes',
        'origami_functions',
        [&$this, 'ori_menu_fun2']
      );
      add_submenu_page(
        'origami_config',
        __('Origami主题 - 关于', 'origami'),
        __('关于', 'origami'),
        'edit_themes',
        'origami_about',
        [&$this, 'ori_menu_fun3']
      );
    });
    add_action('admin_init', [&$this, 'init']);
  }
  public function ori_menu_fun1()
  {
    require_once "config_style.php";
  }
  public function init()
  {
    register_setting("origami_style-group", "origami_carousel_1");
    register_setting("origami_style-group", "origami_carousel_2");
    register_setting("origami_style-group", "origami_carousel_3");
    register_setting("origami_style-group", "origami_carousel_4");
    add_settings_field(
      'WP_Toastr-setting_content',
      'Content(内容): ',
      array(&$this, 'settings_field_input_text'),
      'WP_Toastr',
      'WP_Toastr-section',
      array(
        'field' => 'cn_setting_content',
        'value' => 'Content',
        'type' => 'text'
      )
    );
  }
}