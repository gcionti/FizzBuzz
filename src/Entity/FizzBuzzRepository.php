<?php

namespace App\Entity;

interface FizzBuzzRepository
{
    public function save(FizzBuzz $fizzBuzz): void;
    public function ofId(string $id): ?FizzBuzz;
}