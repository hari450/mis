<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProduct_part_numberRequest;
use App\Http\Requests\UpdateProduct_part_numberRequest;
use App\Repositories\Product_part_numberRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Product;
use App\Models\Specification;
class Product_part_numberController extends AppBaseController
{
    /** @var  Product_part_numberRepository */
    private $productPartNumberRepository;

    public function __construct(Product_part_numberRepository $productPartNumberRepo)
    {
        $this->productPartNumberRepository = $productPartNumberRepo;
    }

    /**
     * Display a listing of the Product_part_number.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $productPartNumbers = $this->productPartNumberRepository->all();

        return view('product_part_numbers.index')
            ->with('productPartNumbers', $productPartNumbers);
    }

    /**
     * Show the form for creating a new Product_part_number.
     *
     * @return Response
     */
    public function create()
    {
        $product = Product::all();
        $specification = Specification::all();
        return view('product_part_numbers.create')->with(compact('product','specification'));
    }

    /**
     * Store a newly created Product_part_number in storage.
     *
     * @param CreateProduct_part_numberRequest $request
     *
     * @return Response
     */
    public function store(CreateProduct_part_numberRequest $request)
    {
        $input = $request->except('specification_id');

        $productPartNumber = $this->productPartNumberRepository->create($input);
        
        foreach ($request->only('specification_id') as $tag) {
            $productPartNumber -> specification() -> attach($tag);
        }
      
        Flash::success('Product Part Number saved successfully.');
        
        return redirect(route('productPartNumbers.index'));
    }

    /**
     * Display the specified Product_part_number.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productPartNumber = $this->productPartNumberRepository->find($id);

        if (empty($productPartNumber)) {
            Flash::error('Product Part Number not found');

            return redirect(route('productPartNumbers.index'));
        }

        return view('product_part_numbers.show')->with('productPartNumber', $productPartNumber);
    }

    /**
     * Show the form for editing the specified Product_part_number.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productPartNumber = $this->productPartNumberRepository->find($id);

        if (empty($productPartNumber)) {
            Flash::error('Product Part Number not found');

            return redirect(route('productPartNumbers.index'));
        }
        $product = Product::all();
        $specification = Specification::all();
        $data = [
            'specification'      => $specification,
             'product'            => $product,
             'productPartNumber' => $productPartNumber,
            
        ];
        return view('product_part_numbers.edit')->with($data);
    }

    /**
     * Update the specified Product_part_number in storage.
     *
     * @param int $id
     * @param UpdateProduct_part_numberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduct_part_numberRequest $request)
    {
        $productPartNumber = $this->productPartNumberRepository->find($id);

        if (empty($productPartNumber)) {
            Flash::error('Product Part Number not found');

            return redirect(route('productPartNumbers.index'));
        }
        $input = $request->except('specification_id');
        $productPartNumber = $this->productPartNumberRepository->update($input, $id);

        $productPartNumber->specification()->sync([]); 
      
        foreach ($request->only('specification_id') as $tag) {
            $productPartNumber -> specification() -> attach($tag);
        }
        Flash::success('Product Part Number updated successfully.');

        return redirect(route('productPartNumbers.index'));
    }

    /**
     * Remove the specified Product_part_number from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productPartNumber = $this->productPartNumberRepository->find($id);

        if (empty($productPartNumber)) {
            Flash::error('Product Part Number not found');

            return redirect(route('productPartNumbers.index'));
        }

        $this->productPartNumberRepository->delete($id);

        Flash::success('Product Part Number deleted successfully.');

        return redirect(route('productPartNumbers.index'));
    }
}
