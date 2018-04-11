@extends('queue::layout')

@section('content')
<div id="app">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">job name</th>
            <th scope="col">Last</th>
            <th scope="col">execute at</th>
            <th scope="col">operation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($delays as $payload => $score)
            <?php $object = json_decode($payload, true); ?>
            <tr>
                <td>{{ $object['displayName'] }}</td>
                <td>{{ print_r(unserialize($object['data']['command'])) }}</td>
                <td>{{ date('Y-m-d H:i:s', $score) }}</td>
                <td><form method="post" action="{{ route('queuer.delay.destroy', ['payload' => $payload]) }}">
                        {{ csrf_field() }}
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