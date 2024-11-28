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
            <div class="space-y-4 overflow-y-auto">
                @foreach ($posts as $post)
                    <div class="rounded-lg bg-white p-6 shadow-md w-1/2">
                        <div class="mb-4 flex items-center">
                            {{-- <img src="{{ $post['avatar'] }}" alt="{{ $post['user'] }}" class="mr-4 h-10 w-10 rounded-full"> --}}
                            <div>
                                <h3 class="font-semibold">{{ $post['user'] }}</h3>
                                <p class="text-sm text-gray-500">{{ \App\Utils\TimeHelper::timeAgo($post->created_at) }}
                                </p>
                            </div>
                        </div>
                        <p class="mb-4">{{ $post->post_content }}</p>
                        @if ($post->media_url)
                            <img src="{{ route('private-file', ['filename' => $post->media_url]) }}" alt="Post image"
                                class="mb-4 rounded-lg">
                        @endif
                        <div class="flex space-x-4">
                            <button wire:click="likePost({{ $post['id'] }})"
                                class="flex items-center text-gray-600 hover:text-blue-600">
                                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                                {{ 100 }}
                            </button>
                            <button class="flex items-center text-gray-600 hover:text-blue-600">
                                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                {{ 100 }}
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Suggested Groups -->
        {{-- <div class="md:col-span-3 bg-white shadow rounded-lg p-4">
            <h2 class="font-bold mb-4">Suggested Groups</h2>
            <div class="space-y-4 max-h-[400px] overflow-y-auto">
                @foreach ($suggestedGroups as $group)
                    <div class="flex items-center gap-2">
                        <div
                            class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-sm font-bold text-white">
                            {{ substr($group, 0, 1) }}
                        </div>
                        <span>{{ $group }}</span>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>
</div>
