<div>
    <p>Hello dear friend</p>
    {!! $content !!}
</div>
<div>
    <p>Feedback</p>
    <ul>
        <li>
            <p>Contact Name: {{ $feedback['name']}}</p>
        </li>
        <li>
            <p>Email: {{ $feedback['siteEmail']}}</p>
        </li>
        <li>
            <p>Phone: {{ $feedback['phone']}}</p>
        </li>
    </ul>
</div>