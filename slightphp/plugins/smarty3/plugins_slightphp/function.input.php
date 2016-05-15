<?php

function smarty_function_input($params, &$smarty) {
    $type = $params['type'];
    $label = $params['label'];
    $name = $params['name'];
    $value = $params['value'];
    $class = $params['class'];
    $disabled = $params['disabled'];
    $html = '<div class="form-group">
                <label class="col-sm-2 control-label">' . $label . '</label>
                <div class="col-sm-10 controls">';
    switch ($type) {
        case 'radio':
            $checked = $params['checked'];
            $values = json_decode($value, true);
            if ($values) {
                foreach ($values as $key => $item) {
                    $attr = "";
                    if (isset($checked) && $key == $checked) {
                        $attr .= 'checked="checked"';
                    }
                    $html .= '<label class="radio"><input name="' . $name . '" value="' . $key . '" type="radio" ' . $attr . '>' . $item . '</label>';
                }
            }
            break;
        case 'checkbox':
            $checked = $params['checked'];
            $values = json_decode($value, true);
            if ($values) {
                if (isset($checked)) {
                    $checked = explode(',', $checked);
                }
                foreach ($values as $key => $item) {
                    $attr = "";
                    if ($checked && in_array($key, $checked)) {
                        $attr .= 'checked="checked"';
                    }
                    $html .= '<label class="checkbox-inline"><input name="' . $name . '" value="' . $key . '" type="checkbox" class="px" ' . $attr . '><span class="lbl">' . $item . '</span></label>';
                }
            }
            break;
        case 'select':
            $selected = $params['selected'];
            $multiple = $params['multiple'];
            $values = json_decode($value, true);
            if ($values) {
                if (isset($selected)) {
                    $selected = explode(',', $selected);
                }
                $html .= '<select name="' . $name . '" ';
                if ($multiple) {
                    $html .= ' multiple="multiple" ';
                }
                $html .= ' class="' . $class . ' form-control">';
                foreach ($values as $key => $item) {
                    $attr = "";
                    if (isset($selected) && in_array($key, $selected)) {
                        $attr .= 'selected="selected"';
                    }
                    $html .= '<option value="' . $key . '"' . $attr . '>' . $item . '</option>';
                }
                $html .= '</select>';
            }
            break;
        case 'textarea':
            $html .= '<textarea name="' . $name . '" class="' . $class . ' form-control">' . $value . '</textarea>';
            break;
        case 'text':
        default:
            $isdisable = '';
            if ($disabled) {
                $isdisable = 'disabled=""';
            }
            $html .= '<input type="text" class="' . $class . ' form-control" name="' . $name . '" value="' . $value . '" ' . $isdisable . '>';
    }
    if ($params['help']) {
        $html .= '<p class="help-block">' . $params['help'] . '</p>';
    }

    $html .= '</div></div>';
    return $html;
}


?>
