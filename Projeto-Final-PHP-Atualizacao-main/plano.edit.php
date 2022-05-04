<?php 
    require_once('config/config.php');

    $service = new PlanoService();

    $id = filter_input(INPUT_POST, 'inputIdentificador', FILTER_SANITIZE_NUMBER_INT);
    $tipo = filter_input(INPUT_POST, 'inputTipo', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, 'inputPreco', FILTER_SANITIZE_SPECIAL_CHARS);
    $info1 = filter_input(INPUT_POST, 'inputInfo1', FILTER_SANITIZE_SPECIAL_CHARS);
    $info2 = filter_input(INPUT_POST, 'inputInfo2', FILTER_SANITIZE_SPECIAL_CHARS);
    $info3 = filter_input(INPUT_POST, 'inputInfo3', FILTER_SANITIZE_SPECIAL_CHARS);
    $info4 = filter_input(INPUT_POST, 'inputInfo4', FILTER_SANITIZE_SPECIAL_CHARS);
    $info5 = filter_input(INPUT_POST, 'inputInfo5', FILTER_SANITIZE_SPECIAL_CHARS);
    $info6 = filter_input(INPUT_POST, 'inputInfo6', FILTER_SANITIZE_SPECIAL_CHARS);
    $info7 = filter_input(INPUT_POST, 'inputInfo7', FILTER_SANITIZE_SPECIAL_CHARS);
    $info8 = filter_input(INPUT_POST, 'inputInfo8', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoriaId = filter_input(INPUT_POST, 'inputCategoria', FILTER_SANITIZE_NUMBER_INT);

    $plano = new Plano();
    $plano->setId($id);
    $plano->setTipo($tipo);
    $plano->setPreco($preco);
    $plano->setInfo1($info1);
    $plano->setInfo2($info2);
    $plano->setInfo3($info3);
    $plano->setInfo4($info4);
    $plano->setInfo5($info5);
    $plano->setInfo6($info6);
    $plano->setInfo7($info7);
    $plano->setInfo8($info8);
    $plano->setCategoriaId($categoriaId);

    if($service->atualizar($plano))
    {
        header('location: ./planos?success=true');
        exit;
    } else {
        $_SESSION['error'] = 'Ocorreu uma falha ao atualizar';
        header('location: ./planos?error=true');
        exit;
    }