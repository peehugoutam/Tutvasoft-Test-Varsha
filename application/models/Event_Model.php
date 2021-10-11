<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {


    public function save($data)
    {
        $this->db->insert('events', $data);
        return $this->db->insert_id();
    }

    public function saveCalendar($data)
    {
        $this->db->insert('event_calendar', $data);
        return $this->db->insert_id();
    }

    public function eventList()
    {
        $this->db->select('*');
        $this->db->from('events');
        return $this->db->get()->result_array();
    }

    public function eventInfo($id)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    public function eventView($id)
    {
        $this->db->select('events.*,event_calendar.event_date');
        $this->db->from('events');
        $this->db->join('event_calendar','events.id = event_calendar.event_id','inner');
        $this->db->where('events.id', $id);
        return $this->db->get()->result_array();
    }

    public function update($data,$id)
    {
        return $this->db->update('events', $data, array('id' => $id));
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('events');
    }

    public function delete_calendar($id)
    {
        $this->db->where('event_id', $id);
        $this->db->delete('event_calendar');
    }
    
}   