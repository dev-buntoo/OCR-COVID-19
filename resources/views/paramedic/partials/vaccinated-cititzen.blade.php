@foreach ($citizens as $person)
    <tr>
        <td>{{ $person->citizen->passcode }}</td>
        <td>{{ $person->citizen->user->cnic }}</td>
        <td>{{ $person->citizen->name }}</td>
        <td>{{ $person->vaccination_date . ' || ' . $person->vaccination_time }}</td>
        <td>
            @if ($person->any_reaction == '1')
                {{ $person->reaction_detail }}
            @else
                <a href="{{ route('paramedic.add_reaction', $person->citizen->passcode) }}"
                    class="btn btn-sm btn-outline-secondary add-medical-rec">Add</a>
            @endif
        </td>
    </tr>
@endforeach
