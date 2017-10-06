<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Template
    {
        var $ci;
         
        function __construct() 
        {
            $this->ci =& get_instance();
        }

        function load($tpl_view, $body_view = null, $data = null)
        {
            if (! is_null($body_view) )
            {
                if ( file_exists( APPPATH.'views/'.$tpl_view.'/'.$body_view ) ) 
                {
                    $body_view_path = $tpl_view.'/'.$body_view;
                }
                else if ( file_exists( APPPATH.'views/'.$tpl_view.'/'.$body_view.'.php' ) ) 
                {
                    $body_view_path = $tpl_view.'/'.$body_view.'.php';
                }
                else if ( file_exists( APPPATH.'views/'.$body_view ) ) 
                {
                    $body_view_path = $body_view;
                }
                else if ( file_exists( APPPATH.'views/'.$body_view.'.php' ) ) 
                {
                    $body_view_path = $body_view.'.php';
                }
                else
                {
                    show_error('Unable to load the requested file: ' . $tpl_name.'/'.$view_name.'.php');
                }
                
                /* code igniter view function
                 * loads the view that appears on the body section of the template
                 * 12th October 2016
                 */ 
                
                $body = $this->ci->load->view($body_view_path, $data, TRUE);
                
                // if data is null
                if ( is_null($data) ) 
                {
                    $data = array('body' => $body);
                }
                // if data is an array
                else if ( is_array($data) )
                {
                    $data['body'] = $body;
                }
                //if data is an object
                else if ( is_object($data) )
                {
                    $data->body = $body;
                }
            }
            // load template view
            $this->ci->load->view('templates/'.$tpl_view, $data);
        }
    }

?>