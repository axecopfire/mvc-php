<?php

  class Model {
    public $string;

    public function __construct() {
      $this->string = "MVC + PHP = Awesome, click here!";
    }
  }

  class View {
    private $model;
    private $controller;

    public function __construct($controller, $model) {
      $this->controller = $controller;
      $this->model = $model;
    }

    public function output() {
      return '<p><a href="index.php?action=clicked">' . $this->model->string . "</a></p>";
    }
  }

  class Controller {
    private $model;

    public function __construct($model) {
      $this->model = $model;
    }

    public function clicked() {
        $this->model->string = "Updated Data, thanks to MVC and PHP!";
    }
  }

  $model = new Model();
  $controller = new Controller($model);
  $view = new View($controller, $model);

  if(isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <?php   echo $view->output(); ?>
</body>
</html>