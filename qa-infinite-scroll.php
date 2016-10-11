<?php
if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
    header('Location: ../../');
    exit;
}

class qa_infinite_scroll
{
    public $pluginurl;
    public $plugincssurl;
    public $pluginjsurl;

    public $directory;
    public $urltoroot;

    function qa_infinite_scroll()
    {
        $this->pluginurl = qa_opt('site_url').'qa-plugin/q2a-infinite-scroll/';
        $this->plugincssurl = $this->pluginurl.'css/';
        $this->pluginjsurl = $this->pluginurl.'js/';
    }

    function load_module($directory, $urltoroot)
    {
        $this->directory = $directory;
        $this->urltoroot = $urltoroot;
    }
}

/*
    Omit PHP closing tag to help avoid accidental output
*/
