<?php

require_once 'Database.php';
class ApiClass extends Database
{
    public function getData($data)
    {
        $name= $data['name'];
        $question = $data['question'];
       return $this->fetchData($name,$question);
    }
    public function postData($data)
    {
        $name= $data['name'];
        $question = $data['question'];
        return $this->fetchData($name,$question);
    }
    public function fetchData($name,$question)
    {
        $row = array();
        $data = mysqli_query($this->con,"SELECT * FROM testdata WHERE name='$name' AND question='$question'");
        while ($result = mysqli_fetch_assoc($data))
        {
            $row[] = $result;
        }
        echo json_encode($row);
    }
}