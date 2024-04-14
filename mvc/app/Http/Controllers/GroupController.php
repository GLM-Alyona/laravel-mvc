<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\GroupRequest;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupRequest $request): RedirectResponse
    {
        $group = new Group;

        //$group->title = $request->input('title');
        //$group->start_from = $request->input('start_from');
        //$group->is_active = $request->input('is_active');

        $group->fill($request->all());
        $group->save();

        return redirect()->route('groups.index')->with('success', 'Группа добавлена успешно');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //return view('groups.show', compact('group'));

        //$groups = Group::find($group->id);

        //dd($groups->students);

        return view('groups.show', ['students' => $group->students, 'group' => $group]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupRequest $request, Group $group)
    {
        //$model = Group::findOrFail($group->id);

        //$model->fill([
        //    'title' => $request->get('title'),
        //    'start_from'=> $request->get('start_from'),
        //    'is_active'=> $request->get('is_active')
        //]);

        $group->fill($request->all());

        $group->save();
        return redirect()->route('groups.index')->with('success', 'Группа откорректирована успешно');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //$model = Group::findOrFail($group->id);
        $group->delete();
        return redirect()->route('groups.index');
    }
}