<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('element')) {
    function home($template, $data = null)
    {
        $ci = &get_instance();
        $data['view'] = $ci->load->view($template, $data, true);
        $ci->load->view('home.php', $data);
    }

    function admin($template, $data = null)
    {
        $ci = &get_instance();
        $data['view'] = $ci->load->view($template, $data, true);
        $ci->load->view('admin.php', $data);
    }
}
