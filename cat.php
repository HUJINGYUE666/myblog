//hph psr
<?php
class Cat{
    var $name;
    var $age;

//    function setName($name,$age){
//    $this->name = $name;
//    $this->age = $age;
//}
//
//function eat(){
//    echo $this->name . 'is eating...';
//}
//}
//
//$cat1 = new Cat();
//$cat1 -> setName('mantou');
//$cat1 -> eat();
//$cat2 = new Cat();
//$cat2 -> setName('huli');
//$cat2 -> eat();

//PHP 构造函数
function  __construct($name,$age){
    $this->name = $name;
    $this->age = $age;
}

function eat(){
    echo $this->name . 'is eating...';
}
}

$cat1 = new Cat('mantou','1');
$cat1 -> eat();
$cat2 = new Cat('huli','2');
$cat2 -> eat();

