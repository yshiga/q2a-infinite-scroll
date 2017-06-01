<?php
if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
    header('Location: ../../');
    exit;
}

require_once QA_PLUGIN_DIR . 'q2a-infinite-scroll/qa-infinite-scroll.php';

class qa_html_theme_layer extends qa_html_theme_base
{
    private $infscr = null;
    private $allow_template = array('questions', 'tag');

    function qa_html_theme_layer($template, $content, $rooturl, $request)
    {
        qa_html_theme_base::qa_html_theme_base($template, $content, $rooturl, $request);
        $this->infscr = new qa_infinite_scroll();
    }

    function head_script()
    {
        qa_html_theme_base::head_script();
        if (in_array($this->template, $this->allow_template)) {
            if (strpos(qa_opt('site_theme'), 'q2a-material-lite') !== false) {
                $this->output('<script>var material_lite = true;</script>');
            } else {
                $this->output('<script>var material_lite = false;</script>');
            }
            $infscr_lang_json = json_encode (array(
              'read_next' => qa_lang_html('infinite_scroll/read_next'),
              'read_previous' => qa_lang_html('infinite_scroll/read_previous'),
              'last_article' => qa_lang_html('infinite_scroll/last_article'),
            ));
            $this->output(
              '<SCRIPT TYPE="text/javascript">',
              "var infscr_lang = '".$infscr_lang_json."';",
              '</SCRIPT>'
            );
            $this->output('<SCRIPT TYPE="text/javascript" SRC="'.$this->infscr->pluginjsurl.'jquery-ias.min.js"></SCRIPT>');
            $this->output('<SCRIPT TYPE="text/javascript" SRC="'.$this->infscr->pluginjsurl.'infinite-scroll.js"></SCRIPT>');
        }
    }

    function head_css()
    {
        qa_html_theme_base::head_css();
        if (in_array($this->template, $this->allow_template)) {
            $this->output('<LINK REL="stylesheet" TYPE="text/css" HREF="'.$this->infscr->plugincssurl.'jquery.ias.css"/>');
        }
    }
    
    function q_list_items($q_items)
    {
        qa_html_theme_base::q_list_items($q_items);
        if (in_array($this->template, $this->allow_template) &&
            strpos(qa_opt('site_theme'), 'q2a-material-lite') !== false) {
            
            $this->output('<div class="ias-spinner" style="align:center;"><span class="mdl-spinner mdl-js-spinner is-active" style="height:20px;width:20px;"></span></div>');
        }
    }
}
