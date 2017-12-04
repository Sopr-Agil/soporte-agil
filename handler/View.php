<?php
class View {

    function render_dinamic($html = '', $array_de_resultados, $regex = '', $comodines = array()) {
        //print_r($array_de_resultados);
        $array_coincidencias = array();
        $template = get_template($html);
        preg_match($regex, $template, $array_coincidencias);
        //print_r($array_coincidencias);
        $codigo = $array_coincidencias[0];

        $render_options = '';
        foreach ($array_de_resultados as $array_asociativo) {
            $sustituciones = array_values($array_asociativo);
            $render_options .= str_replace($comodines, $sustituciones, $codigo);
        }
        $html = str_replace($codigo, $render_options, $template);
        return $html;
    }

    function get_template($html = '') {
         $file = URL_HTML . $html . '.html';
         $template = file_get_contents($file);
         return $template;
    }

    function render_dinamic_data($html, $data) {
        foreach ($data[0] as $clave => $valor) {
            $html = str_replace('#{' . $clave . '}', $valor, $html);
        }
        return $html;
    }

    function html_data($view = '', $data = array()) {
        $html = get_template(VIEW_TEMPLATE);
        $html = str_replace('#{'. $view .'}', get_template($view), $html);
        print $html;
    }

    function html($view = '') {
        
        $html = $this->get_template(VIEW_TEMPLATE);        
        $html = str_replace('#{body}',  $this->get_template($view), $html);
        print $html;
    }

}

?>