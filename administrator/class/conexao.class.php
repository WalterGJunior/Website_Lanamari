<?php
class conexao
{

    /*
        Altere as variaveis a seguir caso necessario
    */

    private $db_host = 'localhost'; // servidor
    private $db_user = 'wgjrc817_user'; // usuario do banco
    private $db_pass = '7ThKs)=S[N(B'; // senha do usuario do banco
    private $db_name = 'wgjrc817_db_lanamari'; // nome do banco

    private $con = false;

   
    public function connect() // estabelece conexao
    {
        if(!$this->con)
        {
            $myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);
            if($myconn)
            {
                $seldb = @mysql_select_db($this->db_name,$myconn);
                if($seldb)
                {
                    $this->con = true;
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }
    }

   
    public function disconnect() // fecha conexao
    {
    if($this->con)
    {
        if(@mysql_close())
        {
                        $this->con = false;
            return true;
        }
        else
        {
            return false;
        }
    }
    }
      
}

?>