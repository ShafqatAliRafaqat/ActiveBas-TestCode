<?php


namespace controller;


class HomeController
{
    function __construct()
    {
        include "../models/Database.php";
        $this->db = new \Database();
    }

    public function participators()
    {
        $queryString = 'SELECT * FROM participators LEFT JOIN employees ON participators.employee_id = employees.id RIGHT JOIN events ON participators.event_id = events.id';

        if(isset($_POST) && count($_POST) >= 1){

            switch($_POST['filter']['column'])
            {
                case 'event_id':
                    $filterQueryString = ' WHERE event_id = '.$_POST['filter']['event_id'];
                    break;
                case 'employee_id':
                    $filterQueryString = ' WHERE employee_id = '.$_POST['filter']['employee_id'];
                    break;
                case 'date':
                    $filterQueryString = ' WHERE date = '.$_POST['filter']['date'];
                    break;

            }

            $queryString .= $filterQueryString;

        }

        $Query = $this->db->query($queryString);
        $participators = $Query->fetchAll();

        return $participators;
    }

    public function events()
    {
        $Query = $this->db->query('SELECT * FROM events');
        $events = $Query->fetchAll();

        return $events;

    }

    public function employees()
    {
        $Query = $this->db->query('SELECT * FROM employees');
        $events = $Query->fetchAll();

        return $events;

    }

}