<div class="container mx-auto p-4 space-y-4">
    <!-- Profile Header -->
    <div class="bg-white shadow rounded-lg p-6 flex items-center gap-6">
        <div class="w-24 h-24 bg-gray-300 rounded-full flex items-center justify-center text-2xl font-bold text-white">
            {{ substr($user->name, 0, 1) }}
        </div>
        <div class="space-y-2">
            <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
        </div>
    </div>

    <!-- Groups Joined -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach (['Group 1', 'Group 2'] as $group)
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-sm font-semibold">{{ $group }}</h2>
            </div>
        @endforeach
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
        <!-- Friend List -->
        <div class="md:col-span-3 bg-white shadow rounded-lg p-4">
            <h2 class="font-bold mb-4">Friend List</h2>
            <div class="space-y-4 max-h-[400px] overflow-y-auto">
                @foreach ([1, 2, 3, 4, 5] as $friend)
                    <div class="flex items-center gap-2">
                        <div
                            class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-sm font-bold text-white">
                            {{ 'Friend' }}
                            {{-- {{ substr($friend, 0, 1) }} --}}
                        </div>
                        <span>{{ 'Friend' }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Posts -->
        <div class="md:col-span-6 bg-white shadow rounded-lg p-4">
            <h2 class="font-bold mb-4">Posts</h2>
            @livewire('posts', ['userId' => $user->id])
        </div>

        <!-- Suggested Groups -->
        <div class="md:col-span-3 bg-white shadow rounded-lg p-4">
            <h2 class="font-bold mb-4">Suggested Groups</h2>
            <div class="space-y-4 max-h-[400px] overflow-y-auto">
                @foreach (['Group 1', 'Group 2'] as $group)
                    <div class="flex items-center gap-2">
                        <div
                            class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-sm font-bold text-white">
                            {{ substr($group, 0, 1) }}
                        </div>
                        <span>{{ $group }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
