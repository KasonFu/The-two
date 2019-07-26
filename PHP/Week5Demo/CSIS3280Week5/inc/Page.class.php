<?php

class Page  {

    public $title = "Please set your Page title!";

    //Overrides the default constructor
    function __construct($newTitle)  {
        $this->title = $newTitle;

    }

    function header()   { ?>
        <!doctype html>
        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

            <title><?php echo $this->title; ?></title>
        </head>
        <body>
            <h1><?php echo $this->title; ?></h1>
    <?php }

    function  footer()  { ?>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>
        </html>
    <?php }

    function displayShoes($ShoeRack)   {
        
        echo '<TABLE>';
            echo '<TR>';
            echo '<TH>Color</TH>';
            echo '<TH>Size</TH>';
            echo '<TH>Make</TH>';
            echo '<TH>Material</TH>';
            echo '</TR>';


            foreach ($ShoeRack->shoes as $shoe)   {
                echo '<TR>';
                echo '<TD>'.$shoe->color.'</TD>';
                echo '<TD>'.$shoe->size.'</TD>';
                echo '<TD>'.$shoe->brand.'</TD>';
                echo '<TD>'.$shoe->material.'</TD>';
                echo '</TR>';
            }
        echo '</TABLE>';
    }

}

?>