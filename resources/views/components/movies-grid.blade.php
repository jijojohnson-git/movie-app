@props(['grid'=>'grid-cols-5'])
<div {{ $attributes->merge(['class'=>'grid gap-8 '.$grid]) }}>
    {{ $slot }}
</div>
