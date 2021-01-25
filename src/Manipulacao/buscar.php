 <?php
   
    include_once("Manipulacao.php");
    $selectall = new Manipulacao();
    $fetch = array();
    $data = json_decode(file_get_contents("php://input"), true);
    $selectall->setTabela($data["tabela"]);
    if($data["action"]=="selectColumn")
    {
        $campo = $data["campo"];
        $ta = $data["tabela"];
        $ta = lcfirst($ta);
        $result = $selectall->allSelect();
        foreach ($result as $row) {
            $fetch[] = $row["$campo"] . "/" . $row["id$ta"];
        }
    }
    if($data["action"]=="selectCount")
    {
        $_left=explode(",",$data["mes"]);
        if(count($_left)>0)
        {
            foreach($_left as $rows)
            {
                $prov=$data["prov"];
                $tabels=$data["tabela"];
                $result = $selectall->JoinTable($data["tabela"],"count(*) as Res","and month($tabels.datacriacao)=$rows and municipioId=$prov");
                foreach ($result as $row) {
                    $fetch[] = $row;
                }
            }
            
        }
       else
       {
        $result = $selectall->Select(array("month(datacriacao)"=>$rows),"count(*) as Res");
        foreach ($result as $row) {
            $fetch[] = $row;
        }
       }
    }

    echo json_encode($fetch);
