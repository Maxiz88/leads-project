<div>
    <table class="table-auto w-full table-bordered">
        <thead>
        <tr class="d-flex">
            <th class="px-2 py-1 col-2" >Username</th>
            <th class="px-4 py-2 col-3">Email</th>
            <th class="px-4 py-2 col-3">Subject</th>
            <th class="px-4 py-2 col-3" >Description</th>
            <th class="px-4 py-2 col-3" >Attached file</th>
            <th class="px-4 py-2 col-3">Created</th>
            <th class="px-4 py-2 col-3">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($leads as $lead)
            <tr @if($loop->even)class="bg-grey class="d-flex""@endif>
                <td class="border px-2 py-1 col-2">{{ $lead->username }}</td>
                <td class="border px-4 py-2 col-3">{{ $lead->email }}</td>
                <td class="border px-4 py-2 col-3">{{ $lead->subject }}</td>
                <td class="border px-4 py-2 col-3">{{ $lead->description }}</td>
                <td class="border px-4 py-2 col-3">@if($lead->file)<a href="{{ asset('storage/files/' . $lead->file) }}">{{$lead->file}}</a>@endif</td>
                <td class="border px-4 py-2 col-3">{{ $lead->created_at }}</td>
                <td class="border px-4 py-2 col-3">@if($lead->status) Done @else New @endif</td>
                    @if(!$lead->status)
                    <td class="border px-4 py-2 col-3">
                        <button wire:click="markAsDone({{ $lead->id }})" class="bg-red-100 text-red-600 px-4 rounded-full">
                            Mark as "Done"
                        </button>
                    </td>
                    @endif
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
