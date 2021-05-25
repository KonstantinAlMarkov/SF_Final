<?php
class Model_Balance extends Model
{	   
    //Проверям, существует ли пользователь
    function getBalance(string $User_id)
	{
        // проверяем, не существует ли пользователя с таким именем
        $sql = "select wallet from \"finalProject\".users where user_id = '$User_id' LIMIT 1";      
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);
        return $result['wallet'];  
    }
}?>