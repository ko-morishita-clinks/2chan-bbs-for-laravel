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

        <form method="POST" action="{{ route('comments.store') }}" class="formWrapper mt-4">
          @csrf
          <div>
              <label>名前：</label>
              <input type="text" name="username" value="{{ old('username') }}" style="border: solid 1px black;">
              @error('username')
                <p style="color: red; font-size: 14px;">{{ $message }}</p>
              @enderror
              <div class="mt-2">
                  <textarea class="commentTextArea" name="body">{{ old('body') }}</textarea>
              </div>
              @error('body')
                <p style="color: red; font-size: 14px;">{{ $message }}</p>
              @enderror

              <input type="hidden" name="thread_id" value="{{ $thread->id }}">
              <!-- 位置取得用（必要なら） -->
              <input type="hidden" name="position" value="0">

              <div class="mt-2">
                  <input type="submit" value="書き込む" name="submitButton" style="border: solid 1px black;">
              </div>
          </div>
        </form>
    </section>
@empty
    <p class="text-gray-500">スレッドがまだありません。</p>
@endforelse