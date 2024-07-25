<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSignerRequest;
use App\Http\Requests\UpdateSignerRequest;
use App\Models\Signer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('pages.reference.signer', [
            'data' => Signer::render($request->search),
            'search' => $request->search,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSignerRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSignerRequest $request): RedirectResponse
    {
        try {
            Signer::create($request->validated());
            return back()->with('success', __('menu.general.success'));
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSignerRequest $request
     * @param Signer $signer
     * @return RedirectResponse
     */
    public function update(UpdateSignerRequest $request, Signer $signer): RedirectResponse
    {
        try {
            $signer->update($request->validated());
            return back()->with('success', __('menu.general.success'));
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Signer $signer
     * @return RedirectResponse
     */
    public function destroy(Signer $signer): RedirectResponse
    {
        try {
            $signer->delete();
            return back()->with('success', __('menu.general.success'));
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }
}
