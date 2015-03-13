<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductsController
{

    protected $productsService;

    public function __construct($service)
    {
        $this->productsService = $service;
    }

    public function getAll()
    {
        return new JsonResponse($this->productsService->find());
    }

    public function getProduct($id)
    {
        return new JsonResponse($this->productsService->findById($id));
    }


    public function save(Request $request)
    {
        $product = $this->getDataFromRequest($request);
        return new JsonResponse(array("id" => $this->productsService->save($product)));

    }

    public function update($id, Request $request)
    {
        $note = $this->getDataFromRequest($request);
        $this->productsService->update($id, $note);
        return new JsonResponse($note);

    }

    public function delete($id)
    {

        return new JsonResponse($this->productsService->delete($id));

    }

    public function getDataFromRequest(Request $request)
    {
        return $request->request->get("product");
    }
}
