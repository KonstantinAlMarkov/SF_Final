<?php
class Model_TransactionCore extends Model
{	   
    //проверям подписку и активность вебмастера
    function checkSubscription($User_id,$Program_id)
    {
        // проверяем, не существует ли пользователя с таким именем
        $sql = "select * from \"finalProject\".subscriptions sb
        join \"finalProject\".users us on sb.user_id = us.user_id
        where sb.user_id = '$User_id' and sb.program_id = '$Program_id' LIMIT 1";
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);      

        if($result['subsription_id'] && strcasecmp($result['user_status'],"active")==0)
        { 
            return $result['subsription_id'];
        } 
        else 
        {
            return false;
        }   
    }    
    //получаем цену перехода по программе
    function getProgramPrice($Program_id)
    {
        // проверяем, не существует ли пользователя с таким именем
        $sql = "select price from \"finalProject\".programs where program_id = '$Program_id' LIMIT 1";      
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);      

        if($result['price'])
        { 
            return $result['price'];
        } 
        else 
        {
            return null;
        }   
    }

    //получаем id клиента
    function getProgramOwner($Program_id)
    {
        // проверяем, не существует ли пользователя с таким именем
        $sql = "select owner from \"finalProject\".programs where program_id = '$Program_id' LIMIT 1";      
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);      

        if($result['owner'])
        { 
            return $result['owner'];
        } 
        else 
        {
            return null;
        }   
    }   

    //получаем % из записи клиента
    function getClientTax($User_id)
    {
        // проверяем, не существует ли пользователя с таким именем
        $sql = "select persent from \"finalProject\".users where user_id = '$User_id' LIMIT 1";      
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);      

        if($result['persent'])
        { 
            return $result['persent'];
        } 
        else 
        {
            return null;
        }  
    }

    //создаём транзакцию
    function createTransaction($Subscription_id, $Date, $Price, $Reward)
    {
        $sql = "insert into \"finalProject\".transactions(subsription_id,append_date,price, tax) 
        values ('".$Subscription_id."', '".$Date."', '".$Price."', '".$Reward."');";   
        $result =  $this->db->exec($sql);
    }

    //создаём запись о мошенничестве
    function createFraud($Webmaser_id, $Program_id, $Date)
    {
        $sql = "insert into \"finalProject\".frauds(program_id,webmaster_id,append_date) 
        values ('".$Program_id."', '".$Webmaser_id."', '".$Date."');"; 
        $result =  $this->db->exec($sql);
    }

    //получаем все URL
    function getAllUrls(){
        $sql = "select link from \"finalProject\".subscriptions";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);     
        return $result;
    }

    //изменяем статус пользователя
    function updateWallet($User_id, $WebmasterReward)
    {
        //получаем текущее значение
        $sql = "select wallet from \"finalProject\".users
        WHERE user_id='".$User_id."'";        
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);
        $currentWalletValue=$result['wallet'];
        //обновляем
        $sql = "update \"finalProject\".users
        SET wallet=".((float)$currentWalletValue+$WebmasterReward)."
        WHERE user_id='".$User_id."'";
        $result =  $this->db->exec($sql);
        return true;
    }
}?>