<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \Ephenodrom\Exceptions\RestExecutionException;

class CertificateWorkflowTest extends TestCase
{

    private $provider;

    /**
     * This csr will be processed normally
     */
    public $csr = "-----BEGIN CERTIFICATE REQUEST-----
        MIICoTCCAYkCAQAwXDELMAkGA1UEBhMCREUxEzARBgNVBAgMClNvbWUtU3RhdGUx
        ITAfBgNVBAoMGEludGVybmV0IFdpZGdpdHMgUHR5IEx0ZDEVMBMGA1UEAwwMZGVt
        by1zc2wuY29tMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA09hv55co
        cc569Cs0FV4RoAeU8UOrh637GOTvnWkz/Y5xhBGjPEVLVG+loDimSWDP2lE8lxe7
        xhdZH4+6bApig8iHcjm5hwQzENqdl5EeGZJPoJGuTl/owC26D2rtksDvlhpy0oIL
        T6CKzpY4HyDCpjxKhKNwIathvOpxq9hDySJnIIm/BSgx8wy5xqnOrBo3JBjHFZ8U
        VvcFber1guPNrc94tRBx703/463tUhiQYDRc+MYllQxJkS84b3x/J8UbrOTew45z
        ejZZtbqS2uX+5GfqoU18qKAfyHgVVopSs5GcWw75NVExTfYor7f7adBEyL+3Ac3X
        Bmzrba/KNA0/2wIDAQABoAAwDQYJKoZIhvcNAQELBQADggEBAEQInI/jMF45Ksge
        Ke3np8s1L9uc46YtT+IkAz3amj241wRvgcKL/9i99xFq7c6F8NdjA/yJD02rsMUw
        gy5BVD17rumoCDmN7Z4zCGQnSX4km5453NGjmSeU2HMZD3HJn+DOSN5YEITBVLbl
        4tPL4sTvqagW/IM/RIkdfN9IYE6Yo2gTrvtJWuEdfGdN3/BkT741Toy5OOoK0fUM
        BzbuRvAjjVMGSRMiW6IMKyQykngQDqncCctmOytIjmsLkTOCnvkg3cRxX9/P0knQ
        vBdf513qeeWJw4LxWxB+oiIla9994RHBALDrHxQvwYMiT6egLBigMxB3oRDjrfUK
        JVIXirA=
        -----END CERTIFICATE REQUEST-----";

    /**
     * This csr triggers the system to stop processing, so the running job can be canceled
     */
    public $csrCanceltest = "-----BEGIN CERTIFICATE REQUEST-----
        MIICvzCCAacCAQAwejELMAkGA1UEBhMCREUxCzAJBgNVBAgMAkJZMRQwEgYDVQQH
        DAtNdXN0ZXJzdGFkdDEUMBIGA1UECgwLTXVzdGVyZmlybWExGDAWBgNVBAsMD011
        c3RlcmFidGVpbHVuZzEYMBYGA1UEAwwPZGVtby1jYW5jZWwuY29tMIIBIjANBgkq
        hkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAytw4xxuIW4U/8GEiJI4l50ky+AY49Tng
        PG9UDlSWDvC9Yv+5f3/gZOHkYRlLCVRH8E9dH949Tz1+njMu3zxeu//TrsRQit4i
        2DvS795DhE4UV0wF47VyBmFW/PrQM/wjMeTnqG2NK6yMkGFUDeBTV/BHh/KMUBRQ
        FNH9TDOwYZwAkjwrzb6nMngChUbxuQKhkbbWDOkhaBmwCnhl8PhRiWyHJFzUwb90
        on2rOK5ZXfOA3I2T3dg8VNwGKw1agzS4nBt0skq5JCPxOXwSnVi1vCi7KrS6Cb9c
        iSNMaVN+OpcKyB8ThSxo895syYMFKf7OSsBDv3lh2tDeMR6Gb0fGSQIDAQABoAAw
        DQYJKoZIhvcNAQELBQADggEBAB3uKAqQLMH9PwgCnuaYI7tCzyloMM8Z7pa2ZpX1
        9bCWvBz8AuGqlwLn5oxbWCMH8FA/t8bodvsYFw7qS+Jza6eN/Z73ZEVB6Z2lE+eC
        54t+QqWoIVuZ4Iop5oqyGSsejIbtfwARytnq1ot5znFx/RrKe6Dg2dzelD7m1tk/
        p2zK1omgDSwOFSTSReWHMdw/pkilkBSMxAe+bTbimkdTSHk2HZXW+hOZKPHiG/XO
        4QeLsMz3abubO9yF7J0x/0RDZP0MLr+Z6IE/ajWFn4xo8tPbPJFd59PnhumS58YN
        7DufNJJVPuTWacAPV6GmTQXpSo/IfH884q7gc0HgGIoP3vc=
        -----END CERTIFICATE REQUEST-----";

    /**
     * This csr will trigger the system to fail before sending data to the ca.
     */
    public $csrInitialFail = "-----BEGIN CERTIFICATE REQUEST-----
        MIICwjCCAaoCAQAwfTELMAkGA1UEBhMCREUxCzAJBgNVBAgMAkJZMRQwEgYDVQQH
        DAtNdXN0ZXJzdGFkdDEUMBIGA1UECgwLTXVzdGVyZmlybWExGDAWBgNVBAsMD011
        c3RlcmFidGVpbHVuZzEbMBkGA1UEAwwSZGVtby1pbml0LWZhaWwuY29tMIIBIjAN
        BgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwlG7eC0gKXrGD+iCit9+AqjClbmc
        3tLXJs79PNai/VEP2HR528SE/EjZyGC/6LFypgQcsNbPYsrsgJ38ZZB1SYD6rEF1
        uBu8hdBjnoXrKww6L2hT0lpJ1Ed1Ve47DxyptKA0YRZwSDmiIIobJb76T9yhhw6a
        ZZf9DOLuT7XSeFk+kFu4XhRTMda2bQkNUPeqmeEOO94lQfUFI80xDWjdp0TFT/3Z
        Edix81b1eN4gA5NQps3Rxs/aKQd3Az2r4HVzxrVxcQzRHI54gGueh+yvCqZAc/0x
        nEhItDgtFCZwjzDwoo1ejgxSBKb+N1BM9a46O3eOuP1DHb9nVtQDcx7INwIDAQAB
        oAAwDQYJKoZIhvcNAQELBQADggEBACEVTav/4aHKZgRH2hla7f9cS4jV311vy8rS
        ReZd1g9yWCsOJ9PdSzYLPahknD/HsA88Q5TH2jTGilTXqpyhcwgNjLYNC0+qc+Px
        BIZ3FYaADhYUEIKO2dCTWM0/GGOcrioB41qbMy0DqvTryldmDcidZ1DpHtX2vYjI
        jDP5Wco1MlzhzYdgIRCVmtn05JE21lawCwYbP/1qvbrayRlsY0m6KYINunFTbMZc
        J9IdvQPGheNkdPGXo1rWoGR0WvJDd33ZXA0gy+iPiYd9Gcs3VxtoacmkE14Hzrqj
        mwe3ZMrIN9ZHXGTSFQYV+Si3aBEH+wo9mreB/3hlCwJqz+9GL9U=
        -----END CERTIFICATE REQUEST-----";

    /**
     * This csr will trigger the system to fail after "sending" data to the ca.
     */
    public $csrAfterFail = "-----BEGIN CERTIFICATE REQUEST-----
        MIICwzCCAasCAQAwfjELMAkGA1UEBhMCREUxCzAJBgNVBAgMAkJZMRQwEgYDVQQH
        DAtNdXN0ZXJzdGFkdDEUMBIGA1UECgwLTXVzdGVyZmlybWExGDAWBgNVBAsMD011
        c3RlcmFidGVpbHVuZzEcMBoGA1UEAwwTZGVtby1hZnRlci1mYWlsLmNvbTCCASIw
        DQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAL1CtHG/R/cjtvuQ93ot1rlANgMR
        NQpanhcTEKdgpwTX4ojpxIVnNk1OO+++oyitzPokuhwO+a5d7CVncbhsaGbOzbNK
        6SmBSL6aSHmablI/kRdBOxN+r8CxK9cXMUxVB24cs2xtzuy27Ewd0EsGXNI/hvzD
        xHq0e5Fb0vCD3Qvh2l/haNnO5gwSmFg3ASNd9VkGvWijCxrh4wA0fUYQ+Csa2CkA
        63IGpaVnV1kvDNo3pQAxgWXhf0yx8NpDFX2Dk+9iA+Z1ynbSNVAjV7PEdA8iJleT
        3/0ILWSSm63POcIig0p1t39DRkpR2Ar0CZKn2SJOkA8tS7BEz1bXpEljTNkCAwEA
        AaAAMA0GCSqGSIb3DQEBCwUAA4IBAQChH0tc+QuyZ2BMpauP412RAnsu1qYiTbbq
        uvUSO6Jl/joRHO2/8z0zlO6hzDpMK18PCyVlWIt2PiyQlO/utfup+j/+SPueJ/ZX
        pdNpo8Wf0uhssnmHhAlM4KArR5lTz/+06liaCymukSiVe7U+15pQ1OhpaGAaJSup
        ohcFgqKrxROTjbNIs+1u8nAOk2MiPwyDlUlhJJtbXPVGvT3B6jwX14E15G/XWzIU
        ZKgFRIpSYpFZObGDMEGlc+YWkQ62hn79kB2chZ7fm8JW0IUtT2nhseZmtEkCDXk9
        7Qe45NPtC89xdJ9Mw8sEfKRwKRLFIPw5Nhf1R7wMy6YdkD5optcj
        -----END CERTIFICATE REQUEST-----";

    /**
     * This csr will trigger the system to set expire date within 90 days.
     * This allows us to start a renew after ordering.
     */
    public $csrRenew = "-----BEGIN CERTIFICATE REQUEST-----
        MIICvjCCAaYCAQAweTELMAkGA1UEBhMCREUxCzAJBgNVBAgMAkJZMRQwEgYDVQQH
        DAtNdXN0ZXJzdGFkdDEUMBIGA1UECgwLTXVzdGVyZmlybWExGDAWBgNVBAsMD011
        c3RlcmFidGVpbHVuZzEXMBUGA1UEAwwOZGVtby1yZW5ldy5jb20wggEiMA0GCSqG
        SIb3DQEBAQUAA4IBDwAwggEKAoIBAQC6fpnmU45V5W5aTiWIXRgnLdm/RfJ9ke9d
        zlCui+XmEViVQ/pX4Q9R0Abdwgy3i5MsHEDyg9K9o3aNTSwBw+Ghb0V0+5YW6Gkj
        z8lRJUXL2aYMlwnWYWxcBKlk8XHMIfDJSokRQR+j2c7wy6IRqwGtNwHtHGEBEMbS
        X2Pv7XfMcuve2QI3mmoqh5psMmP3rjKjCRJfe0Kg/2c3d4GnX3J8+JgNNW4ANbn0
        g2Tuen5KjxaWPKlnAlNSuEZmgSz9ANdU3huBqBgFUCZ3KWATkK0pDQJ+R1uh6PIp
        wfHtpfOmOzcDuW657hJHCJWYdY2e4namXCbe0/5kH3vIn8WwvgwPAgMBAAGgADAN
        BgkqhkiG9w0BAQsFAAOCAQEASEsF4+IG7n03uWiC5YGpZ5/U+yYJdq3kCVvzyS5C
        LiFah1HglTfeLFxO4XsuDgf1DEEDslcNT4BjrvY0Z0RvFRRxO70QbA2byNcxX3kh
        YjycHNzGxGI07gi2SG/onF+wWVytREehp7K8khKmZQzPGpKvzphfGebPVx7iJ3gy
        imZ9qumPpj9Ug+qnThuVpbSjqha+iTHZfisY7H6cPt0d46QkVtu9iHC27JoB/+c5
        7V55Y9fnvcWvTIvq+fIAhTatfLBoNyl6ILD9Ti5Cr6wuu5dymTtQoKaSM78Arja7
        SUsoQ6WiBXW+BRU2P/vQMVePndnpoL6qjUQ/sPwJ440DLg==
        -----END CERTIFICATE REQUEST-----";

    public $contactBody = array(
        "first" => "Phpunit",
        "last" =>"Mustermann",
        "organization" => "Musterfirma",
        "title" => "Administrator",
        "address" => "Musterstraße 1",
        "postalCode" => "12345",
        "city" => "Musterstadt",
        "country" => "DE",
        "state" => "Bavaria",
        "phone" => "+49-0-0",
        "email" => "max.musterman@musterdomain.de"
    );

    public $certificateBody = array(
        "product" => "DEMOSSL",
        "lifeTime" => [
            "unit" => "m",
            "period" => "12"
        ],
        "name" => "demo-ssl.com",
    );

    /**
     * This helper methods polls for new messages and confirms it. When the job id of the message matches the given job id,
     * it returns the message. If there is no message found for the given job id within 5 minutes, it returns null.
     */
    private function assertJob($jobId){
        for($i = 0; $i < 60; $i++){
            try{
                $response = $this->provider->pollInfo();
                if(!empty($response['data'])){
                    $data = $response['data'][0];
                    if(array_key_exists("message", $data)){
                        $message = $data['message'];
                        $currentJob = $message['job'];
                        $this->provider->pollConfirm($message['id']);
                        if($jobId == $currentJob['id']){
                            return $response;
                        }
                    }
                }
            }catch(RestExcecutionException $e){

            }
            sleep(5);
        }
        return null;
    }

    /**
     * Testing the CertificatePrepareOrder task
     *
     * @return void
     */
    public function testGenerateAuthenticationData()
    {
        $body = array(
            "product" => "DEMOSSL",
            "plain" => $this->csr,
        );
        $this->provider = resolve('Ephenodrom\SslManagerProvider');
        try{
            $response = $this->provider->certificatePrepareOrder($body);
        }catch(RestExcecutionException $e){
            $this->fail("Can't execute task CertificatePrepareOrder");
        }
        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400110', $status['resultCode']);
        $data = $response['data'][0];

        $this->assertEquals('demo-ssl.com', $data['name']);
        $this->assertEquals($this->csr, $data['plain']);
        $this->assertEquals(2048, $data['keySize']);
        $this->assertEquals('DE', $data['countryCode']);
        $this->assertEquals('Some-State', $data['state']);
        $this->assertEquals('Internet Widgits Pty Ltd', $data['organization']);
        $this->assertEquals('RSA', $data['algorithm']);
        $this->assertEquals('SHA256', $data['signatureHashAlgorithm']);
    }

    /**
     * Testing the certificate order workflow
     *
     * Step 1: Create contact
     * Step 2: Order certificate
     * Step 3: Poll for new poll message
     * Step 4: Load certificate Data
     * Step 5: Delete certificate
     * Step 6: Delete Contact
     *
     * @return void
     */
    public function testCertificateOrderWorkflow()
    {
        $this->provider = resolve('Ephenodrom\SslManagerProvider');
        try{
            $response = $this->provider->sslContactCreate($this->contactBody);
        }catch(RestExcecutionException $e){
            $this->fail('Contact could not be created!');
        }
        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400201', $status['resultCode']);
        $contact = $response['data'][0];

        $contactId = $contact['id'];
        $this->certificateBody['adminContact'] = ["id" => $contactId];
        $this->certificateBody['technicalContact'] = ["id" => $contactId];
        $this->certificateBody['csr'] = $this->csr;

        try{
            $response = $this->provider->certificateCreate($this->certificateBody);
        }catch(RestExcecutionException $e){
            $this->fail('Certificate could not be created!');
        }
        $status = $response["status"];
        $this->assertEquals('NOTIFY', $status['type']);
        $this->assertEquals('N400101', $status['resultCode']);

        $job = $response['data'][0];
        $jobId = $job['id'];

        $response = $this->assertJob($jobId);
        $this->assertNotNull($response);
        $certId = $response['data'][0]['message']['job']['certificate']['id'];
        try{
            $response = $this->provider->certificateDelete($certId);
        }catch(RestExcecutionException $e){

        }
        $job = $response['data'][0];
        $jobId = $job['id'];
        $response = $this->assertJob($jobId);
        $this->assertNotNull($response);

        try{
            $response = $this->provider->sslContactDelete($contactId);
        }catch(RestExcecutionException $e){
            $this->fail('Contact could not be deleted!');
        }

        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400203', $status['resultCode']);
    }

    /**
     * Testing canceling a running order
     *
     * Step 1: Create contact
     * Step 2: Order certificate
     * Step 3: Load job data
     * Step 4: Cancel job
     * Step 5: Load job data
     * Step 6: Delete Contact
     *
     * @return void
     */
    public function testCertificateOrderCancel()
    {
        $this->provider = resolve('Ephenodrom\SslManagerProvider');
        try{
            $response = $this->provider->sslContactCreate($this->contactBody);
        }catch(RestExecutionException $e){
            $this->fail('Contact could not be created!');
        }
        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400201', $status['resultCode']);
        $contact = $response['data'][0];

        $contactId = $contact['id'];
        $this->certificateBody['adminContact'] = ["id" => $contactId];
        $this->certificateBody['technicalContact'] = ["id" => $contactId];
        $this->certificateBody['csr'] = $this->csrCanceltest;
        $this->certificateBody['name'] = "demo-cancel.com";

        try{
            $response = $this->provider->certificateCreate($this->certificateBody);
        }catch(RestExecutionException $e){
            $this->fail('Certificate could not be created!');
        }
        $status = $response["status"];
        $this->assertEquals('NOTIFY', $status['type']);
        $this->assertEquals('N400101', $status['resultCode']);

        $job = $response['data'][0];
        $jobId = $job['id'];

        try{
            $response = $this->provider->jobInfo($jobId);
        }catch(RestExecutionException $e){
            $this->fail('Job not found!');
        }
        sleep(3);
        try{
            $response = $this->provider->jobCancel($jobId);
        }catch(RestExecutionException $e){
            $this->fail('Job could not be canceled!');
        }
        sleep(3);
        $response = null;
        try{
            $response = $this->provider->jobInfo($jobId);
        }catch(RestExecutionException $e){
            $this->assertEquals("EF300101", $e->apiErrorCode);
        }
        $this->assertNull($response);

        try{
            $response = $this->provider->sslContactDelete($contactId);
        }catch(RestExecutionException $e){
            $this->fail('Contact could not be deleted!');
        }

        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400203', $status['resultCode']);
    }

    /**
     * Testing renew of a certificate
     *
     * Step 1: Create contact
     * Step 2: Order certificate
     * Step 3: Poll for new poll message
     * Step 4: Renew certificate
     * Step 5: Poll for new poll message
     * Step 6: Delete certificate
     * Step 7: Delete Contact
     *
     * @return void
     */
    public function testCertificateRenew()
    {
        $this->provider = resolve('Ephenodrom\SslManagerProvider');
        try{
            $response = $this->provider->sslContactCreate($this->contactBody);
        }catch(RestExcecutionException $e){
            $this->fail('Contact could not be created!');
        }
        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400201', $status['resultCode']);
        $contact = $response['data'][0];

        $contactId = $contact['id'];
        $this->certificateBody['adminContact'] = ["id" => $contactId];
        $this->certificateBody['technicalContact'] = ["id" => $contactId];
        $this->certificateBody['csr'] = $this->csrRenew;
        $this->certificateBody['name'] = "demo-renew.com";

        try{
            $response = $this->provider->certificateCreate($this->certificateBody);
        }catch(RestExcecutionException $e){
            $this->fail('Certificate could not be created!');
        }
        $status = $response["status"];
        $this->assertEquals('NOTIFY', $status['type']);
        $this->assertEquals('N400101', $status['resultCode']);

        $job = $response['data'][0];
        $jobId = $job['id'];

        $response = $this->assertJob($jobId);
        $this->assertNotNull($response);
        $certId = $response['data'][0]['message']['job']['certificate']['id'];
        try{
            $response = $this->provider->certificateRenew($certId, $this->certificateBody);
        }catch(RestExcecutionException $e){

        }
        $status = $response["status"];
        $this->assertEquals('NOTIFY', $status['type']);
        $this->assertEquals('N400106', $status['resultCode']);

        $job = $response['data'][0];
        $jobId = $job['id'];

        $response = $this->assertJob($jobId);
        $this->assertNotNull($response);
        try{
            $response = $this->provider->certificateDelete($certId);
        }catch(RestExcecutionException $e){

        }
        $job = $response['data'][0];
        $jobId = $job['id'];
        $response = $this->assertJob($jobId);
        $this->assertNotNull($response);

        try{
            $response = $this->provider->sslContactDelete($contactId);
        }catch(RestExcecutionException $e){
            $this->fail('Contact could not be deleted!');
        }

        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400203', $status['resultCode']);
    }

    /**
     * Testing reissue of a certificate
     *
     * Step 1: Create contact
     * Step 2: Order certificate
     * Step 3: Poll for new poll message
     * Step 4: Reissue certificate
     * Step 5: Poll for new poll message
     * Step 6: Delete certificate
     * Step 7: Delete Contact
     *
     * @return void
     */
    public function testCertificateReissue()
    {
        $this->provider = resolve('Ephenodrom\SslManagerProvider');
        try{
            $response = $this->provider->sslContactCreate($this->contactBody);
        }catch(RestExcecutionException $e){
            $this->fail('Contact could not be created!');
        }
        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400201', $status['resultCode']);
        $contact = $response['data'][0];

        $contactId = $contact['id'];
        $this->certificateBody['adminContact'] = ["id" => $contactId];
        $this->certificateBody['technicalContact'] = ["id" => $contactId];
        $this->certificateBody['csr'] = $this->csr;

        try{
            $response = $this->provider->certificateCreate($this->certificateBody);
        }catch(RestExcecutionException $e){
            $this->fail('Certificate could not be created!');
        }
        $status = $response["status"];
        $this->assertEquals('NOTIFY', $status['type']);
        $this->assertEquals('N400101', $status['resultCode']);

        $job = $response['data'][0];
        $jobId = $job['id'];

        $response = $this->assertJob($jobId);
        $this->assertNotNull($response);
        $certId = $response['data'][0]['message']['job']['certificate']['id'];
        try{
            $response = $this->provider->certificateInfo($certId);
        }catch(RestExcecutionException $e){

        }
        $cert = $response['data'][0];
        dd($cert);

        try{
            $response = $this->provider->certificateReissue($certId, $this->certificateBody);
        }catch(RestExcecutionException $e){

        }
        $status = $response["status"];
        $this->assertEquals('NOTIFY', $status['type']);
        $this->assertEquals('N400106', $status['resultCode']);

        $job = $response['data'][0];
        $jobId = $job['id'];

        $response = $this->assertJob($jobId);
        $this->assertNotNull($response);
        try{
            $response = $this->provider->certificateDelete($certId);
        }catch(RestExcecutionException $e){

        }
        $job = $response['data'][0];
        $jobId = $job['id'];
        $response = $this->assertJob($jobId);
        $this->assertNotNull($response);

        try{
            $response = $this->provider->sslContactDelete($contactId);
        }catch(RestExcecutionException $e){
            $this->fail('Contact could not be deleted!');
        }

        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400203', $status['resultCode']);
    }

}
