<?php 
namespace part1\Models;
require 'Person.php';

class Employee extends Person{

    public $carrer, $function, $salary;

    public function __construct(Person $person, $carrer, $function)
    {
        parent::__construct($person->name, $person->age);
        $this->carrer = $carrer;
        $this->function = $function;
    }

    public function calculateSalary($carrer, $function){
        if($carrer == "desenvolvedor"){
            return $this->salary($function);
              }  
          else {
                return ("cargo não encontrado");
                  exit;
          }    
    }

    public function salary($function){
        switch ($function){
            case "fullstack1":
                return $this->salary = 2000.00;
                break;
            case "fullstack2": 
                    return $this->salary =  3000.00;
                    break;
            case "fullstack3":
                return $this->salary = 4000.00;
                break ;
            case "gerente";
                return $this->salary = 6000.00;
                break;
            default: 
                    return "Carreira não encontrada";
                    break;
        }   
    }
    
    public function profile(Employee $employee ){
        echo "O funcionário {$this->name} de {$this->age} anos, está exercendo o cargo de {$this->carrer}, na função de {$this->function} e tem o salário de R$ {$this->salary}";
    }
       
    
}
$person = new Person('Rafael', 23);

$developer = new Employee($person, "desenvolvedor", "fullstack1");
 $developer->calculateSalary($developer->carrer, $developer->function);

 $developer->profile($developer);

   

