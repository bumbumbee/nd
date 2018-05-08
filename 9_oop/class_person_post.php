<?php

const MAX_LENGTH = 500;

class Post
{
    private $title = "";
    private $content = "";
    private $author = "";

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }


    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        if (strlen($this->content) > MAX_LENGTH):
            echo "Max length is " . MAX_LENGTH;
        endif;
       return $this->content;
    }


    public function setAuthor($person)
    {
        $this->author = $person;
    }

    public function getAuthor()
    {
        return $this->author;
    }


}

class Person
{
    private $id = 0;
    private $name = "";

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

}

$person = new Person();
$person->setName("John");
$person->setId(10);
$post = new Post();
$post->setTitle("Posto pavadinimas");
$post->setContent("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
");
$post->setAuthor($person);

// var_dump arba print_r, nes perduodamas OBJEKTAS person
print_r($post->getAuthor());

echo "<br>";
echo $person->getId()." ".$person->getName()." ".$post->getTitle()."<br>".$post->getContent();