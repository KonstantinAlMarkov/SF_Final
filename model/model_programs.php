<?php
class Model_Programs extends Model
{	   
    //получаем список всех программ
    function getUserPrograms($user_id)
    {
        $sql = "select * from \"finalProject\".programs where owner='".$user_id."'";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);     
        return $result;      
    }

    //получаем список всех программ
    function getAllPrograms()
    {
        $sql = "select * from \"finalProject\".programs";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);     
        return $result;        
    }

    //получаем список программ, на которые подисан вебмастер
    function getAllSubscribedPrograms($user_id)
    {
        $sql = "select * from \"finalProject\".programs pr join
        \"finalProject\".subscriptions sb on pr.program_id = sb.program_id 
        where sb.user_id = '".$user_id."'";
        $stmt = $this->db->query($sql); 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);     
        return $result;        
    }   

    //получаем ULR вебмастера для перехода
    function getWebmasterURL($UserID, $ProgramId)
    {
        $sql = "select * from \"finalProject\".subscriptions where program_id = '$ProgramId' and user_id='$UserID' LIMIT 1";    
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);
            
        if($result['link'])
        {
            return $result['link'];
        }
        else{
            return null;
        }
    }

    //получаем список программ, на которые не подисан вебмастер
    function getAllUnSubscribedPrograms($user_id)
    {
        $sql = "select * from \"finalProject\".programs prg where prg.program_id not in
        (select pr.program_id from \"finalProject\".programs pr join
        \"finalProject\".subscriptions sb on pr.program_id = sb.program_id 
        where sb.user_id = '".$user_id."')";
        $stmt = $this->db->query($sql);    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);      
        return $result;        
    }   

    //получаем данные по программе по её id
    function getProgramById($ProgramId)
    {
        $sql = "select * from \"finalProject\".programs prg where prg.program_id = '".$ProgramId."'";
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);
        return $result;
    }

    //проверяем наличие подписки
    function checkSubsctiption($UserId,$ProgramId){
        $sql = "select * from \"finalProject\".subscriptions where program_id = '".$ProgramId."' and user_id = '".$UserId."'";
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);
        return $result;
    }
}?>