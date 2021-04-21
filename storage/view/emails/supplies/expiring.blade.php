<h1>Supplies that are about to expire</h1>
<dl>
    @foreach($supplies as $supply)
        <dt>{{ $supply->description }}</dt>
        <dd>
            Expiration date: {{ $supply->expires_at }}<br>
            Responsible: {{ $supply->responsible }}
        </dd>
    @endforeach
</dl>