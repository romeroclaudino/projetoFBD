<?php

require_once "../../DAO/EstadoDAO.php";
$nome = $_REQUEST['nome'];


echo "<link rel=\"stylesheet\" href=\"../css/sweetalert.css\">
    <script src=\"../js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

if(EstadoDAO::inserir($nome))
{
    echo "<script>
            window.onload =  function (){
                            swal({
                                    title: \"Cadastrado!\",
                                    text: \"Registro cadastrado com sucesso!\",
                                    type: \"success\",
                                    showCancelButton: false,
                                    confirmButtonText: \"Ok\",
                                    closeOnConfirm: true
                                },
                                function(){
                                    window.location.replace('listar.php');
                                });
                            };
          </script>";
}
else
{
        echo "<script>
        window.onload =  function (){
                        swal({
                                title: \"Ops!\",
                                text: \"Não foi possível cadastrar o registro, verifique se o estado já existe ou a sua conexão com o banco!\",
                                type: \"error\",
                                confirmButtonText: \"Ok\",
                                closeOnConfirm: true
                            },
                            function(){
                               window.location.replace('listar.php');                           
                            });
                        };
     </script>";
}