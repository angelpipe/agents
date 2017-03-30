@extends ('base')

@section ('content')
    @foreach ($result as $key => $contacts)
        @if (!empty($contacts))
            <div class="row">
                <table class="table table-striped">
                    <caption>
                        Contacts for Agent with ZIP: {{ $key }}
                    </caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>ZIP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->zip }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="row alert-danger">
                No contacts found for Agent with ZIP: {{ $key }}
            </div>
        @endif
    @endforeach
@endsection