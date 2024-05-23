<x-mail::message>
    Hi, Boss!

    Here is the message from the contact form:

    {{ $message }}

    It was sent by {{ $name }} ({{ $email }} {{ $phone }}) on
    {{ now()->format('Y-m-d H:i:s') }}.

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
