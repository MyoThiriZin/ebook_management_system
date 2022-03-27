@component('mail::message')
Hello {{ $detail->user->name }}

We wanted to remind you rental for {{ $detail->book->name }}: 
A book has expires on {{ $detail->end_date }}.

@component('mail::button', ['url' => url('book/detail/' . $detail->book->id) ])
Extend Rental
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
