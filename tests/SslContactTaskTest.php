<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Ephenodrom\Exceptions\RestExcecutionException;

class SslContactTaskTest extends TestCase
{

    /**
     * Testing the contact tasks
     * Step 1: Create contact
     * Step 2: Update contact
     * Step 3: Info contact
     * Step 4: List contacts
     * Step 5: Delete contact
     * Step 6: Info contact ( Expected to fail )
     *
     * @return void
     */
    public function testContactTasks()
    {
        $body = array(
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
        $provider = resolve('Ephenodrom\SslManagerProvider');
        try{
            $response = $provider->sslContactCreate($body);
        }catch(RestExcecutionException $e){

        }
        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400201', $status['resultCode']);
        $contact = $response['data'][0];

        $this->assertEquals("Phpunit", $contact["first"]);
        $this->assertEquals("Mustermann", $contact["last"]);
        $this->assertEquals("Musterfirma", $contact["organization"]);
        $this->assertEquals("Musterstraße 1", $contact["address"]);
        $this->assertEquals("Administrator", $contact["title"]);
        $this->assertEquals("12345", $contact["postalCode"]);
        $this->assertEquals("Musterstadt", $contact["city"]);
        $this->assertEquals("DE", $contact["country"]);
        $this->assertEquals("Bavaria", $contact["state"]);
        $this->assertEquals("+49-0-0", $contact["phone"]);
        $this->assertEquals("max.musterman@musterdomain.de", $contact["email"]);

        $id = $contact['id'];

        $body['email'] = "jon.doe@musterdomain.de";
        try{
            $response = $provider->sslContactUpdate($id,$body);
        }catch(RestExcecutionException $e){

        }
        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400202', $status['resultCode']);

        try{
            $response = $provider->sslContactInfo($id);
        }catch(RestExcecutionException $e){

        }
        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400204', $status['resultCode']);

        try{
            $filters = [
                [
                "key" => "first",
                "operator" => "EQUAL",
                "value" => "Phpunit"
                ]
            ];
            $response = $provider->sslContactList(null, $filters, null);
        }catch(RestExcecutionException $e){

        }
        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400205', $status['resultCode']);

        $contact = $response['data'][0];
        $this->assertEquals('Phpunit', $contact['first']);
        $this->assertEquals('Mustermann', $contact['last']);

        try{
            $response = $provider->sslContactDelete($id);
        }catch(RestExcecutionException $e){

        }

        $status = $response["status"];
        $this->assertEquals('SUCCESS', $status['type']);
        $this->assertEquals('S400203', $status['resultCode']);

        $this->expectExceptionMessage("EF4002001");
        try{
            $response = $provider->sslContactInfo($id);
        }catch(RestExcecutionException $e){
            $this->assertTrue(true);
        }
    }

    /**
     * Testing the contactInfo Task
     *
     * @return void
     */
    public function testContactNotFound()
    {
        $this->expectExceptionMessage("EF4002001");
        $provider = resolve('Ephenodrom\SslManagerProvider');
        $id = "987654321";

        try{
            $response = $provider->sslContactInfo($id);
        }catch(RestExcecutionException $e){
            $this->assertEquals("EF4002001", $e->apiErrorCode);
        }
        $this->fail('Contact should net be found!');
    }


}

