<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    /**
     * Index Method
     */
    public function index(Request $filter) {
        $filtering = $filter->get('desc_filter');

        if ($filtering == null)
            $purchases = Purchase::orderBy('payment_method')
                                ->paginate(5);
        else
            $purchases = Purchase::where('payment_method', 'ilike', '%'.$filtering.'%')
                                ->orderBy("payment_method")
                                ->paginate(5)
                                ->setpath('purchases?name=' . $filtering);

        return view('purchases.index', ['purchases' => $purchases]);
    }

    /** 
     * Create Purchase Method
     */
    public function create() {
        return view('purchases.create');
    }

    /**
     * Store Purchase Method
     * Stores a new Purchase into the database
     */
    public function store(PurchaseRequest $request) {
        $purchase = Purchase::create($request->all());
        $purchase->books()->sync($request->get('books'));

        return redirect('purchases');
    }

    /**
     * Delete Purchase Method
     */
    public function delete($id) {
        Purchase::find($id)->delete();

        return redirect('purchases');
    }

    /**
     * Edit Purchase Method
     */
    public function edit($id) {
        $purchase = Purchase::find($id);

        return view('purchases.edit', compact('purchase'));
    }

    /**
     * Update Purchase Method
     * Updates an Purchase attributes
     */
    public function update(PurchaseRequest $request, $id) {
        $purchase = Purchase::find($id);
        $purchase->update($request->all());

        $purchase->books()->sync($request->get('books'));

        return redirect('purchases');
    }
}
