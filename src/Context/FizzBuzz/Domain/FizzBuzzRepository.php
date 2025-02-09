<?php

namespace App\Context\FizzBuzz\Domain;

interface FizzBuzzRepository
{
    public function save(FizzBuzz $fizzBuzz): void;

    public function ofId(string $id): ?FizzBuzz;
}