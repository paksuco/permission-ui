<ul class="flex mb-2 flex-col">
    @foreach($roles as $roleRecord)
    <li class="pb-2">
        <a href="#"
            class="w-full shadow rounded flex content-between px-3 py-2 bg-white items-center
                {{ isset($role) && $role == $roleRecord->id ? 'bg-indigo-800 border-indigo-900 text-indigo-100' : '' }}"
            wire:key='roles-{{$roleRecord->id}}'
            wire:click="$emitUp('setActiveRole', {{$roleRecord->id}})">
            <i class="fa fa-check text-indigo-500 mr-3"></i>
            <div class="flex-1 capitalize">{{$roleRecord->name}}</div>
            <div class=" {{ isset($role) ? ( $role == $roleRecord->id ? 'text-white' : 'text-gray-500') : 'text-gray-500' }}">
                @livewire("permission-ui::role-actions", [
                    "role" => $roleRecord
                ], key("role-action-" . $roleRecord->id))
            </div>
        </a>
    </li>
    @endforeach
</ul>
