<?php
class X {
    public $name;
    public $age;

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setAge($age) {
        $this->age = $age;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }
}

$x = new X();
echo $x->name = "Huu Chung";  // Huu Chung
$chung = $x->setName("Chung")->setAge('20')->getAge();
echo $chung;         // 20
echo $x->getName(); // Chung
