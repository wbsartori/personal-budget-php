<?php

namespace App\Modules\Person;

use App\Http\Controllers\Controller;
use App\Modules\Person\Models\Person;
use App\Modules\Utils\Constants;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class PersonController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function read(): Factory|View|Application
    {
        $persons = [];
        return view('person.index', compact("persons"));
    }

    /**
     * @return Factory|View|Application
     */
    public function new(): Factory|View|Application
    {
        $persons = [];
        return view('person._new', compact("persons"));
    }

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function save($request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'birthDate' => 'required',
            'gender' => 'required',
            'email' => 'required'
        ],
            [
                'name.required' => Constants::VALIDATE_MSG['person']['name'],
                'birthDate.required' => Constants::VALIDATE_MSG['person']['birthDate'],
                'gender.required' => Constants::VALIDATE_MSG['person']['gender'],
                'email.required' => Constants::VALIDATE_MSG['person']['email'],
            ]);

        $data = $request->all();

        if (empty(count($data))) {
            return redirect()->back()->with('errors', '');
        }

        Person::create($data);
        return redirect()->route('person')->with('success', Constants::SUCCESS_MSG['person']['saveRecords']);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $persons = Person::find($id);
        return view('person.edit', compact('persons'));
    }

    /**
     * @param $request
     * @param $id
     * @return RedirectResponse
     */
    public function update($request, $id): RedirectResponse
    {
        $data = $request->all();
        Person::find($id)->update($data);
        return redirect()->route('person')->with('success', Constants::SUCCESS_MSG['person']['updateRecords']);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        Person::find($id)->delete();
        return redirect()->route('person')->with('success', Constants::SUCCESS_MSG['person']['deleteRecords']);
    }
}
