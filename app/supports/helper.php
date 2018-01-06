<?php

use Carbon\Carbon;

if( ! function_exists('build_url') ){
    function build_url($appends=[], $only='*', $except=null)
    {
        $vars = request()->except('_token');
        if(is_array($only)) $vars = request()->only($only);
        if(is_array($except)){
            array_push($except, '_token');
            $vars = request()->except($except);
        }

        $vars = array_merge($vars, $appends);

        return http_build_query($vars);
    }
}

if( ! function_exists('formatted_year') ){
    function formatted_year($value, $format='Y'){
        if($value == '0000-00-00' or $value == null) return null;
        return Carbon::parse($value)->format($format);
    }
}


if( ! function_exists('formatted_date') ){
    function formatted_date($value, $format='d/m/Y'){
        if($value == '0000-00-00' or $value == null) return null;
        return Carbon::parse($value)->format($format);
    }
}

if( ! function_exists('plain_date') ){
    function plain_date($value){
        return !$value ? null : Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
}

if( ! function_exists('format_angka') ) {
    function format_angka($value){
        return !$value ? null : number_format($value,2);
    }
}


if( ! function_exists('fa') ){
    function fa($icon='pencil')
    {
        return '<i class="fa fa-'.$icon.'"></i>';
    }
}

if( ! function_exists('show_bs_message') )
{
    function show_bs_message($messages, $type='info', $icon='info-circle'){

        if(empty($messages)){
            return null;
        }

        if( isset($messages['text']) && isset($messages['type']) )
        {
            $type = $messages['type'];
            if( isset($messages['icon']) )
            {
                $icon = $messages['icon'];
            }

            $messages = $messages['text'];
        }

        if(is_array($messages)){
            $messages = implode('<br>', $messages);
        }

        $template = '<div class="alert alert-%s">%s %s</div>';
        return sprintf($template, $type, fa($icon),  $messages);
    }
}

if ( ! function_exists('show_inline_error') )
{
    function show_inline_error($errors, $key, $type='first'){
        if($errors->has($key)){
            $template = '<div class="invalid-feedback" style="display: block">%s</div>';
            if('all' === $type){
                return sprintf($template, implode('<br>', $errors->all($key)));
            }else{
                return sprintf($template, $errors->first($key));
            }
        }else{
            return null;
        }
    }
}

if ( ! function_exists('has_error') )
{
    function has_error($errors, $key){
        return $errors->has($key) ? 'has-danger' : '';
    }
}

if ( ! function_exists('is_invalid') )
{
    function is_invalid($errors, $key){
        return $errors->has($key) ? 'is-invalid' : '';
    }
}
