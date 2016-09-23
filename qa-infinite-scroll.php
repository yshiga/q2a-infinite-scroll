<?php
if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
    header('Location: ../../');
    exit;
}

class qa_infinite_scroll
{
    const ENABLE = 'infinite_scroll_enable';
    const ENABLE_DFL = 0; // false
    const SAVE_BUTTON = 'infinite_scroll_save';

    public $enable;

    public $pluginurl;
    public $plugincssurl;
    public $pluginjsurl;

    public $directory;
    public $urltoroot;

    function __construct()
    {
        $this->enable = qa_opt(self::ENABLE);
        $this->pluginurl = qa_opt('site_url').'qa-plugin/q2a-infinite-scroll/';
        $this->plugincssurl = $this->pluginurl.'css/';
        $this->pluginjsurl = $this->pluginurl.'js/';
    }

    function load_module($directory, $urltoroot)
    {
        $this->directory = $directory;
        $this->urltoroot = $urltoroot;
    }


    function option_default($option)
    {
        if ($option==self::ENABLE) return (int)self::ENABLE_DFL;
    }

    function admin_form(&$qa_content)
    {
        if (qa_clicked(self::SAVE_BUTTON)) {
            qa_opt(self::ENABLE, (int)qa_post_text(self::ENABLE.'_field'));
            $ok = qa_lang('admin/options_saved');
        }

        $fields = array();

        $fields[] = array(
            'type' => 'checkbox',
            'label' => qa_lang('infinite_scroll/enable_label'),
            'tags' => 'name="'.self::ENABLE.'_field"',
            'value' => qa_opt(self::ENABLE),
        );

        return array(
            'ok' => ($ok && !isset($error)) ? $ok : null,
            'fields' => $fields,
            'buttons' => array(
                array(
                    'label' => qa_lang_html('main/save_button'),
                    'tags' => 'name="'.self::SAVE_BUTTON.'"',
                ),
            ),
        );
    }
}

/*
    Omit PHP closing tag to help avoid accidental output
*/
