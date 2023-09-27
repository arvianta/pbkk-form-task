<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experiences</title>
    <link rel="stylesheet" href="{{ asset('css/experience.css') }}">
</head>

<body>
    <header>
        <h1>Experiences</h1>
    </header>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Employment Type</th>
                    <th>Company Name</th>
                    <th>Location</th>
                    <th>Location Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Rating</th>
                    <th>Documentation</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($experiences as $experience)
                <tr>
                    <td>{{ $experience->title }}</td>
                    <td>{{ $experience->employment_type }}</td>
                    <td>{{ $experience->company_name }}</td>
                    <td>{{ $experience->location }}</td>
                    <td>{{ $experience->location_type }}</td>
                    <td>{{ $experience->start_date }}</td>
                    <td>{{ $experience->end_date }}</td>
                    <td>{{ $experience->rating }}</td>
                    <td>
                        @if ($experience->documentation)
                        <img src="{{ asset('storage/'. $experience->documentation) }}" alt="Documentation Image">
                        @else
                        No Documentation
                        @endif
                    </td>
                    <td>
                        <form method="PUT" action="{{ route('experience.update.form', ['id' => $experience->id]) }}" style="display: inline-block;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="action-button edit-button">Edit</button>
                        </form>
                        <form method="POST" action="{{ route('experience.delete', ['id' => $experience->id]) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-button delete-button" onclick="return confirm('Are you sure you want to delete this experience?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('form') }}" class="centered-link">Back to Form</a>
    </div>
</body>

</html>