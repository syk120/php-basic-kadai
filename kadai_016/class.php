<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <title>PHP課題編</title>
</head>

<body>
    <?php
    class Food {
            private $name;
            private $price;
            
            public function __construct(string $name, int $price) {
                $this->name = $name;
                $this->price = $price;
            } 
            
            public function showPrice() {
                echo $this->price . '<br>';
            }
        }

        $food = new Food('potato', 250);
        
        // Privateプロパティを表示するために、ReflectionClassを使う
        $reflectFood = new ReflectionClass($food);
        $propsFood = $reflectFood->getProperties(ReflectionProperty::IS_PRIVATE);
        $foodData = [];
        foreach ($propsFood as $prop) {
            $prop->setAccessible(true);  // Privateプロパティにアクセス可能にする
            $foodData[$prop->getName()] = $prop->getValue($food);
        }
        echo 'Food Object ( ';
        foreach ($foodData as $key => $value) {
            echo "[$key:Food:private] => $value ";
        }
        echo ')<br>';

        $food->showPrice();

        class Animal {
            private $name;
            private $height;
            private $weight;
            
            public function __construct(string $name, int $height, int $weight) {
                $this->name = $name;
                $this->height = $height;
                $this->weight = $weight;
            } 
            
            public function showHeight() {
                echo $this->height . '<br>';
            }
        }

        $animal = new Animal('dog', 60, 5000);

        // ReflectionClassを使用してAnimalのプロパティも表示
        $reflectAnimal = new ReflectionClass($animal);
        $propsAnimal = $reflectAnimal->getProperties(ReflectionProperty::IS_PRIVATE);
        $animalData = [];
        foreach ($propsAnimal as $prop) {
            $prop->setAccessible(true);
            $animalData[$prop->getName()] = $prop->getValue($animal);
        }
        echo 'Animal Object ( ';
        foreach ($animalData as $key => $value) {
            echo "[$key:Animal:private] => $value ";
        }
        echo ')<br>';

        $animal->showHeight();
        ?>
     </p>
</body>
</html>