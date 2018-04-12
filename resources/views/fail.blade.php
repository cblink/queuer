@extends('queue::layout')

@section('content')
<div id="app">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">connection</th>
            <th scope="col">queue</th>
            <th scope="col">payload</th>
            <th scope="col">exception</th>
            <th scope="col">failed at</th>
            <th scope="col">execute</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fails as $fail)
            <tr>
                <td>{{ $fail->id }}</td>
                <td>{{ $fail->connection }}</td>
                <td>{{ $fail->queue }}</td>
                <td>{{ $fail->payload }}</td>
                <td>{{ $fail->exception }}</td>
                <td>{{ $fail->failed_at }}</td>
                <td><form method="post" action="{{ route('queuer.fail.destroy', ['id' => $fail->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('js')

    <script>
        var app = new Vue({
          el: '#app',

        })
    </script>

@endsection