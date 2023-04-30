<?php
function getIdYt($url)
{
    parse_str(parse_url($url, PHP_URL_QUERY), $arrayYt);
    return $arrayYt['v'] ?? "";
}
function renderVsb($bp)
{
    $class = [];
    $bps = config('pagebuilder.breakpoint');
    $bp = explode(",", $bp);
    $hidden = array_diff(array_keys($bps), $bp);
    if (count($bp) > 0) {
        foreach ($bp as  $value) {
            $class[] = "d-" . $value . "-block";
        }
    }
    if (count($hidden) > 0) {
        foreach ($hidden as $key =>  $name) {
            $class[] = "d-" . $key . "-none";
        }
    }
    return implode(' ', $class);
}
function renderSpacing($spacing)
{
    $class = " ";
    foreach ($spacing as $bp => $items) {
        foreach ($items as $pos => $item) {
            $class .= " a-" . $pos . "-" . $bp . "-" . $item;
        }
    }
    return $class;
}
function rC($class)
{
    $class = " " . $class;
    return str_replace(",", " ", $class);
}
function renderFileCss($arrStyle)
{
    $cssContent = "";
    foreach ($arrStyle as $seclector => $properties) {
        $cssContent .= $seclector . " {";
        foreach ($properties as $key => $value) {
            $cssContent .= $key . ":" . $value . ";";
        }
        $cssContent .=  "}";
    }
    return file_put_contents(public_path('pgb/pgb.css'), $cssContent);
}
function unitCss($val, $unit = "px")
{
    return is_numeric($val) ? $val . $unit : $val;
}
function setPptValueCss($arrStyle, $id, $preview = false, $customs = [])
{
    $style = [];
    $id = $id;
    if ($preview) {
        $id = "#pgb-preview  " . $id;
    }
    $pu = "unit_";
    $unit = "px";
    foreach ($arrStyle as $properties => $value) {
        $properties = str_replace("_", "-", $properties);
        if (is_array($value)) {
            $short  = $value['short'] === 'true' ? true : false;
            if ($short) {
                $style[$id][$properties] = "";
            }
            foreach ($value['properties'] as $key => $val) {
                $key = str_replace("_", "-", $key);
                if (!$short) {
                    if (is_array($val)) {
                        foreach ($val as $sub_key => $sub_val) {
                            $sub_key = str_replace("_", "-", $sub_key);
                            $unit =  $value[$pu . $properties . "_" . $key] ?? $unit;
                            $style[$id][$properties . "-" . $sub_key . "-" . $key] = unitCss($sub_val, $unit);
                        }
                    } else {
                        $value[$pu . $properties . "_" . $key] ?? $unit;
                        $style[$id][$properties . "-" . $key] = unitCss($val, $unit);
                    }
                } else {
                    $value[$pu . $properties] ?? $unit;
                    $style[$id][$properties] .=  " " . unitCss($val, $unit);
                }
            }
        } else {
            $value[$pu . $properties] ?? $unit;
            $style[$id][$properties] = unitCss($value, $unit);
        }
    }
    return $style;
}
function handleStyle($sections, $preview = false)
{
    $arrStyle = [];
    if (count($sections) > 0) {
        foreach ($sections as  $section) {
            $sid =  "#" . $section['id'];
            if ($preview) {
                $sid = "#pgb-preview  " . $sid;
            }
            $arrStyle[$sid] = [
                "background" => $section['style']['background_section']
            ];
            $arrStyle[$sid . " .container"] = [
                "background" => $section['style']['background_container']
            ];
            unset($section['style']["background_section"]);
            unset($section['style']["background_container"]);
            $arrStyle = array_merge_recursive($arrStyle, setPptValueCss($section['style'], $sid . " .container", false));
            // ////////////
            if (isset($section['column'])) {
                ///////////////////////
                foreach ($section['column'] as  $col) {
                    $cid = "#" . $col['id'];
                    $arrStyle = array_merge_recursive($arrStyle, setPptValueCss($col['style'], $cid, $preview));
                    // /////
                    if (isset($col['package'])) {
                        foreach ($col['package'] as  $pack) {
                            if (isset($pack['style'])) {
                                $pid = "#" . $pack['id'];
                                switch ($pack['payload']['type']) {
                                    case 'banners':
                                        $pid = $pid . " .module-banner-item a";
                                        break;
                                    default:
                                        # code...
                                        break;
                                }
                                $arrStyle = array_merge_recursive($arrStyle, setPptValueCss($pack['style'], $pid, $preview));
                            }
                        }
                    }
                    // ///////
                }
                // ///////
            }
        }
        // ///////
    }
    return renderFileCss($arrStyle);
}
// mai lam phan nay
function renderColFW($devices)
{
    if (!$devices) {
        return "";
    }
    $devices = explode(",", $devices);
    $class = [];
    foreach ($devices as $device) {
        $class[] = "a-col-fw-" . $device;
    }
    return implode(" ", $class);
}

function renderAdvanced($advanced)
{
    $spacing = $advanced['spacing'];
    return renderVsb($advanced['visible']) . " " . renderSpacing($spacing);
}
