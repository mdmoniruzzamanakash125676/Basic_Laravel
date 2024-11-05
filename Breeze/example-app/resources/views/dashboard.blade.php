<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Hey, {{ Auth::user()->name }}! Your Id is {{ Auth::user()->id }};<br>
                    {{ __("You're logged in!") }}

     <div class="mb-4">
    <ul class="list-inline">
        <li class="list-inline-item">
            <a href="{{route('class.index')}}" class="btn btn-info btn-sm">Class</a>
        </li>
        <li class="list-inline-item">
        <a href="{{route('students.index')}}" class="btn btn-info btn-sm">Students</a>

        </li>
    </ul>
</div>

                    
 <a href="{{ route('user.details', ['id' => Crypt::encryptString('2')]) }}" class="btn btn-primary btn-sm">Monir Details</a>
                        
                    
     </div>
 </div>
        </div>
    </div>
</x-app-layout>
