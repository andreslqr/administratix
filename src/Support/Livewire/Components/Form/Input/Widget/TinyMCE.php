<?php

namespace Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;

use Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;
use Illuminate\Foundation\Vite;

/**
 *
 */
class TinyMCE extends Widget
{
    /**
     * The name of the component widget
     * 
     * @var string
     */
    protected $widgetName = 'tinymce';

    /**
     * The constructor of the class
     * 
     * @param array options
     */
    public function __construct($wireModelName = null, array $options = [])
    {
        parent::__construct($wireModelName, $options);
    }

    /**
     * The array options for js with values
     * 
     * @var array
     */
    protected array $jsOptions = [
        'promotion' => false,
    ];

    /**
     * The array options for js
     * 
     * @var array
     */
    protected array $jsAvailableOptions = [
        'selector',
        'toolbar',
        'menubar',
        'removed_menuitems',
        'toolbar_location',
        'toolbar_sticky',
        'toolbar_sticky_offset',
        'toolbar_persist',
        'fixed_toolbar_container',
        'fixed_toolbar_container_target',
        'contextmenu_avoid_overlap',
        'toolbar_groups',
        'toolbar_mode',
        'statusbar',
        'elementpath',
        'branding',
        'menu',
        'highlight_on_focus',
        'iframe_aria_text',
        'ui_mode',
        'content_style',
        'font_css',
        'body_id',
        'custom_undo_redo_levels',
        'end_container_on_empty_block',
        'draggable_modal',
        'keep_styles',
        'editable_class',
        'newline_behavior',
        'noneditable_class',
        'noneditable_regexp',
        'object_resizing',
        'resize_img_proportional',
        'inline_boundaries',
        'inline_boundaries_selector',
        'text_patterns',
        'block_formats',
        'font_family_formats',
        'font_size_formats',
        'font_size_input_default_unit',
        'line_height_formats',
        'indentation',
        'indent_use_margin',
        'preview_styles',
        'style_formats',
        'allow_conditional_comments',
        'allow_html_in_named_anchor',
        'allow_unsafe_link_target',
        'br_in_pre',
        'convert_fonts_to_spans',
        'custom_elements',
        'element_format',
        'encoding',
        'entities',
        'entity_encoding',
        'extended_valid_elements',
        'content_langs',
        'images_file_types',
        'file_picker_types',
        'block_unsupported_drop',
        'images_reuse_filename',
        'skin',
        'visual',
        'visual_anchor_class',
        'visual_table_class',
        'paste_as_text',
        'paste_block_drop',
        'paste_merge_formats',
        'paste_tab_spaces',
        'smart_paste',
        'paste_data_images',
        'paste_preprocess',
        'paste_remove_styles_if_webkit',
        'paste_webkit_styles',
        'browser_spellcheck',
        'table_use_colgroups',
        'table_default_attributes',
        'table_default_styles',
        'table_clone_elements',
        'table_tab_navigation',
        'table_header_type',
        'table_sizing_mode',
        'table_sizing_mode',
        'table_column_resizing',
        'table_resize_bars',
        'object_resizing',
        'document_base_url',
        'remove_script_host',
        'anchor_bottom',
        'anchor_top',
        'allow_script_urls',
        'convert_urls',
        'relative_urls',
        'model',
        'model_url',
        'skin_url',
        'icons',
        'icons_url',
        'mobile',
        'theme',
        'theme_url',
        'event_root',
        'inline',
        'content_css',
        'formats',
        'language',
        'directionality',
        'placeholder',
        'custom_ui_selector',
        'highlight_on_focus',
        'plugins',
        'external_plugins',
        'readonly',
        'base_url',
        'cache_suffix',
        'content_security_policy',
        'referrer_policy',
        'suffix',
        'height',
        'width',
        'resize',
        'min_height',
        'max_height',
        'min_width',
        'max_width',
        'promotion',
        'advlist_bullet_styles',
        'advlist_number_styles',
        'allow_html_in_named_anchor',
        'link_default_protocol',
        'autoresize_bottom_margin',
        'autoresize_overflow_padding',
        'charmap',
        'charmap_append',
        'codesample_languages',
        'emoticons_append',
        'emoticons_database',
        'emoticons_images_url',
        'fullscreen_native',
        'help_tabs',
        'image_list',
        'a11y_advanced_options',
        'importcss_append',
        'importcss_exclusive',
        'importcss_file_filter',
        'importcss_groups',
        'importcss_merge_classes',
        'importcss_selector_converter',
        'importcss_selector_filter',
        'insertdatetime_dateformat',
        'insertdatetime_formats',
        'insertdatetime_timeformat',
        'insertdatetime_element',
        'link_default_target',
        'link_assume_external_targets',
        'link_class_list',
        'link_context_toolbar',
        'link_title',
        'link_quicklink',
        'link_rel_list',
        'link_target_list',
        'lists_indent_on_tab',
        'nonbreaking_force_tab',
        'nonbreaking_wrap',
        'pagebreak_split_block',
        'quickbars_insert_toolbar',
        'quickbars_selection_toolbar',
        'quickbars_image_toolbar',
        'quickbars_selection_toolbar',
        'quickbars_insert_toolbar',
        'quickbars_image_toolbar',
        'table_toolbar',
        'table_appearance_options',
        'table_grid',
        'table_cell_class_list',
        'table_row_class_list',
        'table_border_widths',
        'table_border_styles',
        'table_background_color_map',
        'table_border_color_map',
        'table_advtab',
        'table_cell_advtab',
        'table_row_advtab',
        'table_style_by_css',
        'templates',
        'template_cdate_classes',
        'template_cdate_format',
        'template_mdate_classes',
        'template_mdate_format',
        'template_replace_values',
        'template_preview_replace_values',
        'template_selected_content_classes',
        'visualchars_default_state',
    ];

    /**
     * The available methods for js instance
     * 
     * @var array
     */
    protected array $jsAvailableMethods = [

    ];

    /**
     * The available events for js instance
     * 
     * @var array
     */
    protected array $jsAvailableEvents = [
        
    ];
}