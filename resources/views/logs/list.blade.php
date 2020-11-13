@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Logs</h2>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endif

                    @if (count($logs) > 0)
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Logs</th>
                                <th>&nbsp;</th>
                            </thead>

                            <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $log->id }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $log->log }}</div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif

                    {{ $logs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
