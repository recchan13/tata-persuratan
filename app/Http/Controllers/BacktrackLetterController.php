<?php

namespace App\Http\Controllers;

use App\Enums\LetterType;
use App\Http\Requests\StoreLetterRequest;
use App\Http\Requests\UpdateLetterRequest;
use App\Models\Attachment;
use App\Models\Classification;
use App\Models\Config;
use App\Models\Letter;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BacktrackLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('pages.transaction.backtrack.index', [
            'data' => Letter::backtrack()->render($request->search),
            'search' => $request->search,
        ]);
    }

    /**
     * Display a listing of the backtrack letter agenda.
     *
     * @param Request $request
     * @return View
     */
    public function agenda(Request $request): View
    {
        return view('pages.transaction.backtrack.agenda', [
            'data' => Letter::backtrack()->agenda($request->since, $request->until, $request->filter)->render($request->search),
            'search' => $request->search,
            'since' => $request->since,
            'until' => $request->until,
            'filter' => $request->filter,
            'query' => $request->getQueryString(),
        ]);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function print(Request $request): View
    {
        $agenda = __('menu.agenda.menu');
        $letter = __('menu.agenda.backtrack_letter');
        $title = App::getLocale() == 'id' ? "$agenda $letter" : "$letter $agenda";
        return view('pages.transaction.backtrack.print', [
            'data' => Letter::backtrack()->agenda($request->since, $request->until, $request->filter)->get(),
            'search' => $request->search,
            'since' => $request->since,
            'until' => $request->until,
            'filter' => $request->filter,
            'config' => Config::pluck('value','code')->toArray(),
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.transaction.backtrack.create', [
            'classifications' => Classification::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLetterRequest $request
     * @return RedirectResponse
     */
    public function store(StoreLetterRequest $request): RedirectResponse
    {
        try {
            $user = auth()->user();

            if ($request->type != LetterType::BACKTRACK->type()) throw new \Exception(__('menu.transaction.backtrack_letter'));
            $newLetter = $request->validated();
            $newLetter['user_id'] = $user->id;
            $letter = Letter::create($newLetter);
            if ($request->hasFile('attachments')) {
                foreach ($request->attachments as $attachment) {
                    $extension = $attachment->getClientOriginalExtension();
                    if (!in_array($extension, ['png', 'jpg', 'jpeg', 'pdf'])) continue;
                    $filename = time() . '-'. $attachment->getClientOriginalName();
                    $filename = str_replace(' ', '-', $filename);
                    $attachment->storeAs('public/attachments', $filename);
                    Attachment::create([
                        'filename' => $filename,
                        'extension' => $extension,
                        'user_id' => $user->id,
                        'letter_id' => $letter->id,
                    ]);
                }
            }
            return redirect()
                ->route('transaction.backtrack.index')
                ->with('success', __('menu.general.success'));
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Letter $backtrack
     * @return View
     */
    public function show(Letter $backtrack): View
    {
        return view('pages.transaction.backtrack.show', [
            'data' => $backtrack->load(['classification', 'user', 'attachments']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Letter $backtrack
     * @return View
     */
    public function edit(Letter $backtrack): View
    {
        return view('pages.transaction.backtrack.edit', [
            'data' => $backtrack,
            'classifications' => Classification::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLetterRequest $request
     * @param Letter $backtrack
     * @return RedirectResponse
     */
    public function update(UpdateLetterRequest $request, Letter $backtrack): RedirectResponse
    {
        try {
            $backtrack->update($request->validated());
            if ($request->hasFile('attachments')) {
                foreach ($request->attachments as $attachment) {
                    $extension = $attachment->getClientOriginalExtension();
                    if (!in_array($extension, ['png', 'jpg', 'jpeg', 'pdf'])) continue;
                    $filename = time() . '-'. $attachment->getClientOriginalName();
                    $filename = str_replace(' ', '-', $filename);
                    $attachment->storeAs('public/attachments', $filename);
                    Attachment::create([
                        'filename' => $filename,
                        'extension' => $extension,
                        'user_id' => auth()->user()->id,
                        'letter_id' => $backtrack->id,
                    ]);
                }
            }
            return back()->with('success', __('menu.general.success'));
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Letter $backtrack
     * @return RedirectResponse
     */
    public function destroy(Letter $backtrack): RedirectResponse
    {
        try {
            $backtrack->delete();
            return redirect()
                ->route('transaction.backtrack.index')
                ->with('success', __('menu.general.success'));
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }
}
