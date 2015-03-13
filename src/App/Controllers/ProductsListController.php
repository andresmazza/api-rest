<?php

namespace App\Controllers;
use App\ProductsController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductsListController
{

    protected $productListService;
    protected $productService;

    public function __construct($productListService,$productService)
    {
        $this->productListService = $productListService;
        $this->productService = $productService;
    }

    public function getAll()
    {
        return new JsonResponse($this->productListService->find());
    }

    public function listByName($name)
    {        
        $result = $this->productListService->findByName($name);
        foreach ($result as $pid) {
            $produtsCollections[] = $this->productService->findById($pid['id_product']);
         }
        return new JsonResponse(array('name' => $name, 'products' => $produtsCollections));
    }

    public function save(Request $request)
    {
        $product = $this->getDataFromRequest($request);
        return new JsonResponse(array("id" => $this->productListService->save($product)));
    }

    public function update($id, Request $request)
    {
        $note = $this->getDataFromRequest($request);
        $this->service->update($id, $note);
        return new JsonResponse($note);

    }

    public function delete($id)
    {

        return new JsonResponse($this->productListService->delete($id));

    }

    public function getDataFromRequest(Request $request)
    {
        return $request->request->get("productList");
    }
}
