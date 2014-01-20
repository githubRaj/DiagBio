<?php
	// Get Details to be Included in The E-mail.
	$to = $_POST['toEmail'];
	$orgname = utf8_encode(htmlentities($_POST['orgname'], ENT_QUOTES, "UTF-8"));
	$additionalInformation = utf8_encode(htmlentities($_POST['information'], ENT_QUOTES, "UTF-8"));
	$reportId = $_POST['reportID'];

	// E-mail Subject.
	$subject = 'Invitation a l\'evaluation de votre entreprise.';

	// E-mail Header Information.
	$headers = "From: " . "quebio@quebio.ca" . "\r\n";
	$headers .= "Reply-To: ". "quebio@quebio.ca" . "\r\n";
	$headers .= "CC: Quebio\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=utf-8\r\n";

	// E-mail Body With Information Appended.
	$message = '<html><body>';
	$message .= '<img src="http://quebio.ca/sites/default/files/QueBio-logo-harfand-orange_s.png" alt="Invitation d\'evalution de votre entreprise." />';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	$message .= "<tr style='background: #eee;'><td><strong>Nom de l'entreprise:</strong> </td><td>" . $orgname . "</td></tr>";
	$message .= "<tr><td><strong>Lien de l'Evaluation:</strong> </td><td>" . "<a href='http://quebio.ca/entreprisebio?reportid=" . $reportId . "'>Appuyer Ici</a>" . "</td></tr>";
	$message .= "<tr><td><strong>Enregistrement d'un nouveau compte:</strong> </td><td>" . "<a href='http://quebio.ca/entreprisebio/#tab3'>Appuyer Ici</a>" . "</td></tr>";
	$message .= "<tr><td><strong>Additional Information:</strong> </td><td>" . $additionalInformation . "</td></tr>";
	$message .= "</table>";
	$message .= "</body></html>";

	// Send E-mail.
	$email = mail($to, $subject, $message, $headers);

	if ($email)
		echo "Les invitations ont été envoyées avec succès.";
	else
		echo "Une erreur s'est produite (Vérifier le format des adresses courriels).";
?>