 <?php
    include_once("dbClass.php");
    class Manipulacao extends dbclass
    {
        protected $query;
        protected $tabela;
        protected $campo;
        protected $dados;
        protected $msg;
        public function setValor($val)
        {
            $this->valorNaTabela = $val;
        }
        public function setTabela($tbl)
        {
            $this->tabela = $tbl;
        }
        public function setCampo($campo)
        {
            $this->campo = $campo;
        }
        public function getMsg()
        {
            return $this->msg;
        }
        public function setValorNaTabela($val)
        {
            $this->valorNaTabela = $val;
        }
        public function setValorPesquisa($pesq)
        {
            $this->valorPesquisa = $pesq;
        }
        public function setDados($dados)
        {
            $this->dados = $dados;
        }


        public function read()
        {
            $this->query = "select*from $this->tabela where $this->valorNaTabela=$this->valorPesquisa";
            $result = self::ExecuteQuery($this->query);
            return $result;
        }
        public function Login(array $dados)
        {
            session_start();
            $msg = array();
            $data = array();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $val = self::foreach($dados, '=', 'and');
                $result = self::ExecuteQuery("SELECT * FROM {$this->tabela}  WHERE {$val}");
                foreach ($result as $row) {
                    $data[] = $row;
                }
                $count = count($data);
                if ($count >= 1) {
                    $msg = array('data' => $data, 'message' => 1);
                } else {
                    $msg = array('erro' => 'Nome da Provincia Incorreto', 'message' => 0);
                }
            }
            return $msg;
        }
        public function  foreach(array $dados, $in, $on)
        {

            foreach ($dados as $ind => $val) {
                $campos[] = " {$ind} {$in} '{$val}' ";
            }
            $campos = implode('' . $on . '', $campos);
            return str_replace('and tabela=""', "", $campos);
        }
        public function setNomeProcedimento($procedimento)
        {
            $this->procedimento = $procedimento;
        }

        public function Upload()
        {
            $response = array();
            $upload_dir = '../uploads/';
            $dados = $_FILES['imagem'];
            $rslt = null;
            //$countfiles = count($dados['name']);
            $avatar_name = $dados["name"];
            $avatar_tmp_name = $dados["tmp_name"];
            $error = $dados["error"];
            //for ($i = 0; $i < $countfiles; $i++) {
            if ($error > 0) {
                $response = array("status" => "error", "error" => true, "message" => "Error ao fazer upload do ficheiro!");
            } else {
                $random_name = rand(1000, 1000000) . "-" . $avatar_name;
                $upload_name = $upload_dir . strtolower($random_name);
                $upload_name = preg_replace('/\s+/', '-', $upload_name);
                if (move_uploaded_file($avatar_tmp_name, $upload_name)) {
                    $response = array(
                        "status" => "success",
                        "error" => false,
                        "message" => "Upload efectuado com success ",
                        "url" => $upload_name
                    );
                } else {
                    $response = array(
                        "status" => "error",
                        "error" => true,
                        "message" => "Error ao fazer upload do ficheiro!"
                    );
                }
            }
            // }
            return $response;
        }

        //Metodo Responsavel Por Executar os Procedimento
        public function Procedure()
        {
            $this->query = "Call $this->procedimento($this->dados)";
            if (self::ExecuteQuery($this->query)) {
                $this->msg = "O procedimento {$this->procedimento} Foi Executado Com Sucesso...";
            }
        }
        //Metodo Responsavel Por Remover
        public function Remover()
        {
            $this->query = "DELETE from $this->tabela where $this->valorNaTabela='$this->valorPesquisa'";
            if (self::ExecuteQuery($this->query)) {
                $this->msg = "Dados Deletado com sucesso...";
            }
        }
        public function showField($table)
        {
            $this->query = "SHOW COLUMNS FROM $table";
            $result = self::ExecuteQuery($this->query);
            foreach ($result as $results) {
                $field[] = $results["Field"];
            }
            return  $field;
        }        //Metodo Responsavel Por Alterar os dados de uma tabela
        function SelectJoin($condicao)
        {

            $result = self::showField($this->tabela);
            $table = "";
            $tables = "";
            $tableFull = "";
            $fields = "";
            $join = array();
            for ($r = 0; $r < count($result); $r++) {
                $fields .= $this->tabela . "." . $result[$r] . " as " . $result[$r] . "_" . strrev(substr(strrev($this->tabela), 4)) . ",";
                if ($result[$r] != "id$this->tabela") {

                    if (strpos($result[$r], "id") || strpos($result[$r], "Id")) {
                        $tbname = str_split($result[$r]);
                        $tam = strlen($result[$r]);
                        $tam = $tam - 2;
                        for ($y = 0; $y < $tam; $y++)
                            $table .= "$tbname[$y]";
                        $join[] = $table . "." . "id" . $table . " =" . $this->tabela . "." . $table . "id";
                        $tableFull .= "$this->tabela";
                        $results = self::showField($table);
                        for ($rs = 0; $rs < count($results); $rs++) {
                            $fields .= $table . "." . $results[$rs] . " as " .  $results[$rs] . "_" . strrev(substr(strrev($table), 4)) . ",";
                            if ($results[$rs] != "id$table") {

                                if (strpos($results[$rs], "id") || strpos($results[$rs], "Id")) {
                                    $tbnames = str_split($results[$rs]);
                                    $tams = strlen($results[$rs]);
                                    $tams = $tams - 2;
                                    for ($ys = 0; $ys < $tams; $ys++)
                                        $tables .= "$tbnames[$ys]";
                                    $join[] = $tables . "." . "id" . $tables . "=" . $table . "." . $tables . "id";
                                    if (!strpos($tableFull, $table)) {
                                        $tableFull .= ",$table";
                                    }
                                    $resultss =  self::showField($tables);
                                    for ($rss = 0; $rss < count($resultss); $rss++) {
                                        $fields .= $tables . " . " . $resultss[$rss] . " as " .  $resultss[$rss] . "_" . strrev(substr(strrev($tables), 4)) . ",";
                                    }
                                    if (!strpos($tableFull, $tables)) {
                                        $tableFull .= ",$tables";
                                    }
                                } else {
                                    if (!strpos($tableFull, $table)) {
                                        $tableFull .= ",$table";
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $join = implode(" and ",  $join);
            $fields .= "$fields,";
            $fields = str_replace(",,", "", $fields);
            if ($condicao != "")
                $result = self::ExecuteQuery("SELECT {$fields} from {$tableFull} where {$join} and {$condicao}");
            else
                $result = self::ExecuteQuery("SELECT {$fields} from {$tableFull} where {$join} ");

            return $result;
        }
        function allSelect()
        {
            $this->query = "SELECT*FROM $this->tabela";
            $result = self::ExecuteQuery($this->query);
            return $result;
        }
        function Select(array $dados)
        {
            foreach ($dados as $ind => $val) {
                $campos[] = " {$ind} like '%{$val}%' ";
            }
            $campos = implode('or', $campos);

            $this->query = "SELECT*FROM $this->tabela where {$campos}";
            $result = self::ExecuteQuery($this->query);
            return $result;
        }
        //Metodo Responsavel Pela Verificacao
        public function isAlreadyExist()
        {
            $this->query = "SELECT*FROM $this->tabela  WHERE $this->valorNaTabela=$this->valorPesquisa ";
            $resultado = mysqli_query($this->conexao, $this->query);
            $result = mysqli_fetch_assoc($resultado);
            if ($result > 0) {
                return true;
            } else {
                return false;
            }
        }


        public function insert(array $dados)
        {
            foreach ($dados as $ind => $val) {
                $campos[] = "{$ind}";
                $d[] = "'{$val}'";
            }
            $campos = implode(',', $campos);
            $d = implode(',', $d);
            // $valores = "'".implode("','", array_values($dados))."'";
            $this->query = ("INSERT INTO {$this->tabela} ({$campos}) values ({$d})");
            if (self::ExecuteQuery($this->query)) {
                $return = "dados Cadastrado com sucesso";
            } else {
                $return = "dados nao Cadastrado   sucesso";
            }
            return $return;
        }
        public function update(array $dados, $where)
        {
            foreach ($dados as $ind => $val) {
                $campos[] = " {$ind} = '{$val}' ";
            }
            $campos = implode(',', $campos);
            $this->query = "UPDATE {$this->tabela} SET {$campos} where $this->valorNaTabela={$where}";
            if (self::ExecuteQuery($this->query)) {
                $return = 1;
            } else {
                $return = 0;
            }

            return $return;
        }
        // Metodo responsavel por criar as tabela 

        public function newTable()
        {
            $this->query = "SHOW Databases";
            $db_consulta = self::ExecuteQuery($this->query);
            while ($db_linha = mysqli_fetch_row($db_consulta)) {
                $dbs[] = $db_linha[0];
            }
            if (!in_array("project", $dbs)) {
                $this->query = "create database project";
                self::ExecuteQuery($this->query);
                return true;
            } else {
                $this->query = "SHOW Tables";
                $tb_consulta = self::ExecuteQuery($this->query);
                while ($tb_linha = mysqli_fetch_row($tb_consulta)) {
                    $tbs[] = $tb_linha[0];
                }
                if (!in_array($this->tabela, $tbs)) {
                    $this->query = "CREATE TABLE $this->tabela($this->campo)";
                    self::ExecuteQuery($this->query);
                    return true;
                } else {
                    return false;
                }
                return false;
            }
        }
        public function Othercounts($var)
        {
            $this->query = "SELECT count(*) as Res FROM $var";
            $result = self::ExecuteQuery($this->query);
            foreach ($result as $res)
                return $res["Res"];
        }
        public function counts()
        {
            $this->query = "SELECT count(*) as Res FROM $this->tabela";
            $result = self::ExecuteQuery($this->query);
            return $result;
        }
        //Metodo Responsavel Pela a execução das query
        function ExecuteQuery($query)
        {
            $this->qry = mysqli_query($this->conexao, $query) or die("erro" . mysqli_error($this->conexao));
            return $this->qry;
        }
    }
    //$var = new Manipulacao();
    //$var->setTabela("pontoturistico");
    //$var->SelectJoin();
    //Manipulacaoclass 
    ?>