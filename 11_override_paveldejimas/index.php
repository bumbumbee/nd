<?php

abstract class Database
{
    public $student_no = null;
    public $surname = null;
    public $forename = null;
    public $module_code = null;
    public $module_name = null;
    public $mark=null;

    public function getDb()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "baltic";
        $dsn = "mysql:host=$host;dbname=$db";
        return new PDO($dsn, $user, $password);
    }
}

class Student extends Database
{

    function __construct($student_no, $surname, $forename)
    {
        $this->student_no = $student_no;
        $this->surname = $surname;
        $this->forename = $forename;
    }


    public function save()
    {
        $sql = "INSERT INTO students (student_no, surname, forename) VALUES (:student_no, :surname, :forename)";

        $sth = $this->getDb()->prepare($sql);
        $sth->bindParam(':student_no', $this->student_no);
        $sth->bindParam(':surname', $this->surname);
        $sth->bindParam(':forename', $this->forename);
        $sth->execute();
        echo "Student saved";
    }

}

class Module extends Database
{
    function __construct($module_code, $module_name)
    {
       $this->module_code=$module_code;
       $this->module_name=$module_name;
    }

    public function save()
    {
        $sql = "INSERT INTO modules (module_code, module_name) VALUES (:module_code, :module_name)";

        $sth = $this->getDb()->prepare($sql);
        $sth->bindParam(':module_code', $this->module_code);
        $sth->bindParam(':module_name', $this->module_name);
        $sth->execute();
        echo "Module saved";
    }

}

class Mark extends Database
{
    function __construct($student_no, $module_code, $mark)
    {
        $this->student_no = $student_no;
        $this->module_code=$module_code;
        $this->mark = $mark;
    }

    public function save()
    {
        $sql = "INSERT INTO marks (student_no, module_code, mark) VALUES (:student_no, :module_code, :mark)";

        $sth = $this->getDb()->prepare($sql);
        $sth->bindParam(':student_no', $this->student_no);
        $sth->bindParam(':module_code', $this->module_code);
        $sth->bindParam(':mark', $this->mark);
        $sth->execute();
        echo "Mark saved";
    }

}

$student = new Student("552", "Brown", "Bobby");
$student->save();

$module=new Module("CM0005", "PHP");
$module->save();

$mark=new Mark($student->student_no, $module->module_code, "99");
$mark->save();
