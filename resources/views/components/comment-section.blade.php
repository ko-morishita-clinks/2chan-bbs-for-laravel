@forelse ($threads as $thread)
    <div class="threadTitle">
        <span>【タイトル】</span>
        <h1>{{ $thread->title }}</h1>
    </div>
    <section class="mb-6 border-b pb-4">

        @forelse ($thread->comments as $comment)
            <article class="mb-3 p-3 border rounded bg-gray-50">
                <div class="nameArea mb-2 text-sm text-gray-600">
                    <span>名前：</span>
                    <span class="username font-medium">{{ $comment->username }}</span>
                    <time class="ml-2">
                        ：{{ $comment->created_at->format('Y/m/d H:i:s') }}
                    </time>
                </div>
                <p class="comment text-gray-800">{{ $comment->body }}</p>
            </article>
        @empty
            <p class="text-gray-500">コメントはまだありません。</p>
        @endforelse
    </section>
@empty
    <p class="text-gray-500">スレッドがまだありません。</p>
@endforelse