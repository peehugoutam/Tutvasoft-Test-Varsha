<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_repeat1'))
{
    function get_repeat1($type)
    {
        switch ($type) {
            case "1":
                echo " Every";
                break;
            case "2":
                echo " Every Other";
                break;
            case "3":
                echo " Every Third";
                break;
            case "4":
                echo " Every Fourth";
                break;
            default:
                echo "";
        }
    }
}

if (!function_exists('get_repeat2'))
{
    function get_repeat2($type)
    {
        switch ($type) {
            case "1":
                echo " Day";
                break;
            case "2":
                echo " Week";
                break;
            case "3":
                echo " Month";
                break;
            case "4":
                echo " Year ";
                break;
            default:
                echo "";
        }
    }
}


if (!function_exists('get_repeat_on1'))
{
    function get_repeat_on1($type)
    {
        switch ($type) {
            case "1":
                echo " First";
                break;
            case "2":
                echo " Second";
                break;
            case "3":
                echo " Third";
                break;
            case "4":
                echo " Fourth";
                break;
            default:
                echo "";
        }
    }
}

if (!function_exists('get_repeat_on2'))
{
    function get_repeat_on2($type)
    {
        switch ($type) {
            case "1":
                echo " Sunday";
                break;
            case "2":
                echo " Monday";
                break;
            case "3":
                echo " Tuesday";
                break;
            case "4":
                echo " Wednesday";
                break;
            case "5":
                echo " Thirsday";
                break;
            case "6":
                echo " Friday";
                break;
            case "7":
                echo " Saturday";
                break;
            default:
                echo "";
        }
    }
}

if (!function_exists('get_repeat_on3'))
{
    function get_repeat_on3($type)
    {
        switch ($type) {
            case "1":
                echo " Month";
                break;
            case "3":
                echo " 3 Month";
                break;
            case "4":
                echo " 4 Month";
                break;
            case "6":
                echo " 6 Month";
                break;
            case "12":
                echo " Year";
                break;
            default:
                echo "";
        }
    }
}


if (!function_exists('count_event_calendar'))
{
    function count_event_calendar($id)
    {
        $ci = &get_instance();
        $ci->load->database(); 

        $ci->db->select('id');
        $ci->db->from('event_calendar');
        $ci->db->where('event_id', $id);
        $query = $ci->db->get();
        return $query->num_rows();
    }
}