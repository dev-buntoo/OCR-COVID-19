@foreach ($citizens as $person)
    <tr>
        <td>{{ $person->citizen->passcode }}</td>
        <td>{{ $person->citizen->user->cnic }}</td>
        <td>{{ $person->citizen->name }}</td>
        <td>
            @foreach ($person->citizen->medicalRecord as $item)
                <p><b>Disease Name:</b> {{ $item->disease_name }}</p>
            @endforeach
            <a href="{{ route('paramedic.add_medical_record', $person->citizen->passcode) }}"
                class="btn btn-sm btn-outline-secondary">Add</a>
        </td>
        <td>
            <form action="{{ route('paramedic.vaccinate_citizen') }}" method="POST">
                @csrf
                <button type="submit" value="{{ $person->citizen->passcode }}" class="btn btn-sm btn-outline-warning"
                    name="passcode">Vaccinated</button>
            </form>
        </td>
    </tr>
@endforeach
