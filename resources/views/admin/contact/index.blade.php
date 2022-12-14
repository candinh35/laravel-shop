@extends('admin.layout.main')

@section('content')
    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Message</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td class="text-center text-muted">{{$contact->id}}</td>
                <td class="text-center">{{$contact->name}}</td>
                <td class="text-center">{{$contact->email}}</td>
                <td class="text-center">{{$contact->message}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="my-3">
        {{$contacts->appends(request()->all())->links()}}
    </div>

@endsection
