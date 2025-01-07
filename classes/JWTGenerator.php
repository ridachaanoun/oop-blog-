<?php

class JWTGenerator {
    private string $secret;

    public function __construct(string $secret) {
        $this->secret = $secret;
    }

    private function base64UrlEncode(string $data): string {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function create(array $header, array $payload): string {
        // Encode header and payload
        $headerEncoded = $this->base64UrlEncode(json_encode($header));
        $payloadEncoded = $this->base64UrlEncode(json_encode($payload));

        // Create signature
        $signature = hash_hmac('sha256', "$headerEncoded.$payloadEncoded", $this->secret, true);
        $signatureEncoded = $this->base64UrlEncode($signature);

        // Combine all parts
        return "$headerEncoded.$payloadEncoded.$signatureEncoded";
    }
}
