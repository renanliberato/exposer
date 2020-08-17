<?php

namespace RenanLiberato\Exposer;

function render($element = "span", $props = [])
{
    $children = '';
    if (isset($props['children'])) {
        if (is_array($props['children'])) {
            $children = join('', $props['children']);
        } else {
            $children = $props['children'];
        }
        unset($props['children']);
    }

    $style = '';
    if (isset($props['style'])) {
        if (is_array($props['style'])) {
            foreach ($props['style'] as $key => $value) {
                $style .= "{$key}:{$value};";
            }
        } else {
            $style = $props['style'];
        }
        unset($props['style']);
    }

    $attributes = '';
    foreach ($props as $key => $value) {
        $attributes .= " {$key}=\"{$value}\"";
    }

    return "<{$element} style=\"$style\" {$attributes}>{$children}</{$element}>";
}

function renderComponent($componentName, $props)
{
    return (new $componentName())($props);
}