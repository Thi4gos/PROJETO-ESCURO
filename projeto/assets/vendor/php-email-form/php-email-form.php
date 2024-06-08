<?php
class PHP_Email_Form {
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $smtp = [];
    public $messages = [];
    public $ajax = false;

    public function add_message($message, $label = '', $priority = 0) {
        $this->messages[] = [
            'message' => $message,
            'label' => $label,
            'priority' => $priority
        ];
    }

    private function build_message() {
        $message = "";
        foreach ($this->messages as $msg) {
            if (!empty($msg['label'])) {
                $message .= $msg['label'] . ": " . $msg['message'] . "\n";
            } else {
                $message .= $msg['message'] . "\n";
            }
        }
        return $message;
    }

    public function send() {
        $headers = "From: " . $this->from_name . " <" . $this->from_email . ">\r\n";
        $headers .= "Reply-To: " . $this->from_email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $message = $this->build_message();

        // Sending email using PHP's mail() function
        if (mail($this->to, $this->subject, $message, $headers)) {
            return json_encode(['status' => 'success', 'message' => 'Email sent successfully.']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Email sending failed.']);
        }
    }
}
