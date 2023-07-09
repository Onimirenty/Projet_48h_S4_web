<?php

    $header = "templates/header";
    // if($categorie == "F")
    // {
    //     $header = "templates/headerF";
    // }
    $this->load->view($header);	
    $this->load->view($content);
    $this->load->view("templates/footer");
?>