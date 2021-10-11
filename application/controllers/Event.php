<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Event_Model");
        $this->load->helper("common_helper");
    }

	public function index()
	{
        
        $this->form_validation->set_rules("title","Event title", "required|alpha");
        $this->form_validation->set_rules("start_date","Event start date", "required");
        $this->form_validation->set_rules("end_date","Event end date", "required");

        if(isset($_POST['recurrence_type']) && $_POST['recurrence_type'] == 1){
            $this->form_validation->set_rules("repeat_1","Repeat 1", "required");
            $this->form_validation->set_rules("repeat_2","Repeat 2", "required");
        }else{
            $this->form_validation->set_rules("repeat_on_1","Repeat on 1", "required");
            $this->form_validation->set_rules("repeat_on_2","Repeat on 2", "required");
            $this->form_validation->set_rules("repeat_on_3","Repeat on 3", "required");
        }

        if($this->form_validation->run()){
            
            // die; 

            $save_data = array(
                'title' => $this->input->post("title"),
                'start_date' => date('Y-m-d', strtotime($this->input->post("start_date"))),
                'end_date' => date('Y-m-d', strtotime($this->input->post("end_date"))),
                'recurrence_type' => $this->input->post("recurrence_type"),
                'repeat_1' => $this->input->post("repeat_1"),
                'repeat_2' => $this->input->post("repeat_2"),
                'repeat_on_1' => $this->input->post("repeat_on_1"),
                'repeat_on_2' => $this->input->post("repeat_on_2"),
                'repeat_on_3' => $this->input->post("repeat_on_3")
            );

             $event_id = $this->Event_Model->save($save_data); 
            if($event_id){

                $start_date = date('Y-m-d', strtotime($this->input->post("start_date")));
                $end_date = date('Y-m-d', strtotime($this->input->post("end_date")));

                if($this->input->post('recurrence_type') == 1){
                    $begin = new DateTime($start_date);
                    $end = new DateTime($end_date);

                    if($this->input->post("repeat_1") == 1 && $this->input->post("repeat_2") == 1){
                        for($i = $begin; $i <= $end; $i->modify('+1 day')){
                            // echo $i->format("Y-m-d");
                            // echo "<br>";
                            
                            $calendar_data = array(
                                'event_id' => $event_id,
                                'event_date' => $i->format("Y-m-d")
                            );
                            $this->Event_Model->saveCalendar($calendar_data);    
                        }
                    }else if($this->input->post("repeat_1") == 1 && $this->input->post("repeat_2") == 1){

                    }
                    
                }else{
                    $begin = new DateTime($start_date);
                    $end = new DateTime($end_date);

                    if($this->input->post("repeat_on_1") == 1 && $this->input->post("repeat_on_2") == 1  && $this->input->post("repeat_on_3") == 1){
                        for($i = $begin; $i <= $end; $i->modify('+1 day')){
                            // echo $i->format("Y-m-d");
                            // echo "<br>";
                            
                            $calendar_data = array(
                                'event_id' => $event_id,
                                'event_date' => $i->format("Y-m-d")
                            );
                            $this->Event_Model->saveCalendar($calendar_data);    
                        }
                    }
            }

                $this->session->set_flashdata("success","Event created successfully");
                redirect("event",'refresh');
            }
        }else{
            $this->load->view('event');
        }
	}

    public function list()
	{
        $event_list = $this->Event_Model->eventList();
		$this->load->view('event_list',['event_list' => $event_list]);
	}

    public function edit($id)
	{
        $eventInfo = $this->Event_Model->eventInfo($id);
		$this->load->view('event_edit',['eventInfo' => $eventInfo]);
	}

    public function update()
	{
        $this->form_validation->set_rules("title","Event title", "required|alpha");
        $this->form_validation->set_rules("start_date","Event start date", "required");
        $this->form_validation->set_rules("end_date","Event end date", "required");

        if(isset($_POST['recurrence_type']) && $_POST['recurrence_type'] == 1){
            $this->form_validation->set_rules("repeat_1","Repeat 1", "required");
            $this->form_validation->set_rules("repeat_2","Repeat 2", "required");
        }else{
            $this->form_validation->set_rules("repeat_on_1","Repeat on 1", "required");
            $this->form_validation->set_rules("repeat_on_2","Repeat on 2", "required");
            $this->form_validation->set_rules("repeat_on_3","Repeat on 3", "required");
        }

        if($this->form_validation->run()){
            $save_data = array(
                'title' => $this->input->post("title"),
                'start_date' => date('Y-m-d', strtotime($this->input->post("start_date"))),
                'end_date' => date('Y-m-d', strtotime($this->input->post("end_date"))),
                'recurrence_type' => $this->input->post("recurrence_type"),
                'repeat_1' => $this->input->post("repeat_1"),
                'repeat_2' => $this->input->post("repeat_2"),
                'repeat_on_1' => $this->input->post("repeat_on_1"),
                'repeat_on_2' => $this->input->post("repeat_on_2"),
                'repeat_on_3' => $this->input->post("repeat_on_3")
            );

            $update_data = $this->Event_Model->update($save_data,$this->input->post("id"));
            if($update_data){
                $this->session->set_flashdata("success","Event updated successfully");
                redirect("event/edit/".$this->input->post("id"),'refresh');
            }
        }else{
            redirect("event/edit/".$this->input->post("id"),'refresh');
        }
	}

    public function view($id)
	{
        $eventInfo = $this->Event_Model->eventView($id);
		$this->load->view('event_view',['eventInfo' => $eventInfo,'event_id' => $id]);
	}

    public function delete($id)
	{
        $result = $this->Event_Model->delete($id);
        if($result){
            $this->Event_Model->delete_calendar($id);
            $this->session->set_flashdata("success","Event deleted successfully");
        }else{
            $this->session->set_flashdata("error","Event not deleted");
        }
		redirect("event/list",'refresh');
	}
}
