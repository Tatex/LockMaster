<?php
Class User extends CI_Model
{
    function login($tunnus, $salasana)
    {
        $this -> db -> select('*');
        $this -> db -> from('webtiedot');
        $this -> db -> join('webvalvoja','webvalvoja.id_webvalvoja = webtiedot.id_webvalvoja');
        $this -> db -> where('tunnus', $tunnus);
        $this -> db -> where('salasana', MD5($salasana));
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1) {
          return $query->result();
        } else {
          return false;
        }
    }
}
?>