@if (Auth::check())
<input type="hidden" name="" value="{{ $daviUser->getAvatarUser(Auth::id()) }}" id="user__info--avatar">
@endif



