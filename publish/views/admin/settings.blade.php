@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9 bodytext">
                <div class="card">
                    @if ($message = Session::get('flash_message'))
                        <p style="padding: 15px; background: #d9f5e0; color: green; margin-bottom: 15px">{{ $message }}</p>
                    @endif
                    <div class="card-header">Настройки</div>

                    <div class="card-body">
                        <form action="{{url('timezone')}}" method="post" style="margin-top: 30px">
                            @csrf
                            <label >Таймзона
                                <select name="time" class="select-settings" required>
                                    <option disabled selected value>Выберите таймзону</option>
                                    <option value="Asia/Almaty">Азия/Алматы(Казахстан)</option>
                                    <option value="Europe/Minsk">Европа/Минск(Беларусь)</option>
                                    <option value="Asia/Baku">Азия/Баку(Азербайджан)</option>
                                    <option value="Asia/Tbilisi">Азия/Тблиси(Грузия)</option>
                                    <option value="Asia/Tashkent">Азия/Ташкент(Узбекистан)</option>
                                    <option value="Asia/Ulaanbaatar">Азия/Улан-Батор(Монголия)</option>
                                </select>
                            </label>

                            <p><input class="btn-primary" type="submit" value="Изменить"></p>
                        </form>
                        <form action="{{url('date')}}" method="post" style="margin-top: 30px">
                            @csrf
                            <label>Дата запуска проекта
                                <input class="select-settings" name="time" type="date">
                            </label>

                            <p><input class="btn-primary" type="submit" value="Изменить"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
