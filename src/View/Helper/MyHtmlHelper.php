<?php

namespace App\View\Helper;

use Cake\View\Helper\HtmlHelper;

class MyHtmlHelper extends HtmlHelper {

    public function component($path, $type = 'css', array $options = array()) {
        $path = '/component/' . $path;
        return parent::{$type}($path, $options);
    }

}
