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
$pdf->SetSubject('Risultati delle Votazioni');

// Aggiungi una pagina
$pdf->AddPage();

// Titolo del documento
$pdf->SetFont('helvetica', 'B', 20);
$pdf->Cell(0, 10, 'Report dei Risultati', 0, 1, 'C');

// Spazio
$pdf->Ln(10);

// Recupera le votazioni dal database
$sql = "SELECT * FROM votazione";
$result_votazione = $connessione->query($sql);

if ($result_votazione->num_rows > 0) {
    while ($row_sondaggio = $result_votazione->fetch_assoc()) {
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, $row_sondaggio['nome'], 0, 1);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Argomento: ' . $row_sondaggio['Argomento'], 0, 1);
    
        $pdf->SetFont('helvetica', '', 12);
        
        $pdf->MultiCell(0, 10, 'Descrizione: ' . $row_sondaggio['descrizione'], 0, 'L', 0, 1);
    
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'voto: ' . $row_sondaggio['numero_voti'], 0, 1);
    
        // Spazio
        $pdf->Ln(10);
    }
    
} else {
    $pdf->Cell(0, 10, 'Nessuna Candidatura disponibile.', 0, 1);
}

// Chiudi la connessione al database
$connessione->close();

// Pulisci il buffer e disabilita l'output buffering
ob_end_clean();

// Output del PDF
$pdf->Output('report_risultatiVotazioni.pdf', 'I'); // 'I' per visualizzare nel browser, 'D' per scaricare
?>
