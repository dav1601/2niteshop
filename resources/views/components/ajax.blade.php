<input type="hidden" name="" value=" {{ URL::current() }} " id="index_current_url">
@if (Auth::check())
<input type="hidden" name="" value="{{ $daviUser->getAvatarUser(Auth::id()) }}" id="user__info--avatar">
@endif



