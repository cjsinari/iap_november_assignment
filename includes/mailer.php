<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . 'C:\xampp\htdocs\assignment\vendor\autoload.php';

class Mailer {
    private $mailer;

    public function __construct() {
        $this->mailer = new PHPMailer(true);

        // SMTP Configuration
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'cyrilsinari27@gmail.com'; // Replace with your email
        $this->mailer->Password = 'muguatqfmprdnbww';    // Replace with your email password
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port = 465; // Port 465 for SSL

        // Sender information
        $this->mailer->setFrom('cyilsinari27@gmail.com', 'DIJI');
    }

    public function sendEmail($recipientEmail, $recipientName, $subject, $body) {
        try {
            $this->mailer->addAddress($recipientEmail, $recipientName);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;
            $this->mailer->isHTML(true); // Set email format to HTML

            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            error_log("Email could not be sent. Mailer Error: {$this->mailer->ErrorInfo}");
            return false;
        }
    }
}
?>