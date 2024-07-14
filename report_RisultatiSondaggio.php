<?php
// Inizia la sessione
session_start();


if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("location: login_admin.php");
    exit;
}

// Includi il file TCPDF
require_once('TCPDF-main/tcpdf.php');
require_once('config.php'); // Connessione al database

// Creazione di una nuova istanza TCPDF
$pdf = new TCPDF();

// Impostazioni di base del PDF
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sistema Di Voting Online');
$pdf->SetTitle('Report dei Risultati');
$pdf->SetSubject('Risultati dei Sondaggi');

// Aggiungi una pagina
$pdf->AddPage();

// Titolo del documento
$pdf->SetFont('helvetica', 'B', 20);
$pdf->Cell(0, 10, 'Report dei Risultati', 0, 1, 'C');

// Spazio
$pdf->Ln(10);

// Recupera i sondaggi dal database
$sql = "SELECT * FROM sondaggio";
$result_sondaggi = $connessione->query($sql);

if ($result_sondaggi->num_rows > 0) {
    while ($row_sondaggio = $result_sondaggi->fetch_assoc()) {
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, $row_sondaggio['nome'], 0, 1);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Argomento: ' . $row_sondaggio['argomento'], 0, 1);

        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Domanda: ' . $row_sondaggio['domanda'], 0, 1);

        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0,10,'Opzione1: ' .$row_sondaggio['risposta1'],0,1); 
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0,10,'voto: ' .$row_sondaggio['votoR1'],0,1); 

        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0,10,'Opzione2: ' .$row_sondaggio['risposta2'],0,1); 
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0,10,'voto: ' .$row_sondaggio['votoR2'],0,1); 
        
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0,10,'Opzione3: ' .$row_sondaggio['risposta3'],0,1);  
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0,10,'voto: ' .$row_sondaggio['votoR3'],0,1); 
        
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0,10,'Opzione4: ' .$row_sondaggio['risposta4'],0,1);        
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0,10,'voto: ' .$row_sondaggio['votoR4'],0,1); 

        // Spazio
        $pdf->Ln(10);
    }
} else {
    $pdf->Cell(0, 10, 'Nessun sondaggio disponibile.', 0, 1);
}

// Chiudi la connessione al database
$connessione->close();

// Pulisci il buffer e disabilita l'output buffering
ob_end_clean();

// Output del PDF
$pdf->Output('report_risultatiSondaggio.pdf', 'I'); // 'I' per visualizzare nel browser, 'D' per scaricare
?>
