<ul class="flex flex-col">
    @foreach($roles as $roleRecord)
    <li class="pb-2">
        <a href="#" class="w-full border rounded-md mr-2 flex content-between px-4 py-2 bg-white @isset($role) @if($role->id == $roleRecord->id) bg-cool-gray-400 @endif @endisset"
            wire:key='roles-{{$roleRecord->id}}'
            wire:click="$emitUp('setActiveRole', {{$roleRecord->id}})">
            <div class="flex-1">{{$roleRecord->name}}</div>
            @livewire("permission-ui::role-actions", ["role" => $roleRecord], key("role-" . $roleRecord->id))
        </a>
    </li>
    @endforeach
</ul>
