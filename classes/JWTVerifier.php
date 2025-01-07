<?php

class JWTVerifier {
    private string $secret;

    public function __construct(string $secret) {
        $this->secret = $secret;
    }

    private function base64UrlDecode(string $data): string {
        return base64_decode(strtr($data, '-_', '+/'));
    }

    public function verify(string $jwt): mixed {
        // Split the JWT
        [$headerEncoded, $payloadEncoded, $signatureEncoded] = explode('.', $jwt);

        // Recreate signature
        $signature = $this->base64UrlDecode($signatureEncoded);
        $validSignature = hash_hmac('sha256', "$headerEncoded.$payloadEncoded", $this->secret, true);

        // Verify signature
        if (!hash_equals($signature, $validSignature)) {
            return false;
        }

        // Decode payload and check expiration
        $payload = json_decode($this->base64UrlDecode($payloadEncoded), true);
        if (isset($payload['exp']) && $payload['exp'] < time()) {
            return false; // Token is expired
        }

        return $payload; // Return decoded payload if valid
    }
}
