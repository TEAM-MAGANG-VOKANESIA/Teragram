<div class="relative">
    <input type="{{$type}}" name="{{$name}}" value="{{ old("$old") }}"
        class="peer w-full border p-2 text-xs @error("$error") border-rose-600 @enderror"
        placeholder="{{$placeholder}}">
</div>
