@extends('layouts.app')

@section('title-block')Коррект Группы @endsection

@section('content')

    <div class="d-flex justify-content-between">
        <h1>Откорректировать данные группы</h1>
    </div>

    <form action=" {{ route('groups.update', $group->id) }} " method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-2">
            <label for="title">Название группы</label>
            <input type="text" name="title" placeholder="Название группы" id="title" class="form-control" value="{{ $group->title }}">
        </div>

        <div class="form-group mb-2">
            <label for="start_from">Дата начала обучения</label>
            <input type="date" name="start_from" placeholder="Дата начала обучения" id="start_from" class="form-control" value="{{ $group->start_from }}">
        </div>

        <div class="form-group mb-2">
            <label for="is_active">Начала ли группа своё обучение</label>
            <input type="boolean" name="is_active" placeholder="Начала ли группа своё обучение" id="is_active" class="form-control" value="{{ $group->is_active }}">
        </div>

        <button type="submit" class="btn btn-success">Корректировать</button>
    </form>
@endsection