<x-mail::message>
    # You have a new message from: {{ $data['name'] }}

    His/her message is: {{ $data['message_content'] }}

    and you can send her/him email back to: {{ $data['email_from'] }}

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
