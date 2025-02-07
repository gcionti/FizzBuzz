<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\UseCaseFizzBuzz;
use Exception;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
final readonly class FizzBuzzController
{
    public function __construct(private UseCaseFizzBuzz $useCaseFizzBuzz)
    {
    }

    #[Route('/desafio/fizz/buzz', name: 'fizz_buzz', methods: ['POST'])]
    public function index(Request $request): Response
    {
        try {
            [$initialNumber, $finalNumber] = $this->getData($request);
            $result = $this->useCaseFizzBuzz->__invoke($initialNumber, $finalNumber);

            return new Response($result, Response::HTTP_CREATED);
        } catch (InvalidArgumentException $e) {
            return new Response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }catch (Exception $e) {
            return new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function getData(Request $request): array
    {
        $data = json_decode($request->getContent(), true);

        if (empty($data)) {
            throw new InvalidArgumentException('body with required fields');
        }

        if (empty($data['initial_number'])) {
            throw new InvalidArgumentException('initial_number is required');
        }

        if (empty($data['final_number'])) {
            throw new InvalidArgumentException('final_number is required');
        }

        return [$data['initial_number'], $data['final_number']];
    }
}
