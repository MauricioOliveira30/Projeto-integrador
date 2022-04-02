<?php
namespace app\controllers;
use app\core\Controller;
use app\models\Aluno;

class AlunoController extends Controller{
    
   public function index(){

      //instância do Model criada
        $objAluno = new Aluno();
        $dados["lista"] = $objAluno->lista();
        $dados["view"] = "Aluno/indexaluno";
         //echo "<pre>";
         //print_r($dados);
         //exit;
         $this->load("template",$dados);
       
   } 

   public function edit($id){
      $objAluno = new Aluno();
      $dados["Aluno"] = $objAluno->getAluno($id);
      $dados["view"] = "aluno/Create";
      //echo "<pre>";
      //print_r($dados);
      //exit;

      $this->load("template",$dados);

   }

   //Criar método create
   public function create(){
      $dados["view"] = "aluno/Create";
      $this->load("template",$dados);
       
   }

   public function salvar(){
    
      $objAluno = new Aluno();
      $Aluno = new \stdClass();
      $Aluno->nome         = $_POST["aluno"];
      $Aluno->nome         = $_POST["matricula"];
      $Aluno->nome         = $_POST["turma"];
      
      $Aluno->idaluno     =($_POST["idaluno"]) ? $_POST["idaluno"] : NULL;
      


      if($Aluno->idaluno) {

            //cchamar método do objAluno
            $objAluno->editar($Aluno);
           } else {
         $objAluno->inserir($Aluno);
      }
     header("location:".URL_BASE."aluno");
         

   }
  
   public function excluir($id){
      $objAluno = new Aluno();
      $objAluno->excluir($id);
      header("location:".URL_BASE."aluno");


   }

}
