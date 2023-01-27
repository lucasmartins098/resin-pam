<?php
require_once("conexao.php");
session_start();
// if(!isset($_SESSION)) 
// { 
// session_start(); 
// } 
//$idUsuarioTarefa = $_SESSION['IdUsuario'];
//$logado = $_SESSION['logado'];
class Pedido extends Conexao
{
    private $id;
    private $descricaoPedido;
    private $nome;
    private $instagram;
    private $email;
    private $celular;
    private $endereco;
    private $enderecoSecundario;
    private $pais;
    private $estado;
    private $cep;
    private $dataEntregaEstimada;
    private $dataProducaoEstimada;
    private $prioritario;

    function setId($id)
    {
        $this->id = $id;
    }
    function getId()
    {
        return $this->id;
    }

    function setDescricaoPedido($descricaoPedido)
    {
        $this->descricaoPedido = $descricaoPedido;
    }
    function getDescricaoPedido()
    {
        return $this->descricaoPedido;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }
    function getNome()
    {
        return $this->nome;
    }

    function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }
    function getInstagram()
    {
        return $this->instagram;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }
    function getEmail()
    {
        return $this->email;
    }

    function setCelular($celular)
    {
        $this->celular = $celular;
    }
    function getCelular()
    {
        return $this->celular;
    }

    function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    function getEndereco()
    {
        return $this->endereco;
    }

    function setEnderecoSecundario($enderecoSecundario)
    {
        $this->enderecoSecundario = $enderecoSecundario;
    }
    function getEnderecoSecundario()
    {
        return $this->enderecoSecundario;
    }

    function setPais($pais)
    {
        $this->pais = $pais;
    }
    function getPais()
    {
        return $this->pais;
    }

    function setEstado($estado)
    {
        $this->estado = $estado;
    }
    function getEstado()
    {
        return $this->estado;
    }

    function setCep($cep)
    {
        $this->cep = $cep;
    }
    function getCep()
    {
        return $this->cep;
    }

    function setDataEntregaEstimada($dataEntregaEstimada)
    {
        $this->dataEntregaEstimada = $dataEntregaEstimada;
    }
    function getDataEntregaEstimada()
    {
        return $this->dataEntregaEstimada;
    }

    function setDataProducaoEstimada($dataProducaoEstimada)
    {
        $this->dataProducaoEstimada = $dataProducaoEstimada;
    }
    function getDataProducaoEstimada()
    {
        return $this->dataProducaoEstimada;
    }

    function setPrioritario($prioritario)
    {
        $this->prioritario = $prioritario;
    }
    function getPrioritario()
    {
        return $this->prioritario;
    }

    public function cadastrarPedido(Pedido $pedido)
    {
        try {
            $pdo = parent::getDB();
            $stmt2 = $pdo->prepare("INSERT INTO Pedido(descricaoPedido, nome, instagram, email, celular, endereco
            , enderecoSecundario, pais, estado, cep, dataEntregaEstimada, dataProducaoEstimada, prioritario) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $stmt2->bindValue(1, $pedido->getDescricaoPedido());
            $stmt2->bindValue(2, $pedido->getNome());
            $stmt2->bindValue(3, $pedido->getInstagram());
            $stmt2->bindValue(4, $pedido->getEmail());
            $stmt2->bindValue(5, $pedido->getCelular());
            $stmt2->bindValue(6, $pedido->getEndereco());
            $stmt2->bindValue(7, $pedido->getEnderecoSecundario());
            $stmt2->bindValue(8, $pedido->getPais());
            $stmt2->bindValue(9, $pedido->getEstado());
            $stmt2->bindValue(10, $pedido->getCep());
            $stmt2->bindValue(11, $pedido->getDataEntregaEstimada());
            $stmt2->bindValue(12, $pedido->getDataProducaoEstimada());
            $stmt2->bindValue(13, $pedido->getPrioritario());
            $stmt2->execute();
            echo "Pedido inserido com sucesso.";
        } //fim do try
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // public function deletarTarefa()
    // {
    //     try {
    //         $pdo = parent::getDB();
    //         $IdTarefa = $this->getIdTarefa();
    //         $query = $pdo->prepare("DELETE FROM tarefa WHERE IdTarefa = ?");
    //         $query->bindParam(1, $IdTarefa);
    //         $query->execute();

    //         echo "Tarefa excluída com sucesso" . $this->getIdTarefa();
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }

    // public function editarTarefa()
    // {
    //     try {

    //         $idTarefa = $this->getIdTarefa();
    //         $descricao = $this->getDescricao();
    //         $nome = $this->getNome();
    //         $data = $this->getData();
    //         $horario = $this->getHorario();
    //         $favorito = $this->getFavorito();
    //         $realizada = $this->getRealizada();

    //         $pdo = parent::getDB();
    //         $query = $pdo->prepare("UPDATE tarefa set nome = ?, descricao = ?, data = ?, horario = ?, favorito = ?, realizada = ? WHERE IdTarefa = ? ");
    //         $query->bindParam(1, $nome);
    //         $query->bindParam(2, $descricao);
    //         $query->bindParam(3, $data);
    //         $query->bindParam(4, $horario);
    //         if ($favorito != 1) {
    //             $query->bindValue(5, null);
    //         } else {
    //             $query->bindValue(5, true);
    //         }
    //         if ($realizada != 1) {
    //             $query->bindValue(6, null);
    //         } else {
    //             $query->bindValue(6, true);
    //         }
    //         $query->bindParam(7, $idTarefa);
    //         $query->execute();

    //         echo ('Tarefa editada com sucesso');
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }

    public function listarPedidos()
    {
        try {
            $data = array();
            $pdo = parent::getdb();
            $stmt = $pdo->prepare('SELECT * FROM pedido ORDER BY dataEntregaEstimada ASC');
            $stmt->execute();
            while ($row  = $stmt->fetch(PDO::FETCH_OBJ)) {
                $data[] = $row;
                // Retorna um dado em formato JSON
                //$i++;
            }
            //return json_encode($data);

            // Retorna um dado em formato JSON
            echo json_encode($data);
        } catch (pdoexception $e) {
            echo $e->getmessage();
        }
    }

    // public function listarTarefasFavoritas()
    // {
    //     try {
    //         $data = array();
    //         $pdo = parent::getdb();
    //         $idUsuario = $this->getIdUsuario();
    //         $stmt = $pdo->prepare('SELECT idTarefa, nome, descricao, horario, data FROM tarefa WHERE IdUsuario_tarefa = ? AND favorito = true ORDER BY data ASC');
    //         //$stmt->execute(['id' => 1]);
    //         $stmt->bindParam(1, $idUsuario);
    //         $stmt->execute();
    //         while ($row  = $stmt->fetch(PDO::FETCH_OBJ)) {
    //             //$i = 0;
    //             $data[] = $row;
    //             // Retorna um dado em formato JSON
    //             //$i++;
    //         }
    //         //return json_encode($data);

    //         // Retorna um dado em formato JSON
    //         echo json_encode($data);
    //     } catch (pdoexception $e) {
    //         echo $e->getmessage();
    //     }
    // }

    // public function listarTarefasRealizadas()
    // {
    //     try {
    //         $data = array();
    //         $pdo = parent::getdb();
    //         $idUsuario = $this->getIdUsuario();
    //         $stmt = $pdo->prepare('SELECT idTarefa, nome, descricao, horario, data FROM tarefa WHERE IdUsuario_tarefa = ? AND realizada = true ORDER BY data ASC');
    //         //$stmt->execute(['id' => 1]);
    //         $stmt->bindParam(1, $idUsuario);
    //         $stmt->execute();
    //         while ($row  = $stmt->fetch(PDO::FETCH_OBJ)) {
    //             //$i = 0;
    //             $data[] = $row;
    //             // Retorna um dado em formato JSON
    //             //$i++;
    //         }
    //         //return json_encode($data);

    //         // Retorna um dado em formato JSON
    //         echo json_encode($data);
    //     } catch (pdoexception $e) {
    //         echo $e->getmessage();
    //     }
    // }
    // // // // // // // // public function listarusuario()
    // // // // // // // // {
    // // // // // // // // try 
    // // // // // // // // {
    // // // // // // // // $data = array();
    // // // // // // // // $pdo = parent::getdb();
    // // // // // // // // $query = $pdo->prepare("select id, nome from usuario order by nome asc");
    // // // // // // // // while($row  = $query->fetch(pdo::fetch_obj))
    // // // // // // // // {
    // // // // // // // // $data[] = $row;
    // // // // // // // // }
    // // // // // // // // echo json_encode($data);
    // // // // // // // // }
    // // // // // // // // catch(pdoexception $e)
    // // // // // // // // {
    // // // // // // // // echo $e->getmessage();
    // // // // // // // // }
    // // // // // // // // }

    // // public function logar(){
    // // try 
    // // {
    // // $pdo = parent::getDB();

    // // $logar = $pdo->prepare("SELECT nome,login,IdUsuario,token FROM usuario WHERE login = ? AND senha = ?");
    // // $logar->bindValue(1, $this->getLogin());
    // // $logar->bindValue(2, $this->getSenha());
    // // $logar->execute();
    // // if ($logar->rowCount() == 1){
    // // $retorno = array();
    // // $dados = $logar->fetch(PDO::FETCH_OBJ);
    // // $login_Cri = base64_encode($this->getLogin());
    // // $rand = uniqid();
    // // $token = $login_Cri.$rand;
    // // //$_SESSION['nome'] = $dados->admnistrador_nome;
    // // //$_SESSION['logado'] = true;
    // // //$_SESSION['nivel'] = $dados->nivel;
    // // $IdUsuario = $dados->IdUsuario;
    // // $this->setIdUsuario($IdUsuario);
    // // $nomeUsuario = $dados->nome;
    // // $this->setNome($nomeUsuario);
    // // $stmt = $pdo->prepare("UPDATE usuario set token = ? where IdUsuario = ?");
    // // $stmt->bindValue(1, $token);
    // // $stmt->bindValue(2, $this->getIdUsuario());
    // // $stmt->execute();
    // // //echo '{"nome":"Jason Jones", "idade":38, "sexo": "M"}';
    // // $this->setlogado(true);
    // // $_SESSION['logado'] = true;
    // // echo '{"Login": "'.$this->getLogin().'", "Token":"'. $token.'", "Nome":"'.$this->getLogin().'", "IdUsuario":"'.$this->getIdUsuario().'"}';
    // // }
    // // else
    // // {
    // // echo 0;
    // // }
    // // }
    // // catch(PDOException $e)
    // // {
    // // echo $e->getMessage();
    // // }

    // // }

    // //   public function logar(){
    // //       $pdo = parent::getDB();

    // //       /*faço meu select com o banco de dados já criado*/
    // //       $logar = $pdo->prepare ("SELECT * FROM usuario WHERE login = ? AND senha = ?");
    // //       $logar->bindValue(1, $this->getLogin());
    // //       $logar->bindValue(2, $this->getSenha());
    // //       $logar->execute();
    // //       if ($logar->rowCount()== 1):
    // //           $dados = $logar->fetch(PDO::FETCH_OBJ);

    // //           /*neste ponto informo a tabela que contem o dados do usuário*/
    // //           $_SESSION['usuario'] = $dados->nome;
    // //           $_SESSION['id_usuario'] = $dados->id_usuario;
    // //           /*Aqui informo se o mesmo se encontra logado*/
    // //           $_SESSION['logado'] = true;


    // //           return true;
    // //       else:
    // //           return false;
    // //       endif;
    // //   }


    // //   public static function deslogar(){
    // //       if(isset($_SESSION['logado']))
    // // {
    // //           unset($_SESSION['logado']);
    // //           session_destroy();
    // //           header("http://localhost/oracao/index.php");
    // // }
    // //   }


    // // public function cadastrarUsuario($email,$nome,$senha,$login)
    // // {
    // // 	$pdo = parent::getDB();

    // //         /*faço meu select com o banco de dados já criado*/
    // //         $duplicidadeLogin = $pdo->prepare ("SELECT * FROM usuario WHERE login = ?");
    // //         $duplicidadeLogin->bindValue(1, $login);
    // //         $duplicidadeLogin->execute();
    // //         if ($duplicidadeLogin->rowCount()>= 1)
    // // 	{              
    // // 		echo "<div class='container'><div class='alert alert-danger' role='alert'>
    // // 				Usuário já existe!
    // // 			  </div></div>";

    // // 	}
    // //  		  else  /*faço insert no banco*/
    // //   {
    // // 	$inserir = $pdo->prepare("insert usuario(nome,login,email,senha) values(?,?,?,?)");
    // //         $inserir->bindValue(1, $nome);
    // //         $inserir->bindValue(2, $login);
    // // 	$inserir->bindValue(3, $email);
    // //         $inserir->bindValue(4, $senha);
    // //         $inserir->execute();
    // // 	echo "<div class='container'>
    // // 			<div class='alert alert-success' role='alert'>
    // // 				Usuário cadastrado com sucesso!
    // // 			</div>
    // // 		</div>";
    // //   }		
    // // }


}
