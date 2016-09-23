<?php
if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
    header('Location: ../../');
    exit;
}

require_once QA_PLUGIN_DIR . 'q2a-infinite-scroll/qa-infinite-scroll.php';

class qa_html_theme_layer extends qa_html_theme_base
{
    private $infscr;

    function qa_html_theme_layer($template, $content, $rooturl, $request)
    {
        qa_html_theme_base::qa_html_theme_base($template, $content, $rooturl, $request);
        $this->infscr = new qa_infinite_scroll();
    }

    function head_script()
    {
        qa_html_theme_base::head_script();
        if ($this->infscr->enable && $this->template === 'questions') {
            $this->output('<SCRIPT TYPE="text/javascript" SRC="'.$this->infscr->pluginjsurl.'jquery-ias.min.js"></SCRIPT>');
            $this->output('<SCRIPT TYPE="text/javascript" SRC="'.$this->infscr->pluginjsurl.'infinite-scroll.js"></SCRIPT>');
        }
    }

    function head_css()
    {
        qa_html_theme_base::head_css();
        if ($this->infscr->enable && $this->template === 'questions') {
            $this->output('<LINK REL="stylesheet" TYPE="text/css" HREF="'.$this->infscr->plugincssurl.'jquery.ias.css"/>');
        }
    }
}
