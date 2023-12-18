<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Create a class 
        class Animal implements Singable {
            // protected properties can only be accessed by class instances and instances of classes which inherit from the parent class
            protected $name;
            protected $favourite_food;
            protected $sound;
            protected $id;

            // static attributes are shared and updated across all objects of a class
            public static $number_of_animals = 0;

            // constants are also shared across objects
            const PI = "3.14159";

            // Create a method
            function getName() {
                // $this refers to the current object
                return $this->name;
            }

            // Constructor method, used to instantiate values upon object creation
            function __construct() {
                // Generate an ID for the object based on a random number between 100 and 1000000
                $this->id = rand(100, 1000000);
                echo $this->id . " has been assigned<br>";
                // Access static attributes using a double colon (Paamayim Nekudotayim) and increment
                Animal::$number_of_animals++;
            }

            // Destructor method runs at the end of the script
            public function __destruct() {
                echo $this->name . " is being destroyed<br>";
            }

            // Get a class attribute
            function __get($name) {
                echo "Asked for " . $name . "<br>";
                return $this->$name;
            }


            // Set a value for an attribute
            function __set($name, $value) {
                switch ($name) {
                    case "name":
                        $this->name = $value;
                        break;
                    case "favourite_food":
                        $this->favourite_food = $value;
                        break;
                    case "sound":
                        $this->sound = $value;
                        break;
                    default:
                        echo $name . " Not Found<br>";
                }
                echo "Set " . $name . " to " . $value . "<br>";

            }

            // Another method
            function run() {
                echo $this->name . " runs<br>";
            }

            // final methods cannot be overwritten
            final function what_is_good() {
                echo "Running is good<br>";
            }

            // This is called when an object is printed (echo'd?)
            function __toString() {
                return $this->name . " says " . $this->sound . " give me some " . $this->favourite_food . " my id is "  . $this->id . " total animals = " . Animal::$number_of_animals . "<br>";
            }

            // Static functions are acccessible to all objects 
            static function add_these($num_1, $num_2) {
                return ($num_1 + $num_2) . "<br>";
            }

            public function sing() {
                echo $this->name . " sings Grrr grrr grr<br>";
            }
        }

        // Dog inherits from Animal and implements the Singable interface
        class Dog extends Animal implements Singable{
            // run is overridden
            function run() {
                echo  $this->name . " runs like crazy<br>";
            }
            public function sing() {
                echo $this->name . " sings Bow wow wow<br>";
            }
        }

        // Interfaces are used to allow child classes to inherit properties from other classes
        interface Singable {
            public function sing();
        }

        // Construct a new Animal object
        $animal_one = new Animal();
        // Set attributes
        $animal_one->name = "Spot";
        $animal_one->favourite_food = "Meat";
        $animal_one->sound = "Ruff";

        // Access private and static attributes
        echo $animal_one->name . " says " . $animal_one->sound . " give me some " . $animal_one->favourite_food . " my id is "  . $animal_one->id . " total animals = " . Animal::$number_of_animals . "<br>";

        // Construct a Dog object which inherits from the Animal class
        $animal_two = new Dog();
        $animal_two->name = "Grover";
        $animal_two->favourite_food = "Mushrooms";
        $animal_two->sound = "Grrrrr";

        echo $animal_two->name . " says " . $animal_two->sound . " give me some " . $animal_two->favourite_food . " my id is "  . $animal_two->id . " total animals = " . Dog::$number_of_animals . "<br>";

        echo "Favourite Number " . Animal::PI . "<br>";

        // Call class methods, notice child class with overridden method is different
        $animal_one->run();
        $animal_two->run();

        // Returns output of __toString() method
        echo $animal_one;
        echo $animal_two;

        // Access static methods
        echo "4 + 5 = " . Animal::add_these(4, 5);

        // Access object methods
        $animal_one->sing();
        $animal_two->sing();

        // Define a function which takes any object which extends an interface and run its respective function
        function make_them_sing(Singable $singing_animal) {
            $singing_animal->sing();
        }

        // The same function will return two different things depending on the objected passed inside: polymorphism.
        make_them_sing($animal_one);
        make_them_sing($animal_two);

        // Check if a given object is of a specific class
        $is_it_an_animal = ($animal_two instanceof Animal) ? "True<br>" : "False<br>";
        echo $is_it_an_animal;
    ?>    
</body>
</html>