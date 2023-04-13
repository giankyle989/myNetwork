@foreach ($comments as $comment)
<form action="/delete/comment/{{$comment->id}}" method="post">
    @method('delete')
    @csrf
    <div class="flex items-center p-1 gap-1 break-words">
        <div class="flex-shrink-0">
            <img class="h-12 w-12 rounded-full border-2 border-slate-300 object-cover" src="{{ Storage::url($comment->user->image) }}" alt="User photo">
        </div>
        <div class="bg-slate-200 overflow-hidden w-full flex-grow-1 rounded-md p-2 whitespace-normal">
            <h4 class="font-bold text-sm">{{ $comment->user->firstname }} {{ $comment->user->lastname }}</h4>
            <p class="text-sm">{{ $comment->comment_text }}</p>
            <p class="text-xs font-thin italic text-gray-400 hover:text-gray-600">{{ $comment->created_at->diffForHumans() }}</p>
        </div>
        <div class="flex-shrink-0">
            <button type="submit" class="hover:bg-slate-400 rounded-full p-2"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 448 512"><path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg></button>
        </div>
    </div>
    
</form>
@endforeach