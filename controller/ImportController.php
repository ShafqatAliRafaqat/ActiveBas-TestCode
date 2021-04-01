<?php


namespace controller;


class ImportController
{
    const EVENTS = "../resources/events.json";

    function __construct()
    {
        include "../models/Database.php";
        $this->db = new \Database();
    }

    public function import()
    {

        $content = json_decode(file_get_contents(SELF::EVENTS));

        foreach($content as $Participant)
        {
            // Import Events
            $Query = $this->db->query('SELECT * FROM events WHERE id='.$Participant->event_id);
            if($Query->numRows() == 0)
            {
                $this->db->query('INSERT INTO events (id,name,date) VALUES (?,?,?)', $Participant->event_id, $Participant->event_name, $Participant->event_date);
                $event = $this->db->query('SELECT * FROM events WHERE id='.$Query->lastInsertID())->fetchArray();
            }else
            {
                $event = $Query->fetchArray();
            }

            // Import employees
            $Query = $this->db->query('SELECT * FROM employees WHERE employee_name="'.$Participant->employee_name . '"');
            if($Query->numRows() == 0)
            {
                $this->db->query('INSERT INTO employees (employee_name,employee_mail) VALUES (?,?)', $Participant->employee_name, $Participant->employee_mail);
                $employee = $this->db->query('SELECT * FROM employees WHERE id='.$Query->lastInsertID())->fetchArray();
            }else
            {
                $employee = $Query->fetchArray();
            }

            // Import Participants
            $Event = $this->db->query('SELECT * FROM participators WHERE id='.$Participant->participation_id);
            if($Event->numRows() == 0)
            {
                $this->db->query('INSERT INTO participators (event_id,employee_id,participation_fee,version) VALUES (?,?,?,?)', $event['id'], $employee['id'], $Participant->participation_fee, $Participant->version);
            }

        }

        $this->db->close();

    }
}