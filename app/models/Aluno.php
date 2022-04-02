<?php
namespace app\models;
use app\core\Model;

class Aluno extends Model{

    public function lista(){
        //instrução SQL
        $sql = "SELECT * FROM tblaluno";

        $qry = $this->db->query($sql);

        //precisamos passar um retorno
        return $qry->fetchAll(\PDO::FETCH_OBJ);

        /*O que faz o comando fetchAll?
        transforma uma matriz contendo todas as linhas restantes no conjunto de resultados.
        A matriz representa cada linha como uma matriz de valores de coluna ou um objeto com propriedades
        correspondentes a cada nome de coluna.
         Uma matriz vazia é retornada se houver zero resultados na busca.
         */
          
    }

    public function inserir($aluno){
        $sql = " INSERT INTO tblaluno set
        aluno =:aluno,
        matricula =:matricula,
        turma=:turma
      ";

        $qry=$this->db->prepare($sql);

        $qry->bindValue(":aluno", $aluno->aluno);
        $qry->bindValue(":matricula", $aluno->matricula);
        $qry->bindValue(":turma", $aluno->turma);
        
        $qry->execute();

        return $this->db->lastInsertId();
       
    }

    public function getaluno($id){
        $sql = "SELECT * FROM tblaluno where idaluno = $id";
        $qry = $this->db->query($sql);
        return $qry->fetch(\PDO::FETCH_OBJ);
    }

    public function editar($id){
        $sql = " UPDATE tblaluno set
        aluno =:aluno,
        matricula =:matricula,
        turma=:turma,
        
        where idaluno =:id
      ";

        $qry=$this->db->prepare($sql);

        $qry->bindValue(":nome", $aluno->aluno);
        $qry->bindValue(":matricula", $aluno->matricula);
        $qry->bindValue(":turma", $aluno->turma);
        ;
        $qry->execute();

        return $aluno->idaluno;
       
    }

    public function excluir($id){
        $sql = "DELETE FROM tblaluno where idaluno = $id";
        $qry = $this->db->query($sql);
    }


    

}