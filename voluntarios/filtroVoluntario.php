<?php

    $causas = $_GET['causas'];
    $estado = $_GET['estados'];
    $cidade = $_GET['cidades'];

   
        $conexao = Conexao :: conectar(); {
            // Verificar se todos os filtros estão vazios
            if (empty($causas) && empty($estado) && empty($cidade)) 
            {
                $querySelect = "SELECT codVoluntario, nomeVoluntario, descVoluntario, emailVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, fotoVoluntario FROM tbVoluntario";
                $resultado = $conexao -> query($querySelect);
                $lista = $resultado -> fetchAll();
                return $lista;
            } 
            else 
            {
                // Consulta com os filtros informados
                $sql = "SELECT * FROM tabela WHERE 1=1"; // Usamos "WHERE 1=1" para facilitar a adição de cláusulas na consulta
            
                if (!empty($filtro1)) 
                {
                    $sql .= " AND campo1 = :filtro1";
                }
            
                if (!empty($filtro2)) 
                {
                    $sql .= " AND campo2 = :filtro2";
                }
            
                if (!empty($filtro3)) 
                {
                    $sql .= " AND campo3 = :filtro3";
                }
            }
        
        // Executar a consulta no banco de dados
        $stmt = $pdo->prepare($sql);
        if (!empty($filtro1)) {
            $stmt->bindParam(':filtro1', $filtro1);
        }
        if (!empty($filtro2)) {
            $stmt->bindParam(':filtro2', $filtro2);
        }
        if (!empty($filtro3)) {
            $stmt->bindParam(':filtro3', $filtro3);
        }
        $stmt->execute();
        
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Processar os resultados e exibir na página
        foreach ($resultados as $resultado) {
            // Exibir os resultados conforme necessário
        }
    }
