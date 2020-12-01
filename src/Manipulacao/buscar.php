 <?php
    //buscarsded
    include_once("Manipulacao.php");
    $selectall = new Manipulacao();
    $fetch = array();
    $data = json_decode(file_get_contents("php://input"), true);
    $campo = $data["campo"];
    $ta = $data["tabela"];
    $ta = lcfirst($ta);
    $selectall->setTabela($data["tabela"]);
    $result = $selectall->allSelect();
    foreach ($result as $row) {
        $fetch[] = $row["$campo"] . "/" . $row["id$ta"];
    }
    echo json_encode($fetch);
