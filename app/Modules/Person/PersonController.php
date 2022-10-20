<?php

namespace App\Modules\Person;

use App\Http\Controllers\Controller;
use App\Modules\Person\Services\PersonService;
use App\Modules\Utils\Constants;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class PersonController extends Controller
{
    /**
     * @var PersonService $personService
     */
    protected PersonService $personService;


    public function __construct()
    {
        $this->personService = new PersonService();
    }

    /**
     * @return Factory|View|Application
     */
    public function read(): Factory|View|Application
    {
        $records = $this->personService->read();
        return view('Person.index', compact("records"));
    }

    /**
     * @return Factory|View|Application
     */
    public function new(): Factory|View|Application
    {
        $records = [];
        return view('Person._new', compact("records"));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request): RedirectResponse
    {
        $this->personService->create($request);
        return redirect()->route('person')->with('success', Constants::SUCCESS_MSG['person']['saveRecords']);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $records = $this->personService->edit($id)[0];
        return view('Person._edit', compact('records'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $response = $this->personService->update($request->all(), $id);

        if($response > 0){
            return redirect()->route('person')->with('success', Constants::SUCCESS_MSG['person']['updateRecords']);
        }

        return redirect()->route('person')->with('errors', Constants::ERROR_MSG['person']['updateRecords']);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $response = $this->personService->delete($id);

        if($response > 0){
            return redirect()->route('person')->with('success', Constants::SUCCESS_MSG['person']['deleteRecords']);
        }
        return redirect()->route('person')->with('errors', Constants::ERROR_MSG['person']['deleteRecords']);
    }
}
