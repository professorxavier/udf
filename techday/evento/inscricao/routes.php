<?php

require __DIR__ . '/db.php';

if (resolve('/evento/inscricao')) {
    $aluno = $all('inscritos', 'INNER JOIN curso ON inscritos.idcurso = curso.idcurso where ativo = 1');
    
    render('evento/inscricao/index', 'evento', ['aluno' => $aluno]);

} else if(resolve('/evento/inscricao/create')) {
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $create('inscritos');
        return header('location:/evento/inscricao');
    }
    $cursos = $findDinamic('curso');
    
    render('evento/inscricao/create', 'evento', ['cursos' => $cursos]);

} else if ($params = resolve('/evento/inscricao/(\d+)')) {
    $inscrito = $find('inscritos', 'inscritos.created,inscritos.modified', 'INNER JOIN curso ON inscritos.idcurso = curso.idcurso', 'inscrito_id', $params[1]);

    render('evento/inscricao/view', 'evento', ['inscrito' => $inscrito]);
} else if ($params = resolve('/evento/inscricao/(\d+)/edit')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $edit('inscritos',$params[1]);
        return header('location:/evento/inscricao/'.$params[1]);
    }
    $inscrito = $find('inscritos', 'inscritos.created,inscritos.modified', 'INNER JOIN curso ON inscritos.idcurso = curso.idcurso', 'inscrito_id', $params[1]);
    $cursos = $findDinamic('curso');

    render('evento/inscricao/edit', 'evento', ['cursos' => $cursos, 'inscrito' => $inscrito]);

} else if($params = resolve('/evento/inscricao/(\d+)/delete')) {
    $inscrito = $delete('inscritos',$params[1]);
    return header('location: /evento/inscricao');
}

?>