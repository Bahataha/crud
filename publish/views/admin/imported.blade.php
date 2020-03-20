@extends('layouts.app')

@section('content')
    <div class="bodytext">
        <div class="table">
            <table class="table">

                @php $url = explode('/', url()->previous()) @endphp
                <form action="{{url('admin/'. end($url) .'/imported')}}" method="post">
                    @php $stop = 26 @endphp
                    @csrf
                    <button type="submit">Импорт</button>
                    <thead>
                    <tr>
                        <th>#</th>
                        @if (session('success'))
                            @foreach(session('success')[0] as $id => $item)
                                @if($item == null)
                                    @php $stop = $id @endphp
                                    @break
                                @endif
                                <th> {{$item}}</th>
                            @endforeach
                        @endif

                    </tr>
                    </thead>
                    <tbody>
                    @if (session('success'))
                        @for($i = 1; $i<count(session('success')); $i++)
                            <tr>
                                <td>{{ $i }}</td>
                                @foreach(session('success')[$i] as $id =>$item)
                                    @if($id == $stop)
                                        @break
                                    @endif
                                    <td><input type="text" name="{{session('success')[0][$id]}}[]" value="{{$item}}"></td>
                                @endforeach
                            </tr>
                        @endfor
                    @endif
                    </tbody>
                </form>
            </table>
        </div>
    </div>
@endsection
