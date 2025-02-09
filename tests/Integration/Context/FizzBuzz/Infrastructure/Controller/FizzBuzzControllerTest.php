<?php

namespace App\Tests\Integration\Context\FizzBuzz\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class FizzBuzzControllerTest extends WebTestCase
{
    public function testShouldThrowBadRequestBecauseParametersDontExist(): void
    {
        $client = static::createClient();
        $client->request('POST', '/desafio/fizz/buzz', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([]));

        $this->assertResponseStatusCodeSame(400);
        $this->assertStringContainsString('body with required fields', $client->getResponse()->getContent());
    }

    public function testShouldThrowBadRequestBecauseParameterInitialNumberDontExist(): void
    {
        $client = static::createClient();
        $client->request('POST', '/desafio/fizz/buzz', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'final_number' => 30
        ]));

        $this->assertResponseStatusCodeSame(400);
        $this->assertStringContainsString('initial_number is required', $client->getResponse()->getContent());
    }

    public function testShouldThrowBadRequestBecauseParameterFinalNumberDontExist(): void
    {
        $client = static::createClient();
        $client->request('POST', '/desafio/fizz/buzz', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'initial_number' => 1
        ]));

        $this->assertResponseStatusCodeSame(400);
        $this->assertStringContainsString('final_number is required', $client->getResponse()->getContent());
    }

    public function testFizzBuzzEndpoint(): void
    {
        $client = static::createClient();
        $client->request('POST', '/desafio/fizz/buzz', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'initial_number' => 1,
            'final_number' => 30
        ]));

        $expected = "1,2,Fizz,4,Buzz,Fizz,7,8,Fizz,Buzz,11,Fizz,13,14,FizzBuzz,16,17,Fizz,19,Buzz,Fizz,22,23,Fizz,Buzz,26,Fizz,28,29,FizzBuzz";

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
        $this->assertEquals($expected, $client->getResponse()->getContent());
    }
}