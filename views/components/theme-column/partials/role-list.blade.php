<ul class="flex flex-col">
    @foreach($roles as $roleRecord)
    <li class="pb-2">
        <a href="#"
            class="w-full border rounded flex content-between px-3 py-3 bg-white items-center
                @isset($role) @if($role->id == $roleRecord->id) bg-indigo-800 border-indigo-900 text-indigo-100 @endif @endisset"
            wire:key='roles-{{$roleRecord->id}}'
            wire:click="$emitUp('setActiveRole', {{$roleRecord->id}})">
            <i class="fa fa-check text-indigo-500 mr-3"></i>
            <div class="flex-1 capitalize">{{$roleRecord->name}}</div>
            <div class="text-gray-500 @isset($role) @if($role->id == $roleRecord->id) text-indigo-200 @endif @endisset">
                @livewire("permission-ui::role-actions", ["role" => $roleRecord], key("role-" . $roleRecord->id))
            </div>
        </a>
    </li>
    @endforeach
</ul>
