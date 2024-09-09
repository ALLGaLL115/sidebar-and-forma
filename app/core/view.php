<?php

class View {

    function generate($content_view, $template_view, $data=null, $css_path=null, $js_path=null) {

        include 'app/views/'.$template_view;
    }
}