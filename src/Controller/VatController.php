<?php

namespace App\Controller;

use App\Services\ViesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/vat")
 */
class VatController extends AbstractController
{

    /**
     * @var ViesService
     */
    private $service;

    public function __construct(ViesService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/{vat}", name="app_vat")
     */
    public function index(string $vat): Response
    {
        $code = substr($vat, 0, 2);
        $number = substr($vat, 2);

        $response = $this->service->verify($code, $number);

        return $response
            ? $this->json($response)
            : new Response('', 404);
    }
}
