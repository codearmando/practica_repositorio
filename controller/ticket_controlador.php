<?php

require '../models/ticket_modelo.php';

Class Ticketcontroller extends Ticketmodelo{
    public function mostrar_ticket(){
        $lista_ticket= $this->ticket('ticket','*');
        return $lista_ticket;
    }
}

?>