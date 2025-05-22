@php
$locale = LaravelLocalization::getCurrentLocale() == 'ar' ? 'en' : 'ar';

@endphp
<a class="nav-link text-muted my-2" href="{{ LaravelLocalization::getLocalizedURL($locale) }}" id="LangSwitcher">
    {{ LaravelLocalization::getCurrentLocaleNative() == 'العربية' ? 'Engilsh' : 'العربية'}}

</a>
