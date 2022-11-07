<div class="mx-10 my-10">
    <div wire:poll.3600s>
        Current time is {{ date_format(now(), 'h:i:s') }}
    </div>
</div>
