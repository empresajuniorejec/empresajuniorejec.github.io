<?php
if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['duvida'])) {
    //Incluir o arquivo com a classe de geração de PDF
    include 'pdf/mpdf.php';

    $html = file_get_contents('model.html');


    $html = str_replace('{NomeProfessor}', $_POST['nome'], $html);
    $html = str_replace('{EmailProfessor}', $_POST['email'], $html);
    $html = str_replace('{TelefoneProfessor}', $_POST['telefone'], $html);
    $html = str_replace('{DuvidaProfessor}', $_POST['duvida'], $html);

    $arquivo = "Exemplo03.pdf";

    $mpdf = new mPDF();
    $mpdf->WriteHTML($html);
    /*
     * F - salva o arquivo NO SERVIDOR
     * I - abre no navegador E NÃO SALVA
     * D - chama o prompt E SALVA NO CLIENTE
     */

    $mpdf->Output($arquivo, 'I');

    echo "PDF GERADO COM SUCESSO";
    
    echo '<meta http-equiv="refresh" content="0;url=index.html" />';
}

?>


