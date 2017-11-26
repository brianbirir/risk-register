<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Trim
{
    // shorten long text
    function trim_text($text)
    {   
        // maximum character length
        $max_length = 30;
        
        if (strlen($text) > $max_length)
        {
            $offset = ($max_length - 3) - strlen($text);
            $text = substr($text, 0, strrpos($text, ' ', $offset)) . '...';
            return $text;
        }
    }
}