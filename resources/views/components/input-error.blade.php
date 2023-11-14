@props(['messages'])
@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            @if (is_array($message)) <!--if multiple error messages comes back for a single input (multiple file select for example)-->
                @foreach ((array) $message as $it_is_truly_one_message_this_time)
                    <li>{{ $it_is_truly_one_message_this_time }}</li>
                @endforeach
            @else
                <li>{{ $message }}</li>
            @endif
        @endforeach
    </ul>
@endif
